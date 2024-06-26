<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zecllasic | User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body>
    <div class="container mt-2">
        @include('user.navbar')
    </div>

    <div class="container">
        <div class="container-md mt-2">
            <div class="container-flex">
                <div class="row">
                    <div class="col">
                        <img src="../assets/img/logo.png" class="img-fluid mt-lg-5" alt="logo"
                            style="width: 550px; height: auto; margin: 0%;">
                    </div>
                    <div class="col">
                        <div class="container">
                            <!--  -->
                            <div class="text-center mb-4">
                                <h3>Daftar</h3>
                            </div>
                            <!--  -->
                            <form action="/daftar" method="POST">
                                @csrf
                                @if (Session::has('error'))
                                    
                                        <div>
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong> {{ Session::get('error') }}</strong>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        </div>
                                    
                                @endif
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control"
                                        id="exampleFormControlInput1" placeholder="Nama lengkap">
                                </div>
                                <!--  -->
                                <div class="mb-3">
                                    <label for="exampleFormControlInput2" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        id="exampleFormControlInput2" placeholder="Email">
                                </div>
                                <!--  -->
                                <div class="mb-3">
                                    <label for="exampleFormControlInput3" class="form-label">Nomor Telepon</label>
                                    <input type="number" name="notel" class="form-control"
                                        id="exampleFormControlInput3" placeholder="+62-">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput3" class="form-label">Jenis Kelamin</label><br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jk" id="laki"
                                            value="Laki-Laki">
                                        <label class="form-check-label" for="laki">Laki-Laki</label>
                                    </div>
                                    <div class="form-check">

                                        <input class="form-check-input" type="radio" name="jk" id="perem"
                                            value="Perempuan">
                                        <label class="form-check-label" for="perem">Perempuan</label>

                                    </div>

                                </div>
                                <!--  -->
                                <div class="mb-3">
                                    <label for="inputPassword1" class="form-label">Alamat</label>
                                    <input type="text" name="alamat" id="inputPassword1" class="form-control"
                                        aria-labelledby="passwordHelpBlock" placeholder="Alamat">

                                </div>
                                <div class="mb-3">
                                    <label for="inputPassword1" class="form-label">Kata Sandi</label>
                                    <input type="password" name="password" id="inputPassword1" class="form-control"
                                        aria-labelledby="passwordHelpBlock" placeholder="Kata Sandi">
                                    <div id="passwordHelpBlock" class="form-text">
                                        Masukkan 8 karakter yang berisi kombinasi huruf besar, huruf kecil, angka dan
                                        simbol.
                                    </div>
                                </div>
                                <!--  -->
                                <div class="mb-3">
                                    <label for="inputKonfirmPassword2" class="form-label">Konfirmasi Kata Sandi</label>
                                    <input type="password" id="inputKonfirmPassword2" class="form-control"
                                        aria-labelledby="passwordHelpBlock" placeholder="Konfirmasi Ulang Kata Sandi">
                                    <div id="passwordHelpBlock" class="form-text">
                                        Masukkan konfirmasi kata sandi dengan benar sesuai dengan yang dimasukkan
                                        sebelumnya.
                                    </div>
                                </div>
                                <!--  -->
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Daftar</button>
                                    <p><small>sudah punya akun?</small> <a class="link" href="/login">Masuk</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="main-footer">
            <hr>
            <p class="text-center">&copy; 2023 ZECLASSIC. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
