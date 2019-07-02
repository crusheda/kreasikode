<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\karyawan;
use App\rolefuzzy;
use App\output;
use App\prestasi;
use Carbon\Carbon;

class MamdaniController extends Controller
{
    //
    public function index()
    {
        # code...
        $datakaryawan = karyawan::all();
        $datarole = rolefuzzy::all();
        $prestasi = output::all();

        $showdata = [];
        $predikat =[];
        
        foreach ($datakaryawan as $key => $value) 
        {
            $hasildsp = $this->hitungDisiplin($value->disiplin);
            $hasiltjb = $this->hitungTanggungjawab($value->tanggungjawab);
            $hasilpns = $this->hitungPlanningskill($value->planningskill);

            $predikat = $this->hitungPred($hasildsp,$hasiltjb,$hasilpns);
            
            array_push( $showdata, [
                'id' => $value->id,
                'nama' => $value->nama,
                'hasildsp' => $hasildsp,
                'hasiltjb' => $hasiltjb,
                'hasilpns' => $hasilpns,
                'predikat' => $predikat
            ]);
        }

        foreach ($prestasi as $key => $value) {
            # code...
            $hasils[] = $value->z;
        }
        $hasil = max($hasils);
        // $showhasil = DB::table('output')->where('z', $hasil);
        // print_r($showhasil);
        
        // die();

        $query = output::orderBy('created_at', 'DESC')->get();
        $active_button = true;
        if (count($query) > 0) {
            $bln_karyawan = substr($query[0]->created_at,5,2);
            $bln = substr(Carbon::now()->toDateString(),5,2);
   
            if ($bln_karyawan == $bln) {
                $active_button = false;
            }
        }
    
        // print_r($output->z);
        // die();

        $data = [
            'list' => $showdata,
            'active_button' => $active_button
        ];
        
        // $save = new prestasi;
        // $save->id_karyawan = $hasil['id'];
        // $save->nama = $hasil['nama'];
        // $save->kategori = $hasil['kategori'];
        // $save->disiplin = $hasil['disiplin'];
        // $save->tanggungjawab = $hasil['tanggungjawab'];
        // $save->planningskill = $hasil['planningskill'];

        // $save->save(); 

        return view('pages.admin.output')->with('data', $data);
    }

    public function simpanOutput()
    {
        # Menyimpan Hasil Output ke dalam DB!
        $datakaryawan = karyawan::all();
        $datarole = rolefuzzy::all();

        $showdata = [];
        $predikat =[];
        
        foreach ($datakaryawan as $key => $value) 
        {
            $hasildsp = $this->hitungDisiplin($value->disiplin);
            $hasiltjb = $this->hitungTanggungjawab($value->tanggungjawab);
            $hasilpns = $this->hitungPlanningskill($value->planningskill);

            $predikat = $this->hitungPred($hasildsp,$hasiltjb,$hasilpns);
            array_push( $showdata, [
                'id' => $value->id,
                'nama' => $value->nama,
                'hasildsp' => $hasildsp,
                'hasiltjb' => $hasiltjb,
                'hasilpns' => $hasilpns,
                'predikat' => $predikat
            ]);
        }

        foreach($showdata as $key => $value){
            $data = new output;
            $data->nama = $value['nama'];
            $data->dspburuk = $value['hasildsp']['dspburuk'];
            $data->dspcukup = $value['hasildsp']['dspcukup'];
            $data->dspbaik = $value['hasildsp']['dspbaik'];
            $data->tjbjelek = $value['hasiltjb']['tjbjelek'];
            $data->tjblumayan = $value['hasiltjb']['tjblumayan'];
            $data->tjbbagus = $value['hasiltjb']['tjbbagus'];
            $data->pnsburuk = $value['hasilpns']['pnsburuk'];
            $data->pnscukup = $value['hasilpns']['pnscukup'];
            $data->pnsbaik = $value['hasilpns']['pnsbaik'];
            $data->maxburuk = $value['predikat']['maxburuk'];
            $data->maxbaik = $value['predikat']['maxbaik'];
            $data->z1 = $value['predikat']['z1'];
            $data->z2 = $value['predikat']['z2'];
            $data->m1 = $value['predikat']['m1'];
            $data->m2 = $value['predikat']['m2'];
            $data->m3 = $value['predikat']['m3'];
            $data->a1 = $value['predikat']['a1'];
            $data->a2 = $value['predikat']['a2'];
            $data->a3 = $value['predikat']['a3'];
            $data->z = $value['predikat']['z'];

            $data->save();
        }
        return redirect('/mamdani')->with('message','Simpan Data Output Berhasil');
    }

