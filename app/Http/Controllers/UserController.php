<?php

namespace App\Http\Controllers;
use App\User;
use DB;
use App\Iteam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use  App\Http\Controllers\Controller;
class UserController extends Controller
{
    public function registation(){
        return view('registation');
    }


    public function submit(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'id_number'=>'required',
            'number'=>'required',
            'email' => 'required|email|unique:users',
            'address'=>'required',
            'password'=>'required',
    
        ]);

       $table=new User();
       
        $table->name=$request['name'];
        $table->id_number=$request['id_number'];
        $table->phone=$request['number'];
        $table->email=$request['email'];
        $table->address=$request['address'];
        $table->password=bcrypt($request['password']);
        $table->type=$request['type'];
        $table->status=$request['status'];
 
        $url_customer="";
        if(Input::hasFile('photo')){
            $file=Input::file('photo');
            $file->move(public_path().'/upload/',$file->getClientOriginalName());
    
            $url_customer=URL::to("/") .'/upload/'.$file->getClientOriginalName();
            
        
        }
        $table->photos=$url_customer;
   
     
       $table->save();
       return redirect()->back()->with('response','Registation Successfully');
    }
    public function login(){
        return view('login');
    }

    public function loginform(Request $request){

        $this->validate($request,[
            
           'email'=>'required',
           'password'=>'required',
                   ]);
                   $c=User::where('email',$request['email'])->get()->count();
if($c==1){
    $login=User::where('email',$request['email'])->first();
    $password=$login->password;
    $status=$login->status;
    $type=$login->type;
    $name=$login->name;
    $id=$login->id;
    if($password==$request['password']){
      if($status=='active'){

          $iteam=Iteam::all();

    return view('backend',['login'=>$login,'iteam'=>$iteam]);
      }
      else{
        return redirect()->back()->with('response','Your Account is not Active');
      }

    }
    else{
        return redirect()->back()->with('response','Worng Password');
    }
}
else{
    return redirect()->back()->with('response','Worng Email Address');
 }
      }
    

      public function backend(){
          return view('backend');
      }

      public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('/');
    }

    public function user($id){
        $user=User::all();
        $login=User::find($id);
        return view('user',['user'=>$user,'login'=>$login]);
    }

    public function home($id){

    $login=User::find($id);

    $iteam=Iteam::all();

    return view('backend',['login'=>$login,'iteam'=>$iteam]);
    }

    public function active($id){
$type='inactive';
       DB::table('users')->where(['id'=>$id])->update(['status'=>'inactive']);
      //DB::update('update user set status = ? where id = ?',[$type,$id]);

    
            return redirect()->back();
        }


        public function inactive($id){
            $type='inactive';
                   DB::table('users')->where(['id'=>$id])->update(['status'=>'active']);
                  //DB::update('update user set status = ? where id = ?',[$type,$id]);
            
                
                        return redirect()->back();
                    }


                    public function editpage($id)
                    {
                        $login=User::find($id);

                        return view('editprofile',['login'=>$login]);
                    }


                    public function edit(Request $request)
                    {

                     $id=$request['id'];
                     $name=$request['name'];
                     $phone=$request['number'];
                     $id_number=$request['id_number'];
                     $address=$request['address'];
                     $password=$request['password'];
                     $login=User::find($id);
                     DB::table('users')->where(['id'=>$id])->update(['name'=>$name,'phone'=>$phone,'id_number'=>$id_number,'address'=>$address,'password'=>$password]);


                        return view('editprofile',['login'=>$login])->with('response','Your Profile Updated!');
                    }

                    public function iteam($id)
                    {
                        $login=User::find($id);
                     

                        return view('additeam',['login'=>$login]);

                    }
}

