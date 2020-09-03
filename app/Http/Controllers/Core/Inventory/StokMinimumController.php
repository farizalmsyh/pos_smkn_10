<?php

namespace App\Http\Controllers\Core\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Produk;
use Carbon\Carbon;
use PDF;

class StokMinimumController extends Controller
{
    public function index()
    {
        $produk = Produk::where('stok', 0)->get();
        return view('inventory.stok-minimum.index', compact('produk'));
    }

    public function printAll()
    {
        $produk = Produk::where('stok', 0)->get();
        $pdf = PDF::loadView('inventory.stok-minimum.print', compact('produk'));
        return $pdf->download('Laporan Produk Kosong Seluruh Kategori ('.Carbon::now().').pdf');
    }

    public function printKategori($kategori)
    {
        $produk= Produk::where('stok', 0)->where('kategori', $kategori)->get();
        $kategori= \App\Model\MasterKategori::where('_id', $kategori)->value('kategori');
        $pdf = PDF::loadView('inventory.stok-minimum.print-kategori', compact('produk', 'kategori'));
        return $pdf->download('Laporan Produk Kosong Kategori'. \App\Model\MasterKategori::where('_id', $kategori)->value('kategori') .' ('.Carbon::now().').pdf');
    }
}
