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


    public function dealListDataAPI($param) {

        try {

            $targetURL     = config('app.agentFindApiURL') . 'services/apexrest/LODeals/';
    
            $client  = new \GuzzleHttp\Client();
            $respone = $client->post($targetURL, [
              'body' => json_encode($param)
            ]);

            $data   = json_decode($respone->getBody());
            $status = 'success';
        
        } catch (\GuzzleHttp\Exception\ClientException $e) {
           
            $response = $e->getResponse();
            $result   = json_decode($response->getBody());
            $status   = 'error';
            $data     = 'Something went wrong.Please try agin !!!';
        }

        return ['status' => $status,  'data' => $data];
    }

    public function dealList(Request $request) {

        $param                  = array();
        $param['contactId']     = $request->session()->get('AUTH_USER')['ENROLLMENT_ID'];
        $param['searchDeal']    = '';
        $param['filterByStage'] =  isset($request->stage) ? $request->stage : '';

        $response = $this->dealListDataAPI($param);
        $data     = $response['data'];
       
       
        return view('frontend.user.deal-list', compact(['data']));    
    }

    public function dealDetail(Request $request, $dealId) {
        
        $dealAttachment = array();
        $data           = array();
        $chatdata       = array();
        $contactid = $request->session()->get('AUTH_USER')['ENROLLMENT_ID'];

        try {

            $targetURL = config('app.agentFindApiURL') . 'services/apexrest/LODealDetail/'.$dealId;

            $client    = new \GuzzleHttp\Client();
            $respone   = $client->get($targetURL);
            $data      = json_decode($respone->getBody());

            //GET THE ATTACHMENT LIST 
            $attachmentUrl      = config('app.agentFindApiURL') . 'services/apexrest/LODealFiles/'.$dealId;
            $attachmentResponse = $client->get($attachmentUrl);
            $dealAttachment     = json_decode($attachmentResponse->getBody());

            //GET THE CHAT HISTORY
            $chatURL      = 'https://afnew-agentfind.cs97.force.com/AgentFind/services/apexrest/LOChat/'.$dealId;
            $chatResponse = $client->get($chatURL);
            $chatdata     = json_decode($chatResponse->getBody());

        
        } catch (\GuzzleHttp\Exception\ClientException $e) {
           
            $response = $e->getResponse();
            $result   = json_decode($response->getBody());
            $status   = 'error';
            $data     = 'Something went wrong.Please try agin !!!';
        }

        return view('frontend.user.deal-detail', compact(['data', 'dealAttachment', 'chatdata', 'contactid']));    
    }

    public function updateDealStatus(Request $request) {

        try {

            $targetURL = config('app.agentFindApiURL') . 'services/apexrest/LODealDetail/';
    
            $client  = new \GuzzleHttp\Client();
            $respone = $client->post($targetURL, [
              'body' => json_encode(array('DEAL_ID' => $request->deal_id, 'STATUS' => $request->deal_status))
            ]);

            $data   = json_decode($respone->getBody());
            $status = 'success';
        
        } catch (\GuzzleHttp\Exception\ClientException $e) {
           
            $response = $e->getResponse();
            $result   = json_decode($response->getBody());
            $status   = 'error';
            $data     = 'Something went wrong.Please try agin !!!';
        }

        if($data->STATUS == 'success') {
            alert()->success('Deal is successfully updated', 'Thank You');
        } else {
            alert()->success('Something went wrong.Please try agin !!!', 'Error');
        }

          return redirect()->back();

    }

    public function updateDealAttachment(Request $request) {

        try {

            $targetURL = config('app.agentFindApiURL') . 'services/apexrest/LODealFiles/';

            $file_tmp = $_FILES['deal_upload']['tmp_name'];
            $type     = pathinfo($file_tmp, PATHINFO_EXTENSION);
            $data     = file_get_contents($file_tmp);
            $base64   = base64_encode($data);
           
            $param['FILE_TYPE'] = $_FILES['deal_upload']['type'];
            $param['FILE_NAME'] = $_FILES['deal_upload']['name'];
            $param['FILE_DATA'] = $base64;
            $param['DEAL_ID']   = $request->deal_id;

            $client  = new \GuzzleHttp\Client();
            $respone = $client->post($targetURL, [
              'body' => json_encode($param)
            ]);

            $data   = json_decode($respone->getBody());
            $status = 'success';
        
        } catch (\GuzzleHttp\Exception\ClientException $e) {
           
            $response = $e->getResponse();
            $result   = json_decode($response->getBody());
            $status   = 'error';
            $data     = 'Something went wrong.Please try agin !!!';
        }

       // echo '<pre>'; print_r($data); die;

        if($data->STATUS == 'success') {
            alert()->success('File is successfully uploaded', 'Thank You');
        } else {
            alert()->success('Something went wrong.Please try agin !!!', 'Error');
        }

        return redirect()->back();
    }

}
