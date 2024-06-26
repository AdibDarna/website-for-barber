<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Karyawan;
use App\Models\laporantransaksi;
use App\Models\Layanan;
use App\Models\Paket;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksis = transaksi::latest()->paginate(10);
        $layanans = Layanan::get();
        $pakets = Paket::get();
        $karyawan = Karyawan::get();


        return view('admin.KelolaTransaksi', compact('transaksis', 'layanans', 'pakets', 'karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.KelolaTransaksi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $keloladatatransaksi = transaksi::create([
            'nama_transaksi' => $request->nama_transaksi,
            'email_transaksi' => $request->email_transaksi,
            'waktu_transaksi' => $request->waktu_transaksi,
            'notelepon_transaksi' => $request->notelepon_transaksi,
            'jasacukur_transaksi' => $request->jasacukur_transaksi,
            // 'layanan_transaksi' => $request->layanan_transaksi,
            'paket_transaksi' => $request->paket_transaksi,
            'jumlahcukur_transaksi' => $request->jumlahcukur_transaksi,
            'perawatanrambut_transaksi' => $request->perawatanrambut_transaksi,
            'jumlahperawatanrambut_transaksi' => $request->jumlahperawatanrambut_transaksi,
            'nominalperawatanrambut_transaksi' => $request->nominalperawatanrambut_transaksi,
            'minumankulkas_transaksi' => $request->minumankulkas_transaksi,
            'jumlahminumankulkas_transaksi' => $request->jumlahminumankulkas_transaksi,
            'nominalminumankulkas_transaksi' => $request->nominalminumankulkas_transaksi
        ]);

        if ($keloladatatransaksi) {
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function search(Request $request){
        $transaksis = transaksi::whereDate('created_at',$request->tanggal)->paginate(10);
        $layanans = Layanan::get();
        $pakets = Paket::get();
        $karyawan = Karyawan::get();
        $q = $request->tanggal;


        return view('admin.KelolaTransaksi', compact('transaksis', 'layanans', 'pakets', 'karyawan'));
    }

    

    /**
     * Display the specified resource.
     */
    public function show(transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transaksis = transaksi::findOrFail($id);
        $transaksis->delete();

        if ($transaksis) {
            //redirect dengan pesan sukses
            return redirect()->back();
        } else {
            //redirect dengan pesan error
            return redirect()->back();
        }
    }
}
