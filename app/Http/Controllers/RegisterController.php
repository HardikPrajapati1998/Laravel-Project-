<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function insert(Request $request)
    {
      
        $name =$request->input('name');
        $email =$request->input('email');
        $password =$request->input('password');
        $password =Hash::make($password);
        $created_at = now()->toDateTimeString('Y-m-d');
        $image = $request->file('file');
        $profile = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/profile/');
        $image->move($destinationPath, $profile);
        $percentage ="0";
       
        DB::insert('insert into users (name,email,password,profile,created_at,percentage) values (?,?,?,?,?,?)',[$name,$email,$password,$profile,$created_at,$percentage]);

        $users = DB::select('select * from users');
        return redirect('/home');
       
    }
 
}
