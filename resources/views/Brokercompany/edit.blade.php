@extends('layouts.app')

@section('content')

<div class="panel panel-default">

    <div class="panel-heading"><b>Update Details</b></div>

        <!-- // Form Body // -->
        <div class="panel-body">
            <form method="post" action="{{ route('brokercompany.update' , $brokercompany->b_company_id)}}" > 
            {{ csrf_field()}}
            <input type="hidden"  name='_method' value="PUT">       
            
                <div class="form-group">
                        <label for="company_name" class="col-md-4 control-label">company_name</label>
                        <div class="col-md-6">
                            <input type="text" name="company_name" class="form-control" id="company_name" value ="{{$brokercompany->b_company_name}}">
                        </div>
                </div>

                <div class="form-group">
                    <label for="feedback_day1" class="col-md-4 control-label">feedback_day</label>
                    <div class="col-md-6">
                        <input type="text"  name="feedback_day" class="form-control" id="feedback_day" value ="{{$brokercompany->b_avg_feedback_day}}" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="company_email" class="col-md-4 control-label">company_email</label>
                    <div class="col-md-6">
                        <input type="email"  name="company_email" class="form-control" id="company_email" value ="{{$brokercompany->b_company_email }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="company_address" class="col-md-4 control-label">company_address</label>
                    <div class="col-md-6">
                        <input type="text"  name="company_address" class="form-control" id="company_address" value ="{{$brokercompany->b_company_address}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="company_pin" class="col-md-4 control-label">company_pin</label>
                    <div class="col-md-6">
                        <input type="text"  name="company_pin"  class="form-control" id="company_pin" value ="{{$brokercompany->b_company_pin}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="company_city" class="col-md-4 control-label">company_city</label>
                    <div class="col-md-6">
                        <input type="text" name="company_city" class="form-control" id="company_city" value ="{{$brokercompany->b_company_city}}">
                    </div>
                </div>

                <div class="form-group{{ $errors->has('company_state') ? ' has-error' : '' }}">
                    <label for="company_state" class="col-md-4 control-label">State</label>
        
                    <div class="col-md-6">
                        <select id="company_state" class="form-control" name="company_state" autofocus>
                            <option value = "">-Please Select One-</option>
                        @foreach ($state_data as $state)
                            @if($state->state_id == $brokercompany->b_company_state)
                                <option value="{{ $state->state_id }}" selected>{{ $state->state_name }}</option>
                        
                            @else
                            <option value="{{ $state->state_id }}">{{ $state->state_name }}</option>
                            @endif
                        @endforeach
                        </select>
        
                        @if ($errors->has('company_state'))
                            <span class="help-block">
                                <strong>{{ $errors->first('company_state') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
        
                <div class="form-group{{ $errors->has('company_country') ? ' has-error' : '' }}">
                    <label for="company_country" class="col-md-4 control-label">Country</label>
        
                    <div class="col-md-6">
                        <select id="company_country" class="form-control" name="company_country" autofocus>
                            <option value = "">-Please Select One-</option>
                        @foreach ($country_data as $country)
                            @if($country->country_id == $brokercompany->b_company_country)
                                <option value="{{ $country->country_id }}" selected>{{ $country->country_name }}</option>
                                <?php continue;?>
                            @endif
                            <option value="{{ $country->country_id }}">{{ $country->country_name }}</option>
                        @endforeach
                        </select>
                        
                        @if ($errors->has('company_country'))
                            <span class="help-block">
                                <strong>{{ $errors->first('company_country') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="company_gstinno" class="col-md-4 control-label">company_gstinno</label>
                    <div class="col-md-6">
                        <input type="text" name="company_gstinno" class="form-control" id="company_gstinno" value ="{{$brokercompany->b_company_GSTIN }}" >
                    </div>
                </div>

                <!-- //End of Form Body // -->
                <button type="submit" class="btn btn-primary">Update</button>
                <input type="button" class="btn btn-primary" value="Cancel" onclick="history.back('')">
        </form>

    </div>

</div>  

@endsection
