<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zecllasic | User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body>
    <div class="container mt-2">
        @include('user.navbar')
    </div>

    <div class="container-md">
        <div class="container mt-3">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
            <!-- tampilan alert peringatan -->
            <div class="alert alert-secondary" role="alert">
                <h4 class="alert-heading text-center">Perhatian</h4>
                <p style="text-align: center">
                    Hallo, pada formulir pemesanan ini anda dapat melakukan pemesanan cukur rambut di barbershop
                    zeclassic,
                    anda dapat memilih layanan, paket, waktu dan memilih siapa tukang cukur yang anda inginkan.
                    Silahkan melakukan pembayaran untuk melakukan pemesanan cukur rambut di barbershop zeclassic.
                    Untuk informasi lebih lengkap atau ada pertanyaan silahkan hubungi kami melalui whatsApp yang
                    tersedia.
                </p>
            </div>
        </div>
        <!--  -->
        <div class="container mt-4">
            <div class="text-center">
                <h4>Form Pemesanan</h4>
            </div>
            <!--  -->
            <form action="/KelolaPesanan" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- -->
                {{-- <div class="mb-3">
                    <div class="mb-2">
                        <label for="layanan" class="form-label">Layanan</label>
                        <select name="layanan_pesan" class="form-control" id="layanan">
                            <option value="" selected hidden disabled>Pilih Layanan</option>

                            @foreach ($layanans as $lay)
                                <option value="{{ $lay->nama_layanan }}">{{ $lay->nama_layanan }}</option>
                            @endforeach

                        </select>

                    </div>
                </div> --}}

                <!--  -->
                <div class="mb-3">
                    <div class="mb-2">
                        <label for="gayaPotongan" class="form-label">Paket</label>

                        <select class="form-control" onchange="gantiHarga(this.value)" name="gayapotongan_pesan">
                            <option selected hidden disabled>Pilih Paket</option>

                            @foreach ($pakets as $pak)
                                <option value="{{ $pak->nama_paket }}">{{ $pak->nama_paket }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="mb-3">
                    <div class="mb-2">
                        <label for="kode_promo" class="form-label">Kode Promo</label>

                        <input type="text" name="kode_promo" onkeyup="addpromo(this.value)" class="form-control"
                            id="kode_promo">

                        <span id="spanDiskon">*masukan kode diskon jika ada</span>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="mb-2">
                        <label for="total_harga" class="form-label">Total</label>
                        <input type="number" name="total_harga" class="form-control" id="total_harga" readonly>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="mb-2">
                        <label for="jasaCukur" class="form-label">Pilih Capster</label>
                        <select name="jasacukur_pesan"
                            class="form-control @error('jasacukur_pesan') is-invalid @enderror" id="jasaCukur">
                            <option value="" selected hidden disabled>Pilih Capster</option>
                            @foreach ($karyawan as $kar)
                                <option value="{{ $kar->nama_karyawan }}">{{ $kar->nama_karyawan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!--  -->
                <div class="mb-3 mt-3">
                    <div class="row">
                        <div class="col-6">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" name="tanggal_pesan" onchange="CariJadwal(this.value)"
                                class="form-control @error('tanggal_pesan') is-invalid @enderror" id="tanggal"
                                placeholder="+62">
                        </div>
                        <div class="col-6">
                            <label for="waktu" name="waktu_pesan" class="form-label">Waktu</label>
                            <select class="form-control" id="waktu" name="waktu_pesan">
                                {{-- <option value="10:00">10:00</option>
                                <option value="11:00">11:00</option>
                                <option value="12:00">12:00</option>
                                <option value="13:00">13:00</option>
                                <option value="14:00">14:00</option>
                                <option value="15:00">15:00</option>
                                <option value="16:00">16:00</option>
                                <option value="17:00">17:00</option>
                                <option value="19:00">19:00</option>
                                <option value="20:00">20:00</option>
                                <option value="21:00">21:00</option> --}}
                            </select>

                        </div>
                    </div>
                </div>

                <!--  -->

                <div class="mb-3">
                    <div class="mb-2">

                        <div class="card">
                            <div class="card-header">Syarat dan Ketentuan</div>
                            <div class="card-body p-4">
                                <ul>
                                    <li>Jika capster yang kamu pilih tiba-tiba tidak bisa hadir atau berhalangan. kamu
                                        berhak memilih untuk memindahkan jadwal atau meminta uang kembali.</li>
                                    <li>Jika pesanan dibatalkan kamu</li>

                                </ul>

                            </div>

                        </div>
                    </div>
                </div>
                {{-- <div class="mb-3">
                    <div class="mb-2">
                        <label for="metodePembayaran" class="form-label">Pilih Metode Pembayaran</label>
                        <select name="metode_pembayaran" onchange="pembayaran(this.value)"
                            class="form-control @error('metode_pembayaran') is-invalid @enderror" id="metodePembayaran">
                            <option value="" selected hidden disabled>Pilih Metode</option>
                            <option value="Cash">Cash</option>
                            <option value="Bank">Bank</option>
                            <option value="QRIS">QRIS</option>

                        </select>
                    </div>
                </div> --}}




                {{-- <div class="mb-3" id="bank" style="display: none">
                        <div class="mb-2">
                            <div class="card p-4">
                                <div class="row align-items-center">
                                    <div class="col-2"><b>Ketentuan Transfer</b></div>
                                    <div class="col-10">Laborum occaecat magna eiusmod aliqua dolor duis ea ex eu
                                        fugiat amet excepteur minim. Dolor eu nisi
                                        velit eu mollit nisi pariatur in laborum laboris. Cillum enim voluptate id ipsum
                                        duis veniam sint
                                        laboris ex aute ea. Aute elit exercitation anim aliquip quis velit veniam labore
                                        sint et
                                        reprehenderit. Laboris qui id nostrud officia duis et ut qui laborum est esse
                                        cupidatat. Id in quis
                                        et consectetur ex dolor ea consequat culpa pariatur. Magna excepteur aliquip non
                                        voluptate labore
                                        culpa duis sit ex labore laboris commodo.</div>
                                </div>

                            </div>
                        </div>
                    </div> --}}

                <!-- bukti pembayaran -->
                <div id="metode">

                    <div class="mb-3" id="qris">
                        <div class="mb-2">
                            <div class="card p-4">
                                <div class="row align-items-center" style="flex-direction: column;">
                                    <div class="col-5" style="text-align: center"><b>Scan Barcode</b></div>
                                    <div class="col-5 d-flex justify-content-center" style=""><img
                                            src="{{ asset('assets/img/qris.png') }}" width="400px"> </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="buktiPembayaran" class="form-label">Bukti Pembayaran</label>
                        <input type="file" name="buktipembayaran_pesan"
                            class="form-control @error('buktipembayaran_pesan') is-invalid @enderror"
                            id="buktiPembayaran" name="buktiPembayaran" required>
                    </div>

                </div>
                <!-- note pesan booking -->
                <div class="mb-3">
                    <label for="tinggalkanPesan" class="form-label">Tinggalkan Pesan</label>
                    <textarea name="isipesan_pesan" class="form-control @error('isipesan_pesan') is-invalid @enderror"
                        id="tinggalkanPesan" rows="3"></textarea>
                </div>
                {{-- button --}}
                <div>
                    <button type="submit" class="btn btn-warning mt-1">Pesan </button>
                </div>
            </form>
        </div>
    </div>

    <footer>
        <div class="main-footer">
            <hr>
            <p class="text-center">&copy; 2023 ZECLASSIC. All rights reserved.</p>
        </div>
    </footer>



    <script type="text/javascript">
        $(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            // alert(maxDate);
            $('#tanggal').attr('min', maxDate);
        });
    </script>

    <script>
        var totalSemua = 0;
        var select = document.getElementById('waktu');
        var capster = document.getElementById('jasaCukur');

        const pesananArray = [
            @foreach ($pesanan as $pes)
                {
                    capster: '{{ $pes->jasacukur_pesan }}',
                    tanggal: '{{ $pes->tanggal_pesan }}',
                    waktu: '{{ $pes->waktu_pesan }}',

                },
            @endforeach
        ];

        function CariJadwal(tanggal) {

            $("#waktu").empty();
            for (let i = 9; i < 22; i++) {
                var opt = document.createElement('option');
                opt.value = i + ':00';
                opt.innerHTML = i + ':00';
                cariJadwal = pesananArray.find((a) => a.capster === capster.value && a.tanggal === tanggal);
                if (cariJadwal) {
                    if (cariJadwal.waktu == (i + ':00') && cariJadwal.tanggal == tanggal) {

                    } else {
                        select.appendChild(opt);
                    }
                } else {
                    select.appendChild(opt);

                }
            }
        };

        const promoArray = [
            @foreach ($promo as $pro)
                {
                    kode: '{{ $pro->kode_promo }}',
                    diskon: {{ $pro->diskon }}
                },
            @endforeach
        ];

        function addpromo(kode) {
            var total_harga = document.getElementById('total_harga');
            var spanDiskon = document.getElementById('spanDiskon');

            cariPromo = promoArray.find((a) => a.kode === kode);



            if (cariPromo) {
                var potongan = totalSemua * (cariPromo.diskon / 100);
                total_harga.value = totalSemua - potongan;
                spanDiskon.style.color = '#28a745';
                spanDiskon.innerHTML = "Anda Mendapatkan potongan Rp." + potongan;

            } else {
                total_harga.value = totalSemua;
                spanDiskon.style.color = '#dc3545';
                spanDiskon.innerHTML = "Promo tidak ditemukan";
            }
        }

        function gantiHarga(paket) {

            var total_harga = document.getElementById('total_harga');
            @foreach ($pakets as $p)
                if (paket == "{{ $p->nama_paket }}") {
                    total_harga.value = {{ $p->harga_paket }};
                    totalSemua = {{ $p->harga_paket }};
                };
            @endforeach

        }

        function pembayaran(metode) {
            var buktiShow = document.getElementById('metode');
            var bankShow = document.getElementById('bank');
            var qrisShow = document.getElementById('qris');

            var inputBukti = document.getElementById('buktiPembayaran');

            if (metode == "Bank") {
                buktiShow.style.display = "block";
                bankShow.style.display = "block";
                qrisShow.style.display = "none"
                inputBukti.required = true;

            } else if (metode == "QRIS") {
                buktiShow.style.display = "block";
                bankShow.style.display = "none";
                qrisShow.style.display = "block"
                inputBukti.required = true;

            } else {
                buktiShow.style.display = "none";
                bankShow.style.display = "none";
                qrisShow.style.display = "none"
                inputBukti.required = false;

            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
