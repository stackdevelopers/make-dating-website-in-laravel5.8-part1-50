<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use App\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();

            $adminCount = Admin::where(['username'=>$data['username'],'password'=>md5($data['password']),'status'=>1])->count();
            if($adminCount>0){
                //echo "Success"; die;
                Session::put('adminSession',$data['username']);
                return redirect('/admin/dashboard'); 
            }else{
                //echo "failed"; die;
                return redirect('/admin')->with('flash_message_error','Invalid Username or Password');
            }
        }
        return view('admin.admin_login');
    }

    public function dashboard(){
        /*if(Session::has('adminSession')){
            //Perform all dashboard tasks
        }else{
            return redirect('/admin')->with('flash_message_error','Please login to access');
        }*/
        return view('admin.dashboard');
    }

    public function settings(){
        return view('admin.settings');
    }

    public function chkPassword(Request $request){
        $data = $request->all();
        /*echo "<pre>"; print_r($data); die;*/
        $current_pwd = md5($data['current_pwd']); 
        $adminCount = Admin::where('username',Session::get('adminSession'))->where('password',$current_pwd)->count();
        if($adminCount==1){
            echo "true"; die;
        }else {
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            $current_pwd = md5($data['current_pwd']); 
            $adminCount = Admin::where('username',Session::get('adminSession'))->where('password',$current_pwd)->count();
            if($adminCount==1){
                $new_pwd = md5($data['new_pwd']); 
                Admin::where(['username'=>Session::get('adminSession')])->update(['password'=>$new_pwd]);
                return redirect('/admin/settings')->with('flash_message_success','Password updated Successfully!');
            }else {
                return redirect('/admin/settings')->with('flash_message_error','Incorrect Current Password!');
            }
        }
    }


    public function logout(){
        Session::flush();
        return redirect('/admin')->with('flash_message_success','Logged out Successfully'); 
    }
}
