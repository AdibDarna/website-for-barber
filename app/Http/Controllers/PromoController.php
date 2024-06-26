<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promos = promo::latest()->paginate(10);
        return view('admin.KelolaPromo', compact('promos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.KelolaPromo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_promo' => 'required',
            'masaberlaku_promo' => 'required',
            'keterangan_promo' => 'required',
            'status_promo' => 'required',
            'kode_promo' => 'required',
            'diskon' => 'required'


        ]);

        $keloladatapromo = Promo::create([
            'nama_promo' => $request->nama_promo,
            'masaberlaku_promo' => $request->masaberlaku_promo,
            'keterangan_promo' => $request->keterangan_promo,
            'status_promo' => $request->status_promo,
            'kode_promo' => $request->kode_promo,
            'diskon' => $request->diskon


        ]);

        if ($keloladatapromo) {
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Promo $promo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $promos = promo::where('id',$id)->get();
        return view('admin.KelolaEditPromo',compact('promos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'nama_promo' => 'required',
            'masaberlaku_promo' => 'required',
            'keterangan_promo' => 'required',
            'status_promo' => 'required',
            'kode_promo' => 'required',
            'diskon' => 'required'
        ]);

        $keloladatapromo = Promo::where('id',$request->id)->update([
            'nama_promo' => $request->nama_promo,
            'masaberlaku_promo' => $request->masaberlaku_promo,
            'keterangan_promo' => $request->keterangan_promo,
            'status_promo' => $request->status_promo,
            'kode_promo' => $request->kode_promo,
            'diskon' => $request->diskon
        ]);

        if ($keloladatapromo) {
            return redirect('KelolaPromo');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $promos = promo::findOrFail($id);
        $promos->delete();

        if ($promos) {
            //redirect dengan pesan sukses
            return redirect()->back();
        } else {
            //redirect dengan pesan error
            return redirect()->back();
        }
    }
}
