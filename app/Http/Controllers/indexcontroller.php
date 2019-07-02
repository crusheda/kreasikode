<?php

namespace App\Http\Controllers;

use App\output;
use Illuminate\Http\Request;

class indexcontroller extends Controller
{
    //
    public function index()
    {
        # code...
        $data = prestasi::all();

        return view('pages.admin.index')->with('data', $data);
    }
}
