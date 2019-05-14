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
        $data = karyawan::all();
        
        $predikats = [];
        foreach ($data as $key => $value) {
            # code...
            $kpirendah = $this->hitungKpiRendah($value->kpi);
            $kpisedang = $this->hitungKpiSedang($value->kpi);
            $kpitinggi = $this->hitungKpiTinggi($value->kpi);

            $ssjelek = $this->hitungSSJelek($value->softskill);
            $sslumayan = $this->hitungSSLumayan($value->softskill);
            $ssbagus = $this->hitungSSBagus($value->softskill);

            $hsburuk = $this->hitungHSBuruk($value->hardskill);
            $hscukup = $this->hitungHSCukup($value->hardskill);
            $hsbaik = $this->hitungHSBaik($value->hardskill);

            array_push($predikats, [
                'nama' => $value->nama,
                'kpirendah' => $kpirendah,
                'kpisedang' => $kpisedang,
                'kpitinggi' => $kpitinggi,
                'ssjelek' => $ssjelek,
                'sslumayan' => $sslumayan,
                'ssbagus' => $ssbagus,
                'hsburuk' => $hsburuk,
                'hscukup' => $hscukup,
                'hsbaik' => $hsbaik
            ]);
        }
        
        print_r($predikats[0]);
        ?> <br> <br> <?php
        print_r($predikats[1]);
        ?> <br> <br> <?php
        print_r($predikats[2]);
        die();

        //     $hasilkpi = $this->hitungKpi($value->kpi);
        //     $hasilss = $this->hitungSoftskill($value->softskill);
        //     $hasilhs = $this->hitungHardskill($value->hardskill);
        //     $predikat = min($hasilkpi,$hasilss,$hasilhs);
        //     $hasilakhir = $this->deFuzzy($predikat);
        //     array_push($predikats, [
        //         'id' => $value->id,
        //         'nama' => $value->nama,
        //         'predikat' => $predikat,
        //         'hasilakhir' => $hasilakhir
        //     ]);
        // }

        // print_r($predikats[0]);
        // die();

            // $save = rolefuzzy::find($id);
            // $data->predikat = $predikat;
            // $data->save();
        // Array $data to HTML
        // $data = [
        //     'show' => $data,
        // ];
    // return view('pages.admin.output')->with('list',$predikats);
    return view('pages.admin.output')->with('list',$predikats);
    }

    public function hitungKpiRendah($x)
    {
        # code...
        // Himpunan Fuzzy
        //rendah
        if ($x <= 50) {
            # code...
            $kpirendah = 1;
        
        } elseif ($x >= 50 && $x <= 80) {
            # code...
            $kpirendah = (80-$x)/(80-50);

        } elseif ($x >= 80) {
            # code...
            $kpirendah = 0;

        }
        return $kpirendah;
    }

    public function hitungKpiSedang($x)
    {
        //sedang
        if ($x <= 50 || $x >= 130) {
            # code...
            $kpisedang = 0;

        } elseif ($x >= 50 && $x <= 80) {
            # code...
            $kpisedang = ($x-50)/(80-50);
            
        } elseif ($x >=80 && $x <= 130) {
            # code...
            $kpisedang = (130-$x)/(130-80);

        }
        return $kpisedang;
    }

    public function hitungKpiTinggi($x)
    {
        //tinggi
        if ($x <= 80) {
            # code...
            $kpitinggi = 0;
        
        } elseif ($x >= 80 && $x <= 130) {
            # code...
            $kpitinggi = ($x-80)/(130-80);

        } elseif ($x >= 130) {
            # code...
            $kpitinggi = 1;

        }
        return $kpitinggi;
    }
    
    public function hitungSSJelek($y)
    {
        # code...
        // Himpunan Fuzzy
        //rendah
        if ($y <= 40) {
            # code...
            $ssjelek = 1;
        
        } elseif ($y >= 40 && $y <= 75) {
            # code...
            $ssjelek = (75-$y)/(75-40);

        } elseif ($y >= 75) {
            # code...
            $ssjelek = 0;

        }
        return $ssjelek;
    }

    public function hitungSSLumayan($y)
    {
        //sedang
        if ($y <= 40 || $y >= 90) {
            # code...
            $sslumayan = 0;

        } elseif ($y >= 40 && $y <= 75) {
            # code...
            $sslumayan = ($y-40)/(75-40);
            
        } elseif ($y >=75 && $y <= 90) {
            # code...
            $sslumayan = (90-$y)/(90-75);

        }
        return $sslumayan;
    }

    public function hitungSSBagus($y)
    {
        //tinggi
        if ($y <= 75) {
            # code...
            $ssbagus = 0;
        
        } elseif ($y >= 75 && $y <= 90) {
            # code...
            $ssbagus = ($y-75)/(90-75);

        } elseif ($y >= 90) {
            # code...
            $ssbagus = 1;

        }
        return $ssbagus;
    }

    public function hitungHSBuruk($z)
    {
        # code...
        // Himpunan Fuzzy
        //rendah
        if ($z <= 60) {
            # code...
            $hsburuk = 1;
        
        } elseif ($z >= 60 && $z <= 100) {
            # code...
            $hsburuk = (100-$z)/(100-60);

        } elseif ($z >= 150) {
            # code...
            $hsburuk = 0;

        }
        return $hsburuk;
    }

    public function hitungHSCukup($z)
    {
        //sedang
        if ($z <= 60 || $z >= 180) {
            # code...
            $hscukup = 0;

        } elseif ($z >= 60 && $z <= 100) {
            # code...
            $hscukup = ($z-60)/(100-60);
            
        } elseif ($z >=100 && $z <= 180) {
            # code...
            $hscukup = (1180-$z)/(180-100);

        }
        return $hscukup;
    }

    public function hitungHSBaik($z)
    {
        //tinggi
        if ($z <= 100) {
            # code...
            $hsbaik = 0;
        
        } elseif ($z >= 100 && $z <= 180) {
            # code...
            $hsbaik = ($z-100)/(180-100);

        } elseif ($z >= 180) {
            # code...
            $hsbaik = 1;

        }
        return $hsbaik;
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
