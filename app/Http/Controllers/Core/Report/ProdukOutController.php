<?php

namespace App\Http\Controllers\Core\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ProdukOut;
use Carbon\Carbon;
use PDF;

class ProdukOutController extends Controller
{
    public function index()
    {
        $produkout = ProdukOut::all();
        return view('report.produk-out.index', compact('produkout'));
    }

    public function printAll()
    {
        $produkout = ProdukOut::all();
        $pdf = PDF::loadView('report.produk-out.print', compact('produkout'));
        return $pdf->download('Laporan Produk Keluar Keseluruhan ('.Carbon::now()->locale('id')->isoFormat('Do MMMM YYYY').').pdf');
    }

    public function printDate(Request $request)
    {
        if($request->date_from && $request->date_to){
            $produkout = ProdukOut::whereBetween('tanggal', array($request->date_from, $request->date_to))->get();
            $from = Carbon::parse($request->date_from)->locale('id')->isoFormat('Do MMMM YYYY');
            $to = Carbon::parse($request->date_to)->locale('id')->isoFormat('Do MMMM YYYY');
            $ket = 'Tanggal '.$from.' - '.$to;
            $pdf = PDF::loadView('report.produk-out.print-date', compact('produkout', 'from', 'to', 'ket'));
            return $pdf->download('Laporan Produk Keluar Tanggal '.$from.' - '.$to.' ('.Carbon::now()->locale('id')->isoFormat('Do MMMM YYYY').').pdf');
        }
        else if($request->date_from || $request->date_to){
            if($request->date_to == null || '' && $request->date_form != null || ''){
                $produkout = ProdukOut::where('tanggal', '>=', strtotime($request->date_from))->get();
                $from = Carbon::parse($request->date_from)->locale('id')->isoFormat('Do MMMM YYYY');
                $ket = 'Setelah Tanggal '.$from;
                $pdf = PDF::loadView('report.produk-out.print-date', compact('produkout', 'from', 'ket'));
                return $pdf->download('Laporan Produk Keluar Setelah Tanggal '.$from.' ('.Carbon::now()->locale('id')->isoFormat('Do MMMM YYYY').').pdf');
            }
            else if($request->date_form == null || '' && $request->date_to != null || ''){
                $produkout = ProdukOut::where('tanggal', '<=', strtotime($request->date_to))->get();
                $to = Carbon::parse($request->date_to)->locale('id')->isoFormat('Do MMMM YYYY');
                $ket = 'Sebelum Tanggal '.$to;
                $pdf = PDF::loadView('report.produk-out.print-date', compact('produkout', 'to', 'ket'));
                return $pdf->download('Laporan Produk Keluar Sebelum Tanggal '.$to.' ('.Carbon::now()->locale('id')->isoFormat('Do MMMM YYYY').').pdf');
            }
        }
        else if($request->date_form == null || '' && $request->date_to == null || ''){
            $produkout = ProdukOut::all();
            $pdf = PDF::loadView('report.produk-out.print', compact('produkout'));
            return $pdf->download('Laporan Produk Keluar Keseluruhan ('.Carbon::now()->locale('id')->isoFormat('Do MMMM YYYY').').pdf');
        }
    }
}
