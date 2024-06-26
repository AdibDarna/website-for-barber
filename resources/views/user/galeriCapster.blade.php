<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zecllasic | User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .pagination{
            justify-content: center;
        }
        .pagination>li>a,
        .pagination>li>span {
            color: #FFA72E; 
        }

        .pagination>.active>a,
        .pagination>.active>a:focus,
        .pagination>.active>a:hover,
        .pagination>.active>span,
        .pagination>.active>span:focus,
        .pagination>.active>span:hover {
            background-color: #FFA72E;
            border-color: #FFA72E;
        }
    </style>

</head>

<body>
    <div class="container-md">
        @include('user.navbar')
    </div>

    <div class="container-md">
        {{-- <div class="container-fluid"> --}}
            <div class="row mb-4">
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
                @foreach ($galcap as $g)
                    <div class="col-6">
                        <div class="card mb-3" style="max-width: 580px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ 'storage/admin/KelolaDataKaryawan/' . $g->foto }}"
                                        style="height: 15rem; width:20rem; object-fit: cover"
                                        class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $g->nama_karyawan }}</h5>
                                        <p>
                                            {{ $g->nama_karyawan }} merupakan capster yang sudah memiliki pengalaman 5
                                            tahun
                                            bekerja di bagian cukur rambut
                                        </p>
                                        <div class="position-absolute bottom-0 end-0">
                                            <a class="card-link" href="desCapster/{{ $g->id }}">
                                                <small class="text-body-secondary">
                                                    lihat selengkapnya >>
                                                </small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               
                @endforeach
            </div>
            <div class="row">
                {{$galcap->links()}}
            </div>
        {{-- </div> --}}
    </div>

    <footer >
        <div class="main-footer" style="bottom: 0;  width: 100%;">
            <hr>
            <p class="text-center">&copy; 2023 ZECLASSIC. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
