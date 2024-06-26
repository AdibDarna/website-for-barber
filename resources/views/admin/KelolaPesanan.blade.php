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
                            <h1 class="m-0">Kelola Pesanan | Booking</h1>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    {{-- <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>150</h3>

                                    <p> ? </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>53<sup style="font-size: 20px">%</sup></h3>

                                    <p> ? </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>44</h3>

                                    <p> ? </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>65</h3>
                                    <p> ? </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>

                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div> --}}
                    <!-- card utama -->

                    <div class="card">
                        <div class="card-body">
                            <div class="card">
                                <div class="card-header card-outline card-warning">
                                    <h3 class="card-title">Data Pesanan | Booking</h3>
                                </div>

                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                {{-- <th>ID Pesan</th> --}}
                                                <th>Waktu</th>
                                                <th>Tanggal</th>
                                                <th>Nama Lengkap</th>
                                                <th>Email</th>
                                                <th>No Telepon</th>
                                                <th>Gaya Potong</th>
                                                <th>Jasa</th>
                                                <th> </th>
                                                <th>Bukti Pembayaran</th>
                                                <th>Pesan</th>
                                                <th>Status</th>
                                                @if (Auth::user()->role == 'admin')
                                                    <th>Aksi</th>
                                                @endif

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pesanans as $pesanan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    {{-- <td>{{ $pesanan->id }}</td> --}}
                                                    <td>{{ $pesanan->waktu_pesan }}</td>
                                                    <td>{{ $pesanan->tanggal_pesan }}</td>

                                                    <td>{{ $pesanan->namalengkap_pesan }}</td>
                                                    <td>{{ $pesanan->email_pesan }}</td>
                                                    <td>{{ $pesanan->notel_pesan }}</td>
                                                    <td>{{ $pesanan->gayapotongan_pesan }}</td>
                                                    <td>{{ $pesanan->jasacukur_pesan }}

                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-warning"
                                                            data-toggle="modal"
                                                            data-target="#modalCapster{{ $pesanan->id }}">
                                                            <i class="fas fa-users-cog"></i>
                                                        </button>
                                                        <div class="modal fade" id="modalCapster{{ $pesanan->id }}"
                                                            style="display: none;" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content ">
                                                                    <div class="modal-head p-2">
                                                                        Ganti Capster
                                                                    </div>
                                                                    <form action="/KelolaPesanan/GantiCapster"
                                                                        method="POST">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <div class="col-12">
                                                                                <label for="">Capster</label>
                                                                                <input type="text" name="id_pesanan"
                                                                                    value="{{ $pesanan->id }}" hidden>
                                                                                <select name="jasacukur_pesan"
                                                                                    class="form-control @error('jasacukur_pesan') is-invalid @enderror"
                                                                                    id="jasaCukur">
                                                                                    <option
                                                                                        value="{{ $pesanan->jasacukur_pesan }}"
                                                                                        selected hidden>
                                                                                        {{ $pesanan->jasacukur_pesan }}
                                                                                    </option>
                                                                                    @foreach ($capster as $kar)
                                                                                        <option
                                                                                            value="{{ $kar->nama_karyawan }}">
                                                                                            {{ $kar->nama_karyawan }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>

                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer p-2">
                                                                            <input class="btn btn-warning"
                                                                                type="submit" value="Ganti Capter">
                                                                        </div>
                                                                    </form>

                                                                </div>

                                                            </div>

                                                        </div>
                                                    </td>
                                                    <td><button type="button" class="btn btn-warning"
                                                            data-toggle="modal"
                                                            data-target="#modal{{ $pesanan->id }}">
                                                            Lihat
                                                        </button>
                                                        <div class="modal fade" id="modal{{ $pesanan->id }}"
                                                            style="display: none;" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content bg-warning">

                                                                    <div class="modal-body">
                                                                        <img src="{{ asset('storage/dist/KelolaPesanan/' . $pesanan->buktipembayaran_pesan) }}"
                                                                            alt="" style="width: 100%">
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </td>
                                                    <td>{{ $pesanan->isipesan_pesan }}</td>
                                                    <td>{{ $pesanan->status_pesan }} </td>
                                                    <td>
                                                        @if ($pesanan->status_pesan == 'Process')
                                                            <a href="/KelolaPesanan/{{ $pesanan->id }}"
                                                                onclick="return confirm('yakin kofirmasi?')"
                                                                style="color: blue;"> Konfirmasi </a><br>
                                                            <a href="/KelolaPesanan/{{ $pesanan->id }}/batalkan"
                                                                onclick="return confirm('yakin kofirmasi?')"
                                                                style="color: red;"> Batalkan </a>
                                                        @elseif($pesanan->status_pesan == 'Konfirmasi')
                                                            <a href="/KelolaPesanan/{{ $pesanan->id }}/selesai"
                                                                onclick="return confirm('yakin kofirmasi?')"
                                                                style="color: blue;"> Selesai </a><br>
                                                            <a href="/KelolaPesanan/{{ $pesanan->id }}/batalkan"
                                                                onclick="return confirm('yakin kofirmasi?')"
                                                                style="color: red;"> Batalkan </a>
                                                        @else
                                                        @endif
                                                        &nbsp;&nbsp;
                                                        {{-- <a href="#">Edit</a> --}}
                                                    </td>
                                                    @if (Auth::user()->role == 'admin')
                                                        <td>

                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div>{{ $pesanans->links() }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
                <!-- /.content -->
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
