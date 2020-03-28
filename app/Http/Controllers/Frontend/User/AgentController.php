<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;

/**
 * Class AgentController.
 */
class AgentController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function showLoginForm(Request $request) {

    	if( $request->session()->exists('AUTH_USER') ) {
            return redirect('/dashboard');
        }
    	return view('frontend.auth.login');
    }

    public function agentLogOut(Request $request) {

    	$request->session()->forget('AUTH_USER');
    	return redirect('/login');
    }

    public function salesForceAuthentication($sf_config) {

    	$status          = 'success';
        $message         = '';

    	try {
           
            $client  = new \GuzzleHttp\Client();
			$respone = $client->post($sf_config['URL'], [
			  'body' => json_encode(array('username' => $sf_config['USERNAME'], 'password' => $sf_config['PASSWORD']))
			]);

            $message = json_decode($respone->getBody());
        
        } catch (\GuzzleHttp\Exception\ClientException $e) {
           
            $response = $e->getResponse();
            $result   = json_decode($response->getBody());
            $status   = 'error';
            $message  = 'Something went wrong.Please try agin !!!';
        }

        return ['status' => $status,  'message' => $message];
    }

    public function agentLogin(Request $request) {

    	$sf_config             = array();
        $sf_config['URL']      = config('app.agentFindApiURL') . 'services/apexrest/LO/login';
        $sf_config['USERNAME'] = $request->username;
        $sf_config['PASSWORD'] = $request->password;

        $authResponse          = $this->salesForceAuthentication($sf_config);


        if($authResponse['status'] == 'error') {

        	alert()->error($authResponse['message'], 'Error');
        	return redirect()->back();
        }

        if( isset($authResponse['message']->ERROR) ) {

        	alert()->error($authResponse['message']->ERROR, 'Error');
        	return redirect()->back();
        } 

		$request->session()->put('AUTH_USER', json_decode(json_encode($authResponse['message']), true) );
		return redirect('dashboard');

    }

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

    public function userProfile(Request $request) {
 
    	try {

           	$targetURL     = config('app.agentFindApiURL') . 'services/apexrest/UserInfo/'.$request->session()->get('AUTH_USER')['ENROLLMENT_ID'];

            $client  = new \GuzzleHttp\Client();
			$respone = $client->get($targetURL);

            $data    = json_decode($respone->getBody());
           	$status  = 'success';
        
        } catch (\GuzzleHttp\Exception\ClientException $e) {
           
            $response = $e->getResponse();
            $result   = json_decode($response->getBody());
            $status   = 'error';
            $data     = 'Something went wrong.Please try agin !!!';
        }

        return view('frontend.user.user-profile', compact(['data'])); 
    }

}
