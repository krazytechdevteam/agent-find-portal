@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )


         
@section('content')
    
    <div class="dashboard-header m-b-30">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>Welcome, <span class="user-firstname"> {{ Session::get('AUTH_USER')['NAME'] }}</span></h1>
          </div>
        </div>
      </div>
    </div>
     
   <div class="body-wrapper dashboard-section">
      <div class="container">
      <h1 class="wrapper-mainhead">Dashboard</h1>
        <div class="row">
        <div class="col-md-6 col-lg-7 col-sm-6 col-xs-12">
          <div class="notification-list">
            <h3>Notification</h3>
            <div class="all-listnotification">
            <ul class="list-unstyled">
              <li>
                <div class="each-notification row">
                  <div class="notification-image col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <img src="{{asset('public/img/david.png')}}" alt="profiles-name" class="img-circle">
                  </div>
                  <div class="notification-message col-md-9 col-lg-9 col-sm-9 col-xs-9">
                    <p class="notification-user">Angelica Tersigni <span class="notification-time">04.08PM</span></p>
                    <p class="comment-user">Added a new comment for <span class="comment-for">Isaiah and Charlandra Jacobs </span></p>
                  </div>
                  <div class="notification-status col-md-1"><span></span></div>
                </div>
              </li>
              <li>
                <div class="each-notification row">
                  <div class="notification-image col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <img src="{{asset('public/img/stela.png')}}" alt="profiles-name" class="img-circle">
                  </div>
                  <div class="notification-message col-md-9 col-lg-9 col-sm-9 col-xs-9">
                    <p class="notification-user">Angelica Tersigni <span class="notification-time">04.08PM</span></p>
                    <p class="comment-user">Added a new comment for <span class="comment-for">Isaiah and Charlandra Jacobs </span></p>
                  </div>
                  <div class="notification-status col-md-1"><span></span></div>
                </div>
              </li>
              <li>
                <div class="each-notification row">
                  <div class="notification-image col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <img src="{{asset('public/img/muse.png')}}" alt="profiles-name" class="img-circle">
                  </div>
                  <div class="notification-message col-md-9 col-lg-9 col-sm-9 col-xs-9">
                    <p class="notification-user">Angelica Tersigni <span class="notification-time">04.08PM</span></p>
                    <p class="comment-user">Added a new comment for <span class="comment-for">Isaiah and Charlandra Jacobs </span></p>
                  </div>
                  <div class="notification-status col-md-1"><span></span></div>
                </div>
              </li>
              <li>
                <div class="each-notification row">
                  <div class="notification-image col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <img src="{{asset('public/img/stela.png')}}" alt="profiles-name" class="img-circle">
                  </div>
                  <div class="notification-message col-md-9 col-lg-9 col-sm-9 col-xs-9">
                    <p class="notification-user">Angelica Tersigni <span class="notification-time">04.08PM</span></p>
                    <p class="comment-user">Added a new comment for <span class="comment-for">Isaiah and Charlandra Jacobs </span></p>
                  </div>
                  <div class="notification-status col-md-1"><span></span></div>
                </div>
              </li>
              <li>
                <div class="each-notification row">
                  <div class="notification-image col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <img src="{{asset('public/img/muse.png')}}" alt="profiles-name" class="img-circle">
                  </div>
                  <div class="notification-message col-md-9 col-lg-9 col-sm-9 col-xs-9">
                    <p class="notification-user">Angelica Tersigni <span class="notification-time">04.08PM</span></p>
                    <p class="comment-user">Added a new comment for <span class="comment-for">Isaiah and Charlandra Jacobs </span></p>
                  </div>
                  <div></div>
                </div>
              </li>


            </ul>
            </div>
            <p class="text-right"> <button class="btn btn-small btn-red m-t-30">View all</button></p>
          </div>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
        <div class="circular-progress">
          <div class="progress-bar position" data-percent="70" data-color="#ccc,#dc2c3c">
            <span class="inner-text">ACTIVELY <br>LOOKING</span>
          <div class="background" style="background-color: rgb(204, 204, 204);"></div><div class="rotate" style="background-color: rgb(220, 44, 60); transition: transform 2000ms linear 0s; transform: rotate(252deg);"></div><div class="left" style="background-color: rgb(204, 204, 204); animation: 1428.57ms step-start 0s 1 normal none running toggle; opacity: 0;"></div><div class="right" style="background-color: rgb(220, 44, 60); animation: 1428.57ms step-end 0s 1 normal none running toggle; opacity: 1;"></div><div class=""><span>70</span></div></div>
          <div class="progress-bar position" data-percent="40" data-color="#ccc,#dc2c3c">
            <span class="inner-text">offer out</span>
          <div class="background" style="background-color: rgb(204, 204, 204);"></div><div class="rotate" style="background-color: rgb(220, 44, 60); transition: transform 2000ms linear 0s; transform: rotate(144deg);"></div><div class="left" style="background-color: rgb(204, 204, 204);"></div><div class="right" style="background-color: rgb(220, 44, 60);"></div><div class=""><span>40</span></div></div>
          <div class="progress-bar position" data-percent="50" data-color="#ccc,#dc2c3c">
            <span class="inner-text">under <br>contract</span>
          <div class="background" style="background-color: rgb(204, 204, 204);"></div><div class="rotate" style="background-color: rgb(220, 44, 60); transition: transform 2000ms linear 0s; transform: rotate(180deg);"></div><div class="left" style="background-color: rgb(204, 204, 204);"></div><div class="right" style="background-color: rgb(220, 44, 60);"></div><div class=""><span>50</span></div></div>
          <div class="progress-bar position" data-percent="30" data-color="#ccc,#dc2c3c">
            <span class="inner-text">closed</span>
          <div class="background" style="background-color: rgb(204, 204, 204);"></div><div class="rotate" style="background-color: rgb(220, 44, 60); transition: transform 2000ms linear 0s; transform: rotate(108deg);"></div><div class="left" style="background-color: rgb(204, 204, 204);"></div><div class="right" style="background-color: rgb(220, 44, 60);"></div><div class=""><span>30</span></div></div>
          <div class="progress-bar position" data-percent="20" data-color="#ccc,#dc2c3c">
            <span class="inner-text">on hold</span>
          <div class="background" style="background-color: rgb(204, 204, 204);"></div><div class="rotate" style="background-color: rgb(220, 44, 60); transition: transform 2000ms linear 0s; transform: rotate(72deg);"></div><div class="left" style="background-color: rgb(204, 204, 204);"></div><div class="right" style="background-color: rgb(220, 44, 60);"></div><div class=""><span>20</span></div></div>
          <div class="progress-bar position" data-percent="100" data-color="#ccc,#dc2c3c">
            <span class="inner-text">inactive</span>
          <div class="background" style="background-color: rgb(204, 204, 204);"></div><div class="rotate" style="background-color: rgb(220, 44, 60); transition: transform 2000ms linear 0s; transform: rotate(360deg);"></div><div class="left" style="background-color: rgb(204, 204, 204); animation: 1000ms step-start 0s 1 normal none running toggle; opacity: 0;"></div><div class="right" style="background-color: rgb(220, 44, 60); animation: 1000ms step-end 0s 1 normal none running toggle; opacity: 1;"></div><div class=""><span>100</span></div></div>
            <div class="clearfix"> </div>
            <p class="text-right"> <button class="btn btn-small btn-red">Assigned</button></p>
        </div>      
        </div>
        </div>
      </div>
    </div>


  @endsection 
