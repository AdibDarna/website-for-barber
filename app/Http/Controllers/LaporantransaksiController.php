<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\PDF;
use App\Models\laporantransaksi;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LaporantransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tanggal = transaksi::select(DB::raw("DATE(created_at) as tanggal"))->groupBy("tanggal")->get();
        $laporantransaksis = laporantransaksi::latest()->paginate(10);
        return view('admin.KelolaLaporanTransaksi',compact('laporantransaksis','tanggal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.KelolaLaporanTransaksi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
       
            'jenislaporan_laporan' => 'required',
            'mulai_laporan' => 'required',
            'sampai_laporan' => 'required'
        ]);

        $kelolalaporantransaksi = laporantransaksi::create([
            'namaadmin_laporan' => Auth::user()->name,
            'jenislaporan_laporan' => $request->jenislaporan_laporan,
            'mulai_laporan' => $request->mulai_laporan,
            'sampai_laporan' => $request->sampai_laporan
        ]);

        if($kelolalaporantransaksi){
            return redirect()->back();
        }else{
            return redirect()->back();
        }

    }

    function transaksiPdf($id)
    {
        $lap = laporantransaksi::where('id', $id)->get();

        $mulai = "";
        $sampai = "";

        foreach ($lap as $l) {
            $transaksi = transaksi::whereBetween('created_at', [$l->mulai_laporan, $l->sampai_laporan])->get();
            $mulai = $l->mulai_laporan;
            $sampai = $l->sampai_laporan;
        }
// dd($transaksi);
        $pdf = PDF::loadView('admin.pdf', [
            "transaksi" => $transaksi
        ]);
        return $pdf->download('laporan-'.$mulai.'-'.$sampai.'-zeclassics.pdf');
    // return view('admin.pdf',['transaksi'=>$transaksi]);
    }

    public function search(Request $request){
        $tanggal = transaksi::select(DB::raw("DATE(created_at) as tanggal"))->groupBy("tanggal")->get();
        $laporantransaksis = laporantransaksi::orWhere('mulai_laporan',$request->tanggal)->orWhere('sampai_laporan',$request->tanggal)->paginate(10);
        return view('admin.KelolaLaporanTransaksi',compact('laporantransaksis','tanggal'));
    }
    /**
     * Display the specified resource.
     */
    public function show(laporantransaksi $laporantransaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(laporantransaksi $laporantransaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, laporantransaksi $laporantransaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(laporantransaksi $laporantransaksi)
    {
        //
    }
}
