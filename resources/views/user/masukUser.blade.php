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

    <!--  -->
    <div class="container-md">
        <div class="row mt-5">
            <div class="col">
                <div class="mt-2">
                    <img src="../assets/img/logo.png" class="img-fluid" alt="logo">
                </div>
            </div>
            <div class="col mt-4">

                <div class="text-center mb-4">
                    <h3>Masuk</h3>
                </div>
                <!--  -->
                <form action="/loginAuth" method="POST">
                    @csrf
                    @if (Session::has('message'))
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <div>
                                {{Session::get('message')}}
                            </div>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email </label>
                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                            placeholder="Masukkan Email">
                    </div>
                    <!--  -->
                    <div class="mb-3">
                        <label for="inputPassword5" class="form-label">Kata Sandi</label>
                        <input type="password" name="password" id="inputPassword5" class="form-control"
                            aria-labelledby="passwordHelpBlock" placeholder="Masukkan Kata Sandi">
                        <div id="passwordHelpBlock" class="form-text">
                            Kata sandi Anda harus terdiri dari 8-20 karakter, terdiri dari huruf dan angka, serta tidak
                            boleh mengandung spasi, karakter khusus, atau emoji.
                        </div>
                    </div>
                    <!--  -->
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submitb">Masuk</button>
                        <p><small>belum punya akun?</small> <a class="link" href="daftarUser">Daftar</a></p>
                    </div>
                </form>
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
