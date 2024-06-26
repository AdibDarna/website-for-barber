<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ZECLASSIC | Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
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
                            <h1 class="m-0">Kelola Layanan & Paket</h1>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <div class="card" ><!-- card utama -->
                        <div class="card-body"><!-- card body utama -->

                    @if(Auth::user()->role == 'admin') 

                            <!-- layout form Layanan -->
                            <div class="card card-warning collapsed-card"><!-- card Layanan -->
                                <div class="card-header">
                                    <h3 class="card-title">Layanan</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="/KelolaLayanan" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form"><!-- start form card body -->
                                            <div class="row"><!-- start row -->
                                                <div class="form-group col-md-6"><!-- row form kolom 2 kiri -->
                                                    <label style="color: gray;">Nama Layanan</label>
                                                    <div class="input-group">
                                                        <input type="text" name="nama_layanan"
                                                            class="form-control @error('nama_layanan') is-invalid @enderror"
                                                            placeholder="Nama Layanan">

                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6"><!-- row form kolom 2 kanan -->
                                                    <label style="color: gray;">Gambar Layanan</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="gambar_layanan"
                                                            class="custom-file-input form-control @error('gambar_layanan') is-invalid @enderror"
                                                            id="customFile">
                                                        <label class="custom-file-label" for="customFile">
                                                            Masukkan Gambar
                                                        </label>
                                                    </div>
                                                </div>
                                            </div><!-- end row -->

                                            <!-- button tambah  -->
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <button type="submit"
                                                        class="btn btn-warning btn-block">Tambah</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- end card layanan -->
                    @endif    

                            <!-- start tabel data layanan -->
                            <div class="card"><!-- layaout data Layanan -->
                                <div class="card-header card-outline card-warning">
                                    <h3 class="card-title">Data Layanan</h3>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive p-0">
                                        <!-- start -->
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    {{-- <th>ID</th> --}}
                                                    <th>Nama Layanan</th>
                                                    <th>Gambar Layanan</th>
                    @if(Auth::user()->role == 'admin') 
                                                    
                                                    <th>Aksi</th>
                    @endif

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($layanans as $layanan)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        {{-- <td>{{ $layanan->id }}</td> --}}
                                                        <td>{{ $layanan->nama_layanan }}</td>
                                                        <td>{{ $layanan->gambar_layanan }}</td>
                    @if(Auth::user()->role == 'admin') 
                                                        
                                                        <td>
                                                            <a href="/KelolaLayanan/{{ $layanan->id }}"
                                                                onclick="return confirm('yakin menghapus data?')"
                                                                style="color: red;">Hapus</a>
                                                            &nbsp;&nbsp;
                                                            <a href="/KelolaEditLayanan/{{ $layanan->id }}">Edit</a>
                                                        </td>
                    @endif

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div>{{ $layanans->links() }}</div>
                                    </div>
                                    <!-- end -->
                                </div>
                            </div><!-- end card body Data transaksi -->
                            <!-- end tabel data layanan -->

                    @if(Auth::user()->role == 'admin') 

                            <!-- form paket -->
                            <div class="card card-warning collapsed-card"><!-- Card paket harga -->
                                <div class="card-header">
                                    <h3 class="card-title">Paket Harga</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="/KelolaLayananPaket" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form"><!-- start form card body -->
                                            <div class="row"><!-- start row -->
                                                <div class="form-group col-md-6"><!-- row form kolom 1 kiri -->
                                                    <label style="color: gray;">Nama Paket</label>
                                                    <div class="input-group">
                                                        <input type="text" name="nama_paket"
                                                            class="form-control @error('nama_paket') is-invalid @enderror"
                                                            placeholder="Nama Paket">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6"><!-- row form kolom 1 kanan -->
                                                    <label style="color: gray;">Harga Paket</label>
                                                    <div class="input-group">
                                                        <input type="number" name="harga_paket"
                                                            class="form-control @error('harga_paket') is-invalid @enderror"
                                                            placeholder="Harga Paket">
                                                    </div>
                                                </div>
                                            </div><!-- end row -->

                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label style="color: gray">Keterangan Paket</label>
                                                    <div class="input-group">
                                                        <textarea name="keterangan_paket" class="form-control @error('keterangan_paket') is-invalid @enderror" rows="3"
                                                            placeholder="Masukkan Keterangan.."></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- button tambah  -->
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <button type="submit"
                                                        class="btn btn-warning btn-block">Tambah</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div><!-- end card tambah transaksi -->
                            <!-- end form paket -->

                        @endif

                            <div class="card"><!-- layaout data paket harga -->
                                <div class="card-header card-outline card-warning">
                                    <h3 class="card-title">Data Paket Harga</h3>
                                </div>

                                <div class="card-body ">
                                    <!-- start -->
                                    <div class="table-responsive p-0">
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    {{-- <th>ID</th> --}}
                                                    <th>Nama Paket</th>
                                                    <th>Harga Paket</th>
                                                    <th>Keterangan Paket</th>
                    @if(Auth::user()->role == 'admin') 

                                                    <th>Aksi</th>
                    @endif

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pakets as $paket)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        {{-- <td>{{ $paket->id }}</td> --}}
                                                        <td>{{ $paket->nama_paket }}</td>
                                                        <td>{{"Rp ". number_format($paket->harga_paket, 2) }}</td>
                                                        <td>{{ $paket->keterangan_paket }}</td>
                    @if(Auth::user()->role == 'admin') 
                                                        
                                                        <td>
                                                            <a href="/KelolaPaket/{{ $paket->id }}" onclick="return confirm('yakin menghapus data?')" style="color: red;">Hapus</a>
                                                            &nbsp;&nbsp;
                                                            <a href="/KelolaEditPaket/{{ $paket->id }}">Edit</a>
                                                        </td>
                    @endif

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div>{{ $pakets->links() }}</div>
                                    </div>
                                    <!-- end -->
                                </div>
                            </div><!-- end card body Data transaksi -->

                        </div><!-- end card body utama -->
                    </div><!-- end card utama -->

                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->

        </div>
        <!-- /.content-wrapper -->

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
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
</body>

</html>
