<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ZECLASSIC | Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
    <style>
        .calendar {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 300px;
            padding: 10px;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
            text-align: center;
        }

        .day {
            padding: 5px;
            border-radius: 50%;
            cursor: pointer;
        }

        .current-day {
            background-color: white;
            
        }
    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('admin.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('admin.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <!-- container-fluid -->
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-9">
                            <div class="row">
                                <div class="col-4">
                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                            <h3>{{ $pesanan }}</h3>
                                            <p> Pesanan </p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-bag"></i>
                                        </div>
                                        <a href="/KelolaPesanan" class="small-box-footer">More info <i
                                                class="fas fa-arrow-circle-right"></i></a>
                                    </div>

                                </div>
                                @foreach ($pesananDataCaps as $caps)
                                    <div class="col">
                                        <div class="small-box bg-warning">
                                            <div class="inner">
                                                <h3>{{ $caps->total }} orang</h3>
                                                <p> Capster <b>{{ $caps->jasacukur_pesan }}</b></p>
                                            </div>
                                            <div class="icon">
                                                <i class="nav-icon fas fa-cut"></i>
                                            </div>
                                            <a href="/KelolaPesanan" class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-12 ">
                                <div class="card card-warning card-tabs">
                                    <div class="card-header p-0 pt-1">
                                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="custom-tabs-one-home-tab"
                                                    data-toggle="pill" href="#custom-tabs-one-home" role="tab"
                                                    aria-controls="custom-tabs-one-home"
                                                    aria-selected="true">Pesanan</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                                                    href="#custom-tabs-one-profile" role="tab"
                                                    aria-controls="custom-tabs-one-profile"
                                                    aria-selected="false">Pelanggan</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill"
                                                    href="#custom-tabs-one-messages" role="tab"
                                                    aria-controls="custom-tabs-one-messages"
                                                    aria-selected="false">Jadwal</a>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content" id="custom-tabs-one-tabContent">
                                            <div class="tab-pane fade active show" id="custom-tabs-one-home"
                                                role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                                <table class="table table-hover text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>

                                                            <th>Nama Lengkap</th>

                                                            <th>Layanan</th>
                                                            <th>Gaya Potong</th>
                                                            <th>Tanggal</th>
                                                            <th>Waktu</th>
                                                            <th>Jasa</th>


                                                            <th>Status</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($pesananData as $pesanan)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>

                                                                <td>{{ $pesanan->namalengkap_pesan }}</td>

                                                                <td>{{ $pesanan->layanan_pesan }}</td>
                                                                <td>{{ $pesanan->gayapotongan_pesan }}</td>
                                                                <td>{{ $pesanan->tanggal_pesan }}</td>
                                                                <td>{{ $pesanan->waktu_pesan }}</td>
                                                                <td>{{ $pesanan->jasacukur_pesan }}</td>

                                                                <td>{{ $pesanan->status_pesan }} </td>

                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel"
                                                aria-labelledby="custom-tabs-one-profile-tab">
                                                <table class="table table-hover text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>

                                                            <th>Nama Lengkap</th>
                                                            <th>Email</th>
                                                            <th>No Telepon</th>
                                                            <th>Jenis Kelamin</th>

                                                            <th>Status</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($pelangganData as $pelanggan)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>

                                                                <td>{{ $pelanggan->nama_pelanggan }}</td>
                                                                <td>{{ $pelanggan->email_pelanggan }}</td>
                                                                <td>{{ $pelanggan->notelepon_pelanggan }}</td>
                                                                <td>{{ $pelanggan->jeniskelamin_pelanggan }}</td>

                                                                <td>{{ $pelanggan->status_pelanggan }}</td>

                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel"
                                                aria-labelledby="custom-tabs-one-messages-tab">
                                                <table class="table table-hover text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>

                                                            <th>Nama Lengkap</th>

                                                            <th>Layanan</th>
                                                            <th>Gaya Potong</th>
                                                            <th>Tanggal</th>
                                                            <th>Waktu</th>
                                                            <th>Jasa</th>


                                                            <th>Status</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($jadwal as $jad)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>

                                                                <td>{{ $jad->namalengkap_pesan }}</td>

                                                                <td>{{ $jad->layanan_pesan }}</td>
                                                                <td>{{ $jad->gayapotongan_pesan }}</td>
                                                                <td>{{ $jad->tanggal_pesan }}</td>
                                                                <td>{{ $jad->waktu_pesan }}</td>
                                                                <td>{{ $jad->jasacukur_pesan }}</td>

                                                                <td>{{ $jad->status_pesan }} </td>

                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning d-flex "
                                style=" justify-content: space-between; flex-direction:column">
                                <div class="p-4" style="text-align: center">
                                    <h3> Promo </h3>
                                    <hr>
                                    @foreach ($promo as $pro)
                                        <div>

                                            <h4> {{ $pro->nama_promo }} </h4>
                                            <p><b>{{ $pro->keterangan_promo }}</b></p>
                                            <i>{{ $pro->masaberlaku_promo }}</i>
                                            <hr>
                                        </div>
                                    @endforeach
                                </div>
                                <a href="/KelolaPromo" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                            <div class="col calendar bg-warning">
                                <div class="header">
                                    <button class="btn" id="prevBtn">&lt;</button>
                                    <h2 id="monthYear"></h2>
                                    <button class="btn" id="nextBtn">&gt;</button>
                                </div>
                                <div class="days" id="calendarDays">
                                    <!-- Calendar days will be added here dynamically -->
                                </div>
                            </div>
                        </div>
                        
                    </div>

                </div>
                <div class="row">

                </div>
            </section>
            <!-- /.content -->
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
    <script>
        const monthYearElem = document.getElementById('monthYear');
        const calendarDays = document.getElementById('calendarDays');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

        const today = new Date();
        let currentMonth = today.getMonth();
        let currentYear = today.getFullYear();

        function updateCalendar() {
            const firstDayOfMonth = new Date(currentYear, currentMonth, 1);
            const lastDayOfMonth = new Date(currentYear, currentMonth + 1, 0);
            const daysInMonth = lastDayOfMonth.getDate();

            monthYearElem.textContent =
                `${new Intl.DateTimeFormat('en-US', { month: 'long', year: 'numeric' }).format(firstDayOfMonth)}`;

            calendarDays.innerHTML = '';

            for (let i = 1; i <= daysInMonth; i++) {
                const dayElem = document.createElement('div');
                dayElem.textContent = i;
                dayElem.classList.add('day');

                if (i === today.getDate() && currentMonth === today.getMonth() && currentYear === today.getFullYear()) {
                    dayElem.classList.add('current-day');
                }

                calendarDays.appendChild(dayElem);
            }
        }

        prevBtn.addEventListener('click', () => {
            currentMonth -= 1;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear -= 1;
            }
            updateCalendar();
        });

        nextBtn.addEventListener('click', () => {
            currentMonth += 1;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear += 1;
            }
            updateCalendar();
        });

        updateCalendar();
    </script>
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
