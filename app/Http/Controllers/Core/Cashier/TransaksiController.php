<?php

namespace App\Http\Controllers\Core\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\TransaksiSementara;
use App\Model\TransaksiDetail;
use App\Model\Produk;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        setlocale(LC_MONETARY,"id_ID");
        $transaksi_sementara = TransaksiSementara::all();
        return view('cashier.transaksi.index', compact('transaksi_sementara'));
    }

    public function transaksiSementaraSave(Request $request)
    {
        $produk = Produk::where('_id', $request->id_produk)->first();
        $transaksi = new TransaksiSementara;
        $transaksi->produk = $produk->nama;
        $transaksi->barcode = $produk->barcode;
        if($request->qty == 0 || null){
            $transaksi->qty = 1;
        }else{
            $transaksi->qty = $request->qty;
        }
        $transaksi->harga = $produk->harga_jual;
        $transaksi->subtotal = floatval($produk->harga_jual) * intval($request->qty);
        $transaksi->save();

        return redirect()->back();
        
    }

    public function transaksiSementaraDelete($id)
    {
        TransaksiSementara::where('_id', $id)->delete();

        return redirect()->back();
    }

    public function transaksiDetailSave(Request $request)
    {
        $transaksi_sementara = TransaksiSementara::all();
        $transaksi = new TransaksiDetail;
        $total = TransaksiSementara::sum('subtotal');
        if($total <= floatval($request->nominal_pembayaran)){
            $items = array();
                foreach($transaksi_sementara as $value) {
                $items[] = [
                    'produk' => $value->produk,
                    'harga' => $value->harga,
                    'qty' => $value->qty,
                    'barcode' => $value->barcode,
                ];
            }
            TransaksiDetail::insert([
                'kasir' => Auth::user()->name,
                'tanggal' => date("Y-m-d H:i:s"),
                'transaksi' => $items,
                'subharga' => floatval($total),
                'nominal_pembayaran' => floatval($request->nominal_pembayaran),
            ]);
            TransaksiSementara::truncate();
            Alert::success('Pembayaran', 'Pembayaran Anda Berhasil !');
        }else{
            Alert::error('Pembayaran', 'Nominal Pembayaran tidak mencukupi !');
        }

        return redirect()->back();
    }
}
