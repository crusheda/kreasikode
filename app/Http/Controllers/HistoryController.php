<?php

namespace App\Http\Controllers;
use App\output;
use App\prestasi;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    //
    public function index(Request $request)
    {
        # code...        
        $output = prestasi::all();

        $bulan = $request->query('bulan');
        $tahun = $request->query('tahun');
        $bln = substr(Carbon::now()->toDateString(),5,2);
        $query_show = "SELECT * FROM output WHERE MONTH(created_at) = $bln ORDER BY created_at DESC";
        $show = DB::select($query_show);
        $total = output::count();

        if($bulan && $tahun){
            $query_string = "SELECT * FROM output WHERE YEAR(created_at) = $tahun AND MONTH(created_at) = $bulan";
            $show = DB::select($query_string);
            $total = count($show);
        }
        elseif($bulan){
            $query_string = "SELECT * FROM output WHERE MONTH(created_at) = $bulan";
            $show = DB::select($query_string);
            $total = count($show);
        }
        elseif($bulan){
            $query_string = "SELECT * FROM output WHERE YEAR(created_at) = $tahun";
            $show = DB::select($query_string);
            $total = count($show);
        }        

        $data = [
            'count' => $total,
            'show' => $show,
            'output' => $output
        ];
        return view('pages.admin.history')->with('list', $data);
    }
}
