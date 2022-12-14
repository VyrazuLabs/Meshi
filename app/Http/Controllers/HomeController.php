<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $status = Auth::user()->status;
        if( $status == 1 ) {
            if(Auth::User()->type == 0) { // type 0 = admin
                return redirect('admin/dashboard');
            }
        }
        else {
            Session::put('login_status', 'Your account is inactive.');
        }
        
        Auth::logout();
        return redirect('/login');
    }

    public function logout() {           
        Auth::logout();
        return redirect()->route('login');
    }

}
