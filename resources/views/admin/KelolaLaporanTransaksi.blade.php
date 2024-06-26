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
                            <h1 class="m-0">Kelola Laporan Transaksi</h1>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <!-- form cari Laporan -->
                        {{-- <div class="col-sm-2">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Cari Laporan">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-search"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <!-- form tanggal/bulan/tahun -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                <form action="/KelolaLaporanTransaksi/search/" method="POST">
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

                            <!-- layout form laporan transaksi -->
                            <!-- card laporan transaksi -->
                            <div class="card card-warning collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">Buat Laporan</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!-- start form card body -->
                                    <form action="/KelolaLaporanTransaksi" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form">


                                            <div class="form-group col-md-12"><!-- row form kolom 1 kiri -->
                                                <label style="color: gray;">Laporan</label>
                                                <div class="input-group">
                                                    <input type="text" name="jenislaporan_laporan"
                                                        class="form-control @error('jenislaporan_laporan') is-invalid @enderror"
                                                        placeholder="Masukkan jenis laporan">
                                                </div>
                                            </div>

                                            <!-- start row -->
                                            <div class="row">
                                                <!-- mulai dari tanggal -->
                                                <div class="form-group col-md-6"><!-- row form kolom 2 kiri -->
                                                    <label style="color: gray;">Mulai</label>
                                                    <div class="input-group">

                                                        <input type="date" class="form-control @error('mulai_laporan') is-invalid @enderror" name="mulai_laporan" id="">
                                                           

                                                       

                                                        
                                                    </div>
                                                </div>

                                                <!-- sampai ke tanggal -->
                                                <div class="form-group col-md-6"><!-- row form kolom 2 kiri -->
                                                    <label style="color: gray;">Sampai</label>
                                                    <div class="input-group">
                                                        <input type="date" class="form-control @error('sampai_laporan') is-invalid @enderror" name="sampai_laporan" id="">
                        
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                            &nbsp;

                                            <!-- button tambah  -->
                                            <div class="col-sm-2">
                                                <button type="submit" class="btn btn-warning btn-block">Tambah</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end card laporan transaksi -->

                    @endif

                            <!-- layaout data laporan transaksi -->
                            <div class="card card-outline card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Data Laporan</h3>
                                </div>

                                <div class="card-body table-responsive p-0">
                                    <!-- start -->
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                {{-- <th>ID</th> --}}
                                                <th>Admin</th>
                                                <th>Laporan</th>
                                                <th>Mulai Tanggal</th>
                                                <th>Sampai Tanggal</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($laporantransaksis as $laporantransaksi)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    {{-- <td>{{ $laporantransaksi->id }}</td> --}}
                                                    <td>{{ $laporantransaksi->namaadmin_laporan }}</td>
                                                    <td>{{ $laporantransaksi->jenislaporan_laporan }}</td>
                                                    <td>{{ $laporantransaksi->mulai_laporan }}</td>
                                                    <td>{{ $laporantransaksi->sampai_laporan }}</td>
                                                    <td>
                                                        <a href="/KelolaLaporanTransaksi/{{$laporantransaksi->id}}/laporan" style="color: green;">Unduh</a>
                                                        <!-- &nbsp;&nbsp; -->
                                                        <!-- <a href="#">Edit</a> -->
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- end -->
                                    <div>{{ $laporantransaksis->links() }}</div>
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
