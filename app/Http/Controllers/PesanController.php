<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Layanan;
use App\Models\Paket;
use App\Models\Pesan;
use App\Models\Pesanan;
use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
    
            $pakets = Paket::latest()->get();
            $karyawan = Karyawan::latest()->get();
            $promo = Promo::get();
            $pesanan = Pesanan::get();

            $layanans = Layanan::latest()->get();

            return view('user.pesan', compact('pesanan','promo','pakets','layanans','karyawan'));
        } else {
            return redirect('/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.pesan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'namalengkap_pesan' => 'required',
            'email_pesan' => 'required',
            'notel_pesan' => 'required',
            // 'layanan_pesan' => 'required',
            'gayapotongan_pesan' => 'required',
            'waktu_pesan' => 'required',
            'jasacukur_pesan' => 'required',
            'buktipembayaran_pesan' => 'required',
            'pesan_pesan' => 'required'
        ]);

        $keloladatapesan = Pesan::create([
            'namalengkap_pesan' => $request->namalengkap_pesan,
            'email_pesan' => $request->email_pesan,
            'notel_pesan' => $request->notel_pesan,
            // 'layanan_pesan' => $request->layanan_pesan,
            'gayapotongan_pesan' => $request->gayapotongan_pesan,
            'waktu_pesan' => $request->waktu_pesan,
            'jasacukur_pesan' => $request->jasacukur_pesan,
            'buktipembayaran_pesan' => $request->buktipembayaran_pesan,
            'pesan_pesan' => $request->pesan_pesan
        ]);

        if ($keloladatapesan) {
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
