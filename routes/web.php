<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PakoteInternetController;
use App\Http\Controllers\sessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DeposituController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\KlienteController;
use App\Http\Controllers\DespezaController;
use App\Http\Controllers\InvoiceInstallController;
use App\Http\Controllers\KlientePakoteController;
use App\Http\Controllers\LikInstallController;
use App\Http\Controllers\LikidasaunController;
use App\Http\Controllers\MetoduPagamentuController;
use App\Http\Controllers\StatusPagamentuController;
use App\Http\Controllers\TipuDepositController;
use App\Http\Controllers\TipuTransaksaunController;
use App\Http\Controllers\UserController;

use App\Models\InvoiceInstall;


// Route::get('PakoteInternet/dadusInternet', [PakoteInternetController::class, 'index'])->name('pakote.internet.dadusInternet');
// Route::get('PakoteInternet/rejistuInternet', [PakoteInternetController::class, 'create'])->name('pakote.internet.rejistuInternet');
// Route::post('PakoteInternet/rejistuInternet', [PakoteInternetController::class, 'store'])->name('pakote.internet.store');
// Route::resource('pakoteinternet', PakoteInternetController::class);
// Route::get('PakoteInternet/edit/{id}', [PakoteInternetController::class, 'edit'])->name('pakote.internet.edit');
// Route::put('PakoteInternet/update/{id}', [PakoteInternetController::class, 'update'])->name('pakote.internet.update');
// Route::delete('PakoteInternet/delete/{id}', [PakoteInternetController::class, 'destroy'])->name('pakote.internet.delete');
// Route::get('PakoteInternet/total', [PakoteInternetController::class, 'getTotalPakote'])->name('pakote.internet.getTotal');
// Route::get('PakoteInternet/all', [PakoteInternetController::class, 'getAllPakote'])->name('pakote.internet.getAll');

// // display table iha dadus kliente
// Route::get('/Kliente/daduskliente', [KlienteController::class, 'index'])->name('kliente.daduskliente');
// // diplay form rejistu kliente
// Route::get('/Kliente/rejistuKliente', [KlienteController::class, 'create'])->name('kliente.rejistuKliente');
// //save data husi rejistu kliente
// Route::post('/Kliente/rejistuKliente',[KlienteController::class,'store'])->name('kliente.store');
// Route::resource('kliente',KlienteController::class);
// // Route display edit
// Route::get('Kliente/edit/{id}', [KlienteController::class, 'edit'])->name('kliente.edit');
// // Route update
// Route::put('Kliente/update/{id}', [KlienteController::class, 'update'])->name('kliente.update');
// //Route delete
// Route::delete('Kliente/delete/{id}', [KlienteController::class, 'destroy'])->name('kliente.delete');
// Route::get('/Kliente/report', [KlienteController::class, 'report'])
// ->name('kliente.report');
// Route::get('/Kliente/generate-report', [KlienteController::class, 'generateReport'])
// ->name('kliente.generateReport');
// Route::resource('kliente', KlienteController::class)->except(['show']);

///KLIENTE:PAKOTE
// Route::get('Kliente_pakote/dadusKP', [KlientePakoteController::class, 'index'])
// ->name('kliente_pakote.dadusKP');
// // diplay form rejistu kliente :pakote
// Route::get('/Kliente_pakote/rejistuKP', [KlientePakoteController::class, 'create'])
// ->name('kliente_pakote.rejistuKP');
// Route::post('Kliente_pakote/rejistuKP', [KlientePakoteController::class, 'store'])
// ->name('kliente_pakote.store');
// // Route::get('/get-kliente-data', [KlientePakoteController::class, 'getKlienteData']);
// Route::get('/get-kliente-data', [KlientePakoteController::class, 'getKlienteData'])
// ->name('getKlienteData');
// //update
// Route::put('/kliente_pakote/{id}', [KlientePakoteController::class, 'update'])
// ->name('kliente_pakote.update');
// // Route::resource('kliente_pakote',KlientePakoteController::class);
// Route::resource('kliente_pakote', KlientePakoteController::class)->except(['show']);
// Route::patch('/kliente-pakote/{id}/update-status', [KlientePakoteController::class, 'updateStatus'])
// ->name('kliente_pakote.updateStatus');
// Route::get('/kliente-pakote/statistics', [KlientePakoteController::class, 'getStatistics'])
// ->name('kliente_pakote.statistics');
// Route::get('/kliente-pakote/status-distribution', [KlientePakoteController::class, 'getStatusDistribution'])
// ->name('kliente_pakote.statusDistribution');
// //report
// Route::get('/kliente-pakote/report', [KlientePakoteController::class, 'report'])
// ->name('kliente_pakote.report');
// Route::get('/kliente-pakote/generate-report', [KlientePakoteController::class, 'generateReport'])
// ->name('kliente_pakote.generateReport');

