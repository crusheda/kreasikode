<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\karyawan;
use App\rolefuzzy;

class MamdaniController extends Controller
{
    //
    public function index()
    {
        # code...
        $datakaryawan = karyawan::all();
        $datarole = rolefuzzy::all();

        $showdata = [];
        $predikat =[];
        // foreach ($datarole as $key => $value) {
        foreach ($datakaryawan as $key => $value) {
            # code...
            $hasilkpi = $this->hitungKpi($value->kpi);
            $hasilss = $this->hitungSoftSkill($value->softskill);
            $hasilhs = $this->hitungHardSkill($value->hardskill);

            $predikat = $this->hitungPred($hasilkpi,$hasilss,$hasilhs);
            array_push( $showdata, [
                'id' => $value->id,
                'nama' => $value->nama,
                'hasilkpi' => $hasilkpi,
                'hasilss' => $hasilss,
                'hasilhs' => $hasilhs,
                'predikat' => $predikat
            ]);
        }
        // $array =  (array) $showdata;
        // print_r($showdata);
        // die();
        return view('pages.admin.output')->with('list',$showdata);
    }

    public function hitungKpi($x)
    {
        # code...
        //rendah
        if ($x <= 50) {
            # code...
            $kpirendah = 1;
        
        } elseif ($x > 50 && $x < 80) {
            # code...
            $kpirendah = (80-$x)/(80-50);

        } elseif ($x >= 80) {
            # code...
            $kpirendah = 0;

        }
        //sedang
        if ($x <= 50) {
            # code...
            $kpisedang = 0;

        } elseif ($x >= 130){
            # code...
            $kpisedang = 0;

        } elseif ($x > 50 && $x < 80) {
            # code...
            $kpisedang = ($x-50)/(80-50);
            
        } elseif ($x > 80 && $x < 130) {
            # code...
            $kpisedang = (130-$x)/(130-80);

        } elseif ($x == 80){
            $kpisedang = 1;
        }
        //tinggi
        if ($x <= 80) {
            # code...
            $kpitinggi = 0;
        
        } elseif ($x > 80 && $x < 130) {
            # code...
            $kpitinggi = ($x-80)/(130-80);

        } elseif ($x >= 130) {
            # code...
            $kpitinggi = 1;

        }

        $data = [
            'kpirendah' => $kpirendah,
            'kpisedang' => $kpisedang,
            'kpitinggi' => $kpitinggi
            ];
        return $data;
    }

    public function hitungSoftSkill($y)
    {
        # code...
        //rendah
        if ($y <= 40) {
            # code...
            $ssjelek = 1;
        
        } elseif ($y > 40 && $y < 80) {
            # code...
            $ssjelek = (80-$y)/(80-40);

        } elseif ($y >= 80) {
            # code...
            $ssjelek = 0;

        }
        //sedang
        if ($y <= 40) {
            # code...
            $sslumayan = 0;

        } elseif ($y >= 120){
            # code...
            $sslumayan = 0;
        
        } elseif ($y > 40 && $y < 80) {
            # code...
            $sslumayan = ($y-40)/(80-40);
            
        } elseif ($y > 80 && $y < 120) {
            # code...
            $sslumayan = (120-$y)/(120-80);

        } elseif ($y == 80){
            $sslumayan = 1;

        }
        //tinggi
        if ($y <= 80) {
            # code...
            $ssbagus = 0;
        
        } elseif ($y > 80 && $y < 120) {
            # code...
            $ssbagus = ($y-80)/(120-80);

        } elseif ($y >= 120) {
            # code...
            $ssbagus = 1;

        }
        $data = [
            'ssjelek' => $ssjelek,
            'sslumayan' => $sslumayan,
            'ssbagus' => $ssbagus
            ];
        return $data;
    }
    
    public function hitungHardSkill($z)
    {
        # code...
        //rendah
        if ($z <= 60) {
            # code...
            $hsburuk = 1;
        
        } elseif ($z > 60 && $z < 100) {
            # code...
            $hsburuk = (100-$z)/(100-60);

        } elseif ($z >= 150) {
            # code...
            $hsburuk = 0;

        }
        //sedang
        if ($z <= 60) {
            # code...
            $hscukup = 0;

        } elseif ($z >= 180) {
            # code...
            $hscukup = 0;

        } elseif ($z > 60 && $z < 100) {
            # code...
            $hscukup = ($z-60)/(100-60);
            
        } elseif ($z > 100 && $z < 180) {
            # code...
            $hscukup = (1180-$z)/(180-100);

        } elseif ($z == 100) {
            # code...
            $hscukup = 1;

        }
        //tinggi
        if ($z <= 100) {
            # code...
            $hsbaik = 0;
        
        } elseif ($z > 100 && $z < 180) {
            # code...
            $hsbaik = ($z-100)/(180-100);

        } elseif ($z >= 180) {
            # code...
            $hsbaik = 1;

        }
        $data = [
            'hsburuk' => $hsburuk,
            'hscukup' => $hscukup,
            'hsbaik' => $hsbaik
            ];
        return $data;
    }

