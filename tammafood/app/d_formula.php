<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class d_formula extends Model
{
    protected $table = 'd_formula';  
      protected $fillable = ['f_adonan',
      						 'f_bb',
      						 'f_value', 
      						 'f_scale' ];
}