///Invoice
// Route::get('/Invoice/dadusInvoice', [InvoiceController::class,'index'])
// ->name('invoice.dadusInvoice');
// Route::get('/invoice/show/{nu_ref}', [InvoiceController::class, 'show'])
// ->where('nu_ref','.*')
// ->name('invoice.show');
// //save invoice ba db
// Route::post('/invoices', [InvoiceController::class, 'storeInvoice'])
// ->name('invoice.store');
// Route::get('/Invoice/edit/{nu_ref}', [InvoiceController::class, 'edit'])->name('invoice.edit');
// //  // update
// Route::put('/Invoice/update/{nu_ref}', [InvoiceController::class, 'update'])
//     ->where('nu_ref', '.*') 
//     ->name('invoice.update');


// //Invoice: installation
// Route::get('Invoiceinstalls/dadusInstall',[InvoiceInstallController::class,'index'])
// ->name('invoiceinstalls.dadusInstall');
// Route::get('/Invoiceinstalls/showinstalls/{nu_ref}', [InvoiceInstallController::class, 'show'])
// ->where('nu_ref','.*')
// ->name('invoiceinstalls.showinstalls');
// Route::post('/Invoiceinstalls', [InvoiceInstallController::class, 'store'])
//     ->name('invoiceinstalls.store');


// //Despeza
// Route::get('/despeza/dadusDespeza', [DespezaController::class, 'index'])->name('despeza.dadusDespeza');
// // diplay form aumenta despeza
// Route::get('/despeza/aumentaDespeza', [DespezaController::class, 'create'])->name('despeza.aumentaDespeza');
// //display form rejistu tipu transaksaun
// Route::get('/despeza/tiputransaksaun', [DespezaController::class, 'create'])->name('despeza.tiputransaksaun');
// //save
// Route::post('/despeza/aumentaDespeza', [DespezaController::class, 'store'])->name('despeza.store');
// //edit
// // Route::resource('despeza', DespezaController::class);
// Route::resource('despeza', DespezaController::class)->except(['show']);
// //hamoos
// Route::delete('/despeza/{id}', [DespezaController::class, 'destroy'])->name('despeza.destroy');
// Route::get('/despeza-report', [DespezaController::class, 'report'])->name('despeza.report');
// Route::get('/despeza-generate-report', [DespezaController::class, 'generateReport'])
// ->name('despeza.generateReport');

// //Likidasaun
// Route::get('/likidasaun/dadusLikidasaun', [LikidasaunController::class, 'index'])
// ->name('likidasaun.dadusLikidasaun');

// // diplay form aumenta likidasaun
// Route::get('/likidasaun/aumentaLikidasaun', [LikidasaunController::class, 'create'])
// ->name('likidasaun.aumentaLikidasaun');
// //save
// Route::post('Likidasaun/aumentaLikidasaun', [LikidasaunController::class,'store'])
// ->name('likidasaun.store');
// Route::resource('likidasaun', LikidasaunController::class)->except(['show']);
// Route::get('/get-invoice-data/{invoice}', [LikidasaunController::class, 'getInvoiceData']);
// Route::get('/likidasaun-report', [LikidasaunController::class,'report'])
// ->name('likidasaun.report');
// Route::get('/likidasaun-generate-report', [LikidasaunController::class,'generateReport'])
// ->name('likidasaun.generateReport');

