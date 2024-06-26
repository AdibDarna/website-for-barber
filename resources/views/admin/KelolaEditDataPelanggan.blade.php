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
                            <h1 class="m-0">Kelola Edit Data Pelanggan</h1>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <section class="content">
                <div class="container-fluid">

                    <div class="card"><!-- card utama -->
                        <div class="card-body"><!-- card body utama -->
                            <!-- layout form tambah data pelanggan -->
                            <div class="card card-warning"><!-- card tambah data pelanggan -->
                                <div class="card-header">
                                    <h3 class="card-title">Edit Data Pelanggan</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @foreach($pelanggans as $pelanggan)
                                    <form action="/KelolaEditDataPelanggan" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" name="id" value="{{ $pelanggan->id }}" hidden>
                                        
                                        <div class="form"><!-- start form card body -->
                                            <div class="row"><!-- start row -->
                                                <div class="form-group col-md-6"><!-- row form kolom 1 kiri -->
                                                    <label style="color: gray;">Nama Lengkap</label>
                                                    <div class="input-group">
                                                        <input type="text" value="{{ $pelanggan->nama_pelanggan }}" name="nama_pelanggan" class="form-control @error('nama_pelanggan') is-invalid @enderror" placeholder="Nama Lengkap">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6"><!-- row form kolom 1 kanan -->
                                                    <label style="color: gray;">Email</label>
                                                    <div class="input-group">
                                                        <input type="email" value="{{ $pelanggan->email_pelanggan }}" name="email_pelanggan" class="form-control @error('email_pelanggan') is-invalid @enderror" placeholder="Email">
                                                    </div>
                                                </div>
                                            </div><!-- end row -->

                                            <div class="row"><!-- start row -->
                                                <div class="form-group col-md-6"><!-- row form kolom 2 kiri -->
                                                    <label style="color: gray;">No Telepon</label>
                                                    <div class="input-group">
                                                        <input type="number" value="{{ $pelanggan->notelepon_pelanggan }}" name="notelepon_pelanggan" class="form-control @error('notelepon_pelanggan') is-invalid @enderror" placeholder="No Telepon">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6"><!-- row form kolom 2 kanan -->
                                                    <label style="color: gray;">Jenis Kelamin</label>
                                                    <div class="input-group">
                                                        <input type="text" value="{{ $pelanggan->jeniskelamin_pelanggan }}" name="jeniskelamin_pelanggan" class="form-control @error('jeniskelamin_pelangan') is-invalid @enderror" placeholder="Jenis Kelamin">
                                                    </div>
                                                </div>
                                            </div><!-- end row -->

                                            <div class="row"><!-- start row -->
                                                <div class="form-group col-md-6"><!-- row form kolom 2 kiri -->
                                                    <label style="color: gray;">Alamat</label>
                                                    <div class="input-group">
                                                        <input type="text" value="{{ $pelanggan->alamat_pelanggan }}" name="alamat_pelanggan" class="form-control @error('alamat_pelanggan') is-invalid @enderror" placeholder="Alamat">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6"><!-- row form kolom 2 kanan -->
                                                    <label style="color: gray;">Status</label>
                                                    <div class="input-group">
                                                        <input type="text" value="{{ $pelanggan->status_pelanggan }}" name="status_pelanggan" class="form-control @error('status_pelanggan') is-invalid @enderror" placeholder="Status">
                                                    </div>
                                                </div>
                                            </div><!-- end row -->
                                            <div class="row"><!-- start row -->
                                                <div class="form-group col-md-6">
                                                    <label style="color: gray;">Password</label>
                                                    <div class="input-group">
                                                        <input type="text" name="password"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            placeholder="Password">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- button tambah  -->
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-warning">Edit</button>
                                            </div>

                                        </div>
                                    </form>
                                    @endforeach
                                </div>
                            </div><!-- end card tambah data pelanggan -->

                        </div><!-- end card body utama -->
                    </div><!-- end card utama -->
                </div><!-- /.container-fluid -->
            </section><!-- section content -->

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