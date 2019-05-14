<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleFuzzySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role = [
            ['kpi'=>'TINGGI','softskill'=>'BAIK','hardskill'=>'BAGUS','prestasi'=>'','predikat'=>''],
            ['kpi'=>'TINGGI','softskill'=>'BAIK','hardskill'=>'LUMAYAN','prestasi'=>'','predikat'=>''],
            ['kpi'=>'TINGGI','softskill'=>'BAIK','hardskill'=>'JELEK','prestasi'=>'','predikat'=>''],
            ['kpi'=>'TINGGI','softskill'=>'CUKUP','hardskill'=>'BAGUS','prestasi'=>'','predikat'=>''],
            ['kpi'=>'TINGGI','softskill'=>'CUKUP','hardskill'=>'LUMAYAN','prestasi'=>'','predikat'=>''],
            ['kpi'=>'TINGGI','softskill'=>'CUKUP','hardskill'=>'JELEK','prestasi'=>'','predikat'=>''],
            ['kpi'=>'TINGGI','softskill'=>'BURUK','hardskill'=>'BAGUS','prestasi'=>'','predikat'=>''],
            ['kpi'=>'TINGGI','softskill'=>'BURUK','hardskill'=>'LUMAYAN','prestasi'=>'','predikat'=>''],
            ['kpi'=>'TINGGI','softskill'=>'BURUK','hardskill'=>'JELEK','prestasi'=>'','predikat'=>''],
            ['kpi'=>'SEDANG','softskill'=>'BAIK','hardskill'=>'BAGUS','prestasi'=>'','predikat'=>''],
            ['kpi'=>'SEDANG','softskill'=>'BAIK','hardskill'=>'LUMAYAN','prestasi'=>'','predikat'=>''],
            ['kpi'=>'SEDANG','softskill'=>'BAIK','hardskill'=>'JELEK','prestasi'=>'','predikat'=>''],
            ['kpi'=>'SEDANG','softskill'=>'CUKUP','hardskill'=>'BAGUS','prestasi'=>'','predikat'=>''],
            ['kpi'=>'SEDANG','softskill'=>'CUKUP','hardskill'=>'LUMAYAN','prestasi'=>'','predikat'=>''],
            ['kpi'=>'SEDANG','softskill'=>'CUKUP','hardskill'=>'JELEK','prestasi'=>'','predikat'=>''],
            ['kpi'=>'SEDANG','softskill'=>'BURUK','hardskill'=>'BAGUS','prestasi'=>'','predikat'=>''],
            ['kpi'=>'SEDANG','softskill'=>'BURUK','hardskill'=>'LUMAYAN','prestasi'=>'','predikat'=>''],
            ['kpi'=>'SEDANG','softskill'=>'BURUK','hardskill'=>'JELEK','prestasi'=>'','predikat'=>''],
            ['kpi'=>'RENDAH','softskill'=>'BAIK','hardskill'=>'BAGUS','prestasi'=>'','predikat'=>''],
            ['kpi'=>'RENDAH','softskill'=>'BAIK','hardskill'=>'LUMAYAN','prestasi'=>'','predikat'=>''],
            ['kpi'=>'RENDAH','softskill'=>'BAIK','hardskill'=>'JELEK','prestasi'=>'','predikat'=>''],
            ['kpi'=>'RENDAH','softskill'=>'CUKUP','hardskill'=>'BAGUS','prestasi'=>'','predikat'=>''],
            ['kpi'=>'RENDAH','softskill'=>'CUKUP','hardskill'=>'LUMAYAN','prestasi'=>'','predikat'=>''],
            ['kpi'=>'RENDAH','softskill'=>'CUKUP','hardskill'=>'JELEK','prestasi'=>'','predikat'=>''],
            ['kpi'=>'RENDAH','softskill'=>'BURUK','hardskill'=>'BAGUS','prestasi'=>'','predikat'=>''],
            ['kpi'=>'RENDAH','softskill'=>'BURUK','hardskill'=>'LUMAYAN','prestasi'=>'','predikat'=>''],
            ['kpi'=>'RENDAH','softskill'=>'BURUK','hardskill'=>'JELEK','prestasi'=>'','predikat'=>'']
        ];

        DB::table('rolefuzzy')->insert($role);
    }
}
