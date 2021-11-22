<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Auth;
use \Carbon\Carbon;

use App\supplier;
use App\PaymentSchedule;
use App\logistics;
use App\PO;

class ReportsController extends Controller
{

// Delivery Status
    public function filter_delivery_status()
    {
        $params = Input::all();

        return $this->delivery_status($params);
    }

    public function delivery_status($param = null)
    {
        $shipments = logistics::whereNotNull('id');
        $pageLimit = 10;
        
        if(isset($param)){

            if(isset($param['status']) == 'Pending'){
                $sort = 'expectedDeliveryDate';
            }

            if(isset($param['status']) == 'In-Transit'){
                $sort = 'departure_dt';
            }

            if(isset($param['status']) == 'All'){
                $sort = 'id';
            }

            $shipments->orderBy($sort,'asc');

            if(isset($param['status'])){
                if($param['status'] == 'All'){
                    $shipments->whereNotNull('id');
                } else {
                    $shipments->where('status','=', "".$param['status']."");
                }
                
            }

            if(isset($param['from'])){
                $shipments->whereBetween('actualDeliveryDate',["".date('Y-m-d',strtotime($param['from']))."","".date('Y-m-d',strtotime($param['to'])).""]);
            }
        } else {
            $param = [];
            $shipments->where('status','Pending')->orderBy('expectedDeliveryDate','asc');
        }

        $shipments = $shipments->paginate($pageLimit);

        return view('reports.delivery_status',compact('shipments','param'));
    }
//


// PO per Status
    public function filter_po_status()
    {
        $params = Input::all();

        return $this->po_status($params);
    }

    public function po_status($param = null)
    {
        $purchases = PO::whereNotNull('id');
        
        if(isset($param)){

            $purchases->orderBy('expectedCompletionDate','asc');

            if(isset($param['status'])){
                $purchases->where('status','=', "".$param['status']."");
            }

            if(isset($param['from'])){
                $purchases->whereBetween('expectedCompletionDate',["".date('Y-m-d',strtotime($param['from']))."","".date('Y-m-d',strtotime($param['to'])).""]);
            }
        } else {
            $param = [];
            $purchases->where('status','OPEN')->orderBy('expectedCompletionDate','asc');
        }

        $purchases = $purchases->get();

        return view('reports.po-per-status',compact('purchases','param'));
    }
//


// Overdue Completion
    public function filter_overdue_completion()
    {
        $params = Input::all();

        return $this->overdue_completion($params);
    }

    public function overdue_completion($param = null){
        $collection = PO::where('status','OPEN');

        if(isset($param)){

            if(isset($param['from'])){
                $collection->whereBetween('expectedCompletionDate',["".date('Y-m-d',strtotime($param['from']))."","".date('Y-m-d',strtotime($param['to'])).""])
                    ->orderBy('expectedCompletionDate','asc');
            }

        } else {

            $param = [];
            $collection->where('expectedCompletionDate','<',Carbon::today())->orderBy('expectedCompletionDate','desc');

        }

        $collection = $collection->get();
        
        return view('reports.overdue_completion',compact('collection','param'));
    }
//


// Overdue Shipments
    public function filter_overdue_shipments()
    {
        $params = Input::all();

        return $this->overdue_shipments($params);
    }

    public function overdue_shipments($param = null){
        $collection = logistics::where('status','Delivered');

        $pageLimit = 10;

        if(isset($param)){

            if(isset($param['type']) == 2){
                $collection->whereRaw('actualDeliveryDate > expectedDeliveryDate');
            }

            if(isset($param['from'])){
                $collection->whereRaw('actualDeliveryDate > expectedDeliveryDate')->whereBetween('actualDeliveryDate',["".$param['from']."","".$param['to'].""])
                    ->orderBy('actualDeliveryDate','asc');
            }

        } else {

            $param = [];
            $collection->whereRaw('actualDeliveryDate > expectedDeliveryDate')->whereBetween('actualDeliveryDate',[Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->orderBy('actualDeliveryDate','desc');

        }

        $collection = $collection->paginate($pageLimit);
        
        return view('reports.overdue_shipments',compact('collection','param'));
    }
//

// Overdue Payables
    public function overdue_payables()
    {
        $collection = PaymentSchedule::where('isPaid',0)->whereDate('paymentDate','<',Carbon::today())->orderBy('paymentDate','desc')->paginate(15);

        return view('reports.overdue_payables',compact('collection'));

        //return view('reports.overdue_payables',compact('collection','param'));
    }
//
}
