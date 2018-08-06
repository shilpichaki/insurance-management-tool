@extends('layouts.app')

@section('content')

<div class="cotainer">
    <form class="form-horizontal" method="POST" action="{{ route('msrelation.store') }}">

        {{ csrf_field() }}
    
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
<!--Starting of the form-->
        <div class="form-group{{ $errors->has('application_no') ? ' has-error' : '' }}">
            <label for="application_no" class="col-md-4 control-label">Application No</label>

            <div class="col-md-6">
                <input id="application_no" type="text" class="form-control" name="application_no" value="{{ old('m_company_id') }}" autofocus>

                @if ($errors->has('application_no'))
                    <span class="help-block">
                        <strong>{{ $errors->first('application_no') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('customer_id') ? ' has-error' : '' }}">
            <label for="customer_id" class="col-md-4 control-label">Customer ID</label>

            <div class="col-md-6">
                <input id="customer_id" type="text" class="form-control" name="customer_id" value="{{ old('customer_id') }}" autofocus>

                @if ($errors->has('customer_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('customer_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('case_taker_type') ? ' has-error' : '' }}">
            <label for="case_taker_type" class="col-md-4 control-label">Case Taker Type</label>

            <div class="col-md-6">
                <input id="case_taker_type" type="text" class="form-control" name="case_taker_type" value="{{ old('case_taker_type') }}" autofocus>

                @if ($errors->has('case_taker_type'))
                    <span class="help-block">
                        <strong>{{ $errors->first('case_taker_type') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('d_case_taker_id') ? ' has-error' : '' }}">
            <label for="d_case_taker_id" class="col-md-4 control-label">Direct Case Taker ID</label>

            <div class="col-md-6">
                <input id="d_case_taker_id" type="text" class="form-control" name="d_case_taker_id" value="{{ old('d_case_taker_id') }}" autofocus>

                @if ($errors->has('d_case_taker_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('d_case_taker_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('i_case_taker_id') ? ' has-error' : '' }}">
            <label for="i_case_taker_id" class="col-md-4 control-label">Direct Case Taker ID</label>

            <div class="col-md-6">
                <input id="i_case_taker_id" type="text" class="form-control" name="i_case_taker_id" value="{{ old('i_case_taker_id') }}" autofocus>

                @if ($errors->has('i_case_taker_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('i_case_taker_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('policy_id') ? ' has-error' : '' }}">
            <label for="policy_id" class="col-md-4 control-label">Direct Case Taker ID</label>

            <div class="col-md-6">
                <input id="policy_id" type="text" class="form-control" name="policy_id" value="{{ old('policy_id') }}" autofocus>

                @if ($errors->has('policy_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('policy_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
            <label for="amount" class="col-md-4 control-label">Direct Case Taker ID</label>

            <div class="col-md-6">
                <input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') }}" autofocus>

                @if ($errors->has('amount'))
                    <span class="help-block">
                        <strong>{{ $errors->first('amount') }}</strong>
                    </span>
                @endif
            </div>
        </div>
<!--Form will end in here-->    
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
        
        <div class="form-group{{ $errors->has('deal_percentage') ? ' has-error' : '' }}">
            <label for="deal_percentage" class="col-md-4 control-label">Deal Percent</label>

            <div class="col-md-6">
                <input id="deal_percentage" type="text" class="form-control" name="deal_percentage" value="{{ old('deal_percentage') }}" required autofocus>

                @if ($errors->has('deal_percentage'))
                    <span class="help-block">
                        <strong>{{ $errors->first('deal_percentage') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    
        <div class="form-group{{ $errors->has('percent_created') ? ' has-error' : '' }}">
            <label for="percent_created" class="col-md-4 control-label">Percent Creation Date</label>
    
            <div class="col-md-6">
                <input id="percent_created" type="date" class="form-control" name="percent_created" value="{{ old('percent_created') }}" required autofocus>
            </div>
        </div>
    
        <div class="form-group{{ $errors->has('percent_updated') ? ' has-error' : '' }}">
            <label for="percent_updated" class="col-md-4 control-label">Percent Updation Date</label>
            <div class="col-md-6">
                <input id="percent_updated" type="date" class="form-control" name="percent_updated" value="{{ old('percent_updated') }}" autofocus>
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

    <div class = "statement">

    </div>
</div>
@endsection