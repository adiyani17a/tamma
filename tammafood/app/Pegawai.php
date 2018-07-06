<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'm_pegawai';
    protected $fillable = [	
        'c_code', 'c_nik', 'c_name', 'c_section_id', 'c_year' ];
}
