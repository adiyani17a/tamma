<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_pegawai', function (Blueprint $table) {
            $table->increments('c_id');
            $table->string('c_code');             
            $table->string('c_nik');             
            $table->string('c_name');            
            $table->date('c_year');              
            $table->unsignedInteger('c_section_id');                    
            $table->timestamps();

            $table->foreign('c_section_id')->references('c_id')->on('m_tugas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_pegawai');
    }
}
