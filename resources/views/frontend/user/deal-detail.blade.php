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
					<form id="dealUpdateStatus" method="post" action="<?php echo url('/') . '/update-deal-status'; ?>">
						 {{ csrf_field() }}
						<div class="slideup" style="text-align: center; display: none;">
							<input type="hidden" name="deal_id" value="<?php echo $data->DEAL_ID; ?>"/>
							<select name="deal_status" id="deal_status" style="height: 35px; margin-bottom: 10px;">
								<option value="Active Buyer">Active Buyer</option>
								<option value="Closed">Closed</option>
								<option value="Dead">Dead</option>
								<option value="No Communication with Buyer">No Communication with Buyer</option>
							</select><br>
						    <button class="msg_send_btn" id="updateStatus" style="height: 40px;" type="submit">Update</button>
						</div>
					</form>
                    
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
												<form id="attachmentForm" method="post" action="<?php echo url('/') . '/upload-deal-attachment'; ?>" enctype="multipart/form-data">
													 {{ csrf_field() }}
													 <input type="hidden" name="deal_id" value="<?php echo $data->DEAL_ID; ?>"/>
													<!--<input name="deal_upload" type="file" onchange="javascript:this.form.submit();">-->
													<input name="deal_upload" id="attachmentBtn" type="file">
												</form>
                                                
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
                                    <div class="panel-heading">Chatter 
										<div class="historyChatDiv" style="text-align:center; margin-top:-28px">
											<button class="btn btn-primary btn-xs" id="historyChat" type="button">Load Previous History</button>
										</div>
									</div>
                                    <div class="panel-body">
                                        <div class="mesgs">
                                            <div class="msg_history">
                                                
												<div class="older_chat"></div>
												
												<div class="today_chat"></div>
												 
                                            </div>
                                            
                                        </div>
                                            <div class="type_msg">
                                                <div class="input_msg_write">
                                                    <input class="write_msg" name="message" placeholder="Type a message" type="text">
                                                    <button class="chat_send_btn msg_send_btn" type="button">send<i aria-hidden="true" class="fa fa-paper-plane-o"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row" style="display: block;">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                            
                            <div class="panel panel-default" id="favprop-sec">
                                <div class="panel-heading"><h4></h4></div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                            <span class="text-light-gray"></span>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 text-total text-right">
                                            
                                        </div>
                                    </div>
                                    <div class="fav-property" class="row m-t-30">
                                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                            <div class="map-view">
                                                <div id="mapid" style="width:100%;height:400px;"></div>

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                            <div class="favorite-list">

                                                <ul class="media-list main-list" id="fav_list">

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


