<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;

/**
 * Class DealController.
 */
class DealController extends Controller
{

    public function dealList(Request $request) {
        
        try {

           	$targetURL     = config('app.agentFindApiURL') . 'services/apexrest/LODeals/';
           	$contactId     = $request->session()->get('AUTH_USER')['ENROLLMENT_ID'];
           	$searchDeal    = '';
           	$filterByStage = '';

            $client  = new \GuzzleHttp\Client();
			$respone = $client->post($targetURL, [
			  'body' => json_encode(array('contactId'     => $contactId, 
			  							  'searchDeal'    => $searchDeal, 
			  							  'filterByStage' => $filterByStage
			  							 )
			                       )
			]);

            $data   = json_decode($respone->getBody());
           	$status = 'success';
        
        } catch (\GuzzleHttp\Exception\ClientException $e) {
           
            $response = $e->getResponse();
            $result   = json_decode($response->getBody());
            $status   = 'error';
            $data     = 'Something went wrong.Please try agin !!!';
        }

        return view('frontend.user.deal-list', compact(['data']));    
    }

    public function dealDetail(Request $request) {
        
        try {

            $data = array();
        
        } catch (\GuzzleHttp\Exception\ClientException $e) {
           
            $response = $e->getResponse();
            $result   = json_decode($response->getBody());
            $status   = 'error';
            $data     = 'Something went wrong.Please try agin !!!';
        }

        return view('frontend.user.deal-detail', compact(['data']));    
    }

}
