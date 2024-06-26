<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zecllasic | User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


</head>

<body>
    <div class="container mt-2">
        @include('user.navbar')
    </div>

    <div class="container mt-3">
        <div class="container">
            <div class="text-lg-center">
                <h3>Tentang Kami</h3>
            </div>
            <div class="row mt-4">
                {{-- gambar barbershop --}}
                <div class="col mt-2">
                    <img src="../assets/img/Barbershop.jpeg" class="img-fluid" alt="imgPromo">
                </div>
                {{-- content tentang --}}
                <div class="col">
                    <div class="">
                        <p>Merupakan tempat cukur rambut bergaya klasik yang sudah berdiri sejak tahun 2017 di kota
                            pekanbaru yang telah berkembang hingga sekarang menjadi satu satunya tempat cukur yang
                            bergaya klasik di pekanbaru.
                        </p>
                        {{-- jam operasional --}}
                        <div class="mt-4">
                            <h5>
                                Jam Operaisional
                            </h5>
                            <p>
                                Buka setiap hari <br>
                                Pukul 10.00 siang - 21.00 malam
                            </p>
                        </div>
                        
                        {{-- alamat --}}
                        <div class="mt-4">
                            <h5>
                                Alamat
                            </h5>
                            <p>
                                Buka setiap hari <br>
                                Pukul 10.00 siang - 21.00 malam
                            </p>
                        </div>
                        {{-- kontak barbershop --}}
                        <div class="mt-4">
                            <h5>
                                Hubungi Kami 
                            </h5>
                            <div>
                                <a href="https://wa.me/+6282235582362?text=Hallo,%20Saya%20ingin%20menanyakan%20sesuatu" target="_blank" style="font-family: sans-serif;text-decoration: none;color: #fff;font-size: 2.4em;padding: 1em 0.3em 1.3em 3em;border-radius: 2em;font-weight: bold;background: url('https://cdn-icons-png.flaticon.com/128/2504/2504957.png') no-repeat 0em center;background-size: 1.6em;"></a>
                            </div>
                        </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
   
</body>

</html>
