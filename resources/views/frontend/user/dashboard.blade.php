@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )
         
@section('content')

  <input type="hidden" id="deals_active" value="119" />  
  <input type="hidden" id="deals_closed" value="10" />  
  <input type="hidden" id="deals_inactive" value="1" />  
  <input type="hidden" id="deals_offerout" value="6" />  
  <input type="hidden" id="deals_under_contract" value="9" />  
  <input type="hidden" id="deals_onhold" value="3" />  
        
    <section class="dashboard-section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 col-lg-6 col-sm-5 col-xs-12">
            <h1 class="wrapper-mainhead">Dashboard</h1>
            <div class="notification-list container-fluid">
              <div class="all-listnotification">
                <ul class="list-unstyled">
                  <li class="ng-scope" ng-repeat="contactNotification in contactNotifications['NOTIFICATIONS']">
                  <div class="each-notification row">
                    <div class="notification-image col-lg-1 col-md-1 col-sm-1 col-xs-3">
                      <img class="img-circle" src="" />
                    </div>

                    <div class="notification-message col-md-8 col-lg-9 col-sm-8 col-xs-9">
                      <p class="notification-user">
                      <span class="leadName" id="">TEST</span>
                      <span class="notification-time">asas</span></p>
                      <p class="comment-user">dssdsd for <span class="comment-for"><a ng-click="getLeadDetails(contactNotification.Notification_Against__c)">ash</a></span></p>
                    </div>
                    <div class="notification-status col-md-3 col-lg-2 col-sm-3 col-xs-12 text-right">
                      <button class="btn btn-green btn-danger" type="button">New Alert</button>
                    </div>
                  </div>
                  </li>
                </ul>
              </div>

            </div>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 m-t-dashboard">
            
            <div class="notification-list min-height-dashboard widget">

              <h2><div class="gridHeader truncation" title=""># of Deals - Actively Looking</div><div class="gridTitle truncation"></div></h2>

              <!--
              <div class="text_cont">
                23
              </div>

              -->

              <div id="deals_actively_looking"></div> 
              

              <div class="footer_cont">
                <a href="<?php echo url('/') .'/deal-list?stage=Buyer Actively Looking'; ?>" title="">View Details</a>
              </div>
            </div>

          </div> 

          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 m-t-dashboard">
            
            <div class="notification-list min-height-dashboard widget">

              <h2>
                <div class="gridHeader truncation" title=""># of Deals</div>
                <div class="gridTitle truncation"></div>
              </h2>

              <div id="assigned_deals"></div> 
              <input type="hidden" id="deals_active" value="119" />  

              <div class="footer_cont">
                <a href="<?php echo url('/') .'/deal-list'; ?>" title="">View Details</a>
              </div>
            </div>

          </div> 

        </div>

        <div class="row" style="margin-top: 10px;">
          <div class="col-md-6 col-lg-6 col-sm-5 col-xs-12">
            
            <div class="notification-list container-fluid cust-table">
              <div class="min-height-dashboard">
                <h1 class="wrapper-mainhead">Deals Under Contract</h1>

                <div id="dealsUnderContract"></div>
              </div>

            </div>
          </div>

          <div class="col-md-6 col-lg-6 col-sm-5 col-xs-12">
            <div class="notification-list container-fluid cust-table">
              <div class="min-height-dashboard">
                <h1 class="wrapper-mainhead">Deals Making Offer</h1>

                <div id="dealsMakingOffer"></div>
              </div>

            </div>
          </div>

        </div>

        <p>&nbsp;</p>

      </div>
    </section>

@endsection 

@push('after-scripts')
<!-- Resources -->
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
window.addEventListener("load", function(){

  am4core.ready(function() {

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    // create chart
    var chart = am4core.create("deals_actively_looking", am4charts.GaugeChart);
    chart.innerRadius = -15;

    var axis = chart.xAxes.push(new am4charts.ValueAxis());
    axis.min = 0;
    axis.max = 100;
    axis.strictMinMax = true;

    var colorSet = new am4core.ColorSet();

    var gradient = new am4core.LinearGradient();
    gradient.stops.push({color:am4core.color("red")})
    gradient.stops.push({color:am4core.color("yellow")})
    gradient.stops.push({color:am4core.color("green")})

    axis.renderer.line.stroke = gradient;
    axis.renderer.line.strokeWidth = 15;
    axis.renderer.line.strokeOpacity = 1;

    axis.renderer.grid.template.disabled = true;

    var hand = chart.hands.push(new am4charts.ClockHand());
    hand.radius = am4core.percent(97);

    setTimeout(function() {

        var val = document.getElementById('deals_active').value;
        val = parseInt(val);

        if(val > 100) {
          
          axis.max = val + 30;
        }

        hand.showValue(val, 1000, am4core.ease.cubicOut);
    }, 2000);


  }); // end am4core.ready()

  // Themes begin
am4core.useTheme(am4themes_animated);

// Create chart instance
var chart = am4core.create("assigned_deals", am4charts.XYChart);
chart.scrollbarX = new am4core.Scrollbar();

var deals_active  = parseInt(document.getElementById('deals_active').value);
var deals_closed  = parseInt(document.getElementById('deals_closed').value);
var deals_inactive = parseInt(document.getElementById('deals_inactive').value);
var deals_offerout = parseInt(document.getElementById('deals_offerout').value);
var deals_uc      = parseInt(document.getElementById('deals_under_contract').value);
var deals_onhold  = parseInt(document.getElementById('deals_onhold').value);

chart.scrollbarX.disabled = true;


// Add data
chart.data = [{
  "stage": "Actively Looking ("+deals_active+")",
  "achieved": deals_active
}, {
  "stage": "Closed ("+deals_closed+")",
  "achieved": deals_closed
}, {
  "stage": "Inactive ("+deals_inactive+")",
  "achieved": deals_inactive
}, {
  "stage": "Offer Out ("+deals_offerout+")",
  "achieved": deals_offerout
}, {
  "stage": "Under Contract ("+deals_uc+")",
  "achieved": deals_uc
}, {
  "stage": "On Hold ("+deals_onhold+")",
  "achieved": deals_onhold
}];

// Create axes
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "stage";
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.minGridDistance = 30;
categoryAxis.renderer.labels.template.rotation = -90;
categoryAxis.renderer.inside = true;
categoryAxis.renderer.labels.template.valign = "top";
categoryAxis.tooltip.disabled = true;
//categoryAxis.renderer.labels.template.disabled = true;
categoryAxis.title.text = "";
categoryAxis.renderer.labels.template.dy = 80;
categoryAxis.renderer.labels.template.dx = -20;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.labels.template.disabled = true;
valueAxis.title.text = "";

// Create series
var series = chart.series.push(new am4charts.ColumnSeries());
series.sequencedInterpolation = true;
series.dataFields.valueY = "achieved";
series.dataFields.categoryX = "stage";
series.columns.template.strokeWidth = 0;

series.columns.template.adapter.add("fill", function(fill, target) {
  return chart.colors.getIndex(target.dataItem.index);
})



});

</script>    
@endpush
