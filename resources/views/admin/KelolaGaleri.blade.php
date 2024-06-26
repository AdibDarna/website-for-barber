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
                            <h1 class="m-0">Kelola Galeri</h1>
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
                            
                            <!-- layout form galeri layanan -->
                            <div class="card card-warning collapsed-card"><!-- card galeri pelanggan -->
                                <div class="card-header">
                                    <h3 class="card-title">Galeri Pelanggan</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <form action="KelolaGaleriPengunjung" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form"><!-- start form card body -->
                                            <div class="row"><!-- start row -->
                                                <div class="form-group col-md-6"><!-- row form kolom 1 kiri -->
                                                    <label style="color: gray;">Nama Gaya Cukur</label>
                                                    <div class="input-group">
                                                        <input type="text" name="nama_gaya"
                                                            class="form-control @error('nama_gaya') is-invalid @enderror"
                                                            placeholder="nama gaya cukur">

                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6"><!-- row form kolom 2 kanan -->
                                                    <label style="color: gray;">Gambar Gaya Cukur</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="gambar_gaya"
                                                            class="custom-file-input form-control @error('gambar_gaya') is-invalid @enderror"
                                                            id="customFile">
                                                        <label class="custom-file-label" for="customFile">
                                                            masukkan gambar
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
                            </div><!-- end card galeri pelanggan -->

                            @else
                            @endif

                            <!-- start tabel galeri pelanggan -->
                            <div class="card"><!-- layaout galeri pelanggan -->
                                <div class="card-header card-outline card-warning">
                                    <h3 class="card-title">Data Galeri Pelanggan</h3>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive p-0">

                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    {{-- <th>ID</th> --}}
                                                    <th>Nama Gaya Cukur</th>
                                                    <th>Gambar Gaya Cukur</th>

                                           @if(Auth::user()->role == 'admin')
                                            
                                                    <th>Aksi</th>

                                            @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($galeri_pengunjungs as $galeri_pengunjung)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        {{-- <td>{{ $galeri_pengunjung->id }}</td> --}}
                                                        <td>{{ $galeri_pengunjung->nama_gaya }}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-warning"
                                                            data-toggle="modal" data-target="#modal{{ $galeri_pengunjung->id }}">
                                                            Lihat
                                                        </button>
                                                        <div class="modal fade" id="modal{{ $galeri_pengunjung->id }}"
                                                            style="display: none;" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content bg-warning">
                                                                    
                                                                    <div class="modal-body">
                                                                       <img src="{{asset('storage/admin/KelolaGaleri/'.$galeri_pengunjung->gambar_gaya)}}" alt="" style="width: 100%">
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                        
                                                        </td>

                                                @if(Auth::user()->role == 'admin')

                                                        <td>
                                                            <a href="/KelolaGaleriPengunjung/{{ $galeri_pengunjung->id }}"
                                                                onclick="return confirm('yakin menghapus data?')"
                                                                style="color: red;">Hapus</a>
                                                            &nbsp;&nbsp;
                                                            <a
                                                                href="/KelolaEditGaleriPengunjung/{{ $galeri_pengunjung->id }}">Edit</a>
                                                        </td>

                                                @endif

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div>{{ $galeri_pengunjungs->links() }}</div>
                                    </div>
                                    <!-- end -->
                                </div>
                            </div><!-- end card body Data transaksi -->
                            <!-- end tabel data galeri pelanggan -->

                            @if(Auth::user()->role == 'admin')

                            <!-- form galeri capster -->
                            <div class="card card-warning collapsed-card"><!-- Card galeri capster -->
                                <div class="card-header">
                                    <h3 class="card-title">Galeri Capster</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="KelolaGaleriCapster" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form"><!-- start form card body -->
                                            <div class="row"><!-- start row -->
                                                <div class="form-group col-md-6"><!-- row form kolom 1 kiri -->
                                                    <label style="color: gray;">Nama Capster</label>
                                                    <div class="input-group">
                                                        <select class="form-control" name="nama_capster">
                                                            <option value="" disabled selected hidden>Nama Capster</option>
                                                            @foreach ($capster as $cap)
                                                            <option value="{{$cap->nama_karyawan}}" >{{$cap->nama_karyawan}}</option>
                                                            
                                                            @endforeach
                                                        </select>
                                                       
                                                        
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6"><!-- row form kolom 1 kiri -->
                                                    <label style="color: gray;">Nama Gaya Cukur</label>
                                                    <div class="input-group">
                                                        <input type="text" name="nama_gayacukur"
                                                            class="form-control @error('nama_gayacukur') is-invalid @enderror"
                                                            placeholder="nama gaya cukur">
                                                    </div>
                                                </div>
                                            </div><!-- end row -->
                                            <div class="row"><!-- form keterangan -->
                                                <div class="form-group col-md-6"><!-- row form kolom 1 kanan -->
                                                    <label style="color: gray;">Gambar Gaya Cukur Capster</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="gambar_gayacukur"
                                                            class="custom-file-input form-control @error('gambar_gayacukur') is-invalid @enderror"
                                                            id="customFile">
                                                        <label class="custom-file-label" for="customFile">
                                                            Masukkan Gambar
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label style="color: gray">Keterangan Gaya Cukur</label>
                                                    <textarea name="keterangan_gayacukur" class="form-control @error('keterangan_gayacukur') is-invalid @enderror"
                                                        rows="3" placeholder="Masukkan Keterangan.."></textarea>
                                                </div>
                                            </div>

                                            <!-- button tambah  -->
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <button type="sumbit"
                                                        class="btn btn-warning btn-block">Tambah</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- end card tambah data galeri capster -->
                            <!-- end form galeri caspter -->

                            @else
                            @endif

                            <div class="card"><!-- layaout data galeri capster -->
                                <div class="card-header card-outline card-warning">
                                    <h3 class="card-title">Data Galeri Capster</h3>
                                </div>

                                <div class="card-body">

                                    <div class="table-responsive p-0">
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    {{-- <th>ID</th> --}}
                                                    <th>Nama Capster</th>
                                                    <th>Nama Gaya Cukur</th>
                                                    <th>Gambar Gaya Cukur</th>
                                                    <th>Keterangan Gaya Cukur</th>

                                            @if(Auth::user()->role == 'admin')
                                            
                                                    <th>Aksi</th>

                                            @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($galeri_capsters as $galeri_capster)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        {{-- <td>{{ $galeri_capster->id }}</td> --}}
                                                        <td>{{ $galeri_capster->nama_capster }}</td>
                                                        <td>{{ $galeri_capster->nama_gayacukur }}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-warning"
                                                            data-toggle="modal" data-target="#modalCap{{ $galeri_capster->id }}">
                                                            Lihat
                                                        </button>
                                                        <div class="modal fade" id="modalCap{{ $galeri_capster->id }}"
                                                            style="display: none;" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content bg-warning">
                                                                    
                                                                    <div class="modal-body">
                                                                       <img src="{{asset('storage/admin/KelolaGaleri/'.$galeri_capster->gambar_gayacukur)}}" alt="" style="width: 100%">
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                        </td>
                                                        <td>{{ $galeri_capster->keterangan_gayacukur }}</td>
                                                @if(Auth::user()->role == 'admin')

                                                        <td>
                                                            <a href="/KelolaGaleriCapster/{{ $galeri_capster->id }}"
                                                                onclick="return confirm('yakin menghapus data?')"
                                                                style="color: red;">Hapus</a>
                                                            &nbsp;&nbsp;
                                                            <a
                                                                href="/KelolaEditGaleriCapster/{{ $galeri_capster->id }}">Edit</a>
                                                        </td>
                                                @endif
                                                
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div>{{ $galeri_capsters->links() }}</div>
                                    </div>

                                </div>
                            </div><!-- end card body data galeri capster -->

                            @if(Auth::user()->role == 'admin')
                            
                            <!-- start galeri logbook-->
                            <div class="card card-warning collapsed-card"><!-- Card galeri logbook -->
                                <div class="card-header">
                                    <h3 class="card-title">Galeri Logbook</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="KelolaGaleriLogbook" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form"><!-- start form card body -->
                                            <div class="row"><!-- start row -->
                                                <div class="form-group col-md-6"><!-- row form kolom 1 kiri -->
                                                    <label style="color: gray;">Nama Logbook</label>
                                                    <div class="input-group">
                                                        <input type="text" name="nama_logbook"
                                                            class="form-control @error('nama_logbook') is-invalid @enderror"
                                                            placeholder="Nama Logbook">

                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6"><!-- row form kolom 1 kanan -->
                                                    <label style="color: gray;">Gambar Logbook</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="gambar_logbook"
                                                            class="custom-file-input form-control @error('gambar_logbook') is-invalid @enderror"
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
                            </div><!-- end card tambah galeri logbook -->
                            <!-- end form galeri logbook -->

                            @else
                            @endif

                            <div class="card"><!-- layaout data galeri logbook -->
                                <div class="card-header card-outline card-warning">
                                    <h3 class="card-title">Data Galeri Logbook</h3>
                                </div>

                                <div class="card-body">
                                    <!-- <div class="form">
                                        <button class="btn btn-primary">Tampilkan semua data</button>
                                    </div> -->
                                    <!-- start -->
                                    <div class="table-responsive p-0">
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    {{-- <th>ID</th> --}}
                                                    <th>Nama Logbook</th>
                                                    <th>Gambar Logbook</th>
                            @if(Auth::user()->role == 'admin')
                                                    
                                                    <th>Aksi</th>
                                                    
                            @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($galeri_logbooks as $galeri_logbook)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        {{-- <td>{{ $galeri_logbook->id }}</td> --}}
                                                        <td>{{ $galeri_logbook->nama_logbook }}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-warning"
                                                            data-toggle="modal" data-target="#modalLog{{ $galeri_logbook->id }}">
                                                            Lihat
                                                        </button>
                                                        <div class="modal fade" id="modalLog{{ $galeri_logbook->id }}"
                                                            style="display: none;" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content bg-warning">
                                                                    
                                                                    <div class="modal-body">
                                                                       <img src="{{asset('storage/admin/KelolaGaleri/'.$galeri_logbook->gambar_logbook)}}" alt="" style="width: 100%">
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                        </td>

                                                @if(Auth::user()->role == 'admin')
                                                        
                                                        <td>
                                                            <a href="/KelolaGaleriLogbook/{{ $galeri_logbook->id }}"onclick="return confirm('yakin menghapus data?')"
                                                                style="color: red;">Hapus</a>
                                                            &nbsp;&nbsp;
                                                            <a
                                                                href="/KelolaEditGaleriLogbook/{{ $galeri_logbook->id }}">Edit</a>
                                                        </td>
                                                @endif

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div>{{ $galeri_logbooks->links() }}</div>
                                    </div>
                                    <!-- end -->
                                </div>
                            </div><!-- end card body Data transaksi -->

                            <!-- end galeri -->

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
        <!-- <aside class="control-sidebar control-sidebar-dark">
        </aside> -->
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
