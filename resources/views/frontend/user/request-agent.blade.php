@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )
        
@section('content')

<section class="deal-section">
    <div class="container-fluid" style="min-height: 500px;">
      <div class="row">
        <div class="col-md-12">
          <h3>Request Agent</h3>
        </div>
      </div>

      <form id="requestAgentFrm" class="ng-pristine ng-valid">
      <div class="row">
        <div class="col-md-12">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="panel panel-default">
                  
                  <div class="panel-heading">Lender Information</div>
                    <div class="panel-body">
                        
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>First Name</label><br>
                                <input class="form-control" disabled="disabled" type="text" value="Scott-Test12">
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Last Name</label><br>
                                <input class="form-control" disabled="disabled" type="text" value="Edwards">
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Email</label><br>
                                <input class="form-control" disabled="disabled" type="text" value="sedwards@mortgagecompany.com">
                            </div>
                       </div>
                       <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Mobile</label><br>
                                <input class="form-control" disabled="disabled" type="text" value="(913) 213-4544">
                            </div>
                        </div>
                    </div>
                  </div>
              </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="panel panel-default">
                  <div class="panel-heading">Client's Information</div>
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 required-field">
                                <label>First Name</label><br>
                                <input class="form-control required" id="clients_first_name" name="clients_first_name" required="true" type="text">
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 required-field">
                                <label>Last Name</label><br>
                                <input class="form-control required" id="clients_last_name" name="clients_last_name" required="true" type="text">
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 required-field">
                                <label>Phone Number</label><br>
                                <input class="form-control required" id="clients_phone" name="clients_phone" required="true" type="text">
                            </div> 
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 required-field">
                                <label>Email</label><br>
                                <input class="form-control required" id="clients_email" name="clients_email" required="true" type="text">
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 required-field">
                                <label>City</label><br>
                                <input class="form-control required" id="clients_city" name="clients_city" required="true" type="text">
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 required-field">
                                <label>State</label><br>
                                <input class="form-control required" id="clients_state" name="clients_state" required="true" type="text">
                            </div> 
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 required-field">
                                <label>Desired Move Date</label><br>
                                <select class="form-control col-md-2 required" id="client_desired_moved_date" name="client_desired_moved_date" required="true">
                                    <option value=" ">-Select-</option>
                                    <option value="1 to 30 Days">1 to 30 Days</option>
                                    <option value="30 to 60 Days">30 to 60 Days</option>
                                </select>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 required-field">
                                <label>Type of Loan</label><br>
                               <select class="form-control col-md-2 required" id="client_loan_type" name="client_loan_type" required="true">
                                    <option value=" ">-Select-</option>
                                    <option value="FHA">FHA</option>
                                    <option value="CONV">CONV</option>
                                    <option value="VA">VA</option>
                                </select>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 required-field">
                                <label>Pre-Approved?</label><br>
                                <select class="form-control col-md-2 required" id="client_pre_approved" name="client_pre_approved" required="true">
                                    <option value=" ">-Select-</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div> 
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 required-field">
                                <label>Pre-approved Amount</label><br>
                                <input class="form-control required" id="client_approved_amt" name="client_approved_amt" required="true" type="text">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label>Tell us more</label><br>
                                <textarea class="form-control" id="client_additional_req" name="client_additional_req"></textarea>
                            </div>

                        </div>

                    </div>
                  </div>
              </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
            <div class="col-md-4">
              <input class="btn btn-green btn-default" id="btnSearch" name="btnSearch" type="submit" value="Submit">
              <span id="processing" style="display: none;">Processing your request...</span>
          </div>
        </div>
    </div>
              </form>

              <p>&nbsp;</p>
            </div>
        </section>

@endsection