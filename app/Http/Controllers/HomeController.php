<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function welcome()
    {
        $karyawan = \App\User::count();
        $produk = \App\Model\Produk::count();
        $transaksi = \App\Model\TransaksiDetail::count();
        $profil = \App\Model\Profil::count();
        return view('welcome', compact('karyawan', 'produk', 'transaksi', 'profil'));
    }

    public function setting()
    {
        return view('setting');
    }
}
