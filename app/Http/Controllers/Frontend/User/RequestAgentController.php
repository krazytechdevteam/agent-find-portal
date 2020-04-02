<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;

/**
 * Class RequestAgentController.
 */
class RequestAgentController extends Controller
{

    public function requestAgent(Request $request) {
        
        $data = array();

        try {

            $LENDERID  = $request->session()->get('AUTH_USER')['ENROLLMENT_ID'];
            $targetURL = config('app.agentFindApiURL') . 'services/apexrest/ReferAgent/'.$LENDERID;

            $client    = new \GuzzleHttp\Client();
            $respone   = $client->get($targetURL);
            $data      = json_decode($respone->getBody());

        } catch (\GuzzleHttp\Exception\ClientException $e) {
           
            $response = $e->getResponse();
            $result   = json_decode($response->getBody());
            $status   = 'error';
            $data     = 'Something went wrong.Please try agin !!!';
        }

        return view('frontend.user.request-agent', compact(['data']));    
    }

    public function requestAgentSave(Request $request) {

        try {

            $param                      = array();
            $param['lenderId']          = $request->session()->get('AUTH_USER')['ENROLLMENT_ID'];
            $param['clientFirstName']   = $request->clients_first_name;
            $param['clientLastName']    = $request->clients_last_name;
            $param['clientPhone']       = $request->clients_phone;
            $param['clientEmail']       = $request->clients_email;
            $param['clientCity']        = $request->clients_city;
            $param['clientState']       = $request->clients_state;
            $param['desiredMoveDate']   = $request->client_desired_moved_date;
            $param['loanType']          = $request->client_loan_type;
            $param['preApproved']       = $request->client_pre_approved;
            $param['preApprovedAmount'] = $request->client_approved_amt;
            $param['tellMore']          = $request->client_additional_req;

            $targetURL = config('app.agentFindApiURL') . 'services/apexrest/ReferAgent/';

            $client    = new \GuzzleHttp\Client();
            $respone = $client->post($targetURL, [
              'body' => json_encode($param)
            ]);

            $result = json_decode($respone->getBody());
            $status   = $result->status;
            $message  = $result->message;
        
        } catch (\GuzzleHttp\Exception\ClientException $e) {

            $response = $e->getResponse();
            $result   = json_decode($response->getBody());
            $status   = 'error';
            $message  = 'Something went wrong.Please try agin !!!';
        }

        if($status == 'success') {
            alert()->success($message, $status);
        } else {
            alert()->error($message, $status);
        }
       
        return redirect()->back();
    }

}
