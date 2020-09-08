<?php

namespace App\Http\Controllers\Core\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\TransaksiDetail;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use PDF;

class XSalesDayController extends Controller
{
    public function index()
    {
        $transaksi = TransaksiDetail::all();
        return view('report.sales-day.index', compact('transaksi'));
    }

    public function detail($id)
    {
        $transaksi = TransaksiDetail::where('_id', $id)->first();
        return view('report.sales-day.detail', compact('transaksi'));
    }

    public function printAll()
    {
        $transaksi = TransaksiDetail::all();
        $pdf = PDF::loadView('report.sales-day.print', compact('transaksi'));
        return $pdf->download('Laporan Sales Day Keseluruhan ('.Carbon::now()->locale('id')->isoFormat('Do MMMM YYYY').').pdf');
    }

    public function printToday()
    {
        $transaksi = TransaksiDetail::where('tanggal', Carbon::today())->get();
        $pdf = PDF::loadView('report.sales-day.print-today', compact('transaksi'));
        return $pdf->download('Laporan Sales Day Hari Ini ('.Carbon::now()->locale('id')->isoFormat('Do MMMM YYYY').').pdf');
    }

    public function printDate(Request $request)
    {
        if($request->date_from && $request->date_to){
            $transaksi = TransaksiDetail::whereBetween('tanggal', array($request->date_from, $request->date_to))->get();
            $from = Carbon::parse($request->date_from)->locale('id')->isoFormat('Do MMMM YYYY');
            $to = Carbon::parse($request->date_to)->locale('id')->isoFormat('Do MMMM YYYY');
            $ket = 'Tanggal '.$from.' - '.$to;
            $pdf = PDF::loadView('report.sales-day.print-date', compact('transaksi', 'from', 'to', 'ket'));
            return $pdf->download('Laporan Sales Day Tanggal '.$from.' - '.$to.' ('.Carbon::now()->locale('id')->isoFormat('Do MMMM YYYY').').pdf');
        }
        else if($request->date_from || $request->date_to){
            if($request->date_to == null || '' && $request->date_form != null || ''){
                $transaksi = TransaksiDetail::where('tanggal', '>=', strtotime($request->date_from))->get();
                $from = Carbon::parse($request->date_from)->locale('id')->isoFormat('Do MMMM YYYY');
                $ket = 'Setelah Tanggal '.$from;
                $pdf = PDF::loadView('report.sales-day.print-date', compact('transaksi', 'from', 'ket'));
                return $pdf->download('Laporan Sales Day Setelah Tanggal '.$from.' ('.Carbon::now()->locale('id')->isoFormat('Do MMMM YYYY').').pdf');
            }
            else if($request->date_form == null || '' && $request->date_to != null || ''){
                $transaksi = TransaksiDetail::where('tanggal', '<=', strtotime($request->date_to))->get();
                $to = Carbon::parse($request->date_to)->locale('id')->isoFormat('Do MMMM YYYY');
                $ket = 'Sebelum Tanggal '.$to;
                $pdf = PDF::loadView('report.sales-day.print-date', compact('transaksi', 'to', 'ket'));
                return $pdf->download('Laporan Sales Day Sebelum Tanggal '.$to.' ('.Carbon::now()->locale('id')->isoFormat('Do MMMM YYYY').').pdf');
            }
        }
        else if($request->date_form == null || '' && $request->date_to == null || ''){
            $transaksi = TransaksiDetail::all();
            $pdf = PDF::loadView('report.sales-day.print', compact('transaksi'));
            return $pdf->download('Laporan Sales Day Keseluruhan ('.Carbon::now()->locale('id')->isoFormat('Do MMMM YYYY').').pdf');
        }
    }
}
