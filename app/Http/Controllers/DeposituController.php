<?php
namespace App\Http\Controllers;
use App\Models\Depositu;
use App\Models\Tipu_Depositu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DeposituController extends Controller
{
    public function index()
    {
        $depositus = Depositu::with(['tipu_depositu_husi', 'tipu_depositu_ba'])
                      ->whereHas('tipu_depositu_husi')
                      ->whereHas('tipu_depositu_ba')
                      ->orderBy('data_depositu')
                      ->get();
                      
        return view('depositu.hareDepositu', compact('depositus'), [
            'title' => 'Dadus Depositu'
        ]);
    }

    public function create()
    {
        $tipudepositus = Tipu_Depositu::all();
        return view('depositu.addDepositu', compact('tipudepositus'), [
            'title' => 'Aumenta dadus Depositu'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'data_depositu' => 'required|date',
            'tipu_depositu_husi_id' => 'required|exists:tipu__depositus,id',
            'tipu_depositu_ba_id' => 'required|exists:tipu__depositus,id|different:tipu_depositu_husi_id',
            'montante' => 'required|numeric|min:0',
            'levantamento' => 'required|boolean|exclude_if:bank_charge,1',
            'bank_charge' => 'required|boolean',
            'deskrisaun' => 'nullable|string|max:255',
            'referencia' => 'nullable|string|max:50'
        ]);
        $validated['levantamento'] = (bool)$request->input('levantamento', false);
        $validated['bank_charge'] = (bool)$request->input('bank_charge', false);
        Depositu::create($validated);
     
        return redirect()->route('depositu.hareDepositu')->with('success', 'Dadus depositu aumenta ho susesu.');
    }

    public function edit($id)
    {
        $depositus = Depositu::findOrFail($id);
        $tipudepositus = Tipu_Depositu::all(); 
        
        return view('depositu.editDepositu', [
            'depositus' => $depositus,
            'tipudepositus' => $tipudepositus,
            'title' => 'Edit dadus depositu'
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'data_depositu' => 'required|date',
            'tipu_depositu_husi_id' => 'required|exists:tipu__depositus,id',
            'tipu_depositu_ba_id' => 'required|exists:tipu__depositus,id|different:tipu_depositu_husi_id',
            'montante' => 'required|numeric|min:0',
            'levantamento' => 'required|boolean|exclude_if:bank_charge,1',
            'bank_charge' => 'required|boolean',
            'deskrisaun' => 'nullable|string|max:255',
            'referencia' => 'nullable|string|max:50'
        ]);
        $validated['levantamento'] = (bool)$request->input('levantamento', false);
        $validated['bank_charge'] = (bool)$request->input('bank_charge', false);
       
        $depositus = Depositu::findOrFail($id);
        $depositus->update($validated);

        return redirect()->route('depositu.hareDepositu')->with('success', 'Dadus Depositu atualiza ho susesu!');
    }

    public function destroy($id)
    {
        Depositu::findOrFail($id)->delete();
        DB::statement('ALTER TABLE depositus AUTO_INCREMENT = 1');

        return redirect()->route('depositu.hareDepositu')->with('success', 'Dadus Depositu hamoos ho susesu!');
    }

    public function reportBrangkas1()
    {   //Bainhira user buka report ba Br1 sei bolu generateAcc... ho parameter brangkas
          return $this->generateAccountReport('Brangkas');
    }
    public function reportHTM()
    {
        return $this->generateAccountReport('HTM');
    }
    public function reportBrangkas2()
    {
        return $this->generateAccountReport('Cashier');
    }
   
    // funsaun atu generate report ba movimentu osan iha Acc HTM, Br, cashier
protected function generateAccountReport($accountName)
{
    $months = [
        1 => 'Janeiru', 2 => 'Fevereiru', 3 => 'Marsu',
        4 => 'Abril', 5 => 'Maiu', 6 => 'Juñu',
        7 => 'Jullu', 8 => 'Agostu', 9 => 'Setembru',
        10 => 'Outubru', 11 => 'Novembru', 12 => 'Dezembru'
    ];
    
    $account = Tipu_Depositu::where('tipu_depositu', 'like', "%$accountName%")->first();
    
    if(!$account) {
        return redirect()->back()->with('error', "Tipu Depositu $accountName la existe!");
    }
    
    $selectedMonth = request('month') ? (int)request('month') : null;
    $selectedYear = request('year') ? (int)request('year') : null;
    

    ///Sura balansu husi fulan Anterior  ba HTM/Brangkas (hodi hamosu iha relatoriu for current month)
    $beginningBalance = 0;
    if ($selectedMonth && $selectedYear) {
        $previousMonth = $selectedMonth - 1;
        $previousYear = $selectedYear;
        
        if ($previousMonth < 1) {
            $previousMonth = 12;
            $previousYear--;
        }
        
        //buka transasaun iha previous month
        $previousTransactions = Depositu::with(['tipu_depositu_husi', 'tipu_depositu_ba'])
            ->where(function($q) use ($account) {
                $q->where('tipu_depositu_ba_id', $account->id)
                  ->orWhere('tipu_depositu_husi_id', $account->id);
            })
            ->whereYear('data_depositu', $previousYear)
            ->whereMonth('data_depositu', $previousMonth)
            ->orderBy('data_depositu', 'asc')
            ->get();
            
            //loop hodi kalkula
        foreach ($previousTransactions as $transaction) {
            if ($transaction->tipu_depositu_ba_id == $account->id) {
                $beginningBalance += $transaction->montante; //credit
            } else {
                $beginningBalance -= $transaction->montante; //debit
            }
        }
    }
    
    //transasaun aktual (query current month)
    $query = Depositu::with(['tipu_depositu_husi', 'tipu_depositu_ba'])
              ->where(function($q) use ($account) {
                  $q->where('tipu_depositu_ba_id', $account->id)
                    ->orWhere('tipu_depositu_husi_id', $account->id);
              })
              ->orderBy('data_depositu');
    
    if ($selectedMonth) {
        $query->whereMonth('data_depositu', $selectedMonth);
    }
    
    if ($selectedYear) {
        $query->whereYear('data_depositu', $selectedYear);
    }
    
    $transactions = $query->get();
    
    $balance = $beginningBalance;
    //hatudu beginning balance iha transasaun
    if ($selectedMonth && $selectedYear) { 
        $transactions->prepend([
            'data' => Carbon::create($selectedYear, $selectedMonth, 1)->format('Y-m-d'),
            'tipu_transasaun' => 'Beginning Balance',
            'montante' => 0,
            'kreditu' => 0,
            'debit' => 0,
            'balance' => $beginningBalance,
            'deskrisaun' => 'Saldu husi fulan liubá',
            'levantamento' => false
        ]);
    }

    // Proses transaksaun kreditu, debitu , balance
    $transactions = $transactions->map(function($transaction) use (&$balance, $account) {
        if ($transaction instanceof Depositu) {
            if($transaction->tipu_depositu_ba_id == $account->id) {
                $credit = $transaction->montante;
                $debit = 0;
                $balance += $transaction->montante;
                $tipu_transasaun = "Depositu husi " . $transaction->tipu_depositu_husi->tipu_depositu . " ba " . $account->tipu_depositu;
            } else {
                $credit = 0;
                $debit = $transaction->montante;
                $balance -= $transaction->montante;
                $tipu_transasaun = "Levantamento husi " . $account->tipu_depositu . " ba " . $transaction->tipu_depositu_ba->tipu_depositu;
            }
            
            return [
                'data' => $transaction->data_depositu,
                'tipu_transasaun' => $tipu_transasaun,
                'montante' => $transaction->montante,
                'kreditu' => $credit,
                'debit' => $debit,
                'balance' => $balance,
                'deskrisaun' => $transaction->deskrisaun,
                'levantamento' => $transaction->levantamento
            ];
        }
        return $transaction;
    });
//kalkula total
    $totalKreditu = $transactions->sum('kreditu');
    $totalDebitu = $transactions->sum('debit');
    $totalBalansu = $beginningBalance + $totalKreditu - $totalDebitu;
   

    return view('depositu.reportAccount', [
        'title' => "Relatoriu Movimentu kas iha $accountName",
        'transactions' => $transactions,
        'months' => $months,
        'accountName' => $accountName,
        'beginningBalance' => $beginningBalance,
        'totalKreditu' => $totalKreditu,
        'totalDebitu' => $totalDebitu,
        'totalBalansu'=>$totalBalansu,
        'request' => request()
    ]);
}

//user buka report ba BNU sei bolu generateBNU... ho parameter BNU
public function reportBNU()
{
    return $this->generateBNUReport('BNU');
}

// $account buka konta data iha tipu_dep
protected function generateBNUReport($accountName)
{
    $months = [
        1 => 'Janeiru', 2 => 'Fevereiru', 3 => 'Marsu',
        4 => 'Abril', 5 => 'Maiu', 6 => 'Juñu',
        7 => 'Jullu', 8 => 'Agostu', 9 => 'Setembru',
        10 => 'Outubru', 11 => 'Novembru', 12 => 'Dezembru'
    ];
    
    $account = Tipu_Depositu::where('tipu_depositu', 'like', "%$accountName%")->first();
    
    if(!$account) {
        return redirect()->back()->with('error', "Tipu Depositu $accountName la existe!");
    }
    
    $selectedMonth = request('month') ? (int)request('month') : null;
    $selectedYear = request('year') ? (int)request('year') : null;
    
    //Sura balansu husi fulan Anterior ba BNU
    $beginningBalance = 0;

    if ($selectedMonth && $selectedYear) {
        $previousMonth = $selectedMonth - 1;
        $previousYear = $selectedYear;
        
        if ($previousMonth < 1) {
            $previousMonth = 12;
            $previousYear--;
        }
         
        $previousTransactions = Depositu::with(['tipu_depositu_husi', 'tipu_depositu_ba'])
            ->where(function($q) use ($account) { //filtra transasaun nb relasiona ho tipu_dep ba no husi
                $q->where('tipu_depositu_ba_id', $account->id)
                  ->orWhere('tipu_depositu_husi_id', $account->id);
            })
            ->whereYear('data_depositu', $previousYear)
            ->whereMonth('data_depositu', $previousMonth)
            ->orderBy('data_depositu', 'asc')
            ->get(); 
        
            //kalkula beginning balance bazeia ba previousTransaction
        foreach ($previousTransactions as $transaction) {
            if ($transaction->tipu_depositu_ba_id == $account->id) {
                $beginningBalance += $transaction->montante; 
            } else {
                $beginningBalance -= $transaction->montante; 
            }
        }
    }

    //fo sai transasaun ba fulan nebe selesionadu
    $query = Depositu::with(['tipu_depositu_husi', 'tipu_depositu_ba']) 
              ->where(function($q) use ($account) {
                  $q->where('tipu_depositu_ba_id', $account->id)
                    ->orWhere('tipu_depositu_husi_id', $account->id);
              })
              ->orderBy('data_depositu', 'asc');
    
    if ($selectedMonth) {
        $query->whereMonth('data_depositu', $selectedMonth);
    }
    
    if ($selectedYear) {
        $query->whereYear('data_depositu', $selectedYear);
    }
    
    $transactions = $query->get();
    
    $balance = $beginningBalance;
    //hatudu beginning balance iha transasaun
    if ($selectedMonth && $selectedYear) {
        $transactions->prepend([
            'data' => Carbon::create($selectedYear, $selectedMonth, 1)->format('Y-m-d'),
            'tipu_transasaun' => 'Balansu iha Banku',
            'montante' => 0,
            'kreditu' => 0,
            'levantamento' => 0,
            'bank_charge' => 0,
            'despesas' => 0,
            'debit' => 0,
            'balance' => $beginningBalance,
            'deskrisaun' => 'Saldu husi fulan liubá',
            'levantamento_flag' => false,
            'selu_hosi_kliente' => 0
        ]);
    }

   // BNU report
  $transactions = $transactions->map(function($transaction) use (&$balance, $account) {
        if ($transaction instanceof Depositu) {
            $bankCharge = 0;
            $despesas = 0;
            $seluHosiKliente = 0;
            $levantamento = 0;
            
            if($transaction->tipu_depositu_ba_id == $account->id) {
                // CREDIT 
                $credit = $transaction->montante;
                $debit = 0;
                $balance += $transaction->montante;
                
                if (strpos(strtolower($transaction->deskrisaun), 'kliente') !== false || 
                    strpos(strtolower($transaction->deskrisaun), 'selu') !== false || 
                    strpos(strtolower($transaction->deskrisaun), 'internet') !== false ||
                    strpos(strtolower($transaction->deskrisaun), 'instalasaun') !== false || 
                    strpos(strtolower($transaction->deskrisaun), 'fulan') !== false ||  
                    strpos(strtolower($transaction->deskrisaun), 'servisu') !== false) {
                    $seluHosiKliente = $transaction->montante;
                    $tipu_transasaun = "Transfer husi Kliente";
                } else {
                    $tipu_transasaun = "Depositu";
                }
            } else {
                // DEBIT 
                $credit = 0;
                $debit = $transaction->montante;
                $balance -= $transaction->montante;
                
                if ($transaction->bank_charge) {
                    $bankCharge = $transaction->montante;
                    $tipu_transasaun = "Bank Charge";  
                } 
                elseif ($transaction->levantamento) {
                    $levantamento = $transaction->montante;
                    $tipu_transasaun = "Levantamento";
                } 
                elseif (strpos(strtolower($transaction->deskrisaun), 'despesas') !== false) {
                    $despesas = $transaction->montante;
                    $tipu_transasaun = "Despesas";
                } else {
                    $tipu_transasaun = "Bank Charge";
                }
            }           
            return [
                'data' => $transaction->data_depositu,
                'tipu_transasaun' => $tipu_transasaun,
                'montante' => $transaction->montante,
                'kreditu' => $credit,
                'debit' => $debit,
                'balance' => $balance,
                'deskrisaun' => $transaction->deskrisaun,
                'levantamento' => $levantamento,
                'bank_charge' => $bankCharge,
                'despesas' => $despesas,
                'selu_hosi_kliente' => $seluHosiKliente
            ];
        }
        return $transaction;
    });
    // kalkula total
       $totalMontante = $transactions->sum('montante');
       $totalKreditu = $transactions->sum('kreditu');
       $totalLevantamento = $transactions->sum('levantamento');
       $totalBankCharge = $transactions->sum('bank_charge');
       $totalDespesas = $transactions->sum('despesas');
       $totalDebitu = $transactions->sum('debit');
    // $totalBalansu = $totalKreditu - $totalDebitu;
        $totalBalansu = $beginningBalance + $totalKreditu - $totalDebitu;


       return view('depositu.reportBNU', 
       [
        'title' => "Relatoriu Movimentu Banku $accountName",
        'transactions' => $transactions,
        'months' => $months,
        'accountName' => $accountName,
        'beginningBalance' => $beginningBalance,
        'totalKreditu' => $totalKreditu,
        'totalLevantamento' => $totalLevantamento,
        'totalBankCharge' => $totalBankCharge,
        'totalDespesas' => $totalDespesas,
        'totalDebitu' => $totalDebitu,
        'totalMontante'=>$totalMontante,
        'totalBalansu'=>$totalBalansu,
        'request' => request()
    ]);
}          
}