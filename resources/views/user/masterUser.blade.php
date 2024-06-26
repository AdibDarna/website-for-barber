<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zecllasic | User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../css/carousel-card.css">
</head>

<body>
    <div class="container mt-2">
        <!-- start -->
        @include('user.navbar')
        <!-- end -->
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-6 d-flex justify-content-center mt-3" style="flex-direction:column">
                <h1 style="color: #FFA72E">Zeclassic</h1>
                <h1>Barbershop</h1>
                <p>
                    Merupakan tempat cukur rambut bergaya klasik yang sudah berdiri
                    sejak tahun 2017 di kota pekanbaru yang telah berkembang hingga
                    sekarang menjadi satu satunya tempat cukur yang bergaya klasik
                    di pekanbaru.
                </p>
            </div>
            <div class="col-6 container-fluid text-center mt-2">
                <img src="../assets/img/Logo.png" class="img-fluid" alt="logo">
            </div>

        </div>
    </div>

    <!-- Layanan barbershop -->
    <div class="container mt-5">
        <div class="text-center">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-5 text-center mt-5">
                        <hr style="background-color: black">
                    </div>
                    <div class="col-2 text-center mt-5">
                        <h3>Pelayanan</h3>
                    </div>
                    <div class="col-5 text-center mt-5">
                        <hr style="border-top:1px solid black">
                    </div>
                </div>

                <div class="container mt-5">
                    <!--  -->
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col">
                            <div>
                                <span>
                                    <img src="{{ asset('assets/img/hand.png') }}" width="100" />
                                    <h5 class="mt-2">Grooming</h5>
                                </span>
                            </div>
                        </div>
                        <div class="col">
                            <div>
                                <span>
                                    <img src="{{ asset('assets/img/smooth.png') }}" width="100" />

                                    <h5 class="mt-2">Smoothing</h5>
                                </span>
                            </div>
                        </div>
                        <div class="col">
                            <div>
                                <span>
                                    <img src="{{ asset('assets/img/water.png') }}" width="100" />

                                    <h5 class="mt-2">Coloring</h5>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container mt-5">
                    <!--  -->
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col">
                            <div>
                                <span>
                                    <img src="{{ asset('assets/img/cut.png') }}" width="100" />

                                    <h5 class="mt-2">Classic Haircut</h5>
                                </span>
                            </div>
                        </div>
                        <div class="col">
                            <div>
                                <span>
                                    <img src="{{ asset('assets/img/treatment.png') }}" width="100" />

                                    <h5 class="mt-2">Treatment</h5>
                                </span>
                            </div>
                        </div>
                        <div class="col">
                            <div>
                                <span>
                                    <img src="{{ asset('assets/img/child.png') }}" width="100" />

                                    <h5 class="mt-2">Kids Haircuts</h5>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
            </div>
        </div>
    </div>

    <!-- paket layanan -->
    <div class="container mt-5">
        <div class="text-center">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-5 text-center mt-5">
                        <hr style="background-color: black">
                    </div>
                    <div class="col-2 text-center mt-5">
                        <h3>Paket</h3>
                    </div>
                    <div class="col-5 text-center mt-5">
                        <hr style="border-top:1px solid black">
                    </div>
                </div>
                <div class="container mt-4" style="text-align: start;">
                    @foreach ($postsPaket as $postPaket)
                        <div class="row justify-content-center">
                            <div class="col-12 d-flex justify-content-center">
                                <div class="col-10 text-start">
                                    <div class="d-flex" style="justify-content: space-between">
                                        <div class="col-3 text-start">
                                            <br>
                                            <h5>{{ $postPaket->nama_paket }}</h5>
                                            {{ $postPaket->keterangan_paket }}
                                        </div>
                                        <div class="col-6 text-end">
                                            <h5>
                                                <hr style="border-top:3px dashed #ffc107">
                                            </h5>
                                        </div>
                                        <div class="col-3 text-end">
                                            <h5>
                                                <span class="badge bg-warning p-3 m-2"
                                                    style="border-radius:20px ">{{ 'Rp ' . number_format($postPaket->harga_paket, 2) }}</span>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    <!-- tampilan capster -->
    <div class="container">
        <div class="text-center mt-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-5 text-center mt-5">
                        <hr style="background-color: black">
                    </div>
                    <div class="col-2 text-center mt-5">
                        <h3>Capster</h3>
                    </div>
                    <div class="col-5 text-center mt-5">
                        <hr style="border-top:1px solid black">
                    </div>
                </div>
                <div class="container mt-4">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @foreach ($postsCapster as $pc)
                            <div class="col">
                                <div class="card mt-5">
                                    <img src="{{ asset('storage/admin/KelolaDataKaryawan/' . $pc->foto) }}"
                                        class="card-img-top" style="height: 20rem; object-fit: cover" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a class="link" style="color: black; text-decoration: none;"
                                                href="desCapster/{{ $pc->id }}">
                                                {{ $pc->nama_karyawan }}
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- tampilan galeri -->
    <div class="container">
        <div class="text-center mt-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-5 text-center mt-5">
                        <hr style="background-color: black">
                    </div>
                    <div class="col-2 text-center mt-5">
                        <h3>Galeri</h3>
                    </div>
                    <div class="col-5 text-center mt-5">
                        <hr style="border-top:1px solid black">
                    </div>
                </div>
                <div class="container mt-5">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @foreach ($galeri as $g)
                            <div class="col">
                                <div class="card ">
                                    <img src="{{ asset('storage/admin/KelolaGaleri/' . $g->gambar_gaya) }}"
                                        class="card-img-top" style="height: 20rem; object-fit: cover" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $g->nama_gaya }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- tampilan lokasi dan kritik saran -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm">
                <div class="text-center mt-5">
                    <div class="container-fluid">
                        <div class="text-center">
                            <h3>Lokasi</h3>
                            <!-- <h5>Jl.Paus No 22B, Pekanbaru</h5> -->
                        </div>
                        <div class="container mt-4">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6644179028103!2d101.43612997412384!3d0.5032516637138105!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5aeb3cf181953%3A0xb3bc81166c3e723c!2sZe%20Classic%20Barber%20Shop!5e0!3m2!1sen!2sid!4v1691674064989!5m2!1sen!2sid"
                                width="100%" max-width="600" height="450" style="border:0;" allowfullscreen=""
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="text-center mt-5">
                    <h3>Kritik & Saran</h3>
                </div>
                <div class="container mt-3" id="kritiksaran">
                    @if (Session::has('success'))
                        <div>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong> {{ Session::get('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                    <form action="/inputkritiksaran" method="POST">
                        @csrf
                        <!-- form email -->
                        <div>
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Masukkan email"
                                name="email" required>
                        </div>
                        <!-- form kritik -->
                        <div>
                            <label for="Kritik" class="form-label">Kritik</label>
                            <input type="text" class="form-control" id="Kritik" placeholder="Masukkan kritik"
                                name="kritik" required>
                        </div>

                        <!-- form saran -->
                        <div>
                            <label for="Saran" class="form-label">Saran</label>
                            <input type="text" class="form-control" id="Saran" placeholder="Masukkan saran"
                                name="saran" required>
                        </div>
                        <div style="display: flex;justify-content: end;">
                            <button type=" submit" class="btn btn-primary mt-3">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>

    <!-- tampilan testimoni -->
    <div class="text-center mt-5">
        <div class="container-fluid">

            <div class="container">
                <div class="row">
                    <div class="col-5 text-center mt-5">
                        <hr style="background-color: black">
                    </div>
                    <div class="col-2 text-center mt-5">
                        <h3>Testimoni</h3>
                    </div>
                    <div class="col-5 text-center mt-5">
                        <hr style="border-top:1px solid black">
                    </div>
                </div>
                <div class="row mt-2">

                    <div class="col-12">


                        <div style="  overflow: auto;
                        white-space: nowrap;">
                            @foreach ($kritik as $k)
                                <div class="card m-4 p-3 " style="display:inline-block; width:600px">

                                    <div>

                                        <div>
                                            <h5>{{ $k->kritik }}</h5>
                                            <p>{{ $k->saran }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="ftco-footer ftco-section img" style="padding-bottom: 15px;">
        <div class="overlay"></div>
        <div class="container mt-5">
            <div class="row mb-5">
                <div class="col-md-5">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">TENTANG KAMI</h2>
                        <p>
                            Zeclassic adalah usaha yang bergerak dibidang jasa (Barbershop). Zeclassic didirikan pada
                            tahun 2017.
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ftco-footer-widget mb-4 ml-md-4">
                        <h2 class="ftco-heading-2">TAUTAN LANGSUNG</h2>
                        <ul class="list-unstyled">
                            {{-- <li><a href="#" class="py-2 d-block" style="color: black;">Perusahaan</a></li>
                            <li><a href="#" class="py-2 d-block" style="color: black;">Tren Rambut</a></li>
                            <li><a href="#" class="py-2 d-block" style="color: black;">FAQ</a></li> --}}
                            <li><a href="#" class="py-2 d-block" style="color: black;">Hubungi Kami</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">PUNYA PERTANYAAN?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">Jl. Paus
                                        No.18,Wonorejo, Kec. Marpoyan Damai, Kota Pekanbaru, Riau 28282</span></li>
                                {{-- <li><a href="#" style="color: black;"><span class="icon icon-whatsapp"></span><span class="text">+62 822...</span></a></li> --}}
                                <li><a href="#" style="color: black;"><span class="icon icon-envelope"></span>
                                        <span="text">cs@Zeclassicbarbershop.co.id</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <p>
                        Copyright ©
                        <script type="text/javascript" async="" src="#"></script>
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | Barbershop Zeclassic
                    </p>
                </div>
            </div>
        </div>
        <div style="position:fixed;right:10px;bottom:10px;">
            <a href="https://wa.me/+6282235582362?text=Hallo,%20Saya%20ingin%20menanyakan%20sesuatu" target="_blank"
                style="display: table;font-family: sans-serif;text-decoration: none;margin: 1em 0.5em auto;color: #fff;font-size: 2.4em;padding: 1em 0.3em 1.3em 3em;border-radius: 2em;font-weight: bold;background: url('https://cdn-icons-png.flaticon.com/128/2504/2504957.png') no-repeat 1.5em center;background-size: 1.6em;"></a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
