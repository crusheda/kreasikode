<?php

namespace App\Http\Controllers;

use App\prestasi;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class indexcontroller extends Controller
{
    //
    public function index()
    {
        # code...
        $query = [];
        $total = prestasi::count();
        $bln = substr(Carbon::now()->toDateString(),5,2);
        if ($total > 0) {
            # code...
            $query_show = "SELECT * FROM prestasi WHERE MONTH(created_at) = $bln ORDER BY created_at DESC";
            $query = DB::select($query_show);
        }
        // print_r($query);
        // die();
        $data = [
            'show' => $query,
        ];

        return view('pages.user.index')->with('list', $data);
    }
}
