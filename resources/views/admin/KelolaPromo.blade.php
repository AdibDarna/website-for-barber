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
                            <h1 class="m-0">Kelola Promo</h1>
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
                            
                            <!-- layout form tambah data promo -->
                            <div class="card card-warning collapsed-card"><!-- card tambah data promo -->
                                <div class="card-header">
                                    <h3 class="card-title">Tambah Data Promo</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="/KelolaPromo" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form"><!-- start form card body -->
                                            <div class="row"><!-- start row -->
                                                <div class="form-group col-md-6"><!-- row form kolom 1 kiri -->
                                                    <label style="color: gray;">Nama Promo</label>
                                                    <div class="input-group">
                                                        <input type="text" name="nama_promo" class="form-control @error('nama_promo') is-invalid @enderror" placeholder="Nama Promo">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6"><!-- row form kolom 1 kanan -->
                                                    <label style="color: gray;">Masa Berlaku Promo</label>
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="far fa-calendar-alt"></i>
                                                        </span>
                                                        <!-- miss  -->
                                                        <input type="date" name="masaberlaku_promo" class="form-control @error('masaberlaku_promo') is-invalid @enderror float-right" id="reservation">
                                                    </div>
                                                </div>
                                            </div><!-- end row -->

                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label style="color: gray;">Keterangan Promo</label>
                                                    <div class="input-group">
                                                        <textarea name="keterangan_promo" class="form-control @error('keterangan_promo') is-invalid @enderror" rows="3"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6"><!-- row form kolom 2 kanan -->
                                                    <label style="color: gray;">Status</label>
                                                    <div class="input-group">
                                                        <select name="status_promo" class="form-control @error('status_promo') is-invalid @enderror">
                                                            <option value="" selected hidden disabled>Pilih Status</option>
                                                            <option value="Tersedia">Tersedia</option>
                                                            <option value="Tidak Tersedia">Tidak Tersedia</option>

                                                        
                                                        </select>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                              <div class="row"><!-- start row -->
                                                <div class="form-group col-md-6"><!-- row form kolom 1 kiri -->
                                                    <label style="color: gray;">Kode Promo</label>
                                                    <div class="input-group">
                                                        <input type="text" name="kode_promo" class="form-control @error('kode_promo') is-invalid @enderror" placeholder="Kode Promo">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6"><!-- row form kolom 1 kiri -->
                                                    <label style="color: gray;">Diskon</label>
                                                    <div class="input-group">
                                                        <input type="number" name="diskon" class="form-control @error('diskon') is-invalid @enderror" placeholder="10"> <label class="m-2" style="">%</label>
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
                            </div><!-- end card tambah data promo -->
                            
                    
                        

                            <div class="card"><!-- layaout data promo -->
                                <div class="card-header card-outline card-warning">
                                    <h3 class="card-title">Data Promo</h3>
                                </div>

                                <div class="card-body">

                                    <div class="table-responsive p-0">
                                        <!-- start -->
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    {{-- <th>ID</th> --}}
                                                    <th>Nama Promo</th>
                                                    <th>Masa Berlaku Promo</th>
                                                    <th>Keterangan Promo</th>
                                                    <th>Kode Promo</th>

                                                    <th>Status</th>

                    @if(Auth::user()->role == 'admin') 

                                                    <th>Aksi</th>

                                                
                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($promos as $promo)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        {{-- <td>{{ $promo->id }}</td> --}}
                                                        <td>{{ $promo->nama_promo }}</td>
                                                        <td>{{ $promo->masaberlaku_promo }}</td>
                                                        <td>{{ $promo->keterangan_promo }}</td>
                                                        <td><b>{{ $promo->kode_promo }}</b></td>

                                                        <td>{{ $promo->status_promo }}</td>
                    @if(Auth::user()->role == 'admin') 

                                                        <td>
                                                            <a href="/KelolaPromo/{{ $promo->id }}"
                                                                onclick="return confirm('yakin menghapus data?')"
                                                                style="color: red;">Hapus</a>
                                                            &nbsp;&nbsp;
                                                        
                                                        </td>
                    @endif

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- end -->
                                    <div>{{ $promos->links() }}</div>
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
