<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use Auth;
use Session;

class LoginController extends Controller
{
    
    public function index()
    {
    	return view('auth.login');
    }

    public function checklogin(Request $request)
    {
    	$this->validate($request, [
    		'domainAccount' 	=> 'required|string',
    		'password' 	=> 'required|alphaNum|min:4'
    	]);

        $user_data = array(
            'domainAccount' => $request->get('domainAccount'),
            'password'      => $request->get('password')
        );
    	if(Auth::attempt($user_data))
    	{	
            //file_get_contents('http://172.16.20.27/ims_v3/api/delete.php');
            Session::put('user',$request->domainAccount);
    		return redirect('/ims/dashboard');
    	}
    	else
    	{
    		return back()->with('error','Incorrect Login Credentials');
    	}
    }



    public function logout()
    {
        Auth::logout();
        Session::flush();
        
        return auth()->logout() ?? redirect()->route('auth.login');
    }
    public function adminLogin()
    {
        return view('auth.adminLogin');
    }
    public function adminSubmit(Request $request)
    {
        $checker = auth()->attempt([
            'domainAccount' => $request->domainAccount,
            'password' => $request->password,
            // 'active' => 1,   
        ]);
        if ($checker) {
        // dd(auth()->user()->role);
            if(auth()->user()->role == "ADMIN" || auth()->user()->role == "admin" || auth()->user()->role == "ict")
            {
                // $saveLogs = $this->auditService->create($request,"Login User : ". auth()->user()->username,"Admin Login");  
               
                return redirect()->route('maintenance.application.index');
            }
            else
            {
                abort(503);
            }
        } else {
            return redirect()->back()->withErrors('Invalid login credentials.');
        }
    }
}