    public function hitungDisiplin($x)
    {
        # code...
        //rendah
        if ($x == 1) {
            # code...
            $dspburuk = 1;
        
        } elseif ($x > 1 && $x < 3) {
            # code...
            $dspburuk = (3-$x)/(3-1);

        } elseif ($x >= 3) {
            # code...
            $dspburuk = 0;

        }
        //sedang
        if ($x == 1) {
            # code...
            $dspcukup = 0;

        } elseif ($x == 5){
            # code...
            $dspcukup = 0;

        } elseif ($x > 1 && $x < 3) {
            # code...
            $dspcukup = ($x-1)/(3-1);
            
        } elseif ($x > 3 && $x < 5) {
            # code...
            $dspcukup = (5-$x)/(5-3);

        } elseif ($x == 3){
            $dspcukup = 1;
        }

        //tinggi
        if ($x <= 3) {
            # code...
            $dspbaik = 0;
        
        } elseif ($x > 3 && $x < 5) {
            # code...
            $dspbaik = ($x-3)/(5-3);

        } elseif ($x == 5) {
            # code...
            $dspbaik = 1;
        }

        $data = [
            'dspburuk' => $dspburuk,
            'dspcukup' => $dspcukup,
            'dspbaik' => $dspbaik,
            ];
        return $data;
    }

    public function hitungTanggungjawab($y)
    {
        # code...
        //rendah
        if ($y == 1) {
            # code...
            $tjbjelek = 1;
        
        } elseif ($y > 1 && $y < 3) {
            # code...
            $tjbjelek = (3-$y)/(3-1);

        } elseif ($y >= 3) {
            # code...
            $tjbjelek = 0;
        }

        //sedang
        if ($y == 1) {
            # code...
            $tjblumayan = 0;

        } elseif ($y == 5){
            # code...
            $tjblumayan = 0;
        
        } elseif ($y > 1 && $y < 3) {
            # code...
            $tjblumayan = ($y-1)/(3-1);
            
        } elseif ($y > 3 && $y < 5) {
            # code...
            $tjblumayan = (5-$y)/(5-3);

        } elseif ($y == 3){
            $tjblumayan = 1;
        }

        //tinggi
        if ($y <= 3) {
            # code...
            $tjbbagus = 0;
        
        } elseif ($y > 3 && $y < 5) {
            # code...
            $tjbbagus = ($y-3)/(5-3);

        } elseif ($y == 5) {
            # code...
            $tjbbagus = 1;
        }

        $data = [
            'tjbjelek' => $tjbjelek,
            'tjblumayan' => $tjblumayan,
            'tjbbagus' => $tjbbagus,
            ];
        return $data;
    }
    
    public function hitungPlanningskill($z)
    {
        # code...
        //rendah
        if ($z == 1) {
            # code...
            $pnsburuk = 1;
        
        } elseif ($z > 1 && $z < 3) {
            # code...
            $pnsburuk = (3-$z)/(3-1);

        } elseif ($z >= 3) {
            # code...
            $pnsburuk = 0;
        }

        //sedang
        if ($z == 1) {
            # code...
            $pnscukup = 0;

        } elseif ($z == 5) {
            # code...
            $pnscukup = 0;

        } elseif ($z > 1 && $z < 3) {
            # code...
            $pnscukup = ($z-1)/(3-1);
            
        } elseif ($z > 3 && $z < 5) {
            # code...
            $pnscukup = (5-$z)/(5-3);

        } elseif ($z == 3) {
            # code...
            $pnscukup = 1;
        }

        //tinggi
        if ($z <= 3) {
            # code...
            $pnsbaik = 0;
        
        } elseif ($z > 3 && $z < 5) {
            # code...
            $pnsbaik = ($z-3)/(5-3);

        } elseif ($z == 5) {
            # code...
            $pnsbaik = 1;
        }

        $data = [
            'pnsburuk' => $pnsburuk,
            'pnscukup' => $pnscukup,
            'pnsbaik' => $pnsbaik,
            ];
        return $data;
    }

