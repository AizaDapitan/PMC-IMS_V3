<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class remarks extends Model {

	protected $guarded = [];
	
	public $table = 'remarks';

	public $timestamps = true;

}