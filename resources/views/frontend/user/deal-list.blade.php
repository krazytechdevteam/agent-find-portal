@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )


         
@section('content')

<style type="text/css">
  .bold-text {
      margin: 0px;
      font-size: 20px;
      color: #e7161b;
      font-weight: 500;
  }
  .bold-text a {
    color: #e7161b !important
  }
  .light-text {

    margin: 0px;
    font-size: 12px;
    font-weight: 500;
    color: #9e9e9e;
  }

  .table tbody tr td {
    
    font-size: 1em;
    border: none;
    padding: 18px 10px;
  }
  
  .table thead tr, .table tbody tr {
    border-bottom: 1px solid #ccc !important
  }
  .btn-default {
    background-color: #fff;
    color: #4cae4c;
    border-color: #4cae4c;
  }

  .btn {
    border-width: 2px;
  }
  .table thead tr th {
    /* color: #b11a1e; */
    /* text-transform: uppercase; */
    font-size: 1em;
    font-weight: 500;
    font-size: 15px;
    /* font-family: "proxima nova semibold"; */
    border-bottom: -1px;
    color: #333;
    padding: 11px 7px;
  }
  label {
    font-weight: 500 !important
  }
</style>

     <div class="dashboard-header m-b-30">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>Deals</h1>
          </div>
        </div>
      </div>
    </div>
   <div class="body-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
          
            <?php
              if(count($data->DEALS) > 0) {

            ?>
           
                <table id="list_data" class="table dashboard-table">
                  <thead>
                    <tr>
                      <th>Deal</th>
                      <th>Status</th>
                      <th>Loan Officer</th>
                      <th>Assigned Agent</th>
                      <th>Timeframe for Purchase</th>                
                      <th>Notes</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach ($data->DEALS as $k => $r) {
                    ?>
              
                          <tr>
                            <td>
                                <p class="bold-text">
                                  <a href="<?php echo url('/')  . '/deal-details/' . $r->DEAL_ID; ?>">
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
                            
                            <td><?php echo $r->PURCHASE_TIMEFRAME; ?></td>
                            <td>
                                <a class="notes_id" data-notes="<?php echo $r->NOTES; ?>" href="javascript:void(0)">View Notes</a>
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
					<div style="text-align: center;padding: 130px;font-size: 30px;color: #e7161b;border: 1px solid;">No Record Found</div>
			  <?php 	
			  }
              ?>
          </div>
        </div>
      </div>
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






