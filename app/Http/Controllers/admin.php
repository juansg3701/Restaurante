<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use sisVentas\Sede;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Request\SedeFormRequest;
use DB;

class admin extends Controller
{
	    public function __construct()
	 	{

	 	} 
	 	public function index(Request $request){
	 		if ($request) {
	 			$query=trim($request->get('searchText'));
	 			$sedes=DB::table('usuario')->where('nombre_sede','LIKE', '%'.$query.'%');
	 			return view('layouts.admin',["sedes"=>$sedes,"searchText"=>$query]);
	 		}
	 	}
}