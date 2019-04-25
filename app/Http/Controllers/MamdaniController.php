<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\karyawan;

class MamdaniController extends Controller
{
    //
    public function index()
    {
        # code...
        $show = karyawan::all();
        $total = karyawan::count();
        
        // $data = karyawan::orderBy('id', 'ASC')->get();

        $data = [
            'count' => $total,
            'show' => $show
        ];

        return view('pages.admin.output')->with('list', $data);
    }
}
