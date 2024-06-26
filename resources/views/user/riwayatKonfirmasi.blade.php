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
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" style="color:black;" aria-current="page" href="profilUser">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Riwayat Transaksi</a>
                </li>
            </ul>
        </div>
        <div class="container">
            <ul class="nav justify-content-center">
                <li class="nav-item ">
                    <a class="nav-link" aria-current="page" href="/riwayatTransaksi">Pesanan</a>
                </li>
                <li class="nav-item nav-underline">
                    <a class="nav-link active" href="/riwayatKonfirmasi">Konfirmasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/riwayatSelesai">Selesai</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">Riwayat</a>
                </li> --}}
            </ul>
            <div class="container">
                <div class="mt-3">
                    <div class="table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>No Telepon</th>
                                    <th>Layanan</th>
                                    <th>Paket</th>
                                    <th>Tanggal</th>
                                    <th>Waktu</th>
                                    <th>Jasa Cukur</th>
                                    <th>Pesan</th>
                                    <th>Total Transaksi</th>
                             
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pesanans as $pesanan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    {{-- <td>{{ $pesanan->id }}</td> --}}
                                    <td>{{ $pesanan->namalengkap_pesan }}</td>
                                    <td>{{ $pesanan->email_pesan }}</td>
                                    <td>{{ $pesanan->notel_pesan }}</td>
                                    <td>{{ $pesanan->layanan_pesan }}</td>
                                    <td>{{ $pesanan->gayapotongan_pesan }}</td>
                                    <td>{{ $pesanan->tanggal_pesan }}</td>
                                    <td>{{ $pesanan->waktu_pesan }}</td>
                                    <td>{{ $pesanan->jasacukur_pesan }}</td>
                                    <td>{{ $pesanan->isipesan_pesan }}</td>
                                    <td>{{"Rp ".number_format($pesanan->total_harga, 2) }} </td>
                               
                                </tr>
                                @endforeach
                            </tbody>
                        </table>                                    
                        <div>{{ $pesanans->links() }}</div>
                        <!-- end -->
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
