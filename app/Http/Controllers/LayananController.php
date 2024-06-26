<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Paket;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layanans = Layanan::latest()->paginate(10);
        $pakets = Paket::latest()->paginate(10);
        return view('admin.KelolaLayananPaket', compact('layanans', 'pakets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.KelolaLayananPaket.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // store layanan
    public function storeLayanan(Request $request)
    {
        // 
        // layanan
        $this->validate($request, [
            'nama_layanan' => 'required',
            'gambar_layanan' => 'required|image|mimes:png,jpg,jpeg'
        ]);


        // upload image
        $gambar_layanan = $request->file('gambar_layanan');
        $gambar_layanan->storeAs('public/dist/img', $gambar_layanan->hashName());

        $keloladatalayanan = Layanan::create([
            'nama_layanan' => $request->nama_layanan,
            'gambar_layanan' => $gambar_layanan->hashName()
        ]);

        if ($keloladatalayanan) {
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    // store paket
    public function storePaket(Request $request)
    {
        // 
        // paket
        $this->validate($request, [
            'nama_paket' => 'required',
            'harga_paket' => 'required',
            'keterangan_paket' => 'required'
        ]);

        // 
        $keloladatapaket = Paket::create([
            'nama_paket' => $request->nama_paket,
            'harga_paket' => $request->harga_paket,
            'keterangan_paket' => $request->keterangan_paket
        ]);

        if ($keloladatapaket) {
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Layanan $layanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editPaket($id)
    {
        $pakets = paket::where('id', $id)->get();
        return view('admin.KelolaEditPaket', compact('pakets'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editLayanan($id)
    {
        $layanans = layanan::where('id', $id)->get();
        return view('admin.KelolaEditLayanan', compact('layanans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatePaket(Request $request)
    {
        $this->validate($request, [
            'nama_paket' => 'required',
            'harga_paket' => 'required',
            'keterangan_paket' => 'required'
        ]);

        // 
        $keloladatapaket = Paket::where('id',$request->id)->update([
            'nama_paket' => $request->nama_paket,
            'harga_paket' => $request->harga_paket,
            'keterangan_paket' => $request->keterangan_paket
        ]);

        if ($keloladatapaket) {
            return redirect('KelolaLayananPaket');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateLayanan(Request $request)
    {
        // 
        if ($request->has('gambar_layanan')) {

            $this->validate($request, [
                'nama_layanan' => 'required',
                'gambar_layanan' => 'required|image|mimes:png,jpg,jpeg'
            ]);

            $gambar_layanan = $request->file('gambar_layanan');
            $gambar_layanan->storeAs('public/admin/KelolaLayananPaket', $gambar_layanan->hashName());

            $keloladatalayanan = Layanan::where('id', $request->id)->update([
                'nama_layanan' => $request->nama_layanan,
                'gambar_layanan' => $gambar_layanan->hashName()
            ]);
        } else {

            $this->validate($request, [
                'nama_layanan' => 'required',
                
            ]);

            $keloladatalayanan = Layanan::where('id', $request->id)->update([
                'nama_layanan' => $request->nama_layanan,
            ]);
        }

        if ($keloladatalayanan) {
            return redirect('KelolaLayananPaket');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyPaket($id)
    {
        $pakets = paket::findOrFail($id);
        $pakets->delete();

        if ($pakets) {
            //redirect dengan pesan sukses
            return redirect()->back();
        } else {
            //redirect dengan pesan error
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyLayanan($id)
    {
        $layanans = layanan::findOrFail($id);
        $layanans->delete();

        if ($layanans) {
            //redirect dengan pesan sukses
            return redirect()->back();
        } else {
            //redirect dengan pesan error
            return redirect()->back();
        }
    }
}
