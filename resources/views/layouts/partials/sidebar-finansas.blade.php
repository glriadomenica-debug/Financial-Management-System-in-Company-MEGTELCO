<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link {{ ($title === '') ? 'active' : '' }}" href="/index">
            <i class="fas fa-home"></i> HOME 
        </a>      
    </li>

    <!-- Kliente Pakote -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('kliente_pakote.dadusKP') }}">
            <i class="fas fa-users"></i> DADUS KLIENTE PAKOTE
        </a>
    </li>

    {{-- <!-- Invoice -->
    <li class="nav-item has-sub">
        <a class="nav-link dropdown-toggle" href="#" id="invoiceMenu" data-bs-toggle="dropdown">
            <i class="fas fa-file-invoice"></i> INVOICE
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('invoice.dadusInvoice') }}">KADA FULAN</a></li>
            <li><a class="dropdown-item" href="{{ route('invoiceinstalls.dadusInstall') }}">INSTALASAUN</a></li>
        </ul>
    </li> --}}

    <!-- Despeza -->
    <li class="nav-item has-sub">
        <a class="nav-link" href="{{ route('despeza.dadusDespeza') }}">
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
    {{-- <li class="nav-item has-sub">
        <a class="nav-link dropdown-toggle" href="#" id="deposituMenu" data-bs-toggle="dropdown">
            <i class="fas fa-piggy-bank"></i> DEPOSITU
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('depositu.hareDepositu') }}">DADUS DEPOSITU</a></li>
            <li><a class="dropdown-item" href="{{ route('depositu.addDepositu') }}">REJISTU DEPOSITU</a></li>
            <li><a class="dropdown-item" href="{{ route('depositu.reportTesoreira') }}">RELATORIU DEPOSITU BRANGKAS</a></li>
            <li><a class="dropdown-item" href="{{ route('depositu.reportBNU') }}">RELATORIU DEPOSITU BNU</a></li>
            <li><a class="dropdown-item" href="{{ route('depositu.reportHTM') }}">RELATORIU DEPOSITU HTM</a></li>
        </ul>
    </li> --}}
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

    <li class="nav-item">
        <a class="nav-link" href="/logout">
            <i class="fas fa-sign-out-alt"></i> LOG OUT
        </a>
    </li>
</ul>