// //Lik Install
// Route::get('/likidasaun_instalasaun/dadusLikInstall', [LikInstallController::class,'index'])
// ->name('likidasaun_instalasaun.dadusLikInstall');
// Route::get('Likidasaun_instalasaun/aumentaLikiInstall', [LikInstallController::class, 'create'])
// ->name('likidasaun_instalasaun.aumentaLikInstall');
// Route::post('Likidasaun_instalasaun/aumentaLikInstall', [LikInstallController::class,'store'])
// ->name('likidasaun_instalasaun.store');
// Route::resource('likidasaun_instalasaun', LikInstallController::class)->except(['show']);
// Route::get('/get-invoice-install-data/{id}', function ($id) {
//     $invoice = InvoiceInstall::findOrFail($id);
//     return response()->json([
//         // 'deskrisaun' => 'Pagamentu ba Instalasaun Internet - ' . $invoice->period_month,
//         'total' => $invoice->total
//     ]);
// });
// Route::get('/likidasaun-instalasaun/report', [LikInstallController::class,'report'])
// ->name('likidasaun_instalasaun.report');
// Route::get('/likidasaun-instalasaun/generate-report', [LikInstallController::class,'generateReport'])
// ->name('likidasaun_instalasaun.generateReport');


// // Display dadus tipu transaksaun
// Route::get('/Tiputransaksaun/dadus', [TipuTransaksaunController::class, 'index'])
//     ->name('tiputransaksaun.dadus');
// //form rejistu tipu transaksaun
// Route::get('Tiputransaksaun/tiputransaksaun', [TipuTransaksaunController::class, 'create'])
// ->name('tiputransaksaun.tiputransaksaun');
// Route::post('Tiputransaksaun/tiputransaksaun', [TipuTransaksaunController::class, 'store'])
// ->name('tiputransaksaun.store');

// Route::resource('tiputransaksaun', TipuTransaksaunController::class);

// //display dadus metodu pagamentu
// Route::get('MetoduPagamento/daduspagamentu', [MetoduPagamentuController::class, 'index'])
// ->name('metodupagamento.daduspagamentu');
// //form rejistu metodu pagamentu
// Route::get('MetoduPagamento/aumentadaduspagamentu', [MetoduPagamentuController::class, 'create'])
// ->name('metodupagamento.aumentadaduspagamentu');
// Route::post('MetoduPagamento/aumentadaduspagamentu', [MetoduPagamentuController::class, 'store'])
// ->name('metodupagamento.store');
// Route::resource('metodupagamento', MetoduPagamentuController::class);

// //tipu_depositu
// Route::get('Tipu_deposit/dadusDep', [TipuDepositController::class,'index'])
// ->name('tipu_deposit.dadusDep');
// Route::get('Tipu_deposit/rejistuDep',[TipuDepositController::class,'create'])
// ->name('tipu_deposit.rejistuDep');
// Route::post('Tipu_deposit/rejistuDep',[TipuDepositController::class,'store'])
// ->name('tipu_deposit.store');
// Route::resource('tipu_deposit', TipuDepositController::class);

// //depositu
// Route::get('Depositu/hareDepositu',[DeposituController::class,'index'])
// ->name('depositu.hareDepositu');
// Route::get('Depositu/addDepositu',[DeposituController::class,'create'])
// ->name('depositu.addDepositu');
// Route::post('Depositu/addDepositu',[DeposituController::class,'store'])
// ->name('depositu.store');
// Route::resource('depositu',DeposituController::class)->except(['show']);
// Route::get('/report-brangkas1', [DeposituController::class, 'reportBrangkas1'])->name('depositu.reportTesoreira');
// Route::get('/report-brangkas2', [DeposituController::class, 'reportBrangkas2'])->name('depositu.reportCashier');
// Route::get('/report-htm', [DeposituController::class, 'reportHTM'])->name('depositu.reportHTM');
// Route::get('/reportBNU', [DeposituController::class, 'reportBNU'])->name('depositu.reportBNU');


//statuspagamentu
// Route::get('StatusPagamentu/dadusPagamentu',[StatusPagamentuController::class,'index'])
// ->name('statuspagamentu.dadusPagamentu');

// Route::post('/statuspagamentu/save', [StatusPagamentuController::class, 'save'])
// ->name('statuspagamentu.save');
// Route::post('/statuspagamentu/update', [StatusPagamentuController::class, 'update'])
// ->name('statuspagamentu.update');
// Route::get('/statuspagamentu/report', [StatusPagamentuController::class, 'report'])
// ->name('statuspagamentu.report');
// Route::get('/statuspagamentu/generate-report', [StatusPagamentuController::class, 'generateReport'])
// ->name('statuspagamentu.generateReport');

