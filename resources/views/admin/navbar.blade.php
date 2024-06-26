<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center" style="background-color: white">
    <img class="animation__shake" src="{{asset('dist/img/Logo.png')}}" alt="AdminLTELogo"
        width="200">
</div>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-warning navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                    class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
    

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-bell"></i>
                @if ($countNotif != 0)
                <span class="badge badge-danger navbar-badge">{{$countNotif}}</span>
                    

                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right text-sm">
                <span class="dropdown-item dropdown-header">Notifikasi</span>
                <div class="dropdown-divider"></div>
                @foreach ($pesananNotif as $notif)
                <div class="dropdown-item">
                    Pesanan dari <b>{{$notif->namalengkap_pesan}}</b> 

                    <div class="float-right">{{ $notif->created_at->diffForHumans() }}</div>
                </div>
                <div class="dropdown-divider"></div>
                @endforeach
                
               
                <a href="/KelolaPesanan" class="dropdown-item dropdown-footer">Lihat Semua</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/KelolaProfil">
                <i class="fas fa-user"></i>
                {{-- Keluar --}}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/logOutAuth">
                <i class="fas fa-sign-out-alt"></i>
                {{-- Keluar --}}
            </a>
        </li>
    </ul>
</nav>
