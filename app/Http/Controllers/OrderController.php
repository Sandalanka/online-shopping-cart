<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use App\Iteam;
use App\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Response;
class OrderController extends Controller
{
    public function order(Request $request)
    {
        /*$this->validate($request,[
            'iteam_name'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'name' => 'required',
            'address'=>'required',
            'photos'=>'required',
           
    
        ]);*/

        $table=new Order();
        $bill=$request['quantity']*$request['price'];
        $date=Carbon::now();
       
        $table->item_name=$request['iteam_name'];
        $table->iteam_id=$request['iteam_id'];
        $table->quantity=$request['quantity'];
        $table->price=$request['price'];
        $table->bill=$bill;
        $table->user_name=$request['name'];
        $table->user_id=$request['user_id'];
        $table->address=$request['address'];
        $table->order_date=$date;
        $table->reciver_date=$date;
        $table->status=$request['status'];

        $url="";
       if(Input::hasFile('photos')){
        $file=Input::file('photos');
        $file->move(public_path().'/order/',$file->getClientOriginalName());

        $url=URL::to("/") .'/order/'.$file->getClientOriginalName();
      
    
    }
    $table->photos=$url;
  
     
       $table->save();
       return redirect()->back()->with('response','Iteam Add Successfully');

    }

    
    public function orderhistory($id){

        $login=User::find($id);
        $iteam=Iteam::all();
        $order=Order::all();
       
return view('orderhistory',['login'=>$login,'iteam'=>$iteam,'order'=>$order]);
    }


    public function reciver($id){
        $type='recived';
        $date=Carbon::now();
               DB::table('orders')->where(['id'=>$id])->update(['status'=>'recived','reciver_date'=>$date]);
              //DB::update('update user set status = ? where id = ?',[$type,$id]);
        
            
                    return redirect()->back();
                }


                public function ordershow($id){

                    $login=User::find($id);
                
                    $order=Order::all();
                   
            return view('ordershow',['login'=>$login,'order'=>$order]);
                }
}
