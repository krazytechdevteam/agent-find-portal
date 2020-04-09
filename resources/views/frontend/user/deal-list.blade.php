@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )
         
@section('content')

  <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h3>Deals</h3>
          <?php
          if(count($data->DEALS) > 0) {
          ?>
            <div class="row">
              <div class="col-md-2">
                <select class="form-control col-md-2" id="filterByStage" name="stages">
                    <option value="">Stages</option>
                    <option value="Buyer Actively Looking">Actively Looking</option>
                    <option value="Closed">Closed</option>
                    <option value="Inactive">Inactive</option>
                    <option value="Buyer Making Offer">Offer Out</option>
                    <option value="UC">Under Contract</option>
                    <option value="On Hold">On Hold</option>
                  </select>
              </div> 
             
              <div class="col-md-2">
                  <input class="btn btn-green btn-default" id="btnSearch" name="btnSearch" type="button" value="Filter">
              </div>
            </div>
          <?php
          } else {

          }
          ?>
        </div>
      </div>

      <?php
      if(count($data->DEALS) > 0) {
      ?>
        <div class="row">
          <div class="col-md-12">
            <div class="alldeal">
              <table class="table table-condensed deal-table" id="list_data">
                <thead>
                  <tr>
                  <th width="16%">Deal Name</th>
                  <th width="12%">Date Deal Received</th>
                  <th width="12%">Stage</th>
                  <th width="12%">Status Detail</th>
                  <th width="12%">Pre-Approved Amount</th>
                  <th width="12%">Timeframe for buying</th>
                  <th width="12%">Assigned Agent</th>
                  <th width="12%">Notes</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    foreach ($data->DEALS as $k => $r) {
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
                                <?php echo date('Y-m-d H:i:s', strtotime($r->DATE_RECEIVED));?>
                              </p>
                            </td>

                            <td>
                              <p class="light-text">
                                <?php echo $r->STAGE;?>
                              </p>
                            </td>

                            <td>
                              <p class="light-text">
                                <?php echo $r->STATUS;?>
                              </p>
                            </td>

                            <td>
                              <p class="light-text">                                
                                <?php 
                                $pre_approved_amt = 0;
                                if(isset($r->PRE_APPROVED_AMT)) {

                                  $pre_approved_amt = $r->PRE_APPROVED_AMT;
                                }
                                echo money_format('%n', $pre_approved_amt);
                                ?>
                              </p>
                            </td>

                            <td>
                              <p class="light-text">
                                <?php echo $r->PURCHASE_TIMEFRAME; ?>
                              </p>
                            </td>

                            <td>
                                <p class="bold-text">
                                  <a href="<?php echo url('/') . '/user-profile/' . $r->AGENT_ID; ?>"><?php echo $r->AGENT_NAME; ?></a>
                                </p>
                            </td>
                           
                            <td>
                                <a class="notes_id" data-notes="<?php echo $r->NOTES; ?>" href="javascript:void(0)">View Notes</a>
                            </td>
                          </tr>
                    <?php
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
    </div>

@endsection

@push('after-scripts')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
		$('#list_data').DataTable();
		$(document).on('click', '.notes_id', function() {
			var notes = $(this).attr('data-notes');
			if(!notes){
				var notes = 'No Notes';
			}
			swal("Notes", notes);
            return false;
		});
		
		
		$("#btnSearch").click(function(){
			var stage = $('#filterByStage').val();
			if(stage === "") {
				window.location.href = '<?php echo url("/") ?>' + '/deal-list';
			} else {
				window.location.href = '<?php echo url("/") ?>' + '/deal-list?stage=' + $('#filterByStage').val();
			}
		});
		
		<?php
		if(isset($_GET['stage']) && !empty($_GET['stage']) ) {
		?>	
			var stageValue = '<?php echo $_GET["stage"]; ?>'
			$('#filterByStage').val(stageValue);
		<?php	
		}
		?>
    });
</script>    
@endpush

@push('after-styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
@endpush