@extends('layouts.app')

@section('content')

<div class="cotainer">
    <form class="form-horizontal" method="POST" action="{{ route('msrelation.store') }}">

        {{ csrf_field() }}
        
        <div class="form-group{{ $errors->has('customer_name') ? ' has-error' : '' }}">
            <label for="customer_name" class="col-md-4 control-label">Customer Name</label>

            <div class="col-md-6">
                <input id="customer_name" type="text" class="form-control" name="customer_name" value="{{ old('customer_name') }}" required autofocus>

                @if ($errors->has('customer_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('customer_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    
        <div class="form-group{{ $errors->has('customer_dob') ? ' has-error' : '' }}">
            <label for="customer_dob" class="col-md-4 control-label">Customer DOB</label>
    
            <div class="col-md-6">
                <input id="customer_dob" type="date" class="form-control" name="customer_dob" value="{{ old('customer_dob') }}" required autofocus>
            </div>
        </div>

        <div class="form-group{{ $errors->has('customer_phno') ? ' has-error' : '' }}">
            <label for="customer_phno" class="col-md-4 control-label">Customer Phno</label>

            <div class="col-md-6">
                <input id="customer_phno" type="text" class="form-control" name="customer_phno" value="{{ old('customer_phno') }}" required autofocus>

                @if ($errors->has('customer_phno'))
                    <span class="help-block">
                        <strong>{{ $errors->first('customer_phno') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('customer_address') ? ' has-error' : '' }}">
            <label for="customer_address" class="col-md-4 control-label">Customer Address</label>

            <div class="col-md-6">
                <input id="customer_address" type="text" class="form-control" name="customer_address" value="{{ old('customer_address') }}" required autofocus>

                @if ($errors->has('customer_address'))
                    <span class="help-block">
                        <strong>{{ $errors->first('customer_address') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Save
                </button>
            </div>
        </div>
    </form>

    <div class = "statement">

    </div>
</div>
@endsection