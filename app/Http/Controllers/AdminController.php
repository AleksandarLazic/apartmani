<?php

namespace App\Http\Controllers;

use Auth;
use App\Admin;
use App\Apartman;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
	public function index()
	{
		return view('admin.apartmani');
	}

	public function reservation()
	{
		return view('admin.reservation');
	}
}
