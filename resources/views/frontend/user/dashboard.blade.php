@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )
         
@section('content')

  <style>
  .leadName a {
	  color:black !important
  }
  </style>

  <input type="hidden" id="deals_active" value="<?php echo isset($data->DEALS_COUNT->ActivelyLooking) ? $data->DEALS_COUNT->ActivelyLooking : 0; ?>" />  
  <input type="hidden" id="deals_closed" value="<?php echo isset($data->DEALS_COUNT->Closed) ? $data->DEALS_COUNT->Closed : 0; ?>" />  
  <input type="hidden" id="deals_inactive" value="<?php echo isset($data->DEALS_COUNT->Inactive) ? $data->DEALS_COUNT->Inactive : 0; ?>" />  
  <input type="hidden" id="deals_offerout" value="<?php echo isset($data->DEALS_COUNT->OfferOut) ? $data->DEALS_COUNT->OfferOut : 0; ?>" />  
  <input type="hidden" id="deals_under_contract" value="<?php echo isset($data->DEALS_COUNT->UnderContract) ? $data->DEALS_COUNT->UnderContract : 0; ?>" />  
  <input type="hidden" id="deals_onhold" value="<?php echo isset($data->DEALS_COUNT->OnHold) ? $data->DEALS_COUNT->OnHold : 0; ?>" />  
        
    <section class="dashboard-section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 col-lg-6 col-sm-5 col-xs-12">
            <h1 class="wrapper-mainhead">Dashboard</h1>
            <div class="notification-list container-fluid">
              <div class="all-listnotification">
                <ul class="list-unstyled">
                  
					<?php
					if(isset($data->DEALS_NOTIFICATION) && count($data->DEALS_NOTIFICATION)>0) {
						foreach($data->DEALS_NOTIFICATION as $r) {
					?>	
							<li class="ng-scope">
								<div class="each-notification row">
									<div class="notification-image col-lg-1 col-md-1 col-sm-1 col-xs-3">
										<img class="img-circle" src="<?php echo $r->IMAGE;  ?>" onerror="this.src='{{ asset('public/img/profile-icon.png') }}';this.onerror='';" />
									</div>

									<div class="notification-message col-md-8 col-lg-9 col-sm-8 col-xs-9">
										<p class="notification-user">
											<span class="leadName" id="">
												<a href="<?php echo url('/') . '/user-profile/' . $r->USER_ID; ?>"><?php echo $r->NAME; ?></a>
											</span>
											<span class="notification-time"><?php echo date("d M, Y", strtotime($r->DATE)); ; ?></span>
										</p>
										<p class="comment-user">
											<span class="comment-for">
												<a href="<?php echo url('/') . '/deal-detail/' . $r->DEAL_ID; ?>"><?php echo $r->DESC; ?></a>
											</span>
										</p>
									</div>
									<div class="notification-status col-md-3 col-lg-2 col-sm-3 col-xs-12 text-right">
										<a href="<?php echo url('/') . '/deal-detail/' . $r->DEAL_ID; ?>"><button class="btn btn-green btn-danger" type="button">New Alert</button></a>
									</div>
								</div>
							</li>
					
					<?php
						}
					} else {
					?>
						<span style="padding: 200px;font-size: 15px;font-weight: bold;color: #0e52fd;">No Records Found</span>
					
					<?php	
					}
					?>
				  
                </ul>
              </div>

            </div>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 m-t-dashboard">
            
            <div class="notification-list min-height-dashboard widget">

              <h2><div class="gridHeader truncation" title=""># of Deals - Actively Looking</div><div class="gridTitle truncation"></div></h2>

              <div class="deals_actively_looking1">
				<?php echo isset($data->DEALS_COUNT->ActivelyLooking) ? $data->DEALS_COUNT->ActivelyLooking : 0; ?>
				</div>
              
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

                <div id="dealsUnderContract" class="all-listnotification">
					<?php
					  if(isset($dealUnderContractData->DEALS) && count($dealUnderContractData->DEALS) > 0) {
					?>
	  
						<table class="table table-condensed deal-table" id="">
							<thead>
							  	<tr>
								  	<th width="40%">Buyer Name</th>
								  	<th width="30%">Close Date</th>
								  	<th width="30%">Purchase Price</th>
								</tr>
							</thead>
							<tbody>
							  <?php
								foreach ($dealUnderContractData->DEALS as $k => $r) {
								?>
								  <tr>
										<td>
											<p class="bold-text">
											  <a href="<?php echo url('/')  . '/deal-detail/' . $r->DEAL_ID; ?>">
												  <?php echo $r->DEAL_NAME; ?>
											  </a>
											</p>
										</td>
										
										<td>
											<p class="light-text">
												<?php echo date('Y-m-d', strtotime($r->CLOSE_DATE));?>
											</p>
										</td>
										
										<td>
										  	<p class="light-text">
										  		<?php 
				                                $purchase_price = 0;
				                                if(isset($r->PURCHASE_PRICE)) {

				                                  $purchase_price = $r->PURCHASE_PRICE;
				                                }
				                                echo money_format('%n', $purchase_price);
				                                ?>
									  		</p>
										</td>

									  </tr>
								<?php
								}
							  ?>
							</tbody>
						  </table>	
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
          </div>

          <div class="col-md-6 col-lg-6 col-sm-5 col-xs-12">
            <div class="notification-list container-fluid cust-table">
              <div class="min-height-dashboard">
                <h1 class="wrapper-mainhead">Deals Making Offer</h1>

                <div id="dealsMakingOffer" class="all-listnotification">
					<?php
					  if(isset($dealsMakingOfferData->DEALS) && count($dealsMakingOfferData->DEALS) > 0) {
					?>
	  
						<table class="table table-condensed deal-table" id="list_data">
							<thead>
							  	<tr>
								  <th width="40%">Buyer Name</th>
								  <th width="60%">Notes</th>
								</tr>
							</thead>
							<tbody>
							  <?php
							  	$indx = 1;
								foreach ($dealsMakingOfferData->DEALS as $k => $r) {
								?>
								  <tr>
										<td>
											<p class="bold-text">
											  <a href="<?php echo url('/')  . '/deal-detail/' . $r->DEAL_ID; ?>">
												  <?php echo $r->DEAL_NAME; ?>
											  </a>
											</p>
										</td>
										
										<td>
										  	<p class="light-text">
										  		<span id="summary_sec_<?php echo $indx; ?>">
										  		<?php 
										  		if(strlen($r->NOTES) > 95) {
										  			
										  			echo substr($r->NOTES, 0, 95);

										  			echo '&nbsp;<a href="javascript:showSec('.$indx.')" style="font-size: 12px;">More ></a>';
										  		}
										  		?>
										  		</span>
										  		<span id="complete_sec_<?php echo $indx; ?>" style="display: none;">
										  			<?php 
										  			echo $r->NOTES; 
										  			echo '&nbsp;<a href="javascript:hideSec('.$indx.')" style="font-size: 12px;">< Less</a>';
										  			?>
										  		</span>
									  		</p>
										</td>

									  </tr>
								<?php
								}
							  ?>
							</tbody>
						  </table>	
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

function showSec(indx) {

	document.getElementById('summary_sec_'+indx).style.display = 'none';
	document.getElementById('complete_sec_'+indx).style.display = 'block';
}

function hideSec(indx) {

	document.getElementById('complete_sec_'+indx).style.display = 'none';
	document.getElementById('summary_sec_'+indx).style.display = 'block';
}
</script>    
@endpush
