<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function actionlogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        //kondisi data yang dimasukkan
        if (Auth::Attempt($data)) {
            if (Auth::user()->role == 'admin' || Auth::user()->role == 'pemilik') {
                return redirect('/masterAdmin');
            } else {
                return redirect('/');
            }
        } else {
            Session::flash('error', 'Email atau Password Salah');
            return redirect()->back()->with('message','Email atau Password Salah');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/login');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'admin') {
                return redirect('/masterAdmin');
            } else {
                return redirect('/');
            }    # code...
        } else {
            return view('user.masukUser');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'notel' => $request->notel,
            'password' => Hash::make($request->password),
            'role' => 'pelanggan'
        ]);

        if ($user) {
            return redirect('/login');
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
    public function update(Request $request)
    {

        //kondisi melakukan ubah password berdasarkan id
        if ($request->filled('password')) {
            $user = User::where('id',Auth::user()->id)->update([
                'name' => $request->nama,
                'email' => $request->email,
                'notel' => $request->notel,
                'password' => Hash::make($request->password),
               
            ]);
        }else{
            $user = User::where('id',Auth::user()->id)->update([
                'name' => $request->nama,
                'email' => $request->email,
                'notel' => $request->notel,
                
            ]);
        }
        
        //kondisi jika data yang masukkan telah berhasil di ubah
        if ($user) {
            return redirect()->back()->with('success','Data Berhasil Diganti');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
