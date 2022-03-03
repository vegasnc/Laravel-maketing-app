<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MemberController extends Controller
{
    public function index()
    {
    	$user = User::all();
    	return view('administrator/member/member', compact('user'));
    }
    public function store(Request $requset)
    {
    	
    }
}
