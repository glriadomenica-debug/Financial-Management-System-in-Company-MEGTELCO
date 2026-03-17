<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link {{ ($title === '') ? 'active' : '' }}" href="/index">
            <i class="fas fa-home"></i> HOME 
        </a>      
    </li>

    <!-- Pakote Internet -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pakote.internet.dadusInternet') }}">
            <i class="fas fa-network-wired"></i> DADUS PAKOTE INTERNET
        </a>
    </li>

    <!-- Kliente -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('kliente.daduskliente') }}">
            <i class="fas fa-users"></i> DADUS KLIENTE
        </a>
        
    </li>

    <!-- Kliente Pakote -->
    <li class="nav-item">
        <a class="nav-link " href="{{ route('kliente_pakote.dadusKP') }}">
            <i class="fas fa-users"></i> DADUS KLIENTE PAKOTE
        </a>
      
    </li>

    <!-- Despeza -->
    <li class="nav-item ">
        <a class="nav-link " href="{{ route('despeza.dadusDespeza') }}">
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
            {{-- <li><a class="dropdown-item" href="{{ route('likidasaun.report') }}">RELATORIU LIKIDASAUN</a></li> --}}
        </ul>
    </li>

    <!-- Depositu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('depositu.hareDepositu') }}">
            <i class="fas fa-piggy-bank"></i> DEPOSITU
        </a>
    
    </li>

    <!-- Status Pagamentu -->
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