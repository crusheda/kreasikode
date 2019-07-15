<?php

namespace App\Http\Controllers;

use App\prestasi;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
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
        return view('pages.admin.index')->with('list', $data);
    }

    public function grafik()
    {
        # code...
        $data = prestasi::orderBy('created_at', 'DESC')->limit(2)->get();

        return response()->json([
            'data' => $data
        ]);
    }

    public function showLogin()
    {
        // show the form
        return View::make('pages.admin.login');
    }
}
