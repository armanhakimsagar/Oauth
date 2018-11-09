<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    public function ApiToken(){
    	$token = $_GET['access_token'];
    	$client = new Client(['http_errors' => false]);
		// set all information get from database
		$allresponse = $client->request('GET','http://localhost/Oauth/public/token_response', [
		    'headers' => [
				'oauth_clients' 		=> "32432432423",
				'oauth_client_secret' 	=> "32432432423",
				'oauth_access_tokens' 	=> "32432432423",
				'grant_types' 			=> "32432432423",
		    ]
		]);

		$allbody = $allresponse->getBody();
		$all_list = json_decode($allbody->getContents());
		dd($all_list);
    }
}
