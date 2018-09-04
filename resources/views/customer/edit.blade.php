@extends('layouts.app')

@section('content')

<div class="cotainer">
    <form class="form-horizontal" method="POST" action="{{ route('customer.update') }}">

        {{ csrf_field() }}
        <input name="_method" type="hidden" value="put">
        <input name="customer_id" type="hidden" value="{{$id}}">

        <div class="form-group{{ $errors->has('customer_name') ? ' has-error' : '' }}">
            <label for="customer_name" class="col-md-4 control-label">Customer Name</label>

            <div class="col-md-6">
                <input id="customer_name" type="text" class="form-control" name="customer_name" value="{{ $customer->customer_name }}" required autofocus>

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
                <input id="customer_dob" type="date" class="form-control" name="customer_dob" value="{{ $customer->customer_dob }}" required autofocus>
            </div>
        </div>

        <div class="form-group{{ $errors->has('customer_phno') ? ' has-error' : '' }}">
            <label for="customer_phno" class="col-md-4 control-label">Customer Phno</label>

            <div class="col-md-6">
                <input id="customer_phno" type="text" class="form-control" name="customer_phno" value="{{ $customer->customer_phno }}" required autofocus>

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
                <input id="customer_address" type="text" class="form-control" name="customer_address" value="{{ $customer->customer_address }}" required autofocus>

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