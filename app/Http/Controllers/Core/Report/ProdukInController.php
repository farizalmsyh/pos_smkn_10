<?php

namespace App\Http\Controllers\Core\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ProdukIn;
use Carbon\Carbon;
use PDF;

class ProdukInController extends Controller
{
    public function index()
    {
        $produkin = ProdukIn::all();
        return view('report.produk-in.index', compact('produkin'));
    }

    public function printAll()
    {
        $produkin = ProdukIn::all();
        $pdf = PDF::loadView('report.produk-in.print', compact('produkin'));
        return $pdf->download('Laporan Produk Masuk Keseluruhan ('.Carbon::now()->locale('id')->isoFormat('Do MMMM YYYY').').pdf');
    }

    public function printDate(Request $request)
    {
        if($request->date_from && $request->date_to){
            $produkin = ProdukIn::whereBetween('tanggal', array($request->date_from, $request->date_to))->get();
            $from = Carbon::parse($request->date_from)->locale('id')->isoFormat('Do MMMM YYYY');
            $to = Carbon::parse($request->date_to)->locale('id')->isoFormat('Do MMMM YYYY');
            $ket = 'Tanggal '.$from.' - '.$to;
            $pdf = PDF::loadView('report.produk-in.print-date', compact('produkin', 'from', 'to', 'ket'));
            return $pdf->download('Laporan Produk Masuk Tanggal '.$from.' - '.$to.' ('.Carbon::now()->locale('id')->isoFormat('Do MMMM YYYY').').pdf');
        }
        else if($request->date_from || $request->date_to){
            if($request->date_to == null || '' && $request->date_form != null || ''){
                $produkin = ProdukIn::where('tanggal', '>=', strtotime($request->date_from))->get();
                $from = Carbon::parse($request->date_from)->locale('id')->isoFormat('Do MMMM YYYY');
                $ket = 'Setelah Tanggal '.$from;
                $pdf = PDF::loadView('report.produk-in.print-date', compact('produkin', 'from', 'ket'));
                return $pdf->download('Laporan Produk Masuk Setelah Tanggal '.$from.' ('.Carbon::now()->locale('id')->isoFormat('Do MMMM YYYY').').pdf');
            }
            else if($request->date_form == null || '' && $request->date_to != null || ''){
                $produkin = ProdukIn::where('tanggal', '<=', strtotime($request->date_to))->get();
                $to = Carbon::parse($request->date_to)->locale('id')->isoFormat('Do MMMM YYYY');
                $ket = 'Sebelum Tanggal '.$to;
                $pdf = PDF::loadView('report.produk-in.print-date', compact('produkin', 'to', 'ket'));
                return $pdf->download('Laporan Produk Masuk Sebelum Tanggal '.$to.' ('.Carbon::now()->locale('id')->isoFormat('Do MMMM YYYY').').pdf');
            }
        }
        else if($request->date_form == null || '' && $request->date_to == null || ''){
            $produkin = ProdukIn::all();
            $pdf = PDF::loadView('report.produk-in.print', compact('produkin'));
            return $pdf->download('Laporan Produk Masuk Keseluruhan ('.Carbon::now()->locale('id')->isoFormat('Do MMMM YYYY').').pdf');
        }
    }
}
