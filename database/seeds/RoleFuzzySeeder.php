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
            ['disiplin'=>'BAIK','tanggungjawab'=>'BAGUS','planningskill'=>'BAIK','prestasi'=>'BAIK'],
            ['disiplin'=>'BAIK','tanggungjawab'=>'BAGUS','planningskill'=>'CUKUP','prestasi'=>'BAIK'],
            ['disiplin'=>'BAIK','tanggungjawab'=>'BAGUS','planningskill'=>'BURUK','prestasi'=>'BAIK'],
            ['disiplin'=>'BAIK','tanggungjawab'=>'LUMAYAN','planningskill'=>'BAIK','prestasi'=>'BAIK'],
            ['disiplin'=>'BAIK','tanggungjawab'=>'LUMAYAN','planningskill'=>'CUKUP','prestasi'=>'BAIK'],
            ['disiplin'=>'BAIK','tanggungjawab'=>'LUMAYAN','planningskill'=>'BURUK','prestasi'=>'BURUK'],
            ['disiplin'=>'BAIK','tanggungjawab'=>'JELEK','planningskill'=>'BAIK','prestasi'=>'BAIK'],
            ['disiplin'=>'BAIK','tanggungjawab'=>'JELEK','planningskill'=>'CUKUP','prestasi'=>'BAIK'],
            ['disiplin'=>'BAIK','tanggungjawab'=>'JELEK','planningskill'=>'BURUK','prestasi'=>'BURUK'],
            ['disiplin'=>'CUKUP','tanggungjawab'=>'BAGUS','planningskill'=>'BAIK','prestasi'=>'BAIK'],
            ['disiplin'=>'CUKUP','tanggungjawab'=>'BAGUS','planningskill'=>'CUKUP','prestasi'=>'BAIK'],
            ['disiplin'=>'CUKUP','tanggungjawab'=>'BAGUS','planningskill'=>'BURUK','prestasi'=>'BURUK'],
            ['disiplin'=>'CUKUP','tanggungjawab'=>'LUMAYAN','planningskill'=>'BAIK','prestasi'=>'BAIK'],
            ['disiplin'=>'CUKUP','tanggungjawab'=>'LUMAYAN','planningskill'=>'CUKUP','prestasi'=>'BAIK'],
            ['disiplin'=>'CUKUP','tanggungjawab'=>'LUMAYAN','planningskill'=>'BURUK','prestasi'=>'BURUK'],
            ['disiplin'=>'CUKUP','tanggungjawab'=>'JELEK','planningskill'=>'BAIK','prestasi'=>'BAIK'],
            ['disiplin'=>'CUKUP','tanggungjawab'=>'JELEK','planningskill'=>'CUKUP','prestasi'=>'BURUK'],
            ['disiplin'=>'CUKUP','tanggungjawab'=>'JELEK','planningskill'=>'BURUK','prestasi'=>'BURUK'],
            ['disiplin'=>'BURUK','tanggungjawab'=>'BAGUS','planningskill'=>'BAIK','prestasi'=>'BAIK'],
            ['disiplin'=>'BURUK','tanggungjawab'=>'BAGUS','planningskill'=>'CUKUP','prestasi'=>'BURUK'],
            ['disiplin'=>'BURUK','tanggungjawab'=>'BAGUS','planningskill'=>'BURUK','prestasi'=>'BURUK'],
            ['disiplin'=>'BURUK','tanggungjawab'=>'LUMAYAN','planningskill'=>'BAIK','prestasi'=>'BAIK'],
            ['disiplin'=>'BURUK','tanggungjawab'=>'LUMAYAN','planningskill'=>'CUKUP','prestasi'=>'BURUK'],
            ['disiplin'=>'BURUK','tanggungjawab'=>'LUMAYAN','planningskill'=>'BURUK','prestasi'=>'BURUK'],
            ['disiplin'=>'BURUK','tanggungjawab'=>'JELEK','planningskill'=>'BAIK','prestasi'=>'BURUK'],
            ['disiplin'=>'BURUK','tanggungjawab'=>'JELEK','planningskill'=>'CUKUP','prestasi'=>'BURUK'],
            ['disiplin'=>'BURUK','tanggungjawab'=>'JELEK','planningskill'=>'BURUK','prestasi'=>'BURUK']
        ];

        DB::table('rolefuzzy')->insert($role);
    }
}
