<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class d_formula_result extends Model
{
    protected $table = 'd_formula_result';  
    protected $fillable = ['fr_id', 'fr_adonan', 'fr_result', 'fr_scale'];
}
