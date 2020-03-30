<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
    	
    	$dealsMakingOfferData  = array();
    	$dealUnderContractData = array();

    	try {

           	$targetURL     = config('app.agentFindApiURL') . 'services/apexrest/LODashboard/';
           	$contactId     = $request->session()->get('AUTH_USER')['ENROLLMENT_ID'];
        
            $client  = new \GuzzleHttp\Client();
			$respone = $client->post($targetURL, [
			  'body' => json_encode(array('contactId'     => $contactId))
			]);

            $data   = json_decode($respone->getBody());
           	$status = 'success';

           	//Deals Making Offer
           	$param                    = array();
	        $param['contactId']       = $contactId;
	        $param['searchDeal']      = '';
	        $param['filterByStage']   =  'Buyer Making Offer';
           	$dealsMakingOfferResponse = app('App\Http\Controllers\Frontend\User\DealController')->dealListDataAPI($param);
        	$dealsMakingOfferData     = $dealsMakingOfferResponse['data'];


        	//Deals Under Contract
           	$param['filterByStage']     =  'UC';
           	$dealsUnderContractResponse = app('App\Http\Controllers\Frontend\User\DealController')->dealListDataAPI($param);
        	$dealUnderContractData      = $dealsUnderContractResponse['data'];
        
        } catch (\GuzzleHttp\Exception\ClientException $e) {
           
            $response = $e->getResponse();
            $result   = json_decode($response->getBody());
            $status   = 'error';
            $data     = 'Something went wrong.Please try agin !!!';
        }

        return view('frontend.user.dashboard', compact(['data', 'dealsMakingOfferData', 'dealUnderContractData']));   
    }
}
