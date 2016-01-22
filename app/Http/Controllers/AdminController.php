<?php

namespace App\Http\Controllers;

use Auth;
use App\Admin;
use App\Apartment;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
	public function index()
	{
		return view('layouts.master');
	}

	public function reservation()
	{
		return view('admin.reservation');
	}

	public function accessories($id)
	{
		return view('admin.accessories');
	}
}
