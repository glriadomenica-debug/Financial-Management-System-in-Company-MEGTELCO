<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    
    <!-- Stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
    <!-- Scripts -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
  </head>

 <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
         	<!-- Site header  -->
           <header class="site-header d-flex p-2">
            <h1> MEGTELCO S.A.</h1>  
            {{-- <div class="d-lg-none mobile-menu-toggle" style="position: fixed; top: 15px; left: 15px; z-index: 1100; font-size: 1.5rem; color: white; cursor: pointer;">
              <i class="fas fa-bars"></i>
            </div>          --}}
          </header>
          
          <!-- /site header -->
    
      <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
    <li class="nav-item">
      <a id="sidebarToggle" class="nav-link" href="#">
        <i class="fas fa-bars"></i> 
      </a>
    </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Settings</a></li>
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
        </li>
    </ul>
  </nav>
    
    <!-- Container -->
    
    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block bg-dark text-white sidebar" id="sidebarCollapse">
          <div class="position-sticky pt-3">
              @auth
              <!-- User Info Section -->
              <div class="sb-sidenav-footer px-3 py-4">
                  <div class="small">Logged in as:</div>
                  <div class="d-flex align-items-center">
                      <i class="fas fa-user-circle me-2" style="font-size: 2rem;"></i>
                      <div>
                          {{-- <div class="fw-bold">{{ auth()->user()->name }}</div> --}}
                          <div class="text-capitalize badge 
                              @if(auth()->user()->role === 'superadmin') bg-danger
                              @elseif(auth()->user()->role === 'admin') bg-danger
                              @elseif(auth()->user()->role === 'diretor') bg-primary
                              @elseif(auth()->user()->role === 'finansas') bg-success
                              @endif">
                              {{ auth()->user()->role }}
                          </div>
                      </div>
                  </div>
              </div>
      
              @if(auth()->user()->role === 'superadmin')
                  @include('layouts.partials.sidebar-superadmin')
              @elseif(auth()->user()->role === 'admin')
                  @include('layouts.partials.sidebar-admin')
              @elseif(auth()->user()->role === 'diretor')
                  @include('layouts.partials.sidebar-diretor')
              @elseif(auth()->user()->role === 'finansas')
                  @include('layouts.partials.sidebar-finansas')
              @endif
              @endauth
          </div>
      </nav>
        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          {{-- <div class="d-flex  flex-wrap flex-md-nowrap 
          align-items-center pt-3 pb-2 mb-3 border-bottom"> --}}
          <div class="mt-4 border-bottom">
          <h1> {{ $title }}</h1>
          </div>
          <div class="container mt-4">
            
            @yield('container')
          </div>
        </main>
      </div>
    </div>
    <!-- Footer -->
    <footer class="py-4 bg-dark text-white mt-auto w-100s">
      <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
          <div class="text-white"> © 2025 Projeto Final do Curso</div>
          <div>
            <a href="#" class="text-white me-3">Privacy Policy</a>
            &middot;
            <a href="#" class="text-white">Terms & Conditions</a>
          </div>
        </div>
      </div>
    </footer>

<!-- Scripts -->
<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<!-- Load JQuery -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>

<!-- Load Bootstrap -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!-- MetisMenu -->
<script src="{{ asset('assets/plugins/metismenu/js/jquery.metisMenu.js') }}"></script>

<!-- BlockUI -->
<script src="{{ asset('assets/plugins/blockui-master/js/jquery-ui.js') }}"></script>
<script src="{{ asset('assets/plugins/blockui-master/js/jquery.blockUI.js') }}"></script>

<!-- Knob Charts -->
<script src="{{ asset('assets/plugins/knob/js/jquery.knob.min.js') }}"></script>

<!-- JVector Map -->
<script src="{{ asset('assets/plugins/jvectormap/js/jquery-jvectormap-2.0.3.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jvectormap/js/jquery-jvectormap-world-mill-en.js') }}"></script>

<!-- ChartJs -->
<script src="{{ asset('assets/plugins/chartjs/js/Chart.min.js') }}"></script>

<!-- Morris Charts -->
<script src="{{ asset('assets/plugins/morris/js/raphael-min.js') }}"></script>
<script src="{{ asset('assets/plugins/morris/js/morris.min.js') }}"></script>

<!-- Flot Charts -->
<script src="{{ asset('assets/plugins/flot/js/jquery.flot.min.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/js/jquery.flot.tooltip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/js/jquery.flot.resize.min.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/js/jquery.flot.pie.min.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/js/jquery.flot.time.min.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('assets/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/extensions/Buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/js/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/extensions/Buttons/js/buttons.html5.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/extensions/Buttons/js/buttons.colVis.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/js/dataTables-script.js') }}"></script>

<!-- Custom Scripts -->
<script src="{{ asset('assets/js/functions.js') }}"></script>
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
<script src="{{ asset('assets/js/loader.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script> 
{{-- <script>
document.addEventListener('DOMContentLoaded', function () {
  const sidebar = document.querySelector('.sidebar');
  const sidebarToggle = document.getElementById('sidebarToggle');
  const main = document.querySelector('main');

  if (sidebarToggle && sidebar && main) {
    sidebarToggle.addEventListener('click', function () {
      sidebar.classList.toggle('collapsed');
      main.classList.toggle('expanded');
    });
  } else {
    console.error('Sidebar, main content, atau toggle button tidak ditemukan!');
  }
});

</script> --}}

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.querySelector('.sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const mobileToggle = document.querySelector('.mobile-menu-toggle');
    
    // Toggle sidebar
    if (sidebarToggle) {
      sidebarToggle.addEventListener('click', function() {
        sidebar.classList.toggle('collapsed');
      });
    }
    
    // Mobile menu toggle
    if (mobileToggle) {
      mobileToggle.addEventListener('click', function() {
        sidebar.classList.toggle('show');
        this.innerHTML = sidebar.classList.contains('show') ? 
          '<i class="fas fa-times"></i>' : '<i class="fas fa-bars"></i>';
      });
    }
    
    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', function(e) {
      if (window.innerWidth <= 768) {
        if (!sidebar.contains(e.target) && 
            !mobileToggle.contains(e.target) && 
            (!sidebarToggle || !sidebarToggle.contains(e.target))) {
          sidebar.classList.remove('show');
          if (mobileToggle) {
            mobileToggle.innerHTML = '<i class="fas fa-bars"></i>';
          }
        }
      }
    });
    
    // Auto-close mobile menu when clicking a link
    document.querySelectorAll('.sidebar a').forEach(link => {
      link.addEventListener('click', function() {
        if (window.innerWidth <= 768) {
          sidebar.classList.remove('show');
          if (mobileToggle) {
            mobileToggle.innerHTML = '<i class="fas fa-bars"></i>';
          }
        }
      });
    });
  });
  </script>




</body>
</html>
