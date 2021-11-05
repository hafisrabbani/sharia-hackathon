<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function donasi()
    {
        return view('admin.donasi');
    }

    public function lelang()
    {
        return view('admin.lelang');
    }

    public function market()
    {
        return view('admin.market');
    }
}
