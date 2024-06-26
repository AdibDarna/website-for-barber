<html>
    <head>
   
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ZECLASSIC | Admin</title>
<style>
    table{
        /* border: 1px solid black */
    }
    th, td{
        padding: auto;
        font-size: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
</style>
    </head>
    <body style="  width:100%">
        <div style="padding: 20px; text-align:center" ><b > Zeclassic Barbershop</b></div>
        <div style="padding-bottom: 40px; text-align:center"><b > Jl. Paus No.18, Wonorejo, Kec. Marpoyan Damai, Kota Pekanbaru, Riau 28282</b></div>
        <table  >
            <tr>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Email</th>
                <th>Layanan</th>
                <th>Paket</th>
                <th>Biaya Cukur</th>

                <th>Produk Rambut</th>
                <th>Jumlah</th>
                <th>Nominal Produk</th>

                <th>Minuman</th>
                <th>Jumlah</th>
                <th>Nominal Produk</th>

                <th>Total</th>

            </tr>
            @php
                $total = 0;
            @endphp
            @foreach ($transaksi as $t)
                
           
            <tr>
                <td>{{$t->created_at->format('Y-m-d')}}</td>
                <td>{{$t->waktu_transaksi}}</td>
                <td>{{$t->email_transaksi}}</td>
                <td>{{$t->layanan_transaksi}}</td>
                <td>{{$t->paket_transaksi}}</td>
                <td>Rp. {{number_format($t->jumlahcukur_transaksi,2)}}</td>

                <td>{{$t->perawatanrambut_transaksi}}</td>
                <td>{{$t->jumlahperawatanrambut_transaksi}}</td>
                <td>Rp. {{number_format($t->nominalperawatanrambut_transaksi,2) }}</td>
                
                <td>{{$t->minumankulkas_transaksi}}</td>
                <td>{{$t->jumlahminumankulkas_transaksi}}</td>
                <td>Rp. {{number_format($t->nominalminumankulkas_transaksi, 2) }}</td>

                <td>Rp. {{number_format($t->jumlahcukur_transaksi+$t->nominalperawatanrambut_transaksi+$t->nominalminumankulkas_transaksi, 2) }}</td>


                @php
                    $total+=$t->jumlahcukur_transaksi+$t->nominalperawatanrambut_transaksi+$t->nominalminumankulkas_transaksi;
                @endphp
            </tr>
            @endforeach
            <tr>
                <td colspan="12">Total Keseluruhan</td>
                <td>Rp. {{number_format($total,2)}}</td>
            </tr>
        </table>
    
    </body>
</html>