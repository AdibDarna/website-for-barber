<?php

namespace App\Http\Controllers;

use App\Models\GaleriPengunjung;
use App\Models\GaleriLogbook;
use App\Models\GaleriCapster;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class KelolaGaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeri_pengunjungs = GaleriPengunjung::latest()->paginate(10);
        $galeri_logbooks = GaleriLogbook::latest()->paginate(10);
        $galeri_capsters = GaleriCapster::latest()->paginate(10);
        $capster = Karyawan::get();

        return view('admin.KelolaGaleri', compact('galeri_pengunjungs', 'galeri_logbooks', 'galeri_capsters','capster'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.KelolaGaleri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeGaleriPengunjung(Request $request)
    {
        $this->validate($request, [
            'nama_gaya' => 'required',
            'gambar_gaya' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        // upload image
        $gambar_gaya = $request->file('gambar_gaya');
        $gambar_gaya->storeAs('public/admin/KelolaGaleri', $gambar_gaya->hashName());

        $keloladatagaleripengunjung = GaleriPengunjung::create([
            'nama_gaya' => $request->nama_gaya,
            'gambar_gaya' => $gambar_gaya->hashName()
        ]);

        if ($keloladatagaleripengunjung) {
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeGaleriCapster(Request $request)
    {
        $this->validate($request, [
            'nama_capster' => 'required',
            'nama_gayacukur' => 'required',
            'gambar_gayacukur' => 'required|image|mimes:png,jpg,jpeg',
            'keterangan_gayacukur' => 'required'
        ]);

        // upload image
        $gambar_gayacukur = $request->file('gambar_gayacukur');
        $gambar_gayacukur->storeAs('public/admin/KelolaGaleri', $gambar_gayacukur->hashName());

        $keloladatagalericapster = GaleriCapster::create([
            'nama_capster' => $request->nama_capster,
            'nama_gayacukur' => $request->nama_gayacukur,
            'gambar_gayacukur' => $gambar_gayacukur->hashName(),
            'keterangan_gayacukur' => $request->keterangan_gayacukur
        ]);

        if ($keloladatagalericapster) {
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function storeGaleriLogbook(Request $request)
    {
        $this->validate($request, [
            'nama_logbook' => 'required',
            'gambar_logbook' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        // upload image
        $gambar_logbook = $request->file('gambar_logbook');
        $gambar_logbook->storeAs('public/admin/KelolaGaleri', $gambar_logbook->hashName());

        $keloladatagalerilogbook = GaleriLogbook::create([
            'nama_logbook' => $request->nama_logbook,
            'gambar_logbook' => $request->gambar_logbook->hashName()
        ]);

        if ($keloladatagalerilogbook) {
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
    public function editPengunjung($id)
    {
        $galeri_pengunjungs = GaleriPengunjung::where('id', $id)->get();
        return view('admin.KelolaEditGaleriPelanggan', compact('galeri_pengunjungs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editCapster($id)
    {
        $galeri_capsters = GaleriCapster::where('id', $id)->get();
        $capster = Karyawan::get();

        return view('admin.KelolaEditGaleriCapster', compact('galeri_capsters','capster'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editLogbook($id)
    {
        $galeri_logbooks = GaleriLogbook::where('id', $id)->get();
        return view('admin.KelolaEditGaleriLogbook', compact('galeri_logbooks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatePengunjung(Request $request)
    {
        // 
        if ($request->has('gambar_gaya')) {

            $this->validate($request, [
                'nama_gaya' => 'required',
                'gambar_gaya' => 'required|image|mimes:png,jpg,jpeg'
            ]);

            // upload image
            $gambar_gaya = $request->file('gambar_gaya');
            $gambar_gaya->storeAs('public/admin/KelolaGaleri', $gambar_gaya->hashName());

            $keloladatagaleripengunjung = GaleriPengunjung::where('id', $request->id)->update([
                'nama_gaya' => $request->nama_gaya,
                'gambar_gaya' => $gambar_gaya->hashName()
            ]);
        } else {

            $this->validate($request, [
                'nama_gaya' => 'required'

            ]);

            $keloladatagaleripengunjung = GaleriPengunjung::where('id', $request->id)->update([
                'nama_gaya' => $request->nama_gaya
            ]);
        }

        if ($keloladatagaleripengunjung) {
            return redirect('KelolaGaleri');
        } else {
            return redirect()->back();
        }

        // 
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateCapster(Request $request)
    {
        if ($request->has('gambar_gayacukur')) {

            $this->validate($request, [
                'nama_capster' => 'required',
                'nama_gayacukur' => 'required',
                'gambar_gayacukur' => 'required|image|mimes:png,jpg,jpeg',
                'keterangan_gayacukur' => 'required'                
            ]);

            // upload image
            $gambar_gayacukur = $request->file('gambar_gayacukur');
            $gambar_gayacukur->storeAs('public/admin/KelolaGaleri', $gambar_gayacukur->hashName());

            $keloladatagalericapster = GaleriCapster::where('id', $request->id)->update([
                'nama_capster' => $request->nama_capster,
                'nama_gayacukur' => $request->nama_gayacukur,
                'gambar_gayacukur' => $gambar_gayacukur->hashName(),
                'keterangan_gayacukur' => $request->keterangan_gayacukur
            ]);
        } else {

            $this->validate($request, [
                'nama_capster' => 'required',
                'nama_gayacukur' => 'required',
                'keterangan_gayacukur' => 'required'
            ]);

            $keloladatagalericapster = GaleriCapster::where('id', $request->id)->update([
                'nama_capster' => $request->nama_capster,
                'nama_gayacukur' => $request->nama_gayacukur,
                'keterangan_gayacukur' => $request->keterangan_gayacukur
            ]);
        }

        if ($keloladatagalericapster) {
            return redirect('KelolaGaleri');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateLogbook(Request $request)
    {
        // 
        if ($request->has('gambar_logbook')) {

            $this->validate($request, [
                'nama_logbook' => 'required',
                'gambar_logbook' => 'required|image|mimes:png,jpg,jpeg'
            ]);

            // upload image
            $gambar_logbook = $request->file('gambar_logbook');
            $gambar_logbook->storeAs('public/admin/KelolaGaleri', $gambar_logbook->hashName());

            $keloladatagalericapster = GaleriLogbook::where('id', $request->id)->update([
                'nama_logbook' => $request->nama_logbook,
                'gambar_logbook' => $gambar_logbook->hashName()
            ]);
        } else {

            $this->validate($request, [
                'nama_logbook' => 'required'

            ]);

            $keloladatagalericapster = GaleriLogbook::where('id', $request->id)->update([
                'nama_logbook' => $request->nama_logbook
            ]);
        }

        if ($keloladatagalericapster) {
            return redirect('KelolaGaleri');
        } else {
            return redirect()->back();
        }

        // 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyPengunjung($id)
    {
        $galeri_pengunjungs = GaleriPengunjung::findOrFail($id);
        $galeri_pengunjungs->delete();

        if ($galeri_pengunjungs) {
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
    public function destroyCapster($id)
    {
        $galeri_capsters = GaleriCapster::findOrFail($id);
        $galeri_capsters->delete();

        if ($galeri_capsters) {
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
    public function destroyLogbook($id)
    {
        $galeri_logbooks = GaleriLogbook::findOrFail($id);
        $galeri_logbooks->delete();

        if ($galeri_logbooks) {
            //redirect dengan pesan sukses
            return redirect()->back();
        } else {
            //redirect dengan pesan error
            return redirect()->back();
        }
    }
}
