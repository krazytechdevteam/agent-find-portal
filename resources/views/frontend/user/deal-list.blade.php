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
                    <option value=" ">Stages</option>
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
                  <th width="20%">Deal</th>
                  <th width="15%">Status</th>
                  <th width="15%">Loan Officer</th>
                  <th width="15%">Assigned Agent</th>
                  <th width="20%">Timeframe for Purchase</th>
                  <th width="15%">Notes</th>
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
                                <p class="light-text"><?php echo $r->DEAL_EMAIL; ?></p>
                                <p class="light-text"><?php echo $r->DEAL_PHONE; ?></p>
                            </td>
                            <td>
                            <?php
                              if(!empty($r->STATUS)){
                            ?>
                                <button class="btn btn-green btn-default"type="button">
                                  <?php echo $r->STATUS; ?>
                                </button>
                            <?php
                            }
                            ?>
                            </td>
                           
                            <td>
                                <p class="bold-text"><?php echo $r->LO_NAME; ?></p>
                                <p class="light-text"><?php echo $r->LO_EMAIL; ?></p>
                                <p class="light-text"><?php echo $r->LO_PHONE; ?></p>
                            </td>

                            <td>
                                <p class="bold-text"><?php echo $r->AGENT_NAME; ?></p>
                                <p class="light-text"><?php echo $r->AGENT_EMAIL; ?></p>
                                <p class="light-text"><?php echo $r->AGENT_PHONE; ?></p>
                           </td>
                            
                            <td>
                              <p class="light-text"><?php echo $r->PURCHASE_TIMEFRAME; ?></p>
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
    });
</script>    
@endpush

@push('after-styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
@endpush