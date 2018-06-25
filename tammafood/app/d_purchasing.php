<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class d_purchasing extends Model
{
    protected $table = 'd_purchasing';
    protected $primaryKey = 'd_pcs_id';
    const CREATED_AT = 'd_pcs_created';
    const UPDATED_AT = 'd_pcs_updated';
    
    protected $fillable = [
    	'd_pcs_id', 
        's_id', 
    	'd_pcs_code',
    	'd_pcs_date',
    	'd_pcs_method_byr',
    	'd_pcs_date_received',
    	'd_pcs_status',
    ];
}
