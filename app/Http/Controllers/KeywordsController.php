<?php

namespace App\Http\Controllers;
use App\Keywords;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;

class KeywordsController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

     function insert_keyword(Request $req){

     	$keywords= $req->input('keyword');
     	$languages=$req->input('lang');

     	echo print_r($languages);

     	

//      	$data=array('keyword_name' =>$keywords,'language' =>$languages);

//      	DB::table('keywords')->insert($data);

     	return view('keyword_entry');
    	
 }

}