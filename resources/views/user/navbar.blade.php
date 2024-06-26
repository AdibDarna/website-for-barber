<nav class="navbar navbar-expand-lg rounded" aria-label="Thirteenth navbar example">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-lg-flex" id="navbarsExample11">
            <a class="navbar-brand col-lg-3 me-0" href="/"><b style="color:#FFA72E">Zeclassic</b> Barbershop </a>
            <ul class="navbar-nav col-lg-6 justify-content-lg-center">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Galeri</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/galeriLogbook">Galeri LogBook</a></li>
                        <li><a class="dropdown-item" href="/galeriPengunjung">Galeri Pengunjung</a></li>
                        <li><a class="dropdown-item" href="/galeriCapster">Galeri Capster</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pesan">Pesan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/promo">Promo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/tentang">Tentang</a>
                </li>

            </ul>
            <div class="d-lg-flex col-lg-3 justify-content-lg-end">
                <ul class="navbar-nav">
                    @if (Auth::check())
                
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/profilUser">&nbsp;
                                    Profil
                                </a>
                            </li>
                        </ul>
                        
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/logOutAuth">
                                    <i class="fal fa-sign-out-alt"></i>
                                    Keluar
                                </a>
                            </li>
                        </ul>
                    
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/login">
                                Masuk &nbsp; <i class="bi bi-box-arrow-in-right"></i>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>