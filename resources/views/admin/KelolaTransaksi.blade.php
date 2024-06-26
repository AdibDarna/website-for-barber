<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ZECLASSIC | Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- /.navbar -->
        @include('admin.navbar')

        <!-- Main Sidebar Container -->
        @include('admin.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Kelola Transaksi</h1>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- form cari ID Transaksi -->
                        {{-- <div class="col-sm-2">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="ID Transaksi">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-search"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <!-- form tanggal/bulan/tahun -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                <form action="/KelolaTransaksi/search/" method="POST">
                                    @csrf
                                <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                    <input type="date" name="tanggal" class="form-control" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <button style="padding: 0; border:0px" type="submit"><i class="fa fa-search"></i></button>
                                            
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>

                    
                    
                    <div class="card"><!-- card utama -->
                        <div class="card-body"><!-- card body utama -->
                            @if(Auth::user()->role == 'admin') 
                           
                            <!-- layout form tambah transaksi -->
                            <div class="card card-warning collapsed-card"><!-- card tambah transaksi -->
                                <div class="card-header">
                                    <h3 class="card-title">Tambah Transaksi</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <form action="/KelolaTransaksi" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form">
                                            <div class="row">
                                                <div class="form-group col-md-6"><!-- row form kolom 1 kiri -->
                                                    <label style="color: gray;">Nama Lengkap</label>
                                                    <div class="input-group">
                                                        <input type="text" name="nama_transaksi"
                                                            class="form-control @error('nama_transaksi') is-invalid @enderror"
                                                            placeholder="Nama Lengkap">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6"><!-- row form kolom 1 kanan -->
                                                    <label style="color: gray;">Email</label>
                                                    <div class="input-group">
                                                        <input type="email" name="email_transaksi"
                                                            class="form-control @error('email_transaksi') is-invalid @enderror"
                                                            placeholder="Email">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6"><!-- row form kolom 2 kiri -->
                                                    <label style="color: gray;">Waktu</label>
                                                    <div class="input-group">
                                                        <input type="time" name="waktu_transaksi"
                                                            class="form-control @error('waktu_transaksi') is-invalid @enderror"
                                                            placeholder="Waktu">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6"><!-- row form kolom 2 kanan -->
                                                    <label style="color: gray;">Nomor Telepon</label>
                                                    <div class="input-group">
                                                        <input type="text" name="notelepon_transaksi"
                                                            class="form-control @error('notelepon_transaksi') is-invalid @enderror"
                                                            placeholder="Nomor Telepon">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label style="color: gray;">Jasa Cukur</label>
                                                    <div class="input-group">
                                                        <select name="jasacukur_transaksi"
                                                            class="form-control @error('jasacukur_transaksi') is-invalid @enderror"
                                                            id="jasaCukur">
                                                            <option value="" selected hidden disabled>Pilih
                                                                Capster</option>
                                                            @foreach ($karyawan as $kar)
                                                                <option value="{{ $kar->nama_karyawan }}">
                                                                    {{ $kar->nama_karyawan }}</option>
                                                            @endforeach
                                                        </select>
                                                    
                                                    </div>
                                                </div>

                                                {{-- <div class="form-group col-md-6">
                                                    <label style="color: gray;">Layanan</label>
                                                    <div class="input-group">
                                                        <select name="layanan_transaksi" class="form-control">
                                                            <option value="" selected hidden disabled>Pilih
                                                                Layanan</option>

                                                            @foreach ($layanans as $lay)
                                                                <option value="{{ $lay->nama_layanan }}">
                                                                    {{ $lay->nama_layanan }}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div> --}}
                                            </div>

                                            <!-- Form Paket -->
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label style="color: gray;">Paket</label>
                                                    <div class="input-group">
                                                        <select class="form-control" onchange="gantiHarga(this.value)"
                                                            name="paket_transaksi">
                                                            <option selected hidden disabled>Pilih Gaya Potong</option>

                                                            @foreach ($pakets as $pak)
                                                                <option value="{{ $pak->nama_paket }}">
                                                                    {{ $pak->nama_paket }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label style="color: gray;">Jumlah Transaksi Cukur</label>
                                                    <div class="input-group">
                                                        <input type="number" id="total_harga"
                                                            name="jumlahcukur_transaksi"
                                                            class="form-control @error('jumlahcukur_transaksi') is-invalid @enderror"
                                                            placeholder="Jumlah" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            &nbsp;&nbsp;
                                            <!-- Form Transaksi Tambahan -->
                                            <label>Transaksi Tambahan</label>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label style="color: gray;">Perawatan Rambut</label>
                                                    <div class="input-group">
                                                        <input type="text" name="perawatanrambut_transaksi"
                                                            class="form-control @error('perawatanrambut_transaksi') is-invalid @enderror"
                                                            placeholder="Perawatan Rambut">
                                                    </div>
                                                    <h6>*Rp.20.000 per perawatan</h6>

                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label style="color: gray;">Jumlah</label>
                                                    <div class="input-group">
                                                        <input type="text" onkeyup="hitungPerawatan(this.value)"
                                                            name="jumlahperawatanrambut_transaksi"
                                                            class="form-control @error('jumlahperawatanrambut_transaksi') is-invalid @enderror"
                                                            placeholder="Jumlah">
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label style="color: gray;">Nominal Harga</label>
                                                    <div class="input-group">
                                                        <input type="text" id="total_perawatan"
                                                            name="nominalperawatanrambut_transaksi"
                                                            class="form-control @error('nominalperawatanrambut_transaksi') is-invalid @enderror"
                                                            placeholder="Nominal Harga" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label style="color: gray;">Minuman Kulkas</label>
                                                    <div class="input-group">
                                                        <input type="text" name="minumankulkas_transaksi"
                                                            class="form-control @error('minumankulkas_transaksi') is-invalid @enderror"
                                                            placeholder="Minuman Kulkas">


                                                    </div>
                                                    <h6>*Rp.5000 per minuman</h6>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label style="color: gray;">Jumlah</label>
                                                    <div class="input-group">
                                                        <input type="text" onkeyup="hitungMinum(this.value)"
                                                            name="jumlahminumankulkas_transaksi"
                                                            class="form-control @error('jumlahminumankulkas_transaksi') is-invalid @enderror"
                                                            placeholder="Jumlah">
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label style="color: gray;">Nominal Harga</label>
                                                    <div class="input-group">
                                                        <input type="number" id="total_minum"
                                                            name="nominalminumankulkas_transaksi"
                                                            class="form-control @error('nominalminumankulkas_transaksi') is-invalid @enderror"
                                                            placeholder="Nominal Harga" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            function hitungMinum(jumlah) {

                                                var total_minum = document.getElementById('total_minum');
                                                total_minum.value = 5000 * jumlah;



                                            }

                                            function hitungPerawatan(jumlah) {

                                                var total_perawatan = document.getElementById('total_perawatan');
                                                total_perawatan.value = 20000 * jumlah;



                                            }

                                            function gantiHarga(paket) {

                                                var total_harga = document.getElementById('total_harga');
                                                @foreach ($pakets as $p)
                                                    if (paket == "{{ $p->nama_paket }}") {
                                                        total_harga.value = {{ $p->harga_paket }};
                                                    };
                                                @endforeach


                                            }
                                        </script>
                                        <!-- button tambah  -->
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-warning">Tambah</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            @endif


                            
                            <!-- layaout data transaksi -->
                            <div class="card card-outline card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Data Transaksi</h3>
                                </div>

                                <div class="card-body table-responsive p-0">
                                    <!-- start -->
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">No</th>
                                                {{-- <th style="text-align: center;">ID</th> --}}

                                                <th style="text-align: center;">Waktu</th>
                                                <th style="text-align: center;">Tanggal</th>

                                                <th style="text-align: center;">Nama Lengkap</th>
                                                <th style="text-align: center;">Email</th>
                                                <th style="text-align: center;">No Telepon</th>
                                                <th style="text-align: center;">Jasa Cukur</th>
                                                <th style="text-align: center;">Layanan</th>
                                                <th style="text-align: center;">Paket</th>
                                                <th style="text-align: center;">Jumlah Transaksi Cukur</th>
                                                <th style="text-align: center;">Produk Rambut</th>
                                                <th style="text-align: center;">Jumlah</th>
                                                <th style="text-align: center;">Nominal Produk</th>
                                                <th style="text-align: center;">Minuman</th>
                                                <th style="text-align: center;">Jumlah</th>
                                                <th style="text-align: center;">Nominal Minuman</th>
                                                <th style="text-align: center;">Total Transaksi</th>
                            @if(Auth::user()->role == 'admin') 

                                                <th style="text-align: center;">Aksi</th>

                            @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transaksis as $transaksi)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    {{-- <td>{{ $transaksi->id }}</td> --}}
                                                    <td>{{ $transaksi->waktu_transaksi }}</td>

                                                    <td>{{ $transaksi->created_at->format('Y-m-d') }}</td>

                                                    <td>{{ $transaksi->nama_transaksi }}</td>
                                                    <td>{{ $transaksi->email_transaksi }}</td>
                                                    <td>{{ $transaksi->notelepon_transaksi }}</td>
                                                    <td>{{ $transaksi->jasacukur_transaksi }}</td>
                                                    <td>{{ $transaksi->layanan_transaksi }}</td>
                                                    <td>{{ $transaksi->paket_transaksi }}</td>
                                                    <td>{{ 'Rp ' . number_format($transaksi->jumlahcukur_transaksi, 2) }}
                                                    </td>
                                                    <td>{{ $transaksi->perawatanrambut_transaksi }}</td>
                                                    <td>{{ $transaksi->jumlahperawatanrambut_transaksi }}</td>
                                                    <td>{{ 'Rp ' . number_format($transaksi->nominalperawatanrambut_transaksi, 2) }}
                                                    </td>
                                                    <td>{{ $transaksi->minumankulkas_transaksi }}</td>
                                                    <td>{{ $transaksi->jumlahminumankulkas_transaksi }}</td>
                                                    <td>{{ 'Rp ' . number_format($transaksi->nominalminumankulkas_transaksi, 2) }}
                                                    </td>
                                                    <td> {{ 'Rp ' . number_format($transaksi->jumlahcukur_transaksi + $transaksi->nominalperawatanrambut_transaksi + $transaksi->nominalminumankulkas_transaksi, 2) }}
                                                    </td>

                                        @if(Auth::user()->role == 'admin') 

                                                    <td>
                                                        <a href="/KelolaTransaksi/{{ $transaksi->id }}" onclick="return confirm('yakin menghapus data?')" style="color: red;">Hapus</a>
                                                        &nbsp;&nbsp;
                                                        <!-- <a href="#">Edit</a> -->
                                                    </td>
                                        @endif
                                                    
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- end -->
                                    <div>{{ $transaksis->links() }}</div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div><!-- end card utama -->
            </section><!-- section content -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-wrapper -->
    <!-- /.content -->

    <footer class="main-footer">
        <!-- <strong>Copyright &copy;.</strong> -->
        <div class="float-right d-none d-sm-inline-block">
            <b>Zeclassic</b>|2023
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('dist/js/demo.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
</body>

</html>
