<?php

use App\Http\Controllers\GaleriPengunjungController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KelolaGaleriController;
use App\Http\Controllers\LaporantransaksiController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\TransaksiController;
use App\Models\GaleriCapster;
use App\Models\GaleriLogbook;
use App\Models\GaleriPengunjung;
use App\Models\Karyawan;
use App\Models\KritikSaran;
use App\Models\Layanan;
use App\Models\Pelanggan;
use App\Models\Pesan;
use App\Models\Pesanan;
use App\Models\Promo;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// 
Route::get('/riwayatTransaksi', [PesananController::class, 'indexTransaksi']);
Route::get('/riwayatKonfirmasi', [PesananController::class, 'indexKonfirmasi']);
Route::get('/riwayatSelesai', [PesananController::class, 'indexSelesai']);
//admin layout


Route::group(['middleware' => 'auth'], function () {

    //Route Admin
    Route::get('/masterAdmin', function () {
        $pesanan = Pesanan::count();
        $transaksi = transaksi::count();
        $pelanggan = Pelanggan::count();
        $karyawan = Karyawan::count();

        $promo = Promo::all()->take(2);

        $pesananData = Pesanan::get();
        $transaksiData = transaksi::get();
        $pelangganData = Pelanggan::get();
        $karyawanData = Karyawan::get();

        $jadwal = Pesanan::whereDate('created_at',Carbon\Carbon::now())->where('status_pesan','Konfirmasi')->get();
        $pesananDataCaps = Pesanan::select('jasacukur_pesan', DB::raw('COUNT(*) as total'))
        ->where('status_pesan', "Konfirmasi")
        ->groupBy('jasacukur_pesan')
        ->get();

        return view('admin.masterAdmin', [
            'pesanan' => $pesanan,
            'transaksi' => $transaksi,
            'pelanggan' => $pelanggan,
            'karyawan' => $karyawan,
            'pesananData' => $pesananData,
            'transaksiData' => $transaksiData,
            'pelangganData' => $pelangganData,
            'karyawanData' => $karyawanData,
            'promo' => $promo,
            'jadwal' => $jadwal,
            'pesananDataCaps' => $pesananDataCaps
        ]);
    });
    // 
    Route::get('/KelolaAkun', function () {
        return view('admin.KelolaAkun');
    });

    // index kelola transaksi
    Route::get('/KelolaTransaksi', [TransaksiController::class, 'index']);
    // store kelola transaksi
    Route::post('/KelolaTransaksi', [TransaksiController::class, 'store']);
    Route::post('/KelolaTransaksi/search', [TransaksiController::class, 'search']);

    // destroy data kelola transaksi
    Route::get('/KelolaTransaksi/{id}', [TransaksiController::class, 'destroy']);


    // Route::get('/KelolaPesanan', function () {
    //     return view('admin.KelolaPesanan');
    // });
    // index kelola pesanan admin
    Route::get('/KelolaPesanan', [PesananController::class, 'index']);
    // store kelola pesanan user
    Route::post('/KelolaPesanan', [PesananController::class, 'storePesanUser']);

    // Ganti Capster
    Route::post('/KelolaPesanan/GantiCapster', [PesananController::class, 'updateCapster']);

    // konfirmasi status 
    Route::get('/KelolaPesanan/{id}', [PesananController::class, 'konfirmasiStatus']);
    Route::get('/KelolaPesanan/{id}/selesai', [PesananController::class, 'selesaiStatus']);
    Route::get('/KelolaPesanan/{id}/batalkan', [PesananController::class, 'batalStatus']);





    // index KelolaDataPelanggan
    Route::get('/KelolaDataPelanggan', [PelangganController::class, 'index']);
    // store KelolaDataPelanggan
    Route::post('/KelolaDataPelanggan', [PelangganController::class, 'store']);
    // index edit Kelola Data Pelanggan
    Route::get('/KelolaEditDataPelanggan/{id}', [PelangganController::class, 'edit']);
    // edit Kelola Data Pelanggan 
    Route::post('/KelolaEditDataPelanggan', [PelangganController::class, 'update']);
    // delete kelola data pelanggan
    Route::get('/KelolaDataPelanggan/{id}', [PelangganController::class, 'destroy']);


    // index KelolaDataKaryawan
    Route::get('/KelolaDataKaryawan', [KaryawanController::class, 'index']);
    // store KelolaDataKaryawan
    Route::post('/KelolaDataKaryawan', [KaryawanController::class, 'store']);
    // index edit kelola data karyawan
    Route::get('/KelolaEditDataKaryawan/{id}', [KaryawanController::class, 'edit']);
    // edit update kelola data karyawan
    Route::post('/KelolaEditDataKaryawan', [KaryawanController::class, 'update']);
    // delete kelola data karyawan
    Route::get('/KelolaDataKaryawan/{id}', [KaryawanController::class, 'destroy']);

    // index KelolaLayananPaket
    Route::get('/KelolaLayananPaket', [LayananController::class, 'index']);
    // store layanan
    Route::post('/KelolaLayanan', [LayananController::class, 'storeLayanan']);
    // index edit kelola layanan
    Route::get('/KelolaEditLayanan/{id}', [LayananController::class, 'editLayanan']);
    // edit kelola data layanan
    Route::post('/KelolaEditLayanan', [LayananController::class, 'updateLayanan']);
    // delete kelola data layanan
    Route::get('/KelolaLayanan/{id}', [LayananController::class, 'destroyLayanan']);

    // store paket
    Route::post('/KelolaLayananPaket', [LayananController::class, 'storePaket']);
    // index edit kelola paket 
    Route::get('/KelolaEditPaket/{id}', [LayananController::class, 'editPaket']);
    // edit kelola data paket
    Route::post('/KelolaEditPaket', [LayananController::class, 'updatePaket']);
    // delete kelola data paket
    Route::get('/KelolaPaket/{id}', [LayananController::class, 'destroyPaket']);


    // index kelola data galeri
    Route::get('/KelolaGaleri', [KelolaGaleriController::class, 'index']);

    // store kelola data galeri pengunjung
    Route::post('/KelolaGaleriPengunjung', [KelolaGaleriController::class, 'storeGaleriPengunjung']);
    // index edit kelola data galeri pengunjung
    Route::get('/KelolaEditGaleriPengunjung/{id}', [KelolaGaleriController::class, 'editPengunjung']);
    // edit kelola data galeri pengunjung
    Route::post('/KelolaEditGaleriPengunjung', [KelolaGaleriController::class, 'updatePengunjung']);
    // hapus kelola data galeri pengunjung
    Route::get('/KelolaGaleriPengunjung/{id}', [KelolaGaleriController::class, 'destroyPengunjung']);

    // store kelola data galeri capster
    Route::post('/KelolaGaleriCapster', [KelolaGaleriController::class, 'storeGaleriCapster']);
    // index edit kelola data galeri capster
    Route::get('/KelolaEditGaleriCapster/{id}', [KelolaGaleriController::class, 'editCapster']);
    // edit kelola data galeri capster
    Route::post('/KelolaEditGaleriCapster', [KelolaGaleriController::class, 'updateCapster']);
    // hapus kelola data galeri pengunjung
    Route::get('/KelolaGaleriCapster/{id}', [KelolaGaleriController::class, 'destroyCapster']);

    // store kelola data galeri logbook
    Route::post('/KelolaGaleriLogbook', [KelolaGaleriController::class, 'storeGaleriLogbook']);
    // index edit kelola data galeri logbook
    Route::get('/KelolaEditGaleriLogbook/{id}', [KelolaGaleriController::class, 'editLogbook']);
    // edit kelola data galeri logbook
    Route::post('/KelolaEditGaleriLogbook', [KelolaGaleriController::class, 'updateLogbook']);
    // hapus kelola data galeri logbook
    Route::get('/KelolaGaleriLogbook/{id}', [KelolaGaleriController::class, 'destroyLogbook']);

    // index KelolaLaporanTransaksi
    Route::get('/KelolaLaporanTransaksi', [LaporantransaksiController::class, 'index']);
    // store KelolaLaporanTransaksi
    Route::post('/KelolaLaporanTransaksi', [LaporantransaksiController::class, 'store']);
    Route::post('/KelolaLaporanTransaksi/search', [LaporantransaksiController::class, 'search']);

    Route::get('/KelolaLaporanTransaksi/{id}/laporan', [LaporantransaksiController::class, 'transaksiPdf']);

    // index promo
    Route::get('/KelolaPromo', [PromoController::class, 'index']);
    // store promo
    Route::post('/KelolaPromo', [PromoController::class, 'store']);
    // index edit kelola data promo
    Route::get('/KelolaEditPromo/{id}', [PromoController::class, 'edit']);
    // edit update kelola data promo
    Route::post('/KelolaEditPromo', [PromoController::class, 'update']);
    // delete kelola data promo
    Route::get('/KelolaPromo/{id}', [PromoController::class, 'destroy']);

    // 
    Route::get('/KelolaTestimoni', function () {

        $testi = KritikSaran::paginate(10);

        return view('admin.KelolaTestimoni', [
            'testi' => $testi,
        ]);
    });
    Route::get('/KelolaTestimoni/{id}', function ($id) {

        $kritik = KritikSaran::findOrFail($id);
        $kritik->delete();
        if ($kritik) {
            //redirect dengan pesan sukses
            return redirect()->back();
        } else {
            //redirect dengan pesan error
            return redirect()->back();
        }
    });
    // 
    Route::get('/KelolaProfil', function () {
        $user = User::where('id', Auth::user()->id)->get();

        return view('admin.KelolaProfil', [
            'user' => $user,
        ]);
    });
});
// Route login & register
// login
Route::get('/login', [LoginController::class, 'index'])->name('login');
// controller login
Route::post('/loginAuth', [LoginController::class, 'actionlogin']);
// controller logOut
Route::get('/logOutAuth', [LoginController::class, 'actionlogout']);

