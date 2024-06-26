<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zecllasic | User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <div class="container mt-2">
        @include('user.navbar')
    </div>

    <div class="container mt-3">
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: black;" aria-current="page" href="riwayatTransaksi">Riwayat
                        Transaksi</a>
                </li>
            </ul>
        </div>
        <div class="">
            <div class="mt-4">
                <h5>Profil Saya</h5>
                <p>Kelola informasi profil anda untuk mengontrol, melindungi dan mengamankan akun</p>
            </div>

            <div class="row">
                <div class="col mt-3">
                    @if (Session::has('success'))
                    <div>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong> {{ Session::get('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    </div>
                @endif
                    
                    <form action="/profilUser/update" method="POST">
                        @csrf
                        @foreach ($user as $u)
                            <div class="row mb-3">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-6">
                                    <input type="text"value="{{ $u->name }}" name="nama" class="form-control"
                                        id="nama">
                                </div>
                            </div>
                            <!-- form no telepon -->
                            <div class="row mb-3">
                                <label for="noTelepon" class="col-sm-2 col-form-label">No Telepon</label>
                                <div class="col-6">
                                    <input type="number" value="{{ $u->notel }}" name="notel"
                                        class="form-control" id="noTelepon" placeholder="+62">
                                </div>
                            </div>
                            <!-- form email -->
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-6">
                                    <input type="email" value="{{ $u->email }}" name="email"
                                        class="form-control" id="email">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-sm-2 col-form-label">Password*</label>
                                <div class="col-6">
                                    <input type="password" class="form-control mb-2" name="password" id="password">
                                    <h6 style="font-size: 12px">*Isi box ini untuk melakukan ganti password</h6>
                                </div>
                            </div>
                        @endforeach
                        <div class="row mb-3">

                            <div class="col-6">
                                <input type="submit" value="Update" style="color: white" class="btn btn-warning">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-3">
                    <div class="">
                        <img src="../assets/img/profil.jpg" style="width: 250px;" class="img-fluid" alt="imgPromo">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="main-footer" style="bottom: 0; position: absolute; width: 100%;">
            <hr>
            <p class="text-center">&copy; 2023 ZECLASSIC. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
