@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('Deal Details') )
        
@section('content')

<div id="wrapper">
    

    <div class="container-fluid client-list" style="padding-bottom: 30px;">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                 <div class="media">
                    <a class="pull-left" href="<?php echo url('/') . '/user-profile/' . $data->LO_ID; ?>">
						<img src="<?php echo $data->LO_IMAGE; ?>" onerror="this.src='{{ asset('public/img/profile-icon.png') }}';this.onerror='';" alt="" class="media-object">
                    </a>
                    <div class="media-body">
                      <h4 class="media-heading username"><a href="<?php echo url('/') . '/user-profile/' . $data->LO_ID; ?>"><?php echo $data->LO_NAME; ?></a></h4>
                      <p class="star-color"><span class="stars"><?php echo $data->LO_RATING; ?><span></span></span></p>
                      <p class="by-author"><?php echo $data->LO_OFFICE_NAME; ?></p>
                      <p><?php echo $data->LO_PHONE; ?></p>
                      <p><a href="mailto:<?php echo $data->LO_EMAIL; ?>"><?php echo $data->LO_EMAIL; ?></a></p>
                    </div>
                  </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                <div class="media">
                    <a class="pull-left" href="<?php echo url('/') . '/user-profile/' . $data->BROKER_ID; ?>">
						<img src="<?php echo $data->BROKER_IMAGE; ?>" onerror="this.src='{{ asset('public/img/profile-icon.png') }}';this.onerror='';" alt="" class="media-object">
                    </a>
                    <div class="media-body">
                      <h4 class="media-heading username"><a href="<?php echo url('/') . '/user-profile/' . $data->BROKER_ID; ?>"><?php echo $data->BROKER_NAME; ?></a></h4>
                      <p class="star-color"><span class="stars"><?php echo $data->BROKER_RATING; ?><span></span></span></p>
                      <p class="by-author"><?php echo $data->BROKER_OFFICE_NAME; ?></p>
                      <p><?php echo $data->BROKER_PHONE; ?></p>
                      <p><a href="mailto:<?php echo $data->BROKER_EMAIL; ?>"><?php echo $data->BROKER_EMAIL; ?></a></p>
                    </div>
                  </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                <div class="media">
                    <a class="pull-left" href="<?php echo url('/') . '/user-profile/' . $data->AGENT_ID; ?>"><img src="<?php echo $data->AGENT_IMAGE; ?>" onerror="this.src='{{ asset('public/img/profile-icon.png') }}';this.onerror='';" alt="" class="media-object">
                    </a>
                    <div class="media-body">
                      <h4 class="media-heading username"><a href="<?php echo url('/') . '/user-profile/' . $data->AGENT_ID; ?>"><?php echo $data->AGENT_NAME; ?></a></h4>
                      <p class="star-color"><span class="stars"><?php echo $data->AGENT_RATING; ?><span></span></span></p>
                      <p class="by-author"><?php echo $data->AGENT_OFFICE_NAME; ?></p>
                      <p><?php echo $data->AGENT_PHONE; ?></p>
                      <p><a href="<?php echo $data->AGENT_EMAIL; ?>"><?php echo $data->AGENT_EMAIL; ?></a></p>
                    </div>
                  </div>
            </div>
        </div>
    </div>
    
    
    <div id="sidebar-wrapper">
        <nav id="spy">
            <div class="profile-details text-center">
                <h3><?php echo $data->DEAL_NAME; ?></h3>
                <p><?php echo $data->DEAL_PHONE; ?></p>
                <p><a href="mailto:<?php echo $data->DEAL_EMAIL; ?>"><?php echo $data->DEAL_EMAIL; ?></a></p>
            </div>
            <ul class="sidebar-nav nav">
                <li>
                    <a class="active" href="#profile-sec"><span class="fa fa-home solo">Profile &amp; Activity</span></a>
                </li>
                <li>
                    <a href="#agentreq-sec">
                        <span class="fa fa-anchor solo">Agent Request</span>
                    </a>
                </li>
                <li style="display: none">
                    <a href="#favprop-sec">
                        <span class="fa fa-anchor solo">Favorite Properties</span>
                    </a>
                </li>
                <li>
                    <a href="#files-sec">
                        <span class="fa fa-anchor solo">Files</span>
                    </a>
                </li>
                
                <li>
                    <a href="javascript: updateStatusDialog();">
                        <span class="fa fa-anchor solo">Update Status</span>
                    </a>
                    <div class="slideup" style="text-align: center; display: none;">
                        <select id="dealStatus" style="height: 35px; margin-bottom: 10px;">
                            <option value="Active Buyer">Active Buyer</option>
                            <option value="Closed">Closed</option>
                            <option value="Dead">Dead</option>
                            <option value="No Communication with Buyer">No Communication with Buyer</option>
                        </select><br>
                        <input class="msg_send_btn" id="updateStatus" onclick="updateDealStatus('0063D000008obBBQAY');" style="height: 40px;" type="button" value="Update">
                    </div>
                </li>
            </ul>
                        
        </nav>
    </div>
    
    <div id="page-content-wrapper">
        <div class="body-wrapper">
            <div class="container">
                <div id="profile-sec" style="line-height: 0px;">&nbsp;</div>
                <div class="detail-section">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">Profile</div>
                                <div class="panel-body">
                                    <h4>Loan Basis</h4>
                                    <?php
									$profile = json_decode(json_encode($data->PROFILE), true);
									if(count($profile)>0) {
									?>
										
										<ul class="list-unstyled profile-list">
											<li>Pre-approval Amount: <span class="text-value">$<?php echo $data->PROFILE->PREAPPROVAL_AMOUNT ; ?>
												</span></li>
											<li>Loan Type: <span class="text-value"><?php echo $data->PROFILE->LOAN_TYPE ; ?></span></li>
											<li>First Time Home Buyer: <span class="text-value"><?php echo $data->PROFILE->FIRST_TIME_HOME_BUYER ; ?></span></li>
											
											<li>Time Frame for Purchasing: <span class="text-value"><?php echo $data->PROFILE->TIME_FRAME_FOR_PURCHASING ; ?></span></li>
											<li>Location for Home Search: <span class="text-value"><?php echo $data->PROFILE->LOCATION_FOR_HOME_SEARCH ; ?></span></li>
											<li>Property Type: <span class="text-value"><?php echo $data->PROFILE->PROPERTY_TYPE ; ?></span></li>
											<li>Property Details: <span class="text-value"><?php echo $data->PROFILE->PROPERTY_DETAILS ; ?></span></li>
										</ul>
									
										
									<?php	
									} else {
									?>
										<span style="padding: 200px;font-size: 15px;font-weight: bold;color: #0e52fd;">No Records Found</span>
									<?php	
									}
									?>
									
									
									
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Activity</div>
										
										<?php
										$activity = json_decode(json_encode($data->ACTIVITY), true);
										if(count($activity)>0) {
										?>
									
											<div class="panel-body">
												<div class="col-md-5 padding-none">
													<span class="text-light-gray"><?php echo $data->ACTIVITY->DATE_LEAD_RECEIVED ; ?></span>
													<span class="block-text">Date Lead Received </span>
												</div>
												<div class="col-md-4 padding-none">
													<span class="text-light-gray"><?php echo $data->ACTIVITY->LAST_OFFER_DATE ; ?></span>
													<span class="block-text">Last Offer Date </span>
												</div>
												<div class="col-md-3 padding-none">
													<span class="text-light-gray"><?php echo $data->ACTIVITY->DAYS_LOOKING ; ?></span>
													<span class="block-text">Days Looking</span>
												</div>
											</div>
										<?php	
										} else {
										?>
											<span style="padding: 200px;font-size: 15px;font-weight: bold;color: #0e52fd;">No Records Found</span>
										<?php	
										}
										?>	
										
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Notes</div>
                                        <div class="panel-body">
                                            <div class="min-height222 note-body">
                                                <p><span style="white-space:pre-wrap;"><?php echo $data->NOTES; ?></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div id="agentreq-sec" style="line-height: 0px;">&nbsp;</div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Agent Request Details</div>
                                        
										<?php
										$AGENT_REQUEST_DETAILS = json_decode(json_encode($data->AGENT_REQUEST_DETAILS), true);
										if(count($AGENT_REQUEST_DETAILS)>0) {
										?>
									
											<div class="panel-body">
												<ul class="list-unstyled profile-list text-capitalize">
													<li>Data agent requested: <span class="text-value"><?php echo $data->AGENT_REQUEST_DETAILS->DATA_AGENT_REQUESTED; ?></span></li>
													<li>Data paired with agent: <span class="text-value"><?php echo $data->AGENT_REQUEST_DETAILS->DATA_PAIRED_WITH_AGENT; ?></span></li>
													<li>Property of interest: <span class="text-value"><?php echo $data->AGENT_REQUEST_DETAILS->PROPERTY_OF_INTEREST; ?></span></li>
													<li>Borrower noter: <span class="text-value"><?php echo $data->AGENT_REQUEST_DETAILS->BORROWER_NOTE; ?></span></li>
												</ul>
											</div>
										<?php	
										} else {
										?>
											<span style="padding: 200px;font-size: 15px;font-weight: bold;color: #0e52fd;">No Records Found</span>
										<?php	
										}
										?>	
										
                                    </div>
                                </div>
                                <div id="files-sec" style="line-height: 0px;">&nbsp;</div>
                                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Attachment
                                            <div class="uploadfile">
                                                <span>Upload File</span>
                                                <input name="file" type="file">
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="attachment min-height137">
                                                <div class="attach-filelist">
													<?php
													if(isset($dealAttachment->ATTACHMENTS) && count($dealAttachment->ATTACHMENTS)>0) {
														foreach($dealAttachment->ATTACHMENTS as $a) {
													?>	
															
															<div class="eachfile">
																<p class="file-name">
																	<span class="glyphicon glyphicon-file"></span> 
																	<a href="<?php echo $a->URL; ?>" target="_blank"><?php echo $a->NAME; ?></a>
																	<a href="<?php echo $a->URL; ?>" target="_blank">
																		<span class="glyphicon glyphicon-download-alt" style="color: #000;"></span>
																	</a>
																</p>
                                                            <p class="attachment-details text-muted">Upload by <?php echo $a->OWNER . " " . date("d M, Y", strtotime($a->UPLOAD_TIME));; ?>  </p>
                                                        </div>
	
													<?php
														}
													} else {
													?>
														<div class="eachfile" ng-show="attachmentsNotFound">No Attachments Available.</div>
													<?php		
													}
													?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                            <div class="chatboxapp">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Chatter</div>
                                    <div class="panel-body">
                                        <div class="mesgs">
                                            <div class="msg_history">
                                                <div ng-show="activitiesNotFound" style="padding-left: 0px;" class="ng-hide">There are no activities available.</div>
                                                
                                                <!-- ngRepeat: activity in dealDetail['ACTIVITIES'] --><div ng-repeat="activity in dealDetail['ACTIVITIES']" class="ng-scope"> 
                                                    <!-- ngIf: activity.Submitted_By__r.Id != dealDetail['CONTACTID'] --><div class="incoming_msg ng-scope" ng-if="activity.Submitted_By__r.Id != dealDetail['CONTACTID']">
                                                        <div class="incoming_msg_img"> 
                                            <img src="/AgentFind/servlet/servlet.ImageServer?oid=00Di0000000Yujy&amp;id=0150U0000000jyrQAA">
                                                        </div>
                                                        <div class="received_msg">
                                                            <div class="received_withd_msg">
                                                                <p class="ng-binding">test</p>
                                                                <span class="time_date ng-binding"> 06 Dec, 2018 01:30</span></div>
                                                        </div>
                                                    </div><!-- end ngIf: activity.Submitted_By__r.Id != dealDetail['CONTACTID'] -->
                                                    <!-- ngIf: activity.Submitted_By__r.Id == dealDetail['CONTACTID'] -->
                                                </div><!-- end ngRepeat: activity in dealDetail['ACTIVITIES'] --><div ng-repeat="activity in dealDetail['ACTIVITIES']" class="ng-scope"> 
                                                    <!-- ngIf: activity.Submitted_By__r.Id != dealDetail['CONTACTID'] --><div class="incoming_msg ng-scope" ng-if="activity.Submitted_By__r.Id != dealDetail['CONTACTID']">
                                                        <div class="incoming_msg_img"> 
                                            <img src="/AgentFind/servlet/servlet.ImageServer?oid=00Di0000000Yujy&amp;id=0150U0000000jyrQAA">
                                                        </div>
                                                        <div class="received_msg">
                                                            <div class="received_withd_msg">
                                                                <p class="ng-binding">test1112</p>
                                                                <span class="time_date ng-binding"> 06 Dec, 2018 01:30</span></div>
                                                        </div>
                                                    </div><!-- end ngIf: activity.Submitted_By__r.Id != dealDetail['CONTACTID'] -->
                                                    <!-- ngIf: activity.Submitted_By__r.Id == dealDetail['CONTACTID'] -->
                                                </div><!-- end ngRepeat: activity in dealDetail['ACTIVITIES'] --><div ng-repeat="activity in dealDetail['ACTIVITIES']" class="ng-scope"> 
                                                    <!-- ngIf: activity.Submitted_By__r.Id != dealDetail['CONTACTID'] -->
                                                    <!-- ngIf: activity.Submitted_By__r.Id == dealDetail['CONTACTID'] --><div class="outgoing_msg ng-scope" ng-if="activity.Submitted_By__r.Id == dealDetail['CONTACTID']">
                                                        <div class="sent_msg">
                                                            <p class="ng-binding">aa</p>
                                                            <span class="time_date ng-binding"> 11 Jun, 2019 04:25</span> 
                                                        </div>
                                                        <div class="outgoing_msg_img"> 
                                            <img src="/AgentFind/servlet/servlet.ImageServer?oid=00Di0000000Yujy&amp;id=0150U0000000kEpQAI">
                                            
                                                        </div>
                                                    </div><!-- end ngIf: activity.Submitted_By__r.Id == dealDetail['CONTACTID'] -->
                                                </div><!-- end ngRepeat: activity in dealDetail['ACTIVITIES'] --><div ng-repeat="activity in dealDetail['ACTIVITIES']" class="ng-scope"> 
                                                    <!-- ngIf: activity.Submitted_By__r.Id != dealDetail['CONTACTID'] -->
                                                    <!-- ngIf: activity.Submitted_By__r.Id == dealDetail['CONTACTID'] --><div class="outgoing_msg ng-scope" ng-if="activity.Submitted_By__r.Id == dealDetail['CONTACTID']">
                                                        <div class="sent_msg">
                                                            <p class="ng-binding">hi</p>
                                                            <span class="time_date ng-binding"> 28 Mar, 2020 10:17</span> 
                                                        </div>
                                                        <div class="outgoing_msg_img"> 
                                            <img src="/AgentFind/servlet/servlet.ImageServer?oid=00Di0000000Yujy&amp;id=0150U0000000kEpQAI">
                                            
                                                        </div>
                                                    </div><!-- end ngIf: activity.Submitted_By__r.Id == dealDetail['CONTACTID'] -->
                                                </div><!-- end ngRepeat: activity in dealDetail['ACTIVITIES'] -->
                                                
                                            </div>
                                            
                                        </div>
                                            <div class="type_msg">
                                                <div class="input_msg_write">
                                                    <input class="write_msg ng-pristine ng-untouched ng-valid" name="message" ng-model="message" placeholder="Type a message" type="text">
                                                    <button class="msg_send_btn" ng-click="pushData();" type="button">send<i aria-hidden="true" class="fa fa-paper-plane-o"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row" style="display: none">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                            
                            <div class="panel panel-default" id="favprop-sec">
                                <div class="panel-heading"><h4 class="ng-binding">Favorites (0)</h4></div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                            <span class="text-light-gray ng-binding">0 homes</span>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 text-total text-right">
                                            
                                        </div>
                                    </div>
                                    <div class="row m-t-30">
                                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                            <div class="map-view">
                                                <div id="googleMap" style="width: 100%; height: 400px; position: relative; overflow: hidden;"><div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);"><div style="overflow: hidden;"></div><div class="gm-style" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px;"><div tabindex="0" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; touch-action: pan-x pan-y;"><div style="z-index: 1; position: absolute; left: 50%; top: 50%; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"></div></div><div class="gm-style-pbc" style="z-index: 2; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; opacity: 0;"><p class="gm-style-pbt"></p></div><div style="z-index: 3; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; touch-action: pan-x pan-y;"><div style="z-index: 4; position: absolute; left: 50%; top: 50%; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div></div></div></div><iframe aria-hidden="true" frameborder="0" tabindex="-1" style="z-index: -1; position: absolute; width: 100%; height: 100%; top: 0px; left: 0px; border: none;"></iframe></div></div></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                            <div class="favorite-list">
                                                <ul class="media-list main-list">
                                                    <!-- ngRepeat: fav in dealDetail['FAVORITES'] -->
                                                   
                                                    <li ng-show="favoritesNotFound" class="">There is no sites available.</li> 
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

