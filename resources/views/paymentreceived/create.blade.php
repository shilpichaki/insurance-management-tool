@extends('layouts.app')

@section('content')

<div class="cotainer">
    <form class="form-horizontal" method="POST" action="{{ route('paymentreceive.store') }}">

        {{ csrf_field() }}
    
        <div class="form-group{{ $errors->has('company_type') ? ' has-error' : '' }}">
            <label for="company_type" class="col-md-4 control-label">Company Type</label>

            <div class="col-md-6">

                <select id="company_type" class="form-control" name="company_type" autofocus>
                    <option value = "">-Please Select One-</option>
                    <option value="mother">Mother</option>
                    <option value="sub">Sub</option>
                </select>
            </div>
        </div>

        <div class="form-group{{ $errors->has('s_company_id') ? ' has-error' : '' }}">
            <label for="s_company_id" class="col-md-4 control-label">Sub Company</label>

            <div class="col-md-6">

                <select id="s_company_id" class="form-control" name="s_company_id" autofocus>
                    <option value = "">-Please Select One-</option>
                @foreach ($subcompanylist as $subcompany)
                    <option value="{{ $subcompany->s_company_id }}">{{ $subcompany->s_company_name }}</option>
                @endforeach
                </select>
            </div>
        </div>
    
        <div class="form-group{{ $errors->has('m_company_id') ? ' has-error' : '' }}">
            <label for="m_company_id" class="col-md-4 control-label">Mother Company</label>
    
            <div class="col-md-6">
    
                <select id="m_company_id" class="form-control" name="m_company_id" autofocus>
                    <option value = "">-Please Select One-</option>
                @foreach ($mothercompanylist as $mothercompany)
                    <option value="{{ $mothercompany->m_company_id }}">{{ $mothercompany->m_company_name }}</option>
                @endforeach
                </select>
            </div>
        </div>

        <div class="form-group{{ $errors->has('is_gst') ? ' has-error' : '' }}">
            <label for="is_gst" class="col-md-4 control-label">GST Applicable</label>

            <div class="col-md-6">

                <select id="is_gst" class="form-control" name="is_gst" autofocus>
                    <option value = "">-Please Select One-</option>
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>
        </div>

        <div class="form-group{{ $errors->has('gst_type') ? ' has-error' : '' }}">
            <label for="gst_type" class="col-md-4 control-label">GST Type</label>

            <div class="col-md-6">

                <select id="gst_type" class="form-control" name="gst_type" autofocus>
                    <option value = "">-Please Select One-</option>
                    <option value="state">SGST + CGST</option>
                    <option value="interstate">IGST</option>
                </select>
            </div>
        </div>
        
        <div class="form-group{{ $errors->has('tax_percentage') ? ' has-error' : '' }}">
            <label for="tax_percentage" class="col-md-4 control-label">Tax Percent</label>

            <div class="col-md-6">
                <input id="tax_percentage" type="text" class="form-control" name="tax_percentage" value="{{ old('tax_percentage') }}" required autofocus>

                @if ($errors->has('tax_percentage'))
                    <span class="help-block">
                        <strong>{{ $errors->first('tax_percentage') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('tax_amount') ? ' has-error' : '' }}">
            <label for="tax_amount" class="col-md-4 control-label">Tax Amount</label>

            <div class="col-md-6">
                <input id="tax_amount" type="text" class="form-control" name="tax_amount" value="{{ old('tax_amount') }}" required autofocus>

                @if ($errors->has('tax_amount'))
                    <span class="help-block">
                        <strong>{{ $errors->first('tax_amount') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('payment_amount') ? ' has-error' : '' }}">
            <label for="payment_amount" class="col-md-4 control-label">Payment Amount</label>

            <div class="col-md-6">
                <input id="payment_amount" type="text" class="form-control" name="payment_amount" value="{{ old('payment_amount') }}" required autofocus>

                @if ($errors->has('payment_amount'))
                    <span class="help-block">
                        <strong>{{ $errors->first('payment_amount') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('payment_mode') ? ' has-error' : '' }}">
            <label for="payment_mode" class="col-md-4 control-label">Payment Mode</label>

            <div class="col-md-6">

                <select id="payment_mode" class="form-control" name="payment_mode" autofocus>
                    <option value = "">-Please Select One-</option>
                    <option value="cheque">Cheque</option>
                    <option value="dd">Demand Draft</option>
                    <option value="cash">Cash</option>
                </select>
            </div>
        </div>

        <div class="form-group{{ $errors->has('instrument_no') ? ' has-error' : '' }}">
            <label for="instrument_no" class="col-md-4 control-label">Instrument No</label>

            <div class="col-md-6">
                <input id="instrument_no" type="text" class="form-control" name="instrument_no" value="{{ old('instrument_no') }}">

                @if ($errors->has('instrument_no'))
                    <span class="help-block">
                        <strong>{{ $errors->first('instrument_no') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    
        <div class="form-group{{ $errors->has('instrument_date') ? ' has-error' : '' }}">
            <label for="instrument_date" class="col-md-4 control-label">Instrument Date</label>
    
            <div class="col-md-6">
                <input id="instrument_date" type="date" class="form-control" name="instrument_date" value="{{ old('instrument_date') }}" required autofocus>
            </div>
        </div>

        <div class="form-group{{ $errors->has('payment_details_json') ? ' has-error' : '' }}">
            <label for="payment_details_json" class="col-md-4 control-label">Payment Details JSON</label>

            <div class="col-md-6">
                <input id="payment_details_json" type="text" class="form-control" name="payment_details_json" value="{{ old('payment_details_json') }}" required autofocus>

                @if ($errors->has('payment_details_json'))
                    <span class="help-block">
                        <strong>{{ $errors->first('payment_details_json') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </div>
        </div>
    </form>

    <div class = "statement">

    </div>
</div>
@endsection