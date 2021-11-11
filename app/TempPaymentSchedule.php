<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

use \Carbon\Carbon;

class TempPaymentSchedule extends Model {

	protected $guarded = [];
	
	public $table = 'temp_payment_schedule';

	public $timestamps = false;

}