@endsection

@push('after-scripts')
<script type="text/javascript">
var locations = [];

function showActivity() {
    
    var element = document.getElementById("activityTabCont");
    element.classList.add("slds-show");
    element.classList.remove("slds-hide");
    
    element = document.getElementById("attachmentTabCont");
    element.classList.add("slds-hide");
    element.classList.remove("slds-show");
    
    element = document.getElementById("activityTab");
    element.classList.add("slds-is-active");
    
    element = document.getElementById("attachmentTab");
    element.classList.remove("slds-is-active");
}

function showAttachments() {
    
    var element = document.getElementById("attachmentTabCont");
    console.log(element.classList);
    element.classList.add("slds-show");
    element.classList.remove("slds-hide");
    
    element = document.getElementById("activityTabCont");
    element.classList.add("slds-hide");
    element.classList.remove("slds-show");
    
    element = document.getElementById("activityTab");
    element.classList.remove("slds-is-active");
    
    element = document.getElementById("attachmentTab");
    element.classList.add("slds-is-active");
}       

/*Menu-toggle*/
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("active");
});

$.fn.stars = function() {
    return $(this).each(function() {
        $(this).html($('<span />').width(Math.max(0, (Math.min(5, parseFloat($(this).html())))) * 16));
    });
}
    
function myMap() {
    var mapProp= {
        center:new google.maps.LatLng(51.508742,-0.120850),
        zoom:5,
    };
    var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}

