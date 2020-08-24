<?php

namespace App\Http\Controllers\Core\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Profil;
use Illuminate\Support\Facades\File;
use \Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProfilController extends Controller
{
    public function index()
    {
    	$profil = Profil::all();
    	return view('master.profil.index', compact('profil'));
    }

    public function create()
    {
    	return view('master.profil.create');
    }

    public function save(Request $request)
    {
    	request()->validate([
            'nama_koperasi' => 'required',
            'telepon' => 'required',            
            'keterangan' => 'required',
            'alamat_koperasi' => 'required',
            'kode_pos' => 'required',
            'foto' => 'file|image',
        ], [
            'nama_koperasi.required' => 'Cooperative name is required',
            'telepon.required' => 'Phone is required',
            'keterangan.required' => 'Information is required',
            'alamat_koperasi.required' => 'Cooperative address is required',
            'kode_pos.required' => 'Postal code is required',
            'foto.image' => 'Picture must be an Image',
        ]);
    	$input = request()->all();
    	$profil = new Profil($input);
    	if ($request->hasFile('foto')) {
            $files = $request->file('foto');
            $cover = date("YmdHis")."-".$request->nama_koperasi."."
            .$files->getClientOriginalExtension();
            $files->move(public_path('img/other/profil'), $cover);
            $profil->foto = $cover;   
        }else{
            $profil->foto = 'default.png';
        }
        $profil->created_by = Auth::user()->id;
        $profil->save();
        Alert::success('Informasi Toko', 'Berhasil Menambah Data !');
        return redirect()->route('profil');
    }

    public function edit($id)
    {
    	$profil = Profil::where('_id', $id)->first();
    	return view('master.profil.edit', compact('profil'));
    }

    public function update(Request $request, $id)
    {
        $cekFoto = Profil::where('_id', $id)->value('foto');
        if ($cekFoto != 'default.png') {
            $filename = public_path().'/img/other/profil/'.$cekFoto->foto;
            File::delete($filename);
        }
        $profil = Profil::find($id);
        $profil->nama_koperasi = $request->nama_koperasi;
        $profil->telepon = $request->telepon;
        $profil->kode_pos = $request->kode_pos;
        $profil->keterangan = $request->keterangan;
        $profil->alamat_koperasi = $request->alamat_koperasi;
        $profil->created_by = Auth::user()->id;
        if ($request->hasFile('foto')) {
            $files = $request->file('foto');
            $cover = date("YmdHis")."-".$request->nama_koperasi."."
            .$files->getClientOriginalExtension();
            $files->move(public_path('img/other/profil'), $cover);
            $profil->foto = $cover;   
        }
        $profil->save();
        Alert::success('Informasi Toko', 'Berhasil Menambah Data !');
        return redirect()->route('profil');
    }

    public function delete($id)
    {
    	$profil = Profil::where('_id',$id)->value('foto');
    	if ($profil != 'default.png') {
	        $filename = public_path().'/img/other/profil/'.$profil->foto;
	        File::delete($filename);
    	}
	    Profil::where('_id', $id)->delete();
		Alert::success('Informasi Toko', 'Berhasil Menghapus Data !');
		return redirect()->route('profil');
    }
}