@push('after-styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />   
@endpush

@push('after-scripts')
<!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
   integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
   crossorigin=""></script>


<script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>

<script type="text/javascript">
	
Number.prototype.formatMoney = function(c, d, t){
    var n = this, 
    c = isNaN(c = Math.abs(c)) ? 2 : c, 
    d = d == undefined ? "." : d, 
    t = t == undefined ? "," : t, 
    s = n < 0 ? "-" : "", 
    i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))), 
    j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t);
};
Number.prototype.formatArea = function(t){
    var n = this, 
    t = t == undefined ? "," : t, 
    s = n < 0 ? "-" : "", 
    i = String(parseInt(n = Math.abs(Number(n) || 0))), 
    j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t);
};
getUserFavorites();
function getUserFavorites() {
	
	var data = {
				'URL' : '<?php echo $data->URL; ?>',
				'USERNAME' : '<?php echo $data->USERNAME; ?>',
				'PASSWORD' : '<?php echo $data->PASSWORD; ?>',
				
	           };
	
	$.ajax({
		url: "{{ url('/get-fav-property') }}",
		type: 'POST',
		dataType: 'json',
		data: JSON.stringify(data),
		contentType: 'application/json',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		success: function (res) {
			
			if(res && res.status == "error") {
				$('.fav-property').html('<div style="text-align: center;font-size: 20px;color: gray; padding: 15px;">Something went wrong on loading favorite property !!!</div>');
				return;
			}
			
		    if(res && res.status == "success" && res.data.data.length > 0){
				
				$('#favprop-sec h4').text('Favorites (' + res.data.data.length + ')');
				
				var mapCenter = [33.753746, -84.386330];
				var mymap = L.map('mapid').setView(mapCenter, 13);
				L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoic2FuamF5MjM5MCIsImEiOiJjazhvYnV5MjAwNmxjM2Ztamo4ZXh3bzkyIn0.4swDk-cHJxhaD2uoZwwGlg', {
					maxZoom: 15,
					attribution: '',
					id: 'mapbox/streets-v11',
					tileSize: 512,
					zoomOffset: -1
				}).addTo(mymap);
	
				var html = '';
				$.each(res.data.data, function(i, d){
					
					var propertyStructure = [];
					propertyStructure.push(d.bedrooms + ' Beds');
					propertyStructure.push(d.bathrooms + ' Baths');
					propertyStructure.push(d.area.formatArea(",") + ' Sq. Ft.');
					var propertyDetailUrl = res.domainName + '/details/' + d.id;
					
					////////////////////////////////////////////////////////////
					
					if(d.latitude && d.longitude){
						
						L.marker([d.latitude, d.longitude])
						.addTo(mymap)
						.bindPopup('<b>' + d.addressLineOne + "<br>" + d.addressLineTwo + '<br>' + '$' + d.price.formatMoney(2, ".", ",") + '</b>');
						
						/* var popup = L.popup();
						var marker = L.marker([d.latitude, d.longitude], {clickUrl: propertyDetailUrl})
									.addTo(mymap)
									.on('mouseover', function(e){
										popup.setLatLng(e.latlng).setContent(d.addressLineOne + "<br>" + d.addressLineTwo + '<br>' + d.price).openOn(mymap);
									})
									.on('mouseout', function(e){
										mymap.closePopup()
									}) */
					}
			
												
					html += '<li class="media" style="border: 1px solid #80808036; padding:5px; border-radius:10px">'+ 
							'<div style="border: 1px solid #ececec;float: left;margin-right: 10px;padding: 0px;">'+
							'<a class="pull-left" href="'+propertyDetailUrl+'" target="_blank">'+
								'<img src="'+d.photoUrl+'" class="media-object" border="0" />'+
							'</a>'+
							'</div>'+
							'<div class="media-body">'+
								'<div class="row">'+
									'<div class="col-md-8">'+
										'<a href="'+propertyDetailUrl+'" target="_blank">'+d.addressLineOne+'</a><br/>'+
										'<span class="text-light-gray">'+d.addressLineTwo+'</span>'+
									'</div>'+
									'<div style="font-size: 18px;" class="col-md-4 text-left">'+
									'<span>$'+d.price.formatMoney(2, ".", ",")+'</span>'+
									'</div>'+
								'</div>'+
								'<div class="row">'+
									'<div class="col-md-12 text-left">'+
										'<span>'+propertyStructure.join(" | ")+'</span><br>'+
										'<span style="color:red">'+
										'<span class="glyphicon glyphicon-heart"></span>'+
									'</div>'+
								'</div>'+       
							'</div>'+
						'</li>';
				})
				$('#fav_list').html(html);
		    } else {
				$('.fav-property').html('<div style="text-align: center;font-size: 20px;color: gray; padding: 15px;">No Record Found</div>');
			}  
		},
		error: function (error) { 
			$('.fav-property').html('<div style="text-align: center;font-size: 20px;color: gray; padding: 15px;">Something went wrong on loading favorite property !!!</div>');
		}
	});
}


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

$('#attachmentBtn').change(function (e) {
    
	document.getElementById("attachmentForm").submit();
	$('.uploadfile span').text('Loading...');
	$('.uploadfile').css("background", "gray")
	$('#attachmentBtn').attr('disabled', true);
	
});


function constructChatHtml(res) {
	
	var html = '';
	$.each(res.data.CHAT, function(i, d){
		
		if(d.contactId != res.contactid) {
			
			html += '<div class="ng-scope">'+ 
						'<div class="incoming_msg ng-scope">'+
							'<div class="incoming_msg_img">'+ 
								'<img src="'+d.contactImage+'">'+
							'</div>'+
							'<div class="received_msg">'+
								'<div class="received_withd_msg">'+
									'<p class="ng-binding">'+d.message+'</p>'+
									'<span class="time_date ng-binding"></span>'+
								'</div>'+
							'</div>'+
						'</div>'+
					'</div>';
		
		}
		
		if(d.contactId == res.contactid) {
			
			html += '<div class="ng-scope">'+ 
					   '<div class="outgoing_msg ng-scope">'+
							'<div class="sent_msg">'+
								'<p class="ng-binding">'+d.message+'</p>'+
								'<span class="time_date ng-binding"></span>'+
							'</div>'+
							'<div class="outgoing_msg_img">'+
								'<img src="'+d.contactImage+'">'+
							'</div>'+
						'</div>'+
					'</div>';
		
		}

	});
	
	return html;
}


