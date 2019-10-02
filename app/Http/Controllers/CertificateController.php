<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use PDF;
use App\Http\Controllers\Controller;
class CertificateController extends Controller
{
  
    public function __construct()
    {
        $this->middleware('auth');
        ini_set('max_execution_time', 300);
    }
    public function certificate($id)
    {
        
        $users =  DB::select('select * from users where id=?',[$id]);
        return view('certificate',['users'=>$users]);
        
       
    }

    public function pdfview(Request $request)
    {
      
        if($request->has('download')){
            $pdf = PDF::loadView('certificate');

            return $pdf->download('invoice.pdf');
        }


        return view('home',['users'=>$users]);
    }
}
