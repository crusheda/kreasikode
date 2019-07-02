<?php

namespace App\Http\Controllers;

use App\prestasi;
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
        return view('pages.admin.index');
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
