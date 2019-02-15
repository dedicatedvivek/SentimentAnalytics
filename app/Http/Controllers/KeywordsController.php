<?php

namespace App\Http\Controllers;
use App\Keyword;
use App\Languages;

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

     	 $arr_size = sizeof($languages);

     	 



     	 for ($i=0; $i <$arr_size ; $i++) { 
     	 	$lang_id = $languages[$i];
     	 	$lang_name_arr = Languages::select('lang_name')
     	 	->where('lang_id',$lang_id)
     	 	->get();

     	 	$split_elem = explode(";",$lang_id);
     	 	$langg_id = $split_elem[0];

     	 	$lang_arr_elem = $lang_name_arr[0];
     	 	$lang_name = $lang_arr_elem['lang_name'];

     	 	$data=array('keyword_name'=>$keywords,'fo_lang_id' =>$langg_id ,'language' =>$lang_name);

     	 	DB::table('keywords_master')->insert($data);
     	 }




    	

     	 

     	return view('keyword_entry');
    	
 }
        function delete_keyword(Request $req){

            
                $del_id= $req->input('del_id');
                

                
$set0 = 0;
     $datadel=$arrayName = array('active_status' =>$set0);
  
    
     $update_active = Keyword::where('keyword_id',$del_id)
                      ->update($datadel);
      return view('keyword_registry');



}

}