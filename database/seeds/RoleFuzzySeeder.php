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
            ['kpi'=>'TINGGI','softskill'=>'BAGUS','hardskill'=>'BAIK','prestasi'=>'','predikat'=>''],
            ['kpi'=>'TINGGI','softskill'=>'BAGUS','hardskill'=>'CUKUP','prestasi'=>'','predikat'=>''],
            ['kpi'=>'TINGGI','softskill'=>'BAGUS','hardskill'=>'BURUK','prestasi'=>'','predikat'=>''],
            ['kpi'=>'TINGGI','softskill'=>'LUMAYAN','hardskill'=>'BAIK','prestasi'=>'','predikat'=>''],
            ['kpi'=>'TINGGI','softskill'=>'LUMAYAN','hardskill'=>'CUKUP','prestasi'=>'','predikat'=>''],
            ['kpi'=>'TINGGI','softskill'=>'LUMAYAN','hardskill'=>'BURUK','prestasi'=>'','predikat'=>''],
            ['kpi'=>'TINGGI','softskill'=>'JELEK','hardskill'=>'BAIK','prestasi'=>'','predikat'=>''],
            ['kpi'=>'TINGGI','softskill'=>'JELEK','hardskill'=>'CUKUP','prestasi'=>'','predikat'=>''],
            ['kpi'=>'TINGGI','softskill'=>'JELEK','hardskill'=>'BURUK','prestasi'=>'','predikat'=>''],
            ['kpi'=>'SEDANG','softskill'=>'BAGUS','hardskill'=>'BAIK','prestasi'=>'','predikat'=>''],
            ['kpi'=>'SEDANG','softskill'=>'BAGUS','hardskill'=>'CUKUP','prestasi'=>'','predikat'=>''],
            ['kpi'=>'SEDANG','softskill'=>'BAGUS','hardskill'=>'BURUK','prestasi'=>'','predikat'=>''],
            ['kpi'=>'SEDANG','softskill'=>'LUMAYAN','hardskill'=>'BAIK','prestasi'=>'','predikat'=>''],
            ['kpi'=>'SEDANG','softskill'=>'LUMAYAN','hardskill'=>'CUKUP','prestasi'=>'','predikat'=>''],
            ['kpi'=>'SEDANG','softskill'=>'LUMAYAN','hardskill'=>'BURUK','prestasi'=>'','predikat'=>''],
            ['kpi'=>'SEDANG','softskill'=>'JELEK','hardskill'=>'BAIK','prestasi'=>'','predikat'=>''],
            ['kpi'=>'SEDANG','softskill'=>'JELEK','hardskill'=>'CUKUP','prestasi'=>'','predikat'=>''],
            ['kpi'=>'SEDANG','softskill'=>'JELEK','hardskill'=>'BURUK','prestasi'=>'','predikat'=>''],
            ['kpi'=>'RENDAH','softskill'=>'BAGUS','hardskill'=>'BAIK','prestasi'=>'','predikat'=>''],
            ['kpi'=>'RENDAH','softskill'=>'BAGUS','hardskill'=>'CUKUP','prestasi'=>'','predikat'=>''],
            ['kpi'=>'RENDAH','softskill'=>'BAGUS','hardskill'=>'BURUK','prestasi'=>'','predikat'=>''],
            ['kpi'=>'RENDAH','softskill'=>'LUMAYAN','hardskill'=>'BAIK','prestasi'=>'','predikat'=>''],
            ['kpi'=>'RENDAH','softskill'=>'LUMAYAN','hardskill'=>'CUKUP','prestasi'=>'','predikat'=>''],
            ['kpi'=>'RENDAH','softskill'=>'LUMAYAN','hardskill'=>'BURUK','prestasi'=>'','predikat'=>''],
            ['kpi'=>'RENDAH','softskill'=>'JELEK','hardskill'=>'BAIK','prestasi'=>'','predikat'=>''],
            ['kpi'=>'RENDAH','softskill'=>'JELEK','hardskill'=>'CUKUP','prestasi'=>'','predikat'=>''],
            ['kpi'=>'RENDAH','softskill'=>'JELEK','hardskill'=>'BURUK','prestasi'=>'','predikat'=>'']
        ];

        DB::table('rolefuzzy')->insert($role);
    }
}
