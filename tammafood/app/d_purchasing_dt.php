<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class d_purchasing_dt extends Model
{
    protected $table = 'd_purchasing_dt';
    protected $primaryKey = 'd_pcsdt_id';
    const CREATED_AT = 'd_pcsdt_created';
    const UPDATED_AT = 'd_pcsdt_updated';

    protected $fillable = [
    	'd_pcsdt_id',
    	'd_pcs_id',
    	'i_id',
    	'd_pcsdt_qty',
    	'd_pcsdt_cost',
    ];
}
