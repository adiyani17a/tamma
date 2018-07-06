<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class PegawaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_pegawai')->insert([
            'c_code' => 'PG-01',
            'c_nik' => '401-04-001',
            'c_name' => 'Siti',
            'c_year' => '2018-06-28',
            'c_section_id' => '4',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
