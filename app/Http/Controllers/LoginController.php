<?php

namespace App\Http\Controllers;
use App\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\user;

class LoginController extends Controller
{
     public function index()
    {
       dd('mayank');
    }
    public function Login(Request $request)
{
      try
      {
            $this->validate($request,
      
        [
            "email"=>"required",
            "password"=>"required",
            // |max:20|min:7
        ]);

        $attr = [
            'email' => $request->email,
            'password' => $request->password
         ];
         $curl = curl_init();
         
         curl_setopt_array($curl, [
             CURLOPT_RETURNTRANSFER => 1,
             CURLOPT_URL => 'http://localhost/management/public/api/puser',
             CURLOPT_USERAGENT => 'login',
             CURLOPT_POST => 1,
             CURLOPT_POSTFIELDS => $attr
         ]);
         $resp = curl_exec($curl);
         $details=json_decode($resp);
         curl_close($curl);
    
         $request->session()->put('email',$details);
         $a=$request->session()->get('email');
         // Auth::attempt(['email' => $request->email, 'password' => $request->password]);

         // dd($a->user->role);
//             if($a->role=="ADMIN"){
//                 return redirect()->route('/admindashboard');
//             }
//             else{
//                 return redirect()->route('/hrdashboard');
//             }
// }


    // {
    
    //     $this->validate($request,
    //     [
    //         "email"=>"required",
    //         "password"=>"required",
    //      ]);
        // dd($request);
        
        if(Auth::attempt(['email'=> $request->email,'password'=>$request->password,'role'=>'ADMIN']))
        {
            
        	 $user=Auth::user();
        
            return redirect('/admindashboard');
        }

        elseif(Auth::attempt(['email'=> $request->email,'password'=>$request->password,'role'=>'HR']))
        {
             $user=Auth::user();
        
            return redirect('/hrdashboard');           
        }
        else
        {
        	// dd('mayank123');
            return back()->with('warning','Please Enter Valid Id & Password');
        }
    }
      catch(Exception $exception)
        {
            throw new \App\Exceptions\NotFoundException('Something Went wrong');

        } 
    }

public function hrLogin(Request $request)
    {
    	// dd($request->all());
        $this->validate($request,
        [
            "email"=>"required",
            "password"=>"required",
         ]);

        if(Auth::attempt(['email'=> $request->email,'password'=>$request->password]))
        {

        	 $user=Auth::user();
        	
            return redirect('/hrdashboard');
        }
        else
        {
        	// dd('mayank123');
            return back()->with('warning','Please Enter Valid Id & Password');
        }
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/home');
    }

}
