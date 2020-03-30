@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )
        
@section('content')


<section class="agent-section">
    <div class="container agent-details">
        <div class="col-md-4 col-sm-4 col-lg-4 col-xs-12 col-md-offset-1">
            <a class="pull-left" href="#">
                <img src="<?php echo $data->PROFILE_IMG; ?>" alt="" class="media-object" />
            </a>
        </div>
        <div class="col-md-7 col-sm-7 col-lg-7 col-xs-12">
            <div>
                <div>
                    <h3 class="text-capitalize text-maroon no-margin">Agent find - TODO RECORD TYPE</h3>
                    <h1 class="agent_name" style="margin-top: 15px;">
                    	<?php echo $data->USER_DETAILS->NAME; ?>
                    </h1>
                    <p class="agent-review">
                        <span style="float: left;"><?php //TODO echo Total_Average_Rating__c; ?></span>
                        <span style="float: left; margin-top: 10px; margin-left: 10px; margin-right: 10px;" class="stars"><?php //TODO echo Total_Average_Rating__c; ?></span>

                        <?php
                        //TODO if($Total_Reviews__c > 0) {
                        ?>
                        	<span class="text-cyan">
                        	<?php //TODO echo Total_Reviews__c.' reviews'; ?></span>
                        <?php
                    	//}
                    	?>
                    </p>
                    <p>With Agent Find since <?php //TODO echo Year_Joined_Agent_Find__c; ?></p>
                    <hr />
                    
					<?php
					if(isset($data->USER_DETAILS->AGENT_LICENSE_NO)) {
					?>
						<p>Agent License #: <span class="text-light-gray"><?php echo $data->USER_DETAILS->AGENT_LICENSE_NO; ?></span></p>
					<?php
					}
					?>
					
					<?php
					if(isset($data->USER_DETAILS->AGENT_CONVERTION_RATIO)) {
					?>
						<p>Conversion Ratio: <span class="text-light-gray"> <?php echo $data->USER_DETAILS->AGENT_CONVERTION_RATIO; ?>%</span></p>
					<?php		
					}
					?>
					
					<?php
					if(isset($data->USER_DETAILS->AGENT_COVERAGE_AREA)) {
					?>
						<p>Coverage Area: <span class="text-light-gray"><?php echo $data->USER_DETAILS->AGENT_COVERAGE_AREA; ?></span></p>
					<?php		
					}
					?>
					
					<p class="text-cyan agent-contact"><span class="glyphicon glyphicon-earphone"></span> <?php echo $data->USER_DETAILS->MOBILE; ?></p>
					
					<p class="text-cyan agent-contact"><span class="glyphicon glyphicon-envelope"></span> <?php echo $data->USER_DETAILS->EMAIL; ?></p>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- agent page end -->
<!-- Most recent review -->
<?php
if(isset($data->USER_FEEDBACK) && count($data->USER_FEEDBACK)>0 ) {
?>
	<div class="container most-recent-reviews">
	    <h3 ng-if="userFeedbacks.length > 0">Most Recent Reviews</h3>
	    <?php
		foreach($data->USER_FEEDBACK as $r) {
		?>
			
			<div class="media m-b-10">
				<a class="pull-left" href="#">
					<img alt="dashboard-logo" class="media-object" src="{{asset('public/img/review1.jpg')}}">
				</a>
				<div class="media-body">
					<p class="star-color">
						<span class="stars"><span style="width: 48px;"></span></span>
					</p>
					<p class="by-author"><?php echo $r->RATING; ?></p> 
					<div class="row">
					</div>                         
				</div>
			</div>			
		<?php	
		}
		?>
	</div>
<?php
}
?>
<!-- Most reent reviews end -->

<style>

</style>

<script type="text/javascript">
$.fn.stars = function() {
	return $(this).each(function() {
		$(this).html($('<span />').width(Math.max(0, (Math.min(5, parseFloat($(this).html())))) * 16));
	});
}

setTimeout(function(){ $('span.stars').stars(); }, 1000);
</script>

@endsection