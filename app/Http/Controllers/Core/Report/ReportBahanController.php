<?php

namespace App\Http\Controllers\Core\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ReportBahan;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use PDF;

class ReportBahanController extends Controller
{
    public function index()
    {
        $reportbahan = ReportBahan::all();
        return view('report.report-bahan.index', compact('reportbahan'));
    }

    public function create()
    {
        return view('report.report-bahan.create');
    }

    public function save(Request $request)
    {
        $reportbahan = new ReportBahan;
        $reportbahan->nama_bahan = $request->nama_bahan;
        $reportbahan->jumlah = $request->jumlah;
        $reportbahan->satuan = $request->satuan;
        $reportbahan->save();
        

        Alert::success('Data Produk', 'Berhasil Laporan Bahan !');
        return redirect()->route('report-bahan');
    }

    public function delete($id)
    {
        ReportBahan::where('_id', $id)->delete();
        Alert::success('Data Produk', 'Berhasil Menghapus Laporan Bahan !');
        return redirect()->route('report-bahan');
    }

    public function printAll()
    {
        $reportbahan = ReportBahan::all();
        $pdf = PDF::loadView('report.report-bahan.print', compact('reportbahan'));
        return $pdf->download('Laporan Bahan Keseluruhan ('.Carbon::now()->locale('id')->isoFormat('Do MMMM YYYY').').pdf');
    }

    public function printDate(Request $request)
    {
        if($request->date_from && $request->date_to){
            $reportbahan = Reportbahan::whereBetween('created_at', array($request->date_from, $request->date_to))->get();
            $from = Carbon::parse($request->date_from)->locale('id')->isoFormat('Do MMMM YYYY');
            $to = Carbon::parse($request->date_to)->locale('id')->isoFormat('Do MMMM YYYY');
            $ket = 'Tanggal '.$from.' - '.$to;
            $pdf = PDF::loadView('report.report-bahan.print-date', compact('reportbahan', 'from', 'to', 'ket'));
            return $pdf->download('Laporan Bahan Tanggal '.$from.' - '.$to.' ('.Carbon::now()->locale('id')->isoFormat('Do MMMM YYYY').').pdf');
        }
        else if($request->date_from || $request->date_to){
            if($request->date_to == null || '' && $request->date_form != null || ''){
                $reportbahan = Reportbahan::where('created_at', '>=', strtotime($request->date_from))->get();
                $from = Carbon::parse($request->date_from)->locale('id')->isoFormat('Do MMMM YYYY');
                $ket = 'Setelah Tanggal '.$from;
                $pdf = PDF::loadView('report.report-bahan.print-date', compact('reportbahan', 'from', 'ket'));
                return $pdf->download('Laporan Bahan Setelah Tanggal '.$from.' ('.Carbon::now()->locale('id')->isoFormat('Do MMMM YYYY').').pdf');
            }
            else if($request->date_form == null || '' && $request->date_to != null || ''){
                $reportbahan = Reportbahan::where('created_at', '<=', strtotime($request->date_to))->get();
                $to = Carbon::parse($request->date_to)->locale('id')->isoFormat('Do MMMM YYYY');
                $ket = 'Sebelum Tanggal '.$to;
                $pdf = PDF::loadView('report.report-bahan.print-date', compact('reportbahan', 'to', 'ket'));
                return $pdf->download('Laporan Bahan Sebelum Tanggal '.$to.' ('.Carbon::now()->locale('id')->isoFormat('Do MMMM YYYY').').pdf');
            }
        }
        else if($request->date_form == null || '' && $request->date_to == null || ''){
            $reportbahan = Reportbahan::all();
            $pdf = PDF::loadView('report.report-bahan.print', compact('reportbahan'));
            return $pdf->download('Laporan Bahan Keseluruhan ('.Carbon::now()->locale('id')->isoFormat('Do MMMM YYYY').').pdf');
        }
    }
}
