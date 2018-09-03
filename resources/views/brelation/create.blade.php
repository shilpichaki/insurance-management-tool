@extends('layouts.app')

@section('content')

<div class="cotainer">
    <form class="form-horizontal" method="POST" action="{{ route('brelation.store') }}">

        {{ csrf_field() }}
    
        <div class="form-group{{ $errors->has('b_company_id') ? ' has-error' : '' }}">
            <label for="b_company_id" class="col-md-4 control-label">Sub Company</label>

            <div class="col-md-6">

                <select id="b_company_id" class="form-control" name="b_company_id" autofocus>
                    <option value = "">-Please Select One-</option>
                @foreach ($brokercompanylist as $brokercompany)
                    <option value="{{ $brokercompany->b_company_id }}">{{ $brokercompany->b_company_name }}</option>
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
                    Submit
                </button>
            </div>
        </div>
    </form>

    <div class = "statement">

    </div>
</div>
@endsection