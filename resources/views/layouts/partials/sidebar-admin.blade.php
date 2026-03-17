<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link {{ ($title === '') ? 'active' : '' }}" href="/index">
            <i class="fas fa-home"></i> HOME 
        </a>      
    </li>

    <!-- Pakote Internet -->
    <li class="nav-item">
        <a class="nav-link " href="{{ route('pakote.internet.dadusInternet') }}">
            <i class="fas fa-network-wired"></i> PAKOTE INTERNET
        </a>
    </li>

    <!-- Kliente -->
    {{-- <li class="nav-item has-sub">
        <a class="nav-link dropdown-toggle" href="#" id="klienMenu" data-bs-toggle="dropdown">
            <i class="fas fa-users"></i> DADUS KLIENTE
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('kliente.daduskliente') }}">DADUS KLIENTE</a></li>
            <li><a class="dropdown-item" href="{{ route('kliente.rejistuKliente') }}">REJISTU KLIENTE</a></li>
            <li><a class="dropdown-item" href="{{ route('kliente_pakote.dadusKP') }}">DADUS KLIENTE : PAKOTE</a></li>
            <li><a class="dropdown-item" href="{{ route('kliente_pakote.rejistuKP') }}">REJISTU KLIENTE : PAKOTE</a></li>
        </ul>
    </li> --}}
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

    <!-- INVOICE -->
    <li class="nav-item has-sub">
        <a class="nav-link dropdown-toggle" href="#" id="invoiceMenu" data-bs-toggle="dropdown">
            <i class="fas fa-file-invoice"></i> INVOICE
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('invoice.dadusInvoice') }}">KADA FULAN</a></li>
            <li><a class="dropdown-item" href="{{ route('invoiceinstalls.dadusInstall') }}">INSTALASAUN</a></li>
        </ul>
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