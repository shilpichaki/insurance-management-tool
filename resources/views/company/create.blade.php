@extends('layouts.app')

@section('content')

<div class="cotainer">
    <form class="form-horizontal" method="POST" action="{{ route('company.store') }}">

        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}">
            <label for="company_name" class="col-md-4 control-label">Company Name</label>

            <div class="col-md-6">
                <input id="company_name" type="text" class="form-control" name="company_name" value="{{ old('company_name') }}" required autofocus>

                @if ($errors->has('company_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('company_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('company_address') ? ' has-error' : '' }}">
            <label for="company_address" class="col-md-4 control-label">Company Address</label>

            <div class="col-md-6">
                <input id="company_address" type="text" class="form-control" name="company_address" value="{{ old('company_address') }}" required autofocus>

                @if ($errors->has('company_address'))
                    <span class="help-block">
                        <strong>{{ $errors->first('company_address') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('company_pin') ? ' has-error' : '' }}">
            <label for="company_pin" class="col-md-4 control-label">Company Pin</label>

            <div class="col-md-6">
                <input id="company_pin" type="text" class="form-control" name="company_pin" value="{{ old('company_pin') }}" required autofocus>

                @if ($errors->has('company_pin'))
                    <span class="help-block">
                        <strong>{{ $errors->first('company_pin') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('company_city') ? ' has-error' : '' }}">
            <label for="company_city" class="col-md-4 control-label">City</label>

            <div class="col-md-6">
                <input id="company_city" type="text" class="form-control" name="company_city" value="{{ old('company_city') }}" required autofocus>

                @if ($errors->has('company_city'))
                    <span class="help-block">
                        <strong>{{ $errors->first('company_city') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('company_state') ? ' has-error' : '' }}">
            <label for="company_state" class="col-md-4 control-label">State</label>

            <div class="col-md-6">
                <select id="company_state" class="form-control" name="company_state" autofocus>
                    <option value = "">-Please Select One-</option>
                @foreach ($statelist as $state)
                    <option value="{{ $state->state_id }}">{{ $state->state_name }}</option>
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
                @foreach ($countrylist as $country)
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

        <div class="form-group{{ $errors->has('company_gstinno') ? ' has-error' : '' }}">
            <label for="company_gstinno" class="col-md-4 control-label">GSTIN No</label>

            <div class="col-md-6">
                <input id="company_gstinno" type="text" class="form-control" name="company_gstinno" value="{{ old('company_gstinno') }}" required autofocus>

                @if ($errors->has('company_gstinno'))
                    <span class="help-block">
                        <strong>{{ $errors->first('company_gstinno') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('company_CIN') ? ' has-error' : '' }}">
            <label for="company_CIN" class="col-md-4 control-label">CIN No</label>

            <div class="col-md-6">
                <input id="company_CIN" type="text" class="form-control" name="company_CIN" value="{{ old('company_CIN') }}" required autofocus>

                @if ($errors->has('company_CIN'))
                    <span class="help-block">
                        <strong>{{ $errors->first('company_CIN') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('company_PAN') ? ' has-error' : '' }}">
            <label for="company_PAN" class="col-md-4 control-label">PAN No</label>

            <div class="col-md-6">
                <input id="company_PAN" type="text" class="form-control" name="company_PAN" value="{{ old('company_PAN') }}" required autofocus>

                @if ($errors->has('company_PAN'))
                    <span class="help-block">
                        <strong>{{ $errors->first('company_PAN') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('company_contact_person') ? ' has-error' : '' }}">
            <label for="company_contact_person" class="col-md-4 control-label">Contact Person</label>

            <div class="col-md-6">
                <input id="company_contact_person" type="text" class="form-control" name="company_contact_person" value="{{ old('company_contact_person') }}" required autofocus>

                @if ($errors->has('company_contact_person'))
                    <span class="help-block">
                        <strong>{{ $errors->first('company_contact_person') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('company_contact_no') ? ' has-error' : '' }}">
            <label for="company_contact_no" class="col-md-4 control-label">Contact No</label>

            <div class="col-md-6">
                <input id="company_contact_no" type="text" class="form-control" name="company_contact_no" value="{{ old('company_contact_no') }}" required autofocus>

                @if ($errors->has('company_contact_no'))
                    <span class="help-block">
                        <strong>{{ $errors->first('company_contact_no') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    submit
                </button>
            </div>
        </div>

    </form>
</div>

@endsection