<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    
    public function index(){
    	return view ('pages.index');
    }

    public function aboutIndex(){
    	return view ('pages.about');
    }

    public function servicesIndex(){
    	$data = array(
    		'services' => ['Service 1', 'Service 2', 'Service 3']
    		);
    return view ('pages.services')->with($data);
    }

}
