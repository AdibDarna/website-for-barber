<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawans = karyawan::latest()->paginate(10);
        return view('admin.KelolaDataKaryawan', compact('karyawans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.KelolaDataKaryawan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 
        $this->validate($request, [
            'nama_karyawan' => 'required',
            'email_karyawan' => 'required',
            'nik_karyawan' => 'required',
            'ktp_karyawan' => 'required|image|mimes:png,jpg,jpeg',
            'notelepon_karyawan' => 'required',
            'nodarurat_karyawan' => 'required',
            'jeniskelamin_karyawan' => 'required',
            'alamat_karyawan' => 'required',
            'status_karyawan' => 'required'
        ]);

        // upload image
        $ktp_karyawan = $request->file('ktp_karyawan');
        $ktp_karyawan->storeAs('public/admin/KelolaDataKaryawan', $ktp_karyawan->hashName());

        $foto = $request->file('foto');
        $foto->storeAs('public/admin/KelolaDataKaryawan', $foto->hashName());
        $keloladatakaryawan = Karyawan::create([
            'nama_karyawan' => $request->nama_karyawan,
            'email_karyawan' => $request->email_karyawan,
            'nik_karyawan' => $request->nik_karyawan,
            'ktp_karyawan' => $ktp_karyawan->hashName(),
            'foto' => $foto->hashName(),

            'notelepon_karyawan' => $request->notelepon_karyawan,
            'nodarurat_karyawan' => $request->nodarurat_karyawan,
            'jeniskelamin_karyawan' => $request->jeniskelamin_karyawan,
            'alamat_karyawan' => $request->alamat_karyawan,
            'status_karyawan' => $request->status_karyawan
        ]);

        if ($keloladatakaryawan) {
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $karyawans = karyawan::where('id', $id)->get();
        return view('admin.KelolaEditDataKaryawan', compact('karyawans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if ($request->has('ktp_karyawan')) {

            $this->validate($request, [
                'nama_karyawan' => 'required',
                'email_karyawan' => 'required',
                'nik_karyawan' => 'required',
                'ktp_karyawan' => 'required|image|mimes:png,jpg,jpeg',
                'notelepon_karyawan' => 'required',
                'nodarurat_karyawan' => 'required',
                'jeniskelamin_karyawan' => 'required',
                'alamat_karyawan' => 'required',
                'status_karyawan' => 'required'
            ]);

            // upload image
            $ktp_karyawan = $request->file('ktp_karyawan');
            $ktp_karyawan->storeAs('public/admin/KelolaDataKaryawan', $ktp_karyawan->hashName());
        } else {

            $this->validate($request, [
                'nama_karyawan' => 'required',
                'email_karyawan' => 'required',
                'nik_karyawan' => 'required',
                'notelepon_karyawan' => 'required',
                'nodarurat_karyawan' => 'required',
                'jeniskelamin_karyawan' => 'required',
                'alamat_karyawan' => 'required',
                'status_karyawan' => 'required'
            ]);

            $keloladatakaryawan = Karyawan::where('id', $request->id)->update([
                'nama_karyawan' => $request->nama_karyawan,
                'email_karyawan' => $request->email_karyawan,
                'nik_karyawan' => $request->nik_karyawan,
                'notelepon_karyawan' => $request->notelepon_karyawan,
                'nodarurat_karyawan' => $request->nodarurat_karyawan,
                'jeniskelamin_karyawan' => $request->jeniskelamin_karyawan,
                'alamat_karyawan' => $request->alamat_karyawan,
                'status_karyawan' => $request->status_karyawan
            ]);
        }


        if ($keloladatakaryawan) {
            return redirect('KelolaDataKaryawan');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $karyawans = karyawan::findOrFail($id);
        $karyawans->delete();

        if ($karyawans) {
            //redirect dengan pesan sukses
            return redirect()->back();
        } else {
        }
    }
}
