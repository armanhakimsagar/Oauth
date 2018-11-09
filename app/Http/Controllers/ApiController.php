<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(){
    	if(isset($_GET['response_type']) && isset($_GET['client_id']) && isset($_GET['redirect_uri']) && isset($_GET['state'])){

    		// check response_type from database
    		// check client_id from database
    		// check redirect_uri from database
    		// set state in session for redirect with after grant permission
    		// pass state in compact
    		// if all ok return view for login page
    		return view('login');

    	}else{
    		$array = array("Invalid request");
    		return $array;
    	}
    
    }

    public function loginCheck(){
    	// login check here
    	// pass bearer_token & state in compact
    	return view('grant_permission');
    }

    public function grantPermission(){
      // fetch website name from database
      // redirect with oauth_access_tokens token in website name
      $access_token = $_GET['access_token'];
      return redirect("http://localhost/OauthApps/public/grantPermission?bearer_token=$oauth_access_tokens&state=1234");

    }

    public function TokenResponse(){
    	// check header value by oauth_clients' 'oauth_client_secret' 'oauth_access_tokens' 'grant_types'
    	//return resourse data
    	$feedback = [
           'status'     => "success",
           'message'    => "data found",
           'data'       =>  "ok"
		]; 
		return $feedback;
    }

}
