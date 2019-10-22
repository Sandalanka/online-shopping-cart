<?php

namespace App\Http\Controllers;
use App\Iteam;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Response;

use  App\Http\Controllers\Controller;

class IteamController extends Controller
{
    public function iteamadd(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'category'=>'required',
            'price'=>'required',
            'description' => 'required',
           'photos'=>'required'
    
        ]);

       $table=new Iteam();
       
        $table->name=$request['name'];
        $table->category=$request['category'];
        $table->price=$request['price'];
        $table->description=$request['description'];
       $table->status=$request['status'];
 $url="";
       if(Input::hasFile('photos')){
        $file=Input::file('photos');
        $file->move(public_path().'/post/',$file->getClientOriginalName());

        $url=URL::to("/") .'/post/'.$file->getClientOriginalName();

    
    }
    
    $table->photos=$url;;
     
       $table->save();
       return redirect()->back()->with('response','Iteam Add Successfully');
    }

    public function inactive($id){
        $type='inactive';
               DB::table('iteam')->where(['id'=>$id])->update(['status'=>'active']);
             
        
            
                    return redirect()->back();
                }

                
    public function active($id){
        $type='inactive';
               DB::table('iteam')->where(['id'=>$id])->update(['status'=>'inactive']);
             
        
            
                    return redirect()->back();
                }

                public function update($idd,$id){

                    $login=User::find($idd);
                    $iteam=Iteam::find($id);
                   
    return view('update',['login'=>$login,'iteam'=>$iteam]);
                }

                public function iteamupdate(Request $request){
                    $this->validate($request,[
                        'name'=>'required',
                        
                        'price'=>'required',
                        'description' => 'required'
                    
                
                    ]);
$id=$request['id'];
$price=$request['price'];
$name=$request['name'];
$description=$request['description'];

                    DB::table('iteam')->where(['id'=>$id])->update(['name'=>$name,'price'=>$price,'description'=>$description]);
                    return redirect()->back();

                }

                public function new(){
                    $iteam=Iteam::all();
                    return view('main',['iteam'=>$iteam]);
                }

                public function order($idd,$id){

                    $login=User::find($idd);
                    $iteam=Iteam::find($id);
                   
    return view('order',['login'=>$login,'iteam'=>$iteam]);
                }
}
