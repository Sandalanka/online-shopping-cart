<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Complaine;
use Carbon\Carbon;
class ComplaineController extends Controller
{
    public function complaine($id){
        $login=User::find($id);
        $complaine=Complaine::all();

        return view('complaine',['login'=>$login,'complaine'=>$complaine]);

    }

    public function compalineadd(Request $request){
        $this->validate($request,[
            
            'complaine'=>'required',
          
    
        ]);

       $table=new Complaine();
       $date=Carbon::now();
        $table->user_name=$request['user_name'];
        $table->user_id=$request['user_id'];
        $table->complaine=$request['complaine'];
        $table->date=$date;
        $table->save();
        return redirect()->back()->with('response','Complaine Add Successfully');
    }



    public function complaineshow($id){
        $login=User::find($id);
        $complaine=Complaine::all();

        return view('complaineshow',['login'=>$login,'complaine'=>$complaine]);

    }
}
