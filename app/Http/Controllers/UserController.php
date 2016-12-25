<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use Auth;
use App\Http\Controllers\userController;


use DB;

class userController extends Controller
{
    public function getSignup(){
        return view('user.signup');
    }

    public function postSignup(Request $request)
    {
           $this->validate($request,[
            'email' => 'email|required|unique:users',
            'password'=>'required|min:4',
            'first_name'=>'required|max:120',
            'last_name'=>'required|max:120',
           
            ]);

        $user= new User([
            'email'=>$request->input('email'),
            'password'=>bcrypt($request->input('password')),
            'first_name'=>$request->input('first_name'),
            'last_name'=>$request->input('last_name'),

            ]);

        $user->save();
        
        return redirect()->route('welcome');
 
    }

 public function getSignin()
    {
        return view('user.signin');
    }




    public function postSignin(Request $request)
    {

        $this->validate($request,[
            'email' => 'email|required',
            'password'=>'required|min:4',

            ]);

     
        $email = $request->input('email');
       

        $admin_email = DB::table('users')
                        ->where('email', '=', 'admin@gmail.com')
                        ->value('email');

        $investor_email = DB::table('users')
                        ->where('email', '=', 'investor@gmail.com')
                        ->value('email');

        $client_email = DB::table('users')
                        ->where('email', '=', 'client@gmail.com')
                        ->value('email');



         if (Auth::attempt([
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
            ])) 
        {

            if ($email==$admin_email) {
               return redirect()->route('admin.dashboard');
            }

            elseif ($email==$investor_email) {
              return redirect()->route('investor.profile');
            }

            elseif ($email==$client_email) {
               return redirect()->route('client.profile');
            }



        }


       
      
        

        
   
    } // end of postSignin






 

// get profile of client
public function getClientProfile()
{
    return view('client.clientProfile');
}


// get profile of investor
public function getInvestorProfile()
{
    return view('investor.investorProfile');
}


//get dashboard of admin
public function getAdminProfile()
{
    return view('admin.adminDashboard');
}

public function getLogout()
{
    Auth::logout();
    return redirect()->route('welcome');
}



}













