<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class TugasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_tugas')->insert([
            'c_id' => '4',
            'c_section' => 'Mandor',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('m_tugas')->insert([
            'c_id' => '5',
            'c_section' => 'Ast. Mandor',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('m_tugas')->insert([
            'c_id' => '71',
            'c_section' => 'Penggiles',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('m_tugas')->insert([
            'c_id' => '6',
            'c_section' => 'Mixing',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
