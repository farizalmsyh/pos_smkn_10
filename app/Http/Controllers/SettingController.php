<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use \App\User;
use Session;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    public function index()
    {
    	return view('setting');
    }

    public function update_foto(Request $request, $id)
    {
        $user = User::find($id);
        if ($request->hasFile('foto')) {
            $files = $request->file('foto');
            $cover = date("YmdHis")."-".Auth::user()->id."."
            .$files->getClientOriginalExtension();
            $files->move(public_path('img/profile-picture'), $cover);
            $user->foto = $cover;   
        }
        $user->save();

        Alert::success('Data Pengguna', 'Berhasil Mengubah Foto Profil !');
        return redirect()->back();
    }

    public function update_data(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->birth_date = $request->birth_date;
        $user->gender = $request->gender;
        $user->kontak = $request->kontak;
        $user->alamat = $request->alamat;
        $user->save();

        Alert::success('Data Pengguna', 'Berhasil Mengubah Data Profil !');
        return redirect()->back();
    }

    public function delete(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if (Hash::check($request->confirm_password, $user->password)) { 
            Auth::logout();        
            User::where('_id', $id)->delete();
            Alert::success('Data Pengguna', 'Berhasil Menghapus Akun Pengguna !');
            return redirect()->route('login');
        }else{
            Alert::error('Data Pengguna', 'Gagal Menghapus Akun Pengguna !');
            return redirect()->route('setting');
        }
    }
}
