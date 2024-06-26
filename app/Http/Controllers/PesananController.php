<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Pesanan;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert; // Import facade SweetAlert

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanans = Pesanan::latest()->paginate(10);
        $capster = Karyawan::get();

        return view('admin.KelolaPesanan', compact('pesanans', 'capster'));
    }

    /**
     * Display a listing of the resource.
     */
    public function indexTransaksi()
    {
        $pesanans = Pesanan::where('id_pelanggan', Auth::user()->id)->where('status_pesan', 'Process')->paginate(10);
        return view('user.riwayatTransaksi', compact('pesanans'));
    }
    public function indexKonfirmasi()
    {
        $pesanans = Pesanan::where('id_pelanggan', Auth::user()->id)->where('status_pesan', 'Konfirmasi')->paginate(10);
        return view('user.riwayatKonfirmasi', compact('pesanans'));
    }
    public function indexSelesai()
    {
        $pesanans = Pesanan::where('id_pelanggan', Auth::user()->id)->where('status_pesan', 'Selesai')->paginate(10);
        return view('user.riwayatSelesai', compact('pesanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.KelolaPesanan.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function konfirmasiStatus($id)
    {
        // 
        $keloladatastatus = Pesanan::where('id', $id)->update([
            'status_pesan' => 'Konfirmasi'
        ]);

        if ($keloladatastatus) {
            return redirect('KelolaPesanan');
        } else {
            return redirect()->back();
        }
    }

    public function batalStatus($id)
    {
        // 
        $keloladatastatus = Pesanan::where('id', $id)->update([
            'status_pesan' => 'Dibatalkan'
        ]);

        if ($keloladatastatus) {
            return redirect('KelolaPesanan');
        } else {
            return redirect()->back();
        }
    }
    
    public function selesaiStatus($id)
    {
        // 
        $keloladatastatus = Pesanan::where('id', $id)->update([
            'status_pesan' => 'Selesai'
        ]);
        $pesanan = Pesanan::where('id', $id)->get();
        foreach ($pesanan as $pes) {
            transaksi::create([
                'nama_transaksi' => $pes->namalengkap_pesan,
                'email_transaksi' => $pes->email_pesan,
                'waktu_transaksi' => $pes->waktu_pesan,
                'notelepon_transaksi' => $pes->notel_pesan,
                'jasacukur_transaksi' => $pes->jasacukur_pesan,
                'layanan_transaksi' => $pes->layanan_pesan,
                'paket_transaksi' => $pes->gayapotongan_pesan,
                'jumlahcukur_transaksi' => $pes->total_harga,
                'created_at' => $pes->tanggal_pesan,

            ]);
        }

        if ($keloladatastatus) {
            return redirect('KelolaPesanan');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storePesanUser(Request $request)
    {
        // 
        if (Auth::check()) {
            if (Auth::user()->role == "pelanggan") {
                $this->validate($request, [
                    // 'namalengkap_pesan' => 'required',
                    // 'email_pesan' => 'required',
                    // 'notel_pesan' => 'required',
                    'layanan_pesan' => 'required',
                    'gayapotongan_pesan' => 'required',
                    'tanggal_pesan' => 'required',
                    'waktu_pesan' => 'required',
                    'jasacukur_pesan' => 'required',
                    // 'buktipembayaran_pesan' => 'required|image|mimes:png,jpg,jpeg',
                    'isipesan_pesan' => 'required'
                ]);

                if ($request->has('buktipembayaran_pesan')) {
                    // upload image
                    $buktipembayaran_pesan = $request->file('buktipembayaran_pesan');
                    $buktipembayaran_pesan->storeAs('public/dist/KelolaPesanan', $buktipembayaran_pesan->hashName());

                    $keloladatapesanan = Pesanan::create([
                        'id_pelanggan' => Auth::user()->id,
                        'namalengkap_pesan' => Auth::user()->name,
                        'email_pesan' => Auth::user()->email,
                        'notel_pesan' => Auth::user()->notel,
                        'layanan_pesan' => $request->layanan_pesan,
                        'gayapotongan_pesan' => $request->gayapotongan_pesan,
                        'tanggal_pesan' => $request->tanggal_pesan,
                        'waktu_pesan' => $request->waktu_pesan,
                        'jasacukur_pesan' => $request->jasacukur_pesan,

                        'total_harga' => $request->total_harga,
                        'buktipembayaran_pesan' => $buktipembayaran_pesan->hashName(),
                        'isipesan_pesan' => $request->isipesan_pesan,
                        'status_pesan' => 'Process'
                    ]);
                } else {
                    $keloladatapesanan = Pesanan::create([
                        'id_pelanggan' => Auth::user()->id,
                        'namalengkap_pesan' => Auth::user()->name,
                        'email_pesan' => Auth::user()->email,
                        'notel_pesan' => Auth::user()->notel,
                        'layanan_pesan' => $request->layanan_pesan,
                        'gayapotongan_pesan' => $request->gayapotongan_pesan,
                        'tanggal_pesan' => $request->tanggal_pesan,
                        'waktu_pesan' => $request->waktu_pesan,
                        'jasacukur_pesan' => $request->jasacukur_pesan,

                        'total_harga' => $request->total_harga,
                        'isipesan_pesan' => $request->isipesan_pesan,
                        'status_pesan' => 'Process'
                    ]);
                }



                if ($keloladatapesanan) {
                    return redirect()->back()->with('success', 'Berhasil melakukan pesanan!');
                } else {
                    return redirect()->back()->with('error', 'Gagal memproses pesanan.');
                }
            } else {
                return redirect('/masterAdmin');
            }
        } else {
            return redirect('/login');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pesanan $pesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesanan $pesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */


    public function updateCapster(Request $request)
    {
        Pesanan::where('id', $request->id_pesanan)->update([
            'jasacukur_pesan' => $request->jasacukur_pesan
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesanan $pesanan)
    {
        //
    }
}
