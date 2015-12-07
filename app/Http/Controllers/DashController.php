<?php

namespace App\Http\Controllers;
use App\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TravelrequestController;

use Auth;
use App\User;
use App\Aanvragen;
use DB;

/**
* 
*/
class DashController extends Controller
{
	public function __construct()
{
    $this->middleware('auth');
}

	public function show()
	{
		$aanvragen = Aanvragen::orderBy('id', 'asc')->get();
		return view('dashboard.index',
			compact('aanvragen'));
	}
}