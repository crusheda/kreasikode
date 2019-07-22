<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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

        // Menampilkan Output Karyawan Berprestasi
        if (count($prestasi) > 0) {
            foreach ($prestasi as $key => $value) {
                # code...
                $hasils[] = $value->z;
            }
            $hasil = max($hasils);
            $getnama = DB::table('output')->where('z', $hasil)->get();
            foreach ($getnama as $key => $value) {
                $shownama = $value->nama;
            }
            foreach ($prestasi as $key => $value) {
                if ($value->z == $hasil) {
                    $showhasil = DB::table('karyawan')->where('nama', $shownama)->get();
                    foreach($getnama as $key => $value){
                        $data = new prestasi;
                        $data->nama = $value->nama;
                        $data->dspburuk = $value->dspburuk;
                        $data->dspcukup = $value->dspcukup;
                        $data->dspbaik = $value->dspbaik;
                        $data->tjbjelek = $value->tjbjelek;
                        $data->tjblumayan = $value->tjblumayan;
                        $data->tjbbagus = $value->tjbbagus;
                        $data->pnsburuk = $value->pnsburuk;
                        $data->pnscukup = $value->pnscukup;
                        $data->pnsbaik = $value->pnsbaik;
                        $data->maxburuk = $value->maxburuk;
                        $data->maxbaik = $value->maxbaik;
                        $data->z1 = $value->z1;
                        $data->z2 = $value->z2;
                        $data->m1 = $value->m1;
                        $data->m2 = $value->m2;
                        $data->m3 = $value->m3;
                        $data->a1 = $value->a1;
                        $data->a2 = $value->a2;
                        $data->a3 = $value->a3;
                        $data->z = $value->z;
                        foreach($showhasil as $key => $value){
                            $data->id_karyawan = $value->id;
                            $data->kategori = $value->kategori;
                            $data->disiplin = $value->disiplin;
                            $data->tanggungjawab = $value->tanggungjawab;
                            $data->planningskill = $value->planningskill;
                        }
                        $query = prestasi::orderBy('created_at', 'DESC')->get();
                        if (count($query) == 0) {
                            # code...
                            $data->save();
                        }
                        elseif(count($query) > 0) {
                            $bln_prestasi = substr($query[0]->created_at,5,2);
                            $bln_now = substr(Carbon::now()->toDateString(),5,2);
                            if ($bln_prestasi != $bln_now) {
                                $data->save();
                            }
                            else {
                                # will not save anything..
                            }
                        }
                    }
                }
            }
        }
        
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
        if ($x <= 5) {
            # code...
            $dspburuk = 1;
        
        } elseif ($x > 5 && $x < 34) {
            # code...
            $dspburuk = (34-$x)/(34-5);

        } elseif ($x >= 34) {
            # code...
            $dspburuk = 0;

        }
        //sedang
        if ($x <= 5) {
            # code...
            $dspcukup = 0;

        } elseif ($x >= 46){
            # code...
            $dspcukup = 0;

        } elseif ($x > 5 && $x < 34) {
            # code...
            $dspcukup = ($x-5)/(34-5);
            
        } elseif ($x > 34 && $x < 46) {
            # code...
            $dspcukup = (46-$x)/(46-34);

        } elseif ($x == 34){
            $dspcukup = 1;
        }

        //tinggi
        if ($x <= 34) {
            # code...
            $dspbaik = 0;
        
        } elseif ($x > 34 && $x < 46) {
            # code...
            $dspbaik = ($x-34)/(46-34);

        } elseif ($x >= 46) {
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
        if ($y <= 40) {
            # code...
            $tjbjelek = 1;
        
        } elseif ($y > 40 && $y < 56) {
            # code...
            $tjbjelek = (56-$y)/(56-40);

        } elseif ($y >= 56) {
            # code...
            $tjbjelek = 0;
        }

        //sedang
        if ($y <= 40) {
            # code...
            $tjblumayan = 0;

        } elseif ($y >= 79){
            # code...
            $tjblumayan = 0;
        
        } elseif ($y > 40 && $y < 56) {
            # code...
            $tjblumayan = ($y-40)/(56-40);
            
        } elseif ($y > 56 && $y < 79) {
            # code...
            $tjblumayan = (90-$y)/(90-50);

        } elseif ($y == 56){
            $tjblumayan = 1;
        }

        //tinggi
        if ($y <= 56) {
            # code...
            $tjbbagus = 0;
        
        } elseif ($y > 56 && $y < 79) {
            # code...
            $tjbbagus = ($y-56)/(79-56);

        } elseif ($y >= 79) {
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
        if ($z <= 67) {
            # code...
            $pnsburuk = 1;
        
        } elseif ($z > 67 && $z < 90) {
            # code...
            $pnsburuk = (90-$z)/(90-67);

        } elseif ($z >= 90) {
            # code...
            $pnsburuk = 0;
        }

        //sedang
        if ($z <= 67) {
            # code...
            $pnscukup = 0;

        } elseif ($z >= 90) {
            # code...
            $pnscukup = 0;

        } elseif ($z > 67 && $z < 90) {
            # code...
            $pnscukup = ($z-67)/(90-67);
            
        } elseif ($z > 90 && $z < 125) {
            # code...
            $pnscukup = (125-$z)/(125-90);

        } elseif ($z == 90) {
            # code...
            $pnscukup = 1;
        }

        //tinggi
        if ($z <= 90) {
            # code...
            $pnsbaik = 0;
        
        } elseif ($z > 90 && $z < 125) {
            # code...
            $pnsbaik = ($z-90)/(125-90);

        } elseif ($z >= 125) {
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
        $z1 = (80 * $maxBuruk) + 10;
        $z2 = (80 * $maxBaik) + 10;

        //Nilai M (Penentuan Momen Untuk Setiap Daerah)
        $m1 = (($maxBuruk / 2)*($z1*$z1))-(($maxBuruk / 2)*(10*10));
        $m2 = ( (((1 / 80) / 3) * ($z2*$z2*$z2)) - ((((10 / 80) / 2)) * ($z2*$z2)) ) - 
              ( (((1 / 80) / 3) * ($z1*$z1*$z1)) - ((((10 / 80) / 2)) * ($z1*$z1)) );
        $m3 = (($maxBaik / 2)*(100*100))-(($maxBaik / 2)*($z2*$z2));

        //Nilai A (Penentuan Area Untuk Setiap Daerah)
        $a1 = ($z1-10) * $maxBuruk;
        $a2 = (($maxBuruk + $maxBaik)*($z2 - $z1)) / 2;
        $a3 = (100 - $z2) * $maxBaik;
        
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
