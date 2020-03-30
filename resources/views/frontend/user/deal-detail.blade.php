@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )
        
@section('content')

<div id="wrapper">
    
    <div class="container-fluid client-list" style="padding-bottom: 30px;">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                 <div class="media">
                    <a class="pull-left" href="#"><img src="/AgentFind/servlet/servlet.ImageServer?oid=00D0U00000096EY&amp;id=0150U0000000kEpQAI" alt="" class="media-object">
                    </a>
                    <div class="media-body">
                      <h4 class="media-heading username" ng-click="userProfile('0033D00000SadnMQAR');">Scott Edwards</h4>
                      <p class="star-color"><span class="stars"><span></span></span></p>
                      <p class="by-author"></p>
                      <p>(913) 213-4544</p>
                      <p><a href="mailto:sedwards@mortgagecompany.com">sedwards@mortgagecompany.com</a></p>
                    </div>
                  </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                <div class="media">
                    <a class="pull-left" href="#"><img src="/AgentFind/servlet/servlet.ImageServer?oid=00D0U00000096EY&amp;id=0150U0000000kEuQAI" alt="" class="media-object">
                    </a>
                    <div class="media-body">
                      <h4 class="media-heading username" ng-click="userProfile('0033D00000T8Hp9QAF');">Natalie Rodriguez</h4>
                      <p class="star-color"><span class="stars"><span></span></span></p>
                      <p class="by-author"></p>
                      <p>(800) 399-8719</p>
                      <p><a href="mailto:natalie@agentfind.com">natalie@agentfind.com</a></p>
                    </div>
                  </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                <div class="media">
                    <a class="pull-left" href="#"><img src="/AgentFind/servlet/servlet.ImageServer?oid=00D0U00000096EY&amp;id=0150U0000000jyrQAA" alt="" class="media-object">
                    </a>
                    <div class="media-body">
                      <h4 class="media-heading username" ng-click="userProfile('0033D00000SadnRQAR');">Casi Clinton</h4>
                      <p class="star-color"><span class="stars"><span></span></span></p>
                      <p class="by-author">Keller Williams</p>
                      <p>(404) 988-0799</p>
                      <p><a href="mailto:casi@kw.com">casi@kw.com</a></p>
                    </div>
                  </div>
            </div>
        </div>
    </div>
    
    
    <div id="sidebar-wrapper">
        <nav id="spy">
            <div class="profile-details text-center">
                <h3>Nicole Buyer 113</h3>
                <p>(678) 457-9533</p>
                <p><a href="mailto:nicolebuyer@agentfind.com">nicolebuyer@agentfind.com</a></p>
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
                        <input class="msg_send_btn" id="updateStatus" ng-click="updateDealStatus('0063D000008obBBQAY');" style="height: 40px;" type="button" value="Update">
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
                                    <ul class="list-unstyled profile-list">
                                        <li>Pre-approval Amount: <span class="text-value">$10,000.00
                                            </span></li>
                                        <li>Loan Type: <span class="text-value">FHA;USDA</span></li>
                                        <li>First Time Home Buyer: <span class="text-value">Yes</span></li>
                                        
                                        <li>Time Frame for Purchasing: <span class="text-value">Immediate</span></li>
                                        <li>Location for Home Search: <span class="text-value">Atlanta, Florida</span></li>
                                        <li>Property Type: <span class="text-value">SFR</span></li>
                                        <li>Property Details: <span class="text-value"></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Activity</div>
                                        <div class="panel-body">
                                            <div class="col-md-5 padding-none">
                                                <span class="text-light-gray">12/10/2018</span>
                                                <span class="block-text">Date Lead Received </span>
                                            </div>
                                            <div class="col-md-4 padding-none">
                                                <span class="text-light-gray">12/11/2018</span>
                                                <span class="block-text">Last Offer Date </span>
                                            </div>
                                            <div class="col-md-3 padding-none">
                                                <span class="text-light-gray">475</span>
                                                <span class="block-text">Days Looking</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Notes</div>
                                        <div class="panel-body">
                                            <div class="min-height222 note-body">
                                                <p><span style="white-space:pre-wrap;">8/30 Buyer is still actively looking - just placed an offer on a home - waiting to hear back.
9/1  Buyer will be in town next week to begin home search
8/20 Made contact with buyer setting up with agent</span></p>
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
                                        <div class="panel-body">
                                            <ul class="list-unstyled profile-list text-capitalize">
                                                <li>Data agent requested: <span class="text-value">12/10/2018</span></li>
                                                <li>Data paired with agent: <span class="text-value">12/12/2018</span></li>
                                                <li>Property of interest: <span class="text-value">Interested</span></li>
                                                <li>Borrower noter: <span class="text-value">None Currently</span></li>
                                            </ul>
                                        </div>
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
                                                    <div class="eachfile" ng-show="attachmentsNotFound">There is no attachments available.</div>
                                                    
                                                    <!-- ngRepeat: dealDet in dealDetail['ATTACHMENTS'] -->
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