// Route::get('/user/dadusUser',[UserController::class,'index'])
// ->name('user.dadusUser');
// Route::get('/user/rejistuUser',[UserController::class,'create'])
// ->name('user.rejistuUser');
// Route::post('/user/rejistuUser',[UserController::class,'store'])
// ->name('user.store');
// Route::resource('user',UserController::class)->except(['show']);
// Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
// Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');


Route::get('/', [sessionController::class,'index'])->name('login');
Route::post('/', [sessionController::class,'login']);
Route::get('/logout', [sessionController::class,'logout'])->name('logout');

//Asesu uja login
Route::middleware(['auth'])->group(function () {
    Route::get('/index', [AdminController::class,'index'])->name('dashboard');
    // Shared view route for multiple roles
      Route::get('Kliente_pakote/dadusKP', [KlientePakoteController::class,'index'])
            ->name('kliente_pakote.dadusKP');
            
        Route::get('Kliente_pakote/report', [KlientePakoteController::class, 'report'])
            ->name('kliente_pakote.report');
            
        Route::get('Kliente_pakote/generate-report', [KlientePakoteController::class, 'generateReport'])
            ->name('kliente_pakote.generateReport');

        Route::patch('Kliente_pakote/{id}/update-status', [KlientePakoteController::class, 'updateStatus'])
            ->name('kliente_pakote.updateStatus');

        Route::get('Kliente_pakote/statistics', [KlientePakoteController::class, 'getStatistics'])
            ->name('kliente_pakote.statistics');

        Route::get('kliente_pakote/status-distribution', [KlientePakoteController::class, 'getStatusDistribution'])
            ->name('kliente_pakote.statusDistribution');


        Route::get('Despeza/dadusDespeza', [DespezaController::class, 'index'])
            ->name('despeza.dadusDespeza');

         Route::get('Despeza-report', [DespezaController::class, 'report'])
            ->name('despeza.report');

        Route::get('Despeza-generate-report', [DespezaController::class, 'generateReport'])
            ->name('despeza.generateReport');

        Route::get('Depositu/hareDepositu',[DeposituController::class,'index'])
            ->name('depositu.hareDepositu');

        Route::get('/report-brangkas1', [DeposituController::class, 'reportBrangkas1'])
            ->name('depositu.reportBrangkas');

        Route::get('/report-brangkas2', [DeposituController::class, 'reportBrangkas2'])
            ->name('depositu.reportCashier');

        Route::get('/report-htm', [DeposituController::class, 'reportHTM'])
            ->name('depositu.reportHTM');

        Route::get('/reportBNU', [DeposituController::class, 'reportBNU'])
            ->name('depositu.reportBNU');

        Route::get('StatusPagamentu/dadusPagamentu',[StatusPagamentuController::class,'index'])
            ->name('statuspagamentu.dadusPagamentu');

        Route::post('/statuspagamentu/save', [StatusPagamentuController::class, 'save'])
            ->name('statuspagamentu.save');

        Route::post('/statuspagamentu/update', [StatusPagamentuController::class, 'update'])
            ->name('statuspagamentu.update');

        Route::get('/statuspagamentu/report', [StatusPagamentuController::class, 'report'])
            ->name('statuspagamentu.report');

        Route::get('/statuspagamentu/generate-report', [StatusPagamentuController::class, 'generateReport'])
            ->name('statuspagamentu.generateReport');

            Route::get('Kliente/daduskliente', [KlienteController::class, 'index'])
            ->name('kliente.daduskliente');

        Route::get('/Kliente/report', [KlienteController::class, 'report'])
            ->name('kliente.report');

        Route::get('/Kliente/generate-report', [KlienteController::class, 'generateReport'])
            ->name('kliente.generateReport');

        Route::get('PakoteInternet/dadusInternet', [PakoteInternetController::class, 'index'])
        ->name('pakote.internet.dadusInternet');

        Route::get('PakoteInternet/total', [PakoteInternetController::class, 'getTotalPakote'])
            ->name('pakote.internet.getTotal');

        Route::get('PakoteInternet/all', [PakoteInternetController::class, 'getAllPakote'])
            ->name('pakote.internet.getAll');

        Route::get('/Invoice/dadusInvoice', [InvoiceController::class,'index'])
            ->name('invoice.dadusInvoice');

        Route::get('/invoice/show/{nu_ref}', [InvoiceController::class, 'show'])
            ->where('nu_ref','.*')
            ->name('invoice.show');

        Route::post('/invoices', [InvoiceController::class, 'storeInvoice'])
            ->name('invoice.store');

        Route::get('/Invoice/edit/{nu_ref}', [InvoiceController::class, 'edit'])
            ->name('invoice.edit');

        Route::put('/Invoice/update/{nu_ref}', [InvoiceController::class, 'update'])
            ->where('nu_ref', '.*') 
            ->name('invoice.update');

        Route::get('Invoiceinstalls/dadusInstall',[InvoiceInstallController::class,'index'])
            ->name('invoiceinstalls.dadusInstall');

        Route::get('/Invoiceinstalls/showinstalls/{nu_ref}', [InvoiceInstallController::class, 'show'])
            ->where('nu_ref','.*')
            ->name('invoiceinstalls.showinstalls');

        Route::post('/Invoiceinstalls', [InvoiceInstallController::class, 'store'])
            ->name('invoiceinstalls.store');

        Route::get('Likidasaun/dadusLikidasaun', [LikidasaunController::class, 'index'])
            ->name('likidasaun.dadusLikidasaun');

        Route::get('/likidasaun-report', [LikidasaunController::class,'report'])
            ->name('likidasaun.report');

        // Route::post('/likidasaun-generate-report', [LikidasaunController::class,'generateReport'])
        //     ->name('likidasaun.generateReport');

        Route::match(['get', 'post'], '/likidasaun-generate-report', [LikidasaunController::class,'generateReport'])
            ->name('likidasaun.generateReport');
    
        Route::get('/likidasaun_instalasaun/dadusLikInstall', [LikInstallController::class,'index'])
            ->name('likidasaun_instalasaun.dadusLikInstall');

        Route::get('/likidasaun-instalasaun/report', [LikInstallController::class,'report'])
            ->name('likidasaun_instalasaun.report');

        Route::get('/likidasaun-instalasaun/generate-report', [LikInstallController::class,'generateReport'])
            ->name('likidasaun_instalasaun.generateReport');

// Role based  Superadmin
    Route::middleware(['role:superadmin'])->group(function() {
        Route::resource('despeza', DespezaController::class)->except(['show']);

        Route::delete('Despeza/{id}', [DespezaController::class, 'destroy'])
            ->name('despeza.destroy');

        Route::resource('depositu',DeposituController::class)->except(['show']);

        Route::resource('likidasaun', LikidasaunController::class)
            ->except(['show']);

        Route::resource('likidasaun_instalasaun', LikInstallController::class)
            ->except(['show']);

        Route::get('/Tiputransaksaun/dadus', [TipuTransaksaunController::class, 'index'])
            ->name('tiputransaksaun.dadus');

        Route::get('Tiputransaksaun/tiputransaksaun', [TipuTransaksaunController::class, 'create'])
            ->name('tiputransaksaun.tiputransaksaun');

        Route::post('Tiputransaksaun/tiputransaksaun', [TipuTransaksaunController::class, 'store'])
            ->name('tiputransaksaun.store');

        Route::resource('tiputransaksaun', TipuTransaksaunController::class);

        Route::get('MetoduPagamento/daduspagamentu', [MetoduPagamentuController::class, 'index'])
            ->name('metodupagamento.daduspagamentu');

        Route::get('MetoduPagamento/aumentadaduspagamentu', [MetoduPagamentuController::class, 'create'])
            ->name('metodupagamento.aumentadaduspagamentu');

        Route::post('MetoduPagamento/aumentadaduspagamentu', [MetoduPagamentuController::class, 'store'])
            ->name('metodupagamento.store');

        Route::resource('metodupagamento', MetoduPagamentuController::class);

        Route::get('Tipu_deposit/dadusDep', [TipuDepositController::class,'index'])
            ->name('tipu_deposit.dadusDep');
        
        Route::get('Tipu_deposit/rejistuDep',[TipuDepositController::class,'create'])
            ->name('tipu_deposit.rejistuDep');

        Route::post('Tipu_deposit/rejistuDep',[TipuDepositController::class,'store'])
            ->name('tipu_deposit.store');

        Route::resource('tipu_deposit', TipuDepositController::class);

        Route::get('/user/dadusUser',[UserController::class,'index'])
            ->name('user.dadusUser');

        Route::get('/user/rejistuUser',[UserController::class,'create'])
            ->name('user.rejistuUser');

        Route::post('/user/rejistuUser',[UserController::class,'store'])
            ->name('user.store');

        Route::resource('user',UserController::class)
        ->except(['show']);

        Route::get('/user/{id}/edit', [UserController::class, 'edit'])
        ->name('user.edit');

        Route::put('/user/{id}', [UserController::class, 'update'])
        ->name('user.update');    
                
        Route::delete('Kliente/delete/{id}', [KlienteController::class, 'destroy'])
            ->name('kliente.delete');

        Route::get('Kliente/edit/{id}', [KlienteController::class, 'edit'])
            ->name('kliente.edit');

        Route::put('Kliente/update/{id}', [KlienteController::class, 'update'])
            ->name('kliente.update');
        
        Route::delete('kliente_pakote/{id}', [KlientePakoteController::class, 'destroy'])
            ->name('kliente_pakote.destroy');

        Route::get('kliente_pakote/{id}/edit', [KlientePakoteController::class, 'edit'])
            ->name('kliente_pakote.edit');
            
        Route::put('kliente_pakote/{id}', [KlientePakoteController::class, 'update'])
            ->name('kliente_pakote.update');

        Route::delete('PakoteInternet/delete/{id}', [PakoteInternetController::class, 'destroy'])
        ->name('pakote.internet.delete');

        Route::get('PakoteInternet/edit/{id}', [PakoteInternetController::class, 'edit'])
        ->name('pakote.internet.edit');

        Route::put('PakoteInternet/update/{id}', [PakoteInternetController::class, 'update'])
        ->name('pakote.internet.update');
    });

///Rle-based access ba finansas hodi rejistu dadus finanseiru
        Route::middleware(['role:finansas,superadmin'])->group(function() {
      
        Route::get('Despeza/aumentaDespeza', [DespezaController::class, 'create'])
            ->name('despeza.aumentaDespeza');

        Route::post('Despeza/aumentaDespeza', [DespezaController::class, 'store'])
            ->name('despeza.store');

        Route::get('Depositu/addDepositu',[DeposituController::class,'create'])
            ->name('depositu.addDepositu');
        
        Route::post('Depositu/addDepositu',[DeposituController::class,'store'])
            ->name('depositu.store');
        
        Route::resource('depositu',DeposituController::class)->except(['edit','destroy']);

        Route::get('Likidasaun/aumentaLikidasaun', [LikidasaunController::class, 'create'])
            ->name('likidasaun.aumentaLikidasaun');
        
        Route::post('Likidasaun/aumentaLikidasaun', [LikidasaunController::class,'store'])
            ->name('likidasaun.store');

        Route::resource('likidasaun', LikidasaunController::class)
        ->except(['edit','destroy']);

        Route::get('/get-invoice-data/{invoice}', [LikidasaunController::class, 'getInvoiceData']);

        Route::get('Likidasaun_instalasaun/aumentaLikiInstall', [LikInstallController::class, 'create'])
            ->name('likidasaun_instalasaun.aumentaLikInstall');

        Route::post('Likidasaun_instalasaun/aumentaLikInstall', [LikInstallController::class,'store'])
            ->name('likidasaun_instalasaun.store');

        Route::resource('likidasaun_instalasaun', LikInstallController::class)
            ->except(['edit','destroy']);

        Route::get('/get-invoice-install-data/{id}', function ($id) {
            $invoice = InvoiceInstall::findOrFail($id);
            return response()->json([
                // 'deskrisaun' => 'Pagamentu ba Instalasaun Internet - ' . $invoice->period_month,
                'total' => $invoice->total
            ]);
        });
        });

// Role-based access ba Admin hodi rejistu dadus kliente, invoice
    Route::middleware(['role:superadmin,admin'])->group(function() {
        Route::get('kliente_pakote/rejistuKP', [KlientePakoteController::class,'create'])
            ->name('kliente_pakote.rejistuKP');
            
        Route::get('/get-kliente-data', [KlientePakoteController::class, 'getKlienteData'])
            ->name('getKlienteData');
            
        Route::post('kliente_pakote/rejistuKP', [KlientePakoteController::class,'store'])
            ->name('kliente_pakote.store');
            
        Route::get('kliente_pakote/{id}/edit', [KlientePakoteController::class, 'edit'])
            ->name('kliente_pakote.edit');
            
        Route::put('kliente_pakote/{id}', [KlientePakoteController::class, 'update'])
            ->name('kliente_pakote.update');
            
        // Route::delete('kliente_pakote/{id}', [KlientePakoteController::class, 'destroy'])
        //     ->name('kliente_pakote.destroy');
        
        Route::get('/Kliente/rejistuKliente', [KlienteController::class, 'create'])
            ->name('kliente.rejistuKliente');

        Route::post('/Kliente/rejistuKliente',[KlienteController::class,'store'])
            ->name('kliente.store');

        Route::resource('kliente',KlienteController::class);
        Route::get('Kliente/edit/{id}', [KlienteController::class, 'edit'])
            ->name('kliente.edit');

        Route::put('Kliente/update/{id}', [KlienteController::class, 'update'])
            ->name('kliente.update');

        // Route::delete('Kliente/delete/{id}', [KlienteController::class, 'destroy'])
        //     ->name('kliente.delete');

        Route::get('PakoteInternet/rejistuInternet', [PakoteInternetController::class, 'create'])
        ->name('pakote.internet.rejistuInternet');

        Route::post('PakoteInternet/rejistuInternet', [PakoteInternetController::class, 'store'])
        ->name('pakote.internet.store');

        Route::resource('pakoteinternet', PakoteInternetController::class);

        Route::get('PakoteInternet/edit/{id}', [PakoteInternetController::class, 'edit'])
        ->name('pakote.internet.edit');

        Route::put('PakoteInternet/update/{id}', [PakoteInternetController::class, 'update'])
        ->name('pakote.internet.update');

        // Route::delete('PakoteInternet/delete/{id}', [PakoteInternetController::class, 'destroy'])
        // ->name('pakote.internet.delete');

         // Display dadus tipu transaksaun
        Route::get('/Tiputransaksaun/dadus', [TipuTransaksaunController::class, 'index'])
            ->name('tiputransaksaun.dadus');
        //form rejistu tipu transaksaun
        Route::get('Tiputransaksaun/tiputransaksaun', [TipuTransaksaunController::class, 'create'])
        ->name('tiputransaksaun.tiputransaksaun');
        Route::post('Tiputransaksaun/tiputransaksaun', [TipuTransaksaunController::class, 'store'])
        ->name('tiputransaksaun.store');

        Route::resource('tiputransaksaun', TipuTransaksaunController::class);

        //display dadus metodu pagamentu
        Route::get('MetoduPagamento/daduspagamentu', [MetoduPagamentuController::class, 'index'])
        ->name('metodupagamento.daduspagamentu');
        //form rejistu metodu pagamentu
        Route::get('MetoduPagamento/aumentadaduspagamentu', [MetoduPagamentuController::class, 'create'])
        ->name('metodupagamento.aumentadaduspagamentu');
        Route::post('MetoduPagamento/aumentadaduspagamentu', [MetoduPagamentuController::class, 'store'])
        ->name('metodupagamento.store');
        Route::resource('metodupagamento', MetoduPagamentuController::class);

        //tipu_depositu
        Route::get('Tipu_deposit/dadusDep', [TipuDepositController::class,'index'])
        ->name('tipu_deposit.dadusDep');
        Route::get('Tipu_deposit/rejistuDep',[TipuDepositController::class,'create'])
        ->name('tipu_deposit.rejistuDep');
        Route::post('Tipu_deposit/rejistuDep',[TipuDepositController::class,'store'])
        ->name('tipu_deposit.store');
        Route::resource('tipu_deposit', TipuDepositController::class);
    });
});

   
 




