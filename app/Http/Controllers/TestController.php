<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{

public function apitest() {
     
      
    $data=config('techsupport_ar.list');
    return response()->json ([
        'status'=>'success',
        'data'=>$data,
    ]);
 

       
    
}


    public function index() {
 

        $response = $this->apitest();

       
        foreach ($response->getData()->data as $key => $value) {
           dd($value);
        }

    }
}