$('span.stars').stars();

setTimeout(function(){ 

    initMap(locations)

}, 3000);


function initMap(locations) {

var map = new google.maps.Map(document.getElementById('googleMap'), {
  zoom: 5,
  center: locations[0]
});

// Create an array of alphabetical characters used to label the markers.
var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

// Add some markers to the map.
// Note: The code uses the JavaScript Array.prototype.map() method to
// create an array of markers based on a given "locations" array.
// The map() method here has nothing to do with the Google Maps API.
var markers = locations.map(function(location, i) {
  return new google.maps.Marker({
    position: location,
    label: labels[i % labels.length]
  });
});

  let clusterOptions = { imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'};
  
// Add a marker clusterer to manage the markers.
var markerCluster = new MarkerClusterer(map, markers, clusterOptions);
}

function updateStatusDialog() {
    
    if ( $( "div.slideup" ).is( ":hidden" ) ) {
        $( "div.slideup" ).slideDown( "slow" );
    } else {
        $( "div.slideup" ).hide();
    }
}
</script>
 
<script src="https://maps.googleapis.com/maps/api/js?libraries=geometry,places&amp;ext=.js&amp;key=AIzaSyCHz6vkx7Zvt4nECX_sDVrYHkn5J64ZWuY"></script>
@endpush
