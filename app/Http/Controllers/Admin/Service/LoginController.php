<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entity\Member;

class LoginController extends Controller
{
	public function toLogin(Request $request){
		$username = $request->get('username','');
    	$password = $request->get('password','');
    	
    	return view('admin.index');
	}
}