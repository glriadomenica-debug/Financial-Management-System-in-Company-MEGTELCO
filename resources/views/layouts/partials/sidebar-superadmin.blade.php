<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link {{ ($title === '') ? 'active' : '' }}" href="/index">
            <i class="fas fa-home"></i> HOME 
        </a>      
    </li>

    <!-- Pakote Internet -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pakote.internet.dadusInternet') }}">
            <i class="fas fa-network-wired"></i> PAKOTE INTERNET
        </a>
    </li>

    <!-- Kliente -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('kliente.daduskliente') }}">
            <i class="fas fa-users"></i> DADUS KLIENTE
        </a>
    </li>
    {{-- KLIENTE PAKOTE --}}
       <li class="nav-item">
        <a class="nav-link" href="{{ route('kliente_pakote.dadusKP') }}">
            <i class="fas fa-users"></i> DADUS KLIENTE : PAKOTE
        </a>
    </li>

    <!-- Invoice -->
    <li class="nav-item has-sub">
        <a class="nav-link dropdown-toggle" href="#" id="invoiceMenu" data-bs-toggle="dropdown">
            <i class="fas fa-file-invoice"></i> INVOICE
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('invoice.dadusInvoice') }}">KADA FULAN</a></li>
            <li><a class="dropdown-item" href="{{ route('invoiceinstalls.dadusInstall') }}">INSTALASAUN</a></li>
        </ul>
    </li>

     <!-- Despeza -->
     {{-- <li class="nav-item has-sub">
        <a class="nav-link dropdown-toggle" href="#" id="despezaMenu" data-bs-toggle="dropdown">
            <i class="fas fa-money-bill-wave"></i> DESPEZA
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('despeza.dadusDespeza') }}">DADUS DESPEZA</a></li>
            <li><a class="dropdown-item" href="{{ route('despeza.report') }}">RELATORIU DESPEZA</a></li>
        </ul>
    </li> --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('despeza.dadusDespeza') }}" >
            <i class="fas fa-money-bill-wave"></i> DESPEZA
        </a>
       
    </li>

    <!-- Likidasaun -->
    <li class="nav-item has-sub">
        <a class="nav-link dropdown-toggle" href="#" id="likidasaunMenu" data-bs-toggle="dropdown">
            <i class="fas fa-hand-holding-usd"></i> LIKIDASAUN
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('likidasaun.dadusLikidasaun') }}">SERVISU INTERNET</a></li>
            <li><a class="dropdown-item" href="{{ route('likidasaun_instalasaun.dadusLikInstall') }}">SERVISU INSTALASAUN</a></li>
        </ul>
    </li>

    <!-- Depositu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('depositu.hareDepositu') }}">
            <i class="fas fa-piggy-bank"></i> DEPOSITU
        </a>
    </li>

    <!-- Status Pagamentu -->
    <li class="nav-item has-sub">
        <a class="nav-link dropdown-toggle" href="#" id="pagamentuMenu" data-bs-toggle="dropdown">
            <i class="fas fa-piggy-bank"></i> STATUS PAGAMENTU
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('statuspagamentu.dadusPagamentu') }}">STATUS PAGAMENTU</a></li>
            <li><a class="dropdown-item" href="{{ route('statuspagamentu.report') }}">RELATORIU PAGAMENTU</a></li>
        </ul>
    </li>

    <!-- User Management -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.dadusUser') }}">
            <i class="fas fa-users-cog"></i> USER
        </a>  
    </li>

    <!-- rejistu tipu -->
    <li class="nav-item has-sub">
        <a class="nav-link dropdown-toggle" href="#" id="configMenu" data-bs-toggle="dropdown">
            <i class="fas fa-cog"></i> REJISTU TIPU
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('tiputransaksaun.dadus') }}">TIPU TRANSAKSAUN</a></li>
            <li><a class="dropdown-item" href="{{ route('metodupagamento.daduspagamentu') }}">METODU PAGAMENTU</a></li>
            <li><a class="dropdown-item" href="{{ route('tipu_deposit.dadusDep') }}">TIPU DEPOSITU</a></li>
        </ul>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/logout">
            <i class="fas fa-sign-out-alt"></i> LOG OUT
        </a>
    </li>
</ul>