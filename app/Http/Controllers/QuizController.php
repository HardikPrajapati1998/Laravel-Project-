<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use PDF;
use App\Http\Controllers\Controller;
class QuizController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    
    }
    public function quiz()
    {

        return view('quiz');
       
    }
    public function update(Request $request,$id)
    {
      
        $updated_at = now()->toDateTimeString('Y-m-d');
        $percentage =$request->input('percentage');
    
      
        DB::update('update users set percentage= ? where id=?',[$percentage,$id]);
        return redirect('/certificate/{id}');

       
    }
}
