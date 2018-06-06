<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_price extends Model
{
	protected $table = 'm_price';
    protected $primaryKey = 'm_pid';
    protected $fillable = [	'm_pid', 
    						'm_pitem', 
    						'm_pbuy', 
    						'm_psell'];
    						
    const CREATED_AT = 'm_pcreated';
    const UPDATED_AT = 'm_pupdated';
}
