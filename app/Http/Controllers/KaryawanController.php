<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\karyawan;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $show = karyawan::all();
        $total = karyawan::count();
        $jmldsp = karyawan::all()->sum('disiplin');
        $jmltjb = karyawan::all()->sum('tanggungjawab');
        $jmlpns = karyawan::all()->sum('planningskill');

        $data = [
            'count' => $total,
            'show' => $show,
            'jmldsp' => $jmldsp,
            'jmltjb' => $jmltjb,
            'jmlpns' => $jmlpns,
        ];
        return view('pages.admin.karyawan')->with('list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.admin.tambahkaryawan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'nama' => 'required',
            'kategori' => 'required',
            'disiplin' => 'required',
            'tanggungjawab' => 'required',
            'planningskill' => 'required',
            ]);
        $data = new karyawan;
        $data->nama = $request->nama;
        $data->kategori = $request->kategori;
        $data->disiplin = $request->disiplin;
        $data->tanggungjawab = $request->tanggungjawab;
        $data->planningskill = $request->planningskill;

        $data->save();
        return redirect('/karyawan')->with('message','Tambah Data Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = karyawan::find($id);
        return view('pages.admin.editkaryawan')->with('list', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'nama' => 'required',
            'kategori' => 'required',
            'disiplin' => 'required',
            'tanggungjawab' => 'required',
            'planningskill' => 'required',
            ]);
        $data = karyawan::find($id);
        $data->nama = $request->nama;
        $data->kategori = $request->kategori;
        $data->disiplin = $request->disiplin;
        $data->tanggungjawab = $request->tanggungjawab;
        $data->planningskill = $request->planningskill;
        $data->save();

        return redirect('/karyawan')->with('message','Perubahan Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = karyawan::find($id);
        $data->delete();

        // redirect
        return \Redirect::to('/karyawan')->with('message','Hapus Data Karyawan Berhasil');
    }
}
