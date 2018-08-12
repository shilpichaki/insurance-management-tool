@extends('layouts.app')

@section('content')

  <div class="panel panel-default">

     <div class="panel-heading"><b>Update Details</b></div>

        <!-- // Form Body // -->
        <div class="panel-body">
             <form method="post" action="{{ route('update' , $brokercompany->b_company_id)}}" > 
            {{ csrf_field()}}
            <input type="hidden"  name='_method' value="PUT">       
               
              <fieldset>
              
                  <div class="form-group">
                        <label for="company_name" class="col-sm-2 col-form-label">company_name</label>
                        <input type="text" name="company_name" class="form-control-plaintext" id="company_name" value ="{{$brokercompany->b_company_name}}">
                  </div>

                  <div class="form-group">
                     <label for="feedback_day1" class="col-sm-2 col-form-label">feedback_day</label>
                     <input type="text"  name="feedback_day" class="form-control-plaintext" id="feedback_day" value ="{{$brokercompany->b_avg_feedback_day}}" >
                  </div>

                  <div class="form-group">
                     <label for="company_email" class="col-sm-2 col-form-label">company_email</label>
                     <input type="email"  name="company_email" class="form-control-plaintext" id="company_email" value ="{{$brokercompany->b_company_email }}">
                  </div>

                  <div class="form-group">
                     <label for="company_address" class="col-sm-2 col-form-label">company_address</label>
                     <input type="text"  name="company_address" class="form-control-plaintext" id="company_address" value ="{{$brokercompany->b_company_address}}">
                  </div>

                  <div class="form-group">
                     <label for="company_pin" class="col-sm-2 col-form-label">company_pin</label>
                     <input type="text"  name="company_pin"  class="form-control-plaintext" id="company_pin" value ="{{$brokercompany->b_company_pin}}">
                  </div>

                  <div class="form-group">
                     <label for="company_city" class="col-sm-2 col-form-label">company_city</label>
                     <input type="text" name="company_city" class="form-control-plaintext" id="company_city" value ="{{$brokercompany->b_company_city}}">
                  </div>

                  <div class="form-group"><!-- /// Select Dynamically states and country /// -->
                     <label for="select" class="col-sm-2 col-form-label" id="select_state" autofocus>select State</label>
                     <div class="col-sm-2">
                         <select name='company_state'>
                            @foreach ($state_data as $state)
                               <option value="{{ $state->state_id }}">{{ $state->state_name }}</option>
                            @endforeach
                         </select>
                         <br />
                     </div>
                     <label for="select" class="col-sm-2 col-form-label"  id="select_country" autofocus>Select Country</label>
                     <div class="col-sm-2">
                         <select name='company_country'>
                            @foreach ( $country_data as $country)
                               <option value="{{ $country->country_id }}">{{ $country->country_name }}</option>
                            @endforeach
                         </select>
                         <br />
                     </div>

                   </div> <br /><br /> <!-- /// End Dynamically states and country /// -->
                   <div class="form-group">
                      <label for="company_gstinno" class="col-sm-2 col-form-label">company_gstinno</label>
                      <input type="text" name="company_gstinno" class="form-control-plaintext" id="company_gstinno" value ="{{$brokercompany->b_company_GSTIN }}" >
                   </div>

                  <!-- //End of Form Body // -->
                  <button type="submit" class="btn btn-primary">Update</button>
                  <input type="button" class="btn btn-primary" value="Cancel" onclick="history.back('')">
             </fielset>
         </form>

       </div>

 </div>  

@endsection
