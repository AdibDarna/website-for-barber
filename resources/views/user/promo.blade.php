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
    <div class="container-md mt-2">
        @include('user.navbar')
    </div>

    <div class="container">
        {{-- <div class="container-fluid"> --}}
            <div class="row mb-3">
                <div class="col-5 text-center mt-3">
                    <hr style="background-color: black">
                </div>
                <div class="col-2 text-center mt-3">
                    <h3>Promo</h3>
                </div>
                <div class="col-5 text-center mt-3">
                    <hr style="border-top:1px solid black">
                </div>
            </div>
            <div class="row">
                @foreach ($promo as $p)
                    <div class="col-4 ">
                        <div class="card mb-2">
                            <img src="../assets/img/imgPromo.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $p->nama_promo }}</h5>
                                {{-- <p class="card-text">{{ $p->keterangan_promo }}</p> --}}
                                <a href="desPromo/{{ $p->id }}" class="btn btn-warning mt-2">Lihat</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        {{-- </div> --}}
    </div>

    <footer>
        <div class="main-footer" style="bottom: 0; position: absolute; width: 100%;">
            <hr>
            <p class="text-center">&copy; 2023 ZECLASSIC. All rights reserved.</p>
        </div>
    </footer>

    {{-- 
    <footer>
        <div class="main-footer" style="bottom: 0; position: absolute; width: 100%;">
            <hr>
            <p class="text-center">&copy; 2023 ZECLASSIC. All rights reserved.</p>
        </div>
    </footer> --}}



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
