@extends('layouts.app')

@section('content')


<form action="{{ action('BrokercompanyController@store') }}" method="post" class="form-horizontal" >
    {{csrf_field()}}
    <form>
        <div class="panel panel-default">
            <div class="panel-heading"><b>Create New Broker Company</b></div>
            <!-- // Form Body // -->

            <div class="panel-body">
                <div class="form-group">
                    <label for="company_name" class="col-md-4 control-label">company_name</label>
                    <div class="col-md-6">
                    <input type="text" name="company_name" autocomplete="off" class="form-control" id="company_name" placeholder="company_name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="feedback_day1" class="col-md-4 control-label">feedback_day</label>
                    <div class="col-md-6">
                    <input type="text"  name="feedback_day" autocomplete="off" class="form-control" id="feedback_day" placeholder="feedback_day">
                    </div>
                </div>
                <div class="form-group">
                    <label for="company_email" class="col-md-4 control-label">company_email</label>
                    <div class="col-md-6">
                    <input type="email" autocomplete="off" name="company_email" class="form-control" id="company_email" placeholder="Enter email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="company_address" class="col-md-4 control-label">company_address</label>
                    <div class="col-md-6">
                    <input type="text"  name="company_address" autocomplete="off" class="form-control" id="company_address" placeholder="company_address">
                    </div>
                </div>
                <div class="form-group">
                    <label for="company_pin" class="col-md-4 control-label">company_pin</label>
                    <div class="col-md-6">
                    <input type="text"  name="company_pin"autocomplete="off" class="form-control" id="company_piny" placeholder="company_pin">
                    </div>
                </div>
                <div class="form-group">
                    <label for="company_city" class="col-md-4 control-label" >company_city</label>
                    <div class="col-md-6">
                    <input type="text" name="company_city" autocomplete="off" class="form-control" id="company_city" placeholder="company_city">
                    </div>
                </div>
                <div class="form-group">
                    <label for="select" class="col-md-4 control-label" id="select_state">select State</label>
                    <div class="col-md-6">
                        <select name='company_state' class="form-control">
                        <option value = "">-Please Select One-</option>
                        @foreach ($state_data as $state)
                            <option value="{{ $state->state_id }}">{{ $state->state_name }}</option>
                        @endforeach
                        </select>
                        <br />
                    </div>
                </div>
                <div class="form-group">
                    <label for="select" class="col-md-4 control-label" id="select_country"> Select Country</label>
                    <div class="col-md-6">
                        <select name='company_country' class="form-control">
                        <option value = "">-Please Select One-</option>
                            @foreach ( $country_data as $country)
                            <option value="{{ $country->country_id }}">{{ $country->country_name }}</option>
                            @endforeach
                        </select>
                        <br />
                    </div>
                </div>
                <div class="form-group">
                    <label for="company_gstinno" class="col-md-4 control-label">company_gstinno</label>
                    <div class="col-md-6">
                    <input type="text" name="company_gstinno" autocomplete="off" class="form-control" id="company_gstinno" placeholder="company_gstinno">
                    </div>
                </div>

                <!-- //End of Form Body // -->
                <button type="submit" class="btn btn-primary">Create</button>
                <input type="button" class="btn btn-primary" value="Go back" onclick="history.back()">
            </div>
        </div>
    </form>
</form>
@endsection
