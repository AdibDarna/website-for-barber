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
                            <h1 class="m-0">Kelola Data Pelanggan</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <!-- form cari ID Pelanggan -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="ID Pelanggan">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-search"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- card utama -->
                    <div class="card" >
                        <div class="card-body">

                    @if(Auth::user()->role == 'admin') 

                            <!-- layout form tambah data pelanggan -->
                            <div class="card card-warning collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">Tambah Data Pelanggan</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="/KelolaDataPelanggan" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if (Session::has('error'))
                                            <div>
                                                <div class="alert alert-danger alert-dismissible fade show"
                                                    role="alert">
                                                    <strong> {{ Session::get('error') }}</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="form">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label style="color: gray;">Nama Lengkap</label>
                                                    <div class="input-group">
                                                        <input type="text" name="nama"
                                                            class="form-control @error('nama') is-invalid @enderror"
                                                            placeholder="Nama Lengkap">

                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6"><!-- row form kolom 1 kanan -->
                                                    <label style="color: gray;">Email</label>
                                                    <div class="input-group">
                                                        <input type="email" name="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            placeholder="Email">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                            <!-- start row -->
                                            <div class="row">
                                                <div class="form-group col-md-6"><!-- row form kolom 2 kiri -->
                                                    <label style="color: gray;">No Telepon</label>
                                                    <div class="input-group">
                                                        <input type="number" name="notel"
                                                            class="form-control @error('notel') is-invalid @enderror"
                                                            placeholder="No Telepon">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6"><!-- row form kolom 2 kanan -->
                                                    <label style="color: gray;">Jenis Kelamin</label>
                                                    <div class="input-group">
                                                        <select class="form-control @error('jk') is-invalid @enderror"
                                                            name="jk">
                                                            <option selected disabled hidden>Jenis Kelamin</option>
                                                            <option value="Laki-Laki">Laki-Laki</option>
                                                            <option value="Perempuan">Perempuan</option>

                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                            <!-- start row -->
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label style="color: gray;">Alamat</label>
                                                    <div class="input-group">
                                                        <input type="text" name="alamat"
                                                            class="form-control @error('alamat') is-invalid @enderror"
                                                            placeholder="Alamat">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label style="color: gray;">Password</label>
                                                    <div class="input-group">
                                                        <input type="text" name="password"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            placeholder="Password">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- end row -->
                                            <!-- button tambah  -->
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-warning">Tambah</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                    @endif

                            <!-- end card tambah data pelanggan -->
                            <!-- layaout data pelanggan -->
                            <div class="card">
                                <div class="card-header card-outline card-warning">
                                    <h3 class="card-title">Data Pelanggan</h3>
                                </div>

                                <div class="card-body table-responsive p-0">
                                    <!-- start -->
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                {{-- <th>ID Pelanggan</th> --}}
                                                <th>Nama Lengkap</th>
                                                <th>Email</th>
                                                <th>No Telepon</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Alamat</th>
                                                <th>Status</th>
                    @if(Auth::user()->role == 'admin') 
                                                
                                                <th>Aksi</th>
                    @endif

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pelanggans as $pelanggan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    {{-- <td>{{ $pelanggan->id }}</td> --}}
                                                    <td>{{ $pelanggan->nama_pelanggan }}</td>
                                                    <td>{{ $pelanggan->email_pelanggan }}</td>
                                                    <td>{{ $pelanggan->notelepon_pelanggan }}</td>
                                                    <td>{{ $pelanggan->jeniskelamin_pelanggan }}</td>
                                                    <td>{{ $pelanggan->alamat_pelanggan }}</td>
                                                    <td>{{ $pelanggan->status_pelanggan }}</td>
                    @if(Auth::user()->role == 'admin') 

                                                    <td>
                                                        <a href="/KelolaDataPelanggan/{{ $pelanggan->id }}"
                                                            onclick="return confirm('yakin menghapus data?')"style="color: red;">Hapus</a>
                                                        &nbsp;&nbsp;
                                                        <a
                                                            href="/KelolaEditDataPelanggan/{{ $pelanggan->id }}">Edit</a>
                                                    </td>
                    @endif

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- end -->
                                    <div>{{ $pelanggans->links() }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

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
