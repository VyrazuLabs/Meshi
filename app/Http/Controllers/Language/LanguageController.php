<?php

namespace App\Http\Controllers\Language;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App;
use Lang;

class LanguageController extends Controller
{
    public function changeLanguage(Request $request) {
    	if($request->ajax()) {
        	Session::put('lang_name', $request->locale);

    		$request->session()->put('locale', $request->locale);
    		$request->session()->flash('alert-success', ('app.Locale_Change_Success'));

    	}
    }
}
