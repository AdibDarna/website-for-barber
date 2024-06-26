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
                            <h1 class="m-0">Profil</h1>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <!-- start -->
                    @foreach ($user as $u)
                        <div class="row">
                            <div class="col-md-3">

                                <div class="card card-warning card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle"
                                                src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                                        </div>
                                        <h3 class="profile-username text-center">{{ $u->name }}</h3>
                                        <p class="text-muted text-center">Admin Barbershop</p>
                                        <ul class="list-group list-group-unbordered mb-3">

                                        </ul>
                                    </div>

                                </div>

                            </div>

                            <div class="col-md-9">
                                <div class="card card-warning card-tabs">
                                    <div class="card-header p-0 pt-1">
                                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="custom-tabs-one-home-tab"
                                                    data-toggle="pill" href="#custom-tabs-one-home" role="tab"
                                                    aria-controls="custom-tabs-one-home" aria-selected="true">Data</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                                                    href="#custom-tabs-one-profile" role="tab"
                                                    aria-controls="custom-tabs-one-profile"
                                                    aria-selected="false">Edit</a>
                                            </li>


                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content" id="custom-tabs-one-tabContent">
                                            <div class="tab-pane fade active show" id="custom-tabs-one-home"
                                                role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">

                                                @if (Session::has('success'))
                                                    <div>
                                                        <div class="alert alert-warning alert-dismissible fade show"
                                                            role="alert">
                                                            <strong> {{ Session::get('success') }}</strong>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="row mb-3">
                                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                                    <div class="col-6">
                                                        {{ Auth::user()->name }}
                                                    </div>
                                                </div>
                                                <!-- form no telepon -->
                                                <div class="row mb-3">
                                                    <label for="noTelepon" class="col-sm-2 col-form-label">No
                                                        Telepon</label>
                                                    <div class="col-6">
                                                        {{ Auth::user()->notel }}
                                                    </div>
                                                </div>
                                                <!-- form email -->
                                                <div class="row mb-3">
                                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-6">
                                                        {{ Auth::user()->email }}
                                                    </div>
                                                </div>


                                                <div class="row mb-3">


                                                </div>

                                            </div>
                                            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel"
                                                aria-labelledby="custom-tabs-one-profile-tab">
                                                <form action="/profilUser/update" method="POST">
                                                    @csrf

                                                    <div class="row mb-3">
                                                        <label for="nama"
                                                            class="col-sm-2 col-form-label">Nama</label>
                                                        <div class="col-6">
                                                            <input type="text"value="{{ Auth::user()->name }}"
                                                                name="nama" class="form-control" id="nama">
                                                        </div>
                                                    </div>
                                                    <!-- form no telepon -->
                                                    <div class="row mb-3">
                                                        <label for="noTelepon" class="col-sm-2 col-form-label">No
                                                            Telepon</label>
                                                        <div class="col-6">
                                                            <input type="number" value="{{ Auth::user()->notel }}"
                                                                name="notel" class="form-control" id="noTelepon"
                                                                placeholder="+62">
                                                        </div>
                                                    </div>
                                                    <!-- form email -->
                                                    <div class="row mb-3">
                                                        <label for="email"
                                                            class="col-sm-2 col-form-label">Email</label>
                                                        <div class="col-6">
                                                            <input type="email" value="{{ Auth::user()->email }}"
                                                                name="email" class="form-control" id="email">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="password"
                                                            class="col-sm-2 col-form-label">Password*</label>
                                                        <div class="col-6">
                                                            <input type="password" class="form-control mb-2"
                                                                name="password" id="password">
                                                            <h6 style="font-size: 12px">*Isi box ini untuk melakukan
                                                                ganti password</h6>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">

                                                        <div class="col-6">
                                                            <input type="submit" value="Update" style="color: white"
                                                                class="btn btn-warning">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>


                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    @endforeach

                    <!-- end -->

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
