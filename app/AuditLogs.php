<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class AuditLogs extends Model {

	protected $guarded = [];
	
	public $table = 'po_audit_logs';

	public $timestamps = false;

	public function podetails()
    {
        return $this->belongsTo('App\PO', 'poId');
    }

    public function userdetails()
    {
        return $this->belongsTo('App\users', 'users','domainAccount');
    }

	public static function date_for_listing($date) {
        return Carbon::parse($date)->diffForHumans();
    }
}