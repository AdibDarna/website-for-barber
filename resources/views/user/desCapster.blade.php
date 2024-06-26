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
    <div class="container-md">
        @include('user.navbar')
    </div>
    @foreach ($capster as $c)

        <div class="container-md text-center">
            <div class="row mb-5">
                <div class="col-4 text-center mt-3">
                    <hr style="background-color: black">
                </div>
                <div class="col-4 text-center mt-3">
                    <h3>Galeri Capster</h3>
                </div>
                <div class="col-4 text-center mt-3">
                    <hr style="border-top:1px solid black">
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <img src="{{ asset('storage/admin/KelolaDataKaryawan/' . $c->foto) }}" class="img-fluid w-auto"
                        alt="imgLg1">
                </div>
                <div class="col text-start">
                    <h3>{{ $c->nama_karyawan }}</h3>
                    <p>
                        {{ $c->nama_karyawan }} merupakan barberman yang sudah memiliki pengalaman 5 tahun bekerja
                        di bagian cukur rambut dan memiliki sertifikat yang pernah diraih sejak lulus sekolah.
                    </p>

                </div>
            </div>
        </div>
        </div>

        <div class="container-md text-center">
            <div>
                <div class="text-center mt-3">
                    <h4>Hasil</h4>
                </div>
                <div>
                    <div class="row mt-3">
                        @foreach ($galcap as $g)
                            <div class="col-4">
                                <div class="card mb-2 mb-md-4">
                                    <img src="{{ '/storage/admin/KelolaGaleri/' . $g->gambar_gayacukur }}"
                                        class="img-fluid w-auto" alt="imgLg1">
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    @endforeach

    <footer>
        <div class="main-footer"style="bottom: 0;  width: 100%;">
            <hr>
            <p class="text-center">&copy; 2023 ZECLASSIC. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
