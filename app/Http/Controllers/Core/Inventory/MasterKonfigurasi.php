<?php

namespace App\Http\Controllers\Core\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\MasterBahan;
use App\Model\MasterCurr;
use App\Model\MasterKategori;
use App\Model\MasterPpn;
use App\Model\MasterUnit;
use App\Model\MasterPersen;
use RealRashid\SweetAlert\Facades\Alert;

class MasterKonfigurasi extends Controller
{
    public function index()
    {
    	$bahan = MasterBahan::all();
    	$curr = MasterCurr::all();
    	$kategori = MasterKategori::all();
    	$ppn = MasterPpn::first();
    	$unit = MasterUnit::all();
    	$persen = MasterPersen::all();
    	return view('inventory.master-konfigurasi.index', compact('bahan', 'curr', 'kategori', 'ppn', 'unit', 'persen'));
	}
	
	public function saveCurr(Request $request)
	{
		$curr = new MasterCurr;
		$curr->curr = $request->curr;
		$curr->save();

		Alert::success('Data Currancy', 'Berhasil Menambah Data !');
		return redirect()->route('master-konfigurasi');
	}

	public function deleteCurr($id)
	{
		MasterCurr::where('_id', $id)->delete();
		Alert::success('Data Currancy', 'Berhasil Menghapus Data !');
		return redirect()->route('master-konfigurasi');
	}

	public function saveKategori(Request $request)
	{
		$kategori = new MasterKategori;
		$kategori->kategori = $request->kategori;
		$kategori->save();

		Alert::success('Data Kategori', 'Berhasil Menambah Data !');
		return redirect()->route('master-konfigurasi');
	}

	public function deleteKategori($id)
	{
		MasterKategori::where('_id', $id)->delete();
		Alert::success('Data Kategori', 'Berhasil Menghapus Data !');
		return redirect()->route('master-konfigurasi');
	}

	public function saveUnit(Request $request)
	{
		$unit = new MasterUnit;
		$unit->unit = $request->unit;
		$unit->save();

		Alert::success('Data Unit', 'Berhasil Menambah Data !');
		return redirect()->route('master-konfigurasi');
	}

	public function deleteUnit($id)
	{
		MasterUnit::where('_id', $id)->delete();
		Alert::success('Data Unit', 'Berhasil Menghapus Data !');
		return redirect()->route('master-konfigurasi');
	}

	public function SaveOrUpdatePPNStok(Request $request)
	{
		if (empty($request->id)) {
			$ppn = new MasterPpn;
			$ppn->stok_minimum = $request->stok_minimum;
			Alert::success('Data PPN', 'Berhasil Menambah Data !');
			$ppn->save();
		}else{
			$ppn = MasterPpn::where('_id', $request->id)->update([
				'stok_minimum' => $request->stok_minimum,
			]);
			Alert::success('Data PPN', 'Berhasil Mengubah Data !');
		}
		return redirect()->route('master-konfigurasi');
	}

	public function SaveOrUpdatePPN(Request $request)
	{
		if (empty($request->id)) {
			$ppn = new MasterPpn;
			$ppn->ppn = $request->ppn;
			Alert::success('Data PPN', 'Berhasil Menambah Data !');
			$ppn->save();
		}else{
			$ppn = MasterPpn::where('_id', $request->id)->update([
				'ppn' => $request->ppn,
			]);
			Alert::success('Data PPN', 'Berhasil Mengubah Data !');
		}
		return redirect()->route('master-konfigurasi');
	}

	public function saveBahan(Request $request)
	{
		$bahan = new MasterBahan;
		$bahan->nama_bahan = $request->nama_bahan;
		$bahan->satuan = $request->satuan;
		$bahan->save();

		Alert::success('Data Bahan', 'Berhasil Menambah Data !');
		return redirect()->route('master-konfigurasi');
	}

	public function deleteBahan($id)
	{
		MasterBahan::where('_id', $id)->delete();
		Alert::success('Data Bahan', 'Berhasil Menghapus Data !');
		return redirect()->route('master-konfigurasi');
	}

	public function savePersen(Request $request)
	{
		$persen = new MasterPersen;
		$persen->persen = $request->persen;
		$persen->save();

		Alert::success('Data Persen Keuntungan', 'Berhasil Menambah Data !');
		return redirect()->route('master-konfigurasi');
	}

	public function deletePersen($id)
	{
		MasterPersen::where('_id', $id)->delete();
		Alert::success('Data Persen Keuntungan', 'Berhasil Menghapus Data !');
		return redirect()->route('master-konfigurasi');
	}
}
