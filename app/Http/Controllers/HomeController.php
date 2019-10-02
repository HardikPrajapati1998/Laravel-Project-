<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use PDF;
use App\Http\Controllers\Controller;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        ini_set('max_execution_time', 300);
    }

    /**
     * Show the application dashboard.
     *
     *  @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = DB::select('select * from users');
        return view('home',['users'=>$users]);
       
    }
   
    public function delete($id)
    {
        DB::select('delete from users where id=?',[$id]);
        $users = DB::select('select * from users');
        return redirect('/home');
       
    }
    public function show($id)
    {
        $users = DB::select('select * from users where id=?',[$id]);
        return view('update',['users'=>$users]);
       
    }
    public function update(Request $request,$id)
    {
      
        $updated_at = now()->toDateTimeString('Y-m-d');
        $name =$request->input('name');
        $email =$request->input('email');
        $image = $request->file('profile');
       if($image == ''){
        DB::update('update users set name= ? ,email=?,updated_at=?,profile=? where id=?',[$name,$email,$updated_at,$oldprofile,$id]);
        return redirect('/home');

       }else {
        $profile = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/profile/');
        $image->move($destinationPath, $profile);
        DB::update('update users set name= ? ,email=?,updated_at=? where id=?',[$name,$email,$updated_at,$id]);
        return redirect('/home');
          # code...
       }
        
    }
    public function generatePDF()
    {
        
        $pdf = PDF::loadView('certificate');
        $pdf->setPaper('A4');
        return $pdf->download('itsolutionstuff.pdf');
    }

   

}
