<?php

namespace App\Http\Controllers;

use App\DataTables\ActivityDataTable;
use App\DataTables\CustomerDataTable;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\ActivityLogger;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;



class CustomerController extends Controller
{

    public function index(CustomerDataTable $dataTable){
        $kullanici_ad = Auth::user()->name;
        $kullanici_id = Auth::user()->id;

        //Log ekleme işlemi
        activity()
            ->causedBy($kullanici_id)
            ->withProperty('Customer',$kullanici_ad)
            ->log("Müşteri tablosuna $kullanici_ad tarafından giriş yapıldı.");


       
        return $dataTable->render('customer.index');
        

    }

    public function logs(ActivityDataTable $dataTable){
        
        $kullanici_ad = Auth::user()->name;

        //Log ekleme işlemi
        activity()
            ->causedBy(Auth::user()->id)
            ->withProperty('Log',$kullanici_ad)
            ->log("Log tablosuna $kullanici_ad tarafından giriş yapıldı.");


       
        return $dataTable->render('activity.index');

    }

}
