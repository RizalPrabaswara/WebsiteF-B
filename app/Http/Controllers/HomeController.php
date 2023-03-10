<?php

namespace App\Http\Controllers;

use App\Produk;
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
        $produk = Produk::all()->where('status','Menu');
        return view('Front_End.home',compact('produk'));
    }

    public function login() {
        return view('login');
    }

    function form_register(){
        return view('register');
    }
}