loadTodayChatHistory();

function loadTodayChatHistory() {
	
	var data = {
	  'dealId'    : '<?php echo $dealId;  ?>',
	  'contactId' : '<?php echo $contactid;  ?>'
	}
	
	$.ajax({
		url: "{{ url('/load-today-chat') }}",
		type: 'POST',
		dataType: 'json',
		data: JSON.stringify(data),
		contentType: 'application/json',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		success: function (res) {
		   
		    if(res && res.status == "success" && res.data.CHAT.length > 0){
				
				var today = "<?php echo date('d M, Y'); ?>";
				
				var html  = '<div style="border: 1px solid gray;background-color: #00bcd414;width: 120px;margin: 0 auto;padding: 1px 10px 0 10px; text-align: center;">'+today+'</div>';
				html  += constructChatHtml(res);
				
				$('.today_chat').empty();
				$('.today_chat').html(html);
				$(".msg_history").animate({scrollTop:9999 }, 'smooth');
	
			}
		},
		error: function (error) { }
	});
}

$(".chat_send_btn").click(function(e) { 
	
	$('.chat_send_btn').text('Loading...').attr('disabled', true);
	
	var enterMsg = $('.write_msg').val();
	if(enterMsg.trim() === '') {
		swal("Error", "Please Enter Message", "error");
		return;
	}
	
	var data = {
	  'dealId'    : '<?php echo $dealId;  ?>',
	  'contactId' : '<?php echo $contactid;  ?>',
	  'message'   : enterMsg
	}
	
	$.ajax({
		url: "{{ url('/push-new-chat') }}",
		type: 'POST',
		dataType: 'json',
		data: JSON.stringify(data),
		contentType: 'application/json',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		success: function (res) {
		   
		    if(res.status == 'success') {
			   
			    loadTodayChatHistory();
			    /* var senderImage = "{{ Session::get('AUTH_USER')['PROFILE_IMG'] }}";
				var newMsgHtml = '<div class="ng-scope">'+ 
								   '<div class="outgoing_msg ng-scope">'+
										'<div class="sent_msg">'+
											'<p class="ng-binding">'+enterMsg+'</p>'+
											'<span class="time_date ng-binding"></span>'+
										'</div>'+
										'<div class="outgoing_msg_img">'+ 
											'<img src="'+senderImage+'">'+
										'</div>'+
									'</div>'+
								'</div>';
						
				$('.today_chat').append(newMsgHtml); */
		    
			} else {
				
				swal("Error", "Something Went Wrong.Plz Try Agin !!!", "error");
			}
		    $('.chat_send_btn').removeAttr("disabled").text("Send");
			$('.write_msg').val('');
			$(".msg_history").animate({scrollTop:9999 }, 'smooth');
		},
		error: function (error) { }
	}); 
	
});

$("#historyChat").click(function(e) {
	
	$('#historyChat').text('Loading...').attr('disabled', true);
	
    $.ajax({
		url: "{{ url('/load-old-chat') }}"+"/"+'<?php echo $dealId; ?>',
		type: 'GET',
		dataType: 'json',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		success: function (res) {
		   
			if(res && res.status == "success" && res.data.CHAT.length > 0){
				
				var html = constructChatHtml(res);
				$('.historyChatDiv').remove();
				$('.msg_history .older_chat').prepend(html);
				$(".msg_history").animate({scrollTop:0}, 'smooth');
				$('.chatboxapp .panel-heading').text( $('.chatboxapp .panel-heading').text().trim() );
			
			} else {
				
				//$('#historyChat').removeAttr("disabled").text("Load Old Chat");
				$('.historyChatDiv').remove();
				swal("Error", "No record available", "error");
			}
		},
		error: function (error) { }
	});
   
});

$('form#dealUpdateStatus').submit(function (e) { 
    var formbtn = "#dealUpdateStatus button[type=submit]";
    $(formbtn).text('Loading...').attr('disabled', true);
});
    
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


/* 
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
} */

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
