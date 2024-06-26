<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zecllasic | User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body>
    <div class="container-md">
        @include('user.navbar')
    </div>

    <div class="container-md">
        <div class="row mb-3">
            <div class="col-4 text-center mt-3">
                <hr style="background-color: black">
            </div>
            <div class="col-4 text-center mt-3">
                <h3>Deskripsi Promo</h3>
            </div>
            <div class="col-4 text-center mt-3">
                <hr style="border-top:1px solid black">
            </div>
        </div>
        <div class="accordion mt-2" id="accordionExample">
            @foreach ($promo as $p)
                
            <div class="accordion-item ">
                <h2 class="accordion-header bg-warning">
                    <button class="accordion-button bg-warning" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        {{$p->nama_promo}}
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                       Masa Berkalu Promo <b>{{$p->masaberlaku_promo}}</b> <br>
                        {{$p->keterangan_promo}}
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>

    <footer>
        <div class="main-footer" style="bottom: 0; position: absolute; width: 100%;">
            <hr>
            <p class="text-center">&copy; 2023 ZECLASSIC. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>