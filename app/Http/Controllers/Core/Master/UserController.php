<?php

namespace App\Http\Controllers\Core\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use \Auth;
use Session;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        
        return view('master.user.index', compact('user'));
    }

    public function create()
    {
        return view('master.user.create');
    }

    public function save(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'kontak' => 'required',            
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'regex:/^((?=\S*?[a-z])(?=\S*?[0-9]).{6,})\S$/',   
            ],               
            'confirm_password' => 'required|min:6|same:password',
            'id_koperasi' => 'required',
            'hak_akses' => 'required',
            'alamat' => 'required',
            'foto' => 'file|image',
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
            'password.regex' => 'Password must at leats 6 characters and must contain alphabet and number with no spaces',
            'alamat.required' => 'Address is required',
            'foto.image' => 'Picture must be an Image',

        ]);
        $input = request()->except('password','confirm_password');
        $user=new User($input);
        $user->password=bcrypt(request()->password);
        if ($request->hasFile('foto')) {
            $files = $request->file('foto');
            $cover = date("YmdHis")."-".Auth::user()->id."."
            .$files->getClientOriginalExtension();
            $files->move(public_path('img/profile-picture'), $cover);
            $user->foto = $cover;   
        }else{
            $user->foto = 'default.png';
        }
        $user->created_by = Auth::user()->id;
        $user->save();
        Alert::success('Data Pengguna', 'Berhasil Menambah Data !');
        return redirect()->route('user');

   //      $user = new User;
   //      $user->name = $request->name;
   //      $user->email = $request->email;
   //      $user->password = bcrypt($request->password);
   //      $user->kontak = $request->kontak;
   //      $user->id_koperasi = $request->id_koperasi;
   //      $user->hak_akses = $request->hak_akses;
   //      $user->alamat = $request->alamat;
   //      if ($request->hasFile('foto')) {
			// $files = $request->file('foto');
			// $cover = date("YmdHis")."-".Auth::user()->id."."
			// .$files->getClientOriginalExtension();
			// $files->move(public_path('img/profile-picture'), $cover);
			// $user->foto = $cover;	
   //      }else{
   //          $user->foto = 'default.png';
   //      }
   //      if ($errors->any()) {
   //      $user->save();
   //          Alert::danger('Data Pengguna', 'Gagal Menambah Data !');
   //          return redirect()->route('user');    
   //      }else{
   //      Alert::success('Data Pengguna', 'Berhasil Menambah Data !');
   //      return redirect()->route('user');

   //      }
    }

    public function edit($id)
    {
        $user = User::where('_id', $id)->first();
        return view('master.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->kontak = $request->kontak;
            $user->id_koperasi = $request->id_koperasi;
            $user->hak_akses = $request->hak_akses;
            $user->alamat = $request->alamat;
            if ($request->hasFile('foto')) {
                if($this->validate($request,['foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',])){
                    $files = $request->file('foto');
                    $cover = date("YmdHis")."-".Auth::user()->id."."
                    .$files->getClientOriginalExtension();
                    $files->move(public_path('img/profile-picture'), $cover);
                    $user->foto = $cover;	
                }else{
                    $user->foto = 'default.png';
                }
            }else{
                $user->foto = 'default.png';
            }
            $user->save();
            return redirect()->route('user')->with(['success' => 'Berhasil Mengubah Pengguna !!']);
    }

    public function delete($id)
    {
        $user = User::where('_id', $id)->value('foto');
        if ($user != 'default.png') {
            $filename = public_path().'/img/profile-picture/'.$profil->foto;
            File::delete($filename);
        }
        User::where('_id', $id)->delete();
        Alert::success('Data Pengguna', 'Berhasil Menghapus Data !');
        return redirect()->route('user');
    }
}
