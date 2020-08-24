<?php

namespace App\Http\Controllers\Core\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Produk;

class MasterProdukController extends Controller
{
    public function index()
    {
    	$produk = Produk::all();
    	return view('inventory.master-produk.index', compact('produk'));
    }
}
