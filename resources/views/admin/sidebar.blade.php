<aside class="main-sidebar elevation-4 sidebar-light-warning">
    <!-- Brand Logo -->
    <a href="masterAdmin" class="brand-link bg-warning">
        {{-- <img src="{{asset('dist/img/Logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
        <span class="brand-text font-weight-light"><b>&nbsp;&nbsp;Zeclassic</b> Barbershop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar os-host os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition os-theme-dark">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('dist/img/profil.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="/KelolaProfil" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/masterAdmin" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="/KelolaAkun" class="nav-link">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>
                            Kelola Akun
                        </p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="/KelolaTransaksi" class="nav-link">
                        <i class="nav-icon fas fa-cash-register"></i>
                        <p>
                            Transaksi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/KelolaPesanan" class="nav-link">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p>
                            Pesanan | Booking
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/KelolaDataPelanggan" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Data Pelanggan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/KelolaDataKaryawan" class="nav-link">
                        <i class="nav-icon far fa-id-card"></i>
                        <p>
                            Data Karyawan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/KelolaLayananPaket" class="nav-link">
                        <i class="nav-icon fas fa-cut"></i>
                        <p>
                            Layanan | Paket
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/KelolaGaleri" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Galeri
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/KelolaLaporanTransaksi" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Laporan Transaksi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/KelolaPromo" class="nav-link">
                        <i class="nav-icon fas fa-percent"></i>
                        <p>
                            Promo
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/KelolaTestimoni" class="nav-link">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>
                            Testimoni
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="KelolaProfil" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Profil
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<script>
    window.onload = (event) => {
        var url = window.location.pathname;
        var links = document.querySelectorAll('.nav-sidebar a'),
            hrefs = [];
        for (var i = 0; i < links.length; i++) {
            if (url === links[i].pathname) {
                links[i].classList.add("active");
                console.log(links[i].pathname);
            }
        }
        console.log(url);
    }
</script>