    public function hitungPred($hasildsp,$hasiltjb,$hasilpns)
    {
        # code...
        //KPI
        $hasildspburuk = $hasildsp['dspburuk'];
        $hasildspcukup = $hasildsp['dspcukup'];
        $hasildspbaik = $hasildsp['dspbaik'];

        //SS
        $hasiltjbjelek = $hasiltjb['tjbjelek'];
        $hasiltjblumayan = $hasiltjb['tjblumayan'];
        $hasiltjbbagus = $hasiltjb['tjbbagus'];

        // //HS
        $hasilpnsburuk = $hasilpns['pnsburuk'];
        $hasilpnscukup = $hasilpns['pnscukup'];
        $hasilpnsbaik = $hasilpns['pnsbaik'];
        
        //Aplikasi Fungsi Implikasi
        $role1 = min($hasildspbaik,$hasiltjbbagus,$hasilpnsbaik);
        $role2 = min($hasildspbaik,$hasiltjbbagus,$hasilpnscukup);
        $role3 = min($hasildspbaik,$hasiltjbbagus,$hasilpnsburuk);
        $role4 = min($hasildspbaik,$hasiltjblumayan,$hasilpnsbaik);
        $role5 = min($hasildspbaik,$hasiltjblumayan,$hasilpnscukup);
        $role6 = min($hasildspbaik,$hasiltjblumayan,$hasilpnsburuk);
        $role7 = min($hasildspbaik,$hasiltjbjelek,$hasilpnsbaik);
        $role8 = min($hasildspbaik,$hasiltjbjelek,$hasilpnscukup);
        $role9 = min($hasildspbaik,$hasiltjbjelek,$hasilpnsburuk);
        $role10 = min($hasildspcukup,$hasiltjbbagus,$hasilpnsbaik);
        $role11 = min($hasildspcukup,$hasiltjbbagus,$hasilpnscukup);
        $role12 = min($hasildspcukup,$hasiltjbbagus,$hasilpnsburuk);
        $role13 = min($hasildspcukup,$hasiltjblumayan,$hasilpnsbaik);
        $role14 = min($hasildspcukup,$hasiltjblumayan,$hasilpnscukup);
        $role15 = min($hasildspcukup,$hasiltjblumayan,$hasilpnsburuk);
        $role16 = min($hasildspcukup,$hasiltjbjelek,$hasilpnsbaik);
        $role17 = min($hasildspcukup,$hasiltjbjelek,$hasilpnscukup);
        $role18 = min($hasildspcukup,$hasiltjbjelek,$hasilpnsburuk);
        $role19 = min($hasildspburuk,$hasiltjbbagus,$hasilpnsbaik);
        $role20 = min($hasildspburuk,$hasiltjbbagus,$hasilpnscukup);
        $role21 = min($hasildspburuk,$hasiltjbbagus,$hasilpnsburuk);
        $role22 = min($hasildspburuk,$hasiltjblumayan,$hasilpnsbaik);
        $role23 = min($hasildspburuk,$hasiltjblumayan,$hasilpnscukup);
        $role24 = min($hasildspburuk,$hasiltjblumayan,$hasilpnsburuk);
        $role25 = min($hasildspburuk,$hasiltjbjelek,$hasilpnsbaik);
        $role26 = min($hasildspburuk,$hasiltjbjelek,$hasilpnscukup);
        $role27 = min($hasildspburuk,$hasiltjbjelek,$hasilpnsburuk);

        //Nilai MAX untuk Komposisi Aturan
        $maxBuruk = max($role6,$role9,$role12,$role15,$role17,$role18,$role20,
                    $role21,$role23,$role24,$role25,$role26,$role27);
        $maxBaik = max($role1,$role2,$role3,$role4,$role5,$role7,$role8,$role10,
                    $role11,$role13,$role14,$role16,$role19,$role22);
        
        //Nilai Z (Komposisi Aturan) 
        $z1 = (4 * $maxBuruk) + 1;
        $z2 = (4 * $maxBaik) + 1;

        //Nilai M (Penentuan Momen Untuk Setiap Daerah)
        $m1 = ($maxBuruk / 2) * ($z1 * $z1);
        $m2 = 1; //Masih Mencari!!!
        $m3 = ($maxBaik / 2) * ($z2 * $z2);

        //Nilai A (Penentuan Area Untuk Setiap Daerah)
        $a1 = $z1 * $maxBuruk;
        $a2 = (($maxBuruk + $maxBaik)*($z2 - $z1)) / 2;
        $a3 = (5 - $maxBaik) * $z2;
        
        //Mencari Titik Pusat Dari Daerah Fuzzy
        $z = ($m1 + $m2 + $m3) / ($a1 + $a2 + $a3);

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
            'z1' => $z1,
            'z2' => $z2,
            'm1' => $m1,
            'm2' => $m2,
            'm3' => $m3,
            'a1' => $a1,
            'a2' => $a2,
            'a3' => $a3,
            'z' => $z
            ];
        return $data;
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
        $hasil = max($pred);
        return $hasil;
    }
}