    public function hitungPred($hasilkpi,$hasilss,$hasilhs)
    {
        # code...
        //KPI
        $hasilkpirendah = $hasilkpi['kpirendah'];
        $hasilkpisedang = $hasilkpi['kpisedang'];
        $hasilkpitinggi = $hasilkpi['kpitinggi'];

        //SS
        $hasilssjelek = $hasilss['ssjelek'];
        $hasilsslumayan = $hasilss['sslumayan'];
        $hasilssbagus = $hasilss['ssbagus'];

        // //HS
        $hasilhsburuk = $hasilhs['hsburuk'];
        $hasilhscukup = $hasilhs['hscukup'];
        $hasilhsbaik = $hasilhs['hsbaik'];
        
        //Aplikasi Fungsi Implikasi
        $role1 = min($hasilkpitinggi,$hasilssbagus,$hasilhsbaik);
        $role2 = min($hasilkpitinggi,$hasilssbagus,$hasilhscukup);
        $role3 = min($hasilkpitinggi,$hasilssbagus,$hasilhsburuk);
        $role4 = min($hasilkpitinggi,$hasilsslumayan,$hasilhsbaik);
        $role5 = min($hasilkpitinggi,$hasilsslumayan,$hasilhscukup);
        $role6 = min($hasilkpitinggi,$hasilsslumayan,$hasilhsburuk);
        $role7 = min($hasilkpitinggi,$hasilssjelek,$hasilhsbaik);
        $role8 = min($hasilkpitinggi,$hasilssjelek,$hasilhscukup);
        $role9 = min($hasilkpitinggi,$hasilssjelek,$hasilhsburuk);
        $role10 = min($hasilkpisedang,$hasilssbagus,$hasilhsbaik);
        $role11 = min($hasilkpisedang,$hasilssbagus,$hasilhscukup);
        $role12 = min($hasilkpisedang,$hasilssbagus,$hasilhsburuk);
        $role13 = min($hasilkpisedang,$hasilsslumayan,$hasilhsbaik);
        $role14 = min($hasilkpisedang,$hasilsslumayan,$hasilhscukup);
        $role15 = min($hasilkpisedang,$hasilsslumayan,$hasilhsburuk);
        $role16 = min($hasilkpisedang,$hasilssjelek,$hasilhsbaik);
        $role17 = min($hasilkpisedang,$hasilssjelek,$hasilhscukup);
        $role18 = min($hasilkpisedang,$hasilssjelek,$hasilhsburuk);
        $role19 = min($hasilkpirendah,$hasilssbagus,$hasilhsbaik);
        $role20 = min($hasilkpirendah,$hasilssbagus,$hasilhscukup);
        $role21 = min($hasilkpirendah,$hasilssbagus,$hasilhsburuk);
        $role22 = min($hasilkpirendah,$hasilsslumayan,$hasilhsbaik);
        $role23 = min($hasilkpirendah,$hasilsslumayan,$hasilhscukup);
        $role24 = min($hasilkpirendah,$hasilsslumayan,$hasilhsburuk);
        $role25 = min($hasilkpirendah,$hasilssjelek,$hasilhsbaik);
        $role26 = min($hasilkpirendah,$hasilssjelek,$hasilhscukup);
        $role27 = min($hasilkpirendah,$hasilssjelek,$hasilhsburuk);

        //Komposisi Aturan MAX
        $maxBuruk = max($role6,$role9,$role12,$role15,$role17,$role18,$role20,
                    $role21,$role23,$role24,$role25,$role26,$role27);
        $maxBaik = max($role1,$role2,$role3,$role4,$role5,$role7,$role8,$role10,
                    $role11,$role13,$role14,$role16,$role19,$role22);
        
        //Nilai Keanggotaan
            # a1 = ((PrestasiBaik - PrestasiRendah)*MaxBuruk)+MinPrestasi
        $a1 = ((120-40)*$maxBuruk)+40;
            # a2 = ((PrestasiBaik - PrestasiRendah)*MaxBaik)+MinPrestasi
        $a2 = ((120-40)*$maxBaik)+40;

        $data = [
            'role1' => $role1,
            'role2' => $role2,
            'role3' => $role3,
            'role4' => $role4,
            'role5' => $role5,
            'role6' => $role6,
            'role7' => $role7,
            'role8' => $role8,
            'role9' => $role9,
            'role10' => $role10,
            'role11' => $role11,
            'role12' => $role12,
            'role13' => $role13,
            'role14' => $role14,
            'role15' => $role15,
            'role16' => $role16,
            'role17' => $role17,
            'role18' => $role18,
            'role19' => $role19,
            'role20' => $role20,
            'role21' => $role21,
            'role22' => $role22,
            'role23' => $role23,
            'role24' => $role24,
            'role25' => $role25,
            'role26' => $role26,
            'role27' => $role27,
            'maxburuk' => $maxBuruk,
            'maxbaik' => $maxBaik,
            'a1' => $a1,
            'a2' => $a2
            ];
        return $data;
    }

    public function komposisiAturan(Type $var = null)
    {
        # code...

    }

    public function toHitung()
    {
        # code...
        $show = rolefuzzy::orderBy('id', 'ASC')->get();
        return view('pages.admin.mamdani')->with('list', $show);
    }

    public function deFuzzy($pred)
    {
        # rumus...
        $hasil = $pred + 1;
        return $hasil;
    }
}
