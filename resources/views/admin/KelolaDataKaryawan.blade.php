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
                            <h1 class="m-0">Kelola Data Karyawan</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- form cari ID Karyawan -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="ID Karyawan">
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

                            <div class="card card-warning collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">Tambah Data Karyawan</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="/KelolaDataKaryawan" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form">
                                            <div class="row">
                                                <div class="form-group col-md-6"><!-- row form kolom 1 kiri -->
                                                    <label style="color: gray;">Nama Lengkap</label>
                                                    <div class="input-group">
                                                        <input type="text" name="nama_karyawan"
                                                            class="form-control @error('nama_karyawan') is-invalid @enderror"
                                                            placeholder="Nama Lengkap">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6"><!-- row form kolom 1 kanan -->
                                                    <label style="color: gray;">Email</label>
                                                    <div class="input-group">
                                                        <input type="email" name="email_karyawan"
                                                            class="form-control @error('email_karyawan') is-invalid @enderror"
                                                            placeholder="Email">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                            <!-- start row -->
                                            <div class="row">
                                                <div class="form-group col-md-6"><!-- row form kolom 2 kiri -->
                                                    <label style="color: gray;">NIK KTP</label>
                                                    <div class="input-group">
                                                        <input type="number" name="nik_karyawan"
                                                            class="form-control @error('nik_karyawan') is-invalid @enderror">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6"><!-- row form kolom 2 kanan -->
                                                    <label style="color: gray;">Foto KTP</label>
                                                    <div class="custom-file">
                                                        <input type="file"
                                                            class="custom-file-input form-control @error('ktp_karyawan') is-invalid @enderror"
                                                            name="ktp_karyawan" id="customFile">
                                                        <label class="custom-file-label" for="customFile">
                                                            Masukkan Foto
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                            <!-- start row -->
                                            <div class="row">
                                                <div class="form-group col-md-6"><!-- row form kolom 2 kiri -->
                                                    <label style="color: gray;">No Telepon</label>
                                                    <div class="input-group">
                                                        <input type="number" name="notelepon_karyawan"
                                                            class="form-control @error('notelepon_karyawan') is-invalid @enderror">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6"><!-- row form kolom 2 kanan -->
                                                    <label style="color: gray;">No Darurat</label>
                                                    <div class="input-group">
                                                        <input type="number" name="nodarurat_karyawan"
                                                            class="form-control @error('nodarurat_karyawan') is-invalid @enderror"
                                                            placeholder="No Darurat">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                            <div class="row"><!-- start row -->
                                                <div class="form-group col-md-6"><!-- row form kolom 2 kiri -->
                                                    <label style="color: gray;">Jenis Kelamin</label>
                                                    <div class="input-group">
                                                        <input type="text" name="jeniskelamin_karyawan"
                                                            class="form-control @error('jeniskelamin_karyawan') is-invalid @enderror"
                                                            placeholder="Jenis Kelamin">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6"><!-- row form kolom 2 kanan -->
                                                    <label style="color: gray;">Alamat</label>
                                                    <div class="input-group">
                                                        <input type="text" name="alamat_karyawan"
                                                            class="form-control @error('alamat_karyawan') is-invalid @enderror"
                                                            placeholder="Alamat">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                            <div class="row"><!-- start row -->
                                                <div class="form-group col-md-6"><!-- row form kolom 2 kiri -->
                                                    <label style="color: gray;">Status</label>
                                                    <div class="input-group">
                                                        <input type="text" name="status_karyawan"
                                                            class="form-control @error('status_karyawan') is-invalid @enderror"
                                                            placeholder="Status">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6"><!-- row form kolom 2 kanan -->
                                                    <label style="color: gray;">Foto</label>
                                                    <div class="custom-file">
                                                        <input type="file"
                                                            class="custom-file-input form-control @error('foto') is-invalid @enderror"
                                                            name="foto" id="customFile2">
                                                        <label class="custom-file-label" for="customFile2">
                                                            Masukkan Foto
                                                        </label>
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
                            <!-- end card tambah karyawan -->
                            <!-- layaout data Karyawan -->
                            <div class="card">
                                <div class="card-header card-outline card-primary">
                                    <h3 class="card-title">Data Karyawan</h3>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <!-- start -->
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                {{-- <th>ID</th> --}}
                                                <th>Nama Lengkap</th>
                                                <th>Email</th>
                                                <th>NIK</th>
                                                <th>Foto KTP</th>
                                                <th>No Telepon</th>
                                                <th>No Darurat</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Alamat</th>
                                                <th>Status</th>
                    @if(Auth::user()->role == 'admin') 
                                                
                                                <th>Aksi</th>
                    @endif

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($karyawans as $karyawan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    {{-- <td>{{ $karyawan->id }}</td> --}}
                                                    <td>{{ $karyawan->nama_karyawan }}</td>
                                                    <td>{{ $karyawan->email_karyawan }}</td>
                                                    <td>{{ $karyawan->nik_karyawan }}</td>
                                                    <td>{{ $karyawan->ktp_karyawan }}</td>
                                                    <td>{{ $karyawan->notelepon_karyawan }}</td>
                                                    <td>{{ $karyawan->nodarurat_karyawan }}</td>
                                                    <td>{{ $karyawan->jeniskelamin_karyawan }}</td>
                                                    <td>{{ $karyawan->alamat_karyawan }}</td>
                                                    <td>{{ $karyawan->status_karyawan }}</td>
                    @if(Auth::user()->role == 'admin') 

                                                    <td>
                                                        <a href="/KelolaDataKaryawan/{{ $karyawan->id }}"
                                                            onclick="return confirm('yakin menghapus data?')"
                                                            style="color: red;">Hapus</a>
                                                        &nbsp;&nbsp;
                                                        <a href="/KelolaEditDataKaryawan/{{ $karyawan->id }}">Edit</a>
                                                    </td>
                    @endif
                                                    
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- end -->
                                    <div>{{ $karyawans->links() }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline-block">
                <b>Zeclassic</b>|2023
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">

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
