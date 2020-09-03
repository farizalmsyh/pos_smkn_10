<?php

namespace App\Http\Controllers\Core\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Produk;
use RealRashid\SweetAlert\Facades\Alert;

class MasterProdukController extends Controller
{
    public function index()
    {
    	$produk = Produk::all();
    	return view('inventory.master-produk.index', compact('produk'));
    }

    public function create()
    {
        return view('inventory.master-produk.create');
    }

    public function save(Request $request)
    {
        $discount = floatval($request->harga_beli) * 0.10;
        $result = floatval($request->harga_beli) + $discount;
        $produk = new Produk;
        $produk->barcode = $request->barcode;
        $produk->nama = $request->nama;
        $produk->harga_beli = $request->harga_beli;
        $produk->harga_jual = $result;
        $produk->stok = $request->stok;
        $produk->kategori = $request->kategori;
        $produk->curr = $request->curr;
        $produk->unit = $request->unit;
        $produk->expired = $request->expired != '' ? $request->expired : null;
        $produk->disc = $request->disc != 0 ? $request->disc : null;
        $produk->keterangan = $request->keterangan;
        $produk->save();

        Alert::success('Data Produk', 'Berhasil Menambah Produk !');
		return redirect()->route('master-produk');
    }
    
    public function addStok($id)
    {
        $produk = Produk::where('_id', $id)->first();
        return view('inventory.master-produk.add-stok', compact('produk'));
    }

    public function saveStok(Request $request, $id)
    {
        $stokNow = intval($request->stok_now) + intval($request->stok_added);
        $produk = Produk::where('_id', $id)->update([
            'stok' => $stokNow,
        ]);

        Alert::success('Data Produk', 'Berhasil Menambah Stok Produk !');
		return redirect()->route('master-produk');
    }

    public function edit($id)
    {
        $produk = Produk::where('_id', $id)->first();
        return view('inventory.master-produk.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $discount = floatval($request->harga_beli) * 0.10;
        $result = floatval($request->harga_beli) + $discount;
        $produk = Produk::find($id);
        $produk->barcode = $request->barcode;
        $produk->nama = $request->nama;
        $produk->harga_beli = $request->harga_beli;
        $produk->harga_jual = $result;
        $produk->stok = $request->stok;
        $produk->kategori = $request->kategori;
        $produk->curr = $request->curr;
        $produk->unit = $request->unit;
        $produk->expired = $request->expired != '' ? $request->expired : null;
        $produk->disc = $request->disc != 0 ? $request->disc : null;
        $produk->keterangan = $request->keterangan;
        $produk->save();

        Alert::success('Data Produk', 'Berhasil Mengubah Produk !');
		return redirect()->route('master-produk');
    }

    public function delete($id)
    {
        Produk::where('_id', $id)->delete();

        Alert::success('Data Produk', 'Berhasil Menghapus Produk !');
		return redirect()->route('master-produk');
    }
}
