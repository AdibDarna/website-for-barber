<?php

namespace App\Http\Controllers;

use App\Models\KritikSaran;
use App\Models\Pelanggan;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggans = pelanggan::latest()->paginate(10);
        return view('admin.KelolaDataPelanggan', compact('pelanggans'));
    }

    public function indexDaftar()
    {
        $pelanggans = pelanggan::latest()->paginate(10);
        return view('user.daftarUser', compact('pelanggans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.KelolaDataPelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'notel' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'password' => 'required',

        ]);
        try {
            $keloladatapelanggan = Pelanggan::create([
                'nama_pelanggan' => $request->nama,
                'email_pelanggan' => $request->email,
                'notelepon_pelanggan' => $request->notel,
                'jeniskelamin_pelanggan' => $request->jk,
                'alamat_pelanggan' => $request->alamat,
                'status_pelanggan' => "biasa"
            ]);

            $user = User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'notel' => $request->notel,
                'password' => Hash::make($request->password),
                'role' => 'pelanggan'
            ]);

            if ($keloladatapelanggan && $user) {
                return redirect()->back();
            } else {
                return redirect()->back();
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', "Email Sudah dipakai");
        }
    }

    function inputKritikSaran(Request $request)
    {
        if (Auth::check()) {
            # code...

            $this->validate($request, [

                'email' => 'required',
                'kritik' => 'required',
                'saran' => 'required'
            ]);
            $KS = KritikSaran::create([
                'email' => $request->email,
                'kritik' => $request->kritik,
                'saran' => $request->saran,
            ]);
            if ($KS) {
                return redirect('/#kritiksaran')->with('success', 'Terima Kasih Atas Masukannya :)');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pelanggans = pelanggan::where('id', $id)->get();
        return view('admin.KelolaEditDataPelanggan', compact('pelanggans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'nama_pelanggan' => 'required',
            'email_pelanggan' => 'required',
            'notelepon_pelanggan' => 'required',
            'jeniskelamin_pelanggan' => 'required',
            'alamat_pelanggan' => 'required',
            'status_pelanggan' => 'required'
        ]);

        $keloladatapelanggan = Pelanggan::where('id', $request->id)->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'email_pelanggan' => $request->email_pelanggan,
            'notelepon_pelanggan' => $request->notelepon_pelanggan,
            'jeniskelamin_pelanggan' => $request->jeniskelamin_pelanggan,
            'alamat_pelanggan' => $request->alamat_pelanggan,
            'status_pelanggan' => $request->status_pelanggan
        ]);
        $name = Pelanggan::where('id',$request->id)->get()->value('email_pelanggan');
        $id = User::where('email',$name)->get()->value('id');
 
        // if (condition) {
        //     # code...
        // }
        if ($request->filled('password')) {
            $user = User::where('id', $id)->update([
                'name' => $request->nama_pelanggan,
                'email' => $request->email_pelanggan,
                'notel' => $request->notelepon_pelanggan,
                'password' => Hash::make($request->password),
            ]);

        }else{
            $user = User::where('id', $id)->update([
                'name' => $request->nama_pelanggan,
                'email' => $request->email_pelanggan,
                'notel' => $request->notelepon_pelanggan,
                
            ]);

         
        }
        


        if ($keloladatapelanggan && $user) {
            return redirect('KelolaDataPelanggan');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pelanggans = pelanggan::findOrFail($id);
        $pelanggans->delete();

        if ($pelanggans) {
            //redirect dengan pesan sukses
            return redirect()->back();
        } else {
            //redirect dengan pesan error
            return redirect()->back();
        }
    }
}
