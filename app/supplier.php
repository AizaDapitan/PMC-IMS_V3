<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class supplier extends Model {

	protected $guarded = [];
	
	public $table = 'supplier';

	public $timestamps = false;

}