Route::get('/daftarUser', [PelangganController::class, 'indexDaftar']);


// input data daftar / store
Route::post('/daftar', [PelangganController::class, 'store']);
Route::post('/inputkritiksaran', [PelangganController::class, 'inputKritikSaran']);


//Route User 
// 
Route::get('/', function () {
    $postsCapster = Karyawan::all()->take(3);
    $kritik = KritikSaran::get();
    $galeri = GaleriPengunjung::all()->take(3);
    $postsPaket = DB::table('pakets')->get();
    $postsLayanan = DB::table('layanans')->get();
    return view('user.masterUser', [
        'postsPaket' => $postsPaket,
        'kritik' => $kritik,
        'galeri' => $galeri,
        'postsLayanan' => $postsLayanan,
        'postsCapster' => $postsCapster

    ]);
});
// 
Route::get('/profilUser', function () {
    $user = User::where('id', Auth::user()->id)->get();

    return view('user.profilUser', [
        'user' => $user,

    ]);
});

Route::post('/profilUser/update', [LoginController::class, 'update']);

// 

// 
Route::get('/galeri', function () {
    return view('user.galeri');
});
// 
Route::get('/galeriPengunjung', function () {
    $galPeng = GaleriPengunjung::paginate(3);
    return view('user.galeriPengunjung', [
        'galPeng' => $galPeng,

    ]);
});
// 
Route::get('/galeriLogbook', function () {
    $galLog = GaleriLogbook::paginate(3);
    return view('user.galeriLogbook', [
        'galLog' => $galLog,

    ]);
});
// 
Route::get('/galeriCapster', function () {
    $galcap = Karyawan::paginate(4);
    return view('user.galeriCapster', [
        'galcap' => $galcap,

    ]);
});
// 
Route::get('/desCapster/{id}', function ($id) {
    $capster = Karyawan::where('id', $id)->get();
    $nama = Karyawan::where('id', $id)->value('nama_karyawan');

    $galcap = GaleriCapster::where('nama_capster', $nama)->get();

    return view('user.desCapster', [
        'capster' => $capster,
        'galcap' => $galcap,


    ]);
});

// index
// Route::get('/Pesan', [PesanController::class, 'index']);
// store
// Route::post('/Pesan', [PesanController::class, 'store']);


// 
Route::get('/pesan', [PesanController::class, 'index']);

// 
Route::get('/promo', function () {
    $promo = Promo::all()->take(3);
    return view('user.promo', [
        'promo' => $promo

    ]);
});
// 
Route::get('/desPromo/{id}', function ($id) {
    $promo = Promo::where('id', $id)->get();
    return view('user.desPromo', [
        'promo' => $promo

    ]);
});
// 
Route::get('/tentang', function () {
    return view('user.tentang');
});
