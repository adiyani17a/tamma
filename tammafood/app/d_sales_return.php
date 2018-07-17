<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class d_sales_return extends Model
{
	protected $table = 'd_sales_return';
    protected $primaryKey = 'dsr_id';
    const CREATED_AT = 'dsr_created';
    const UPDATED_AT = 'dsr_updated';
    
	protected $fillable = [	'dsr_id',
							'dsr_sid',
							'dsr_cus', 
							'dsr_code',
							'dsr_method',
							'dsr_type_sales',
							'dsr_staff',
							'dsr_date',
							'dsr_dateconfirm',
							'dsr_pricetot',
							'dsr_priceresult',
							'dsr_status'];
		public $timestamps = false;
}
