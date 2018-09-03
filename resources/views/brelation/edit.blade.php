@extends('layouts.app')

@section('content')

<div class="cotainer">
    <form class="form-horizontal" method="POST" action="{{ route('brelation.store') }}">

        {{ csrf_field() }}

        <input name="_method" type="hidden" value="put">
        <input name="relation_id" type="hidden" value="{{$id}}">
    
        <div class="form-group{{ $errors->has('s_company_id') ? ' has-error' : '' }}">
            <label for="b_company_id" class="col-md-4 control-label">Broker Company</label>

            <div class="col-md-6">

                <select id="b_company_id" class="form-control" name="b_company_id" autofocus>
                    <option value = "">-Please Select One-</option>
                @foreach ($brokercompanylist as $brokercompany)
                    @if ($brokercompany->b_company_id == $brokerCompanyRelation->b_company_id)
                        <option value="{{ $brokercompany->b_company_id }}" selected>{{ $brokercompany->b_company_name }}</option>
                    @else
                        <option value="{{ $brokercompany->b_company_id }}">{{ $brokercompany->b_company_name }}</option>
                    @endif
                @endforeach
                </select>
            </div>
        </div>

        {{-- <div class="form-group{{ $errors->has('m_company_id') ? ' has-error' : '' }}">
            <label for="m_company_id" class="col-md-4 control-label">Mother Company ID</label>

            <div class="col-md-6">
                <input id="m_company_id" type="text" class="form-control" name="m_company_id" value="{{ old('m_company_id') }}" autofocus>

                @if ($errors->has('m_company_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('m_company_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('s_company_id') ? ' has-error' : '' }}">
            <label for="s_company_id" class="col-md-4 control-label">Sub Company ID</label>

            <div class="col-md-6">
                <input id="s_company_id" type="text" class="form-control" name="s_company_id" value="{{ old('s_company_id') }}" autofocus>

                @if ($errors->has('s_company_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('s_company_id') }}</strong>
                    </span>
                @endif
            </div>
        </div> --}}
        
        <div class="form-group{{ $errors->has('deal_percentage') ? ' has-error' : '' }}">
            <label for="deal_percentage" class="col-md-4 control-label">Deal Percent</label>

            <div class="col-md-6">
                <input id="deal_percentage" type="text" class="form-control" name="deal_percentage" value="{{ $brokerCompanyRelation->deal_percentage }}" required autofocus>

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
                <input id="percent_created" type="date" class="form-control" name="percent_created" value="{{ date("Y-m-d",strtotime($brokerCompanyRelation->percent_created_at)) }}" required autofocus>
            </div>
        </div>
    
        <div class="form-group{{ $errors->has('percent_updated') ? ' has-error' : '' }}">
            <label for="percent_updated" class="col-md-4 control-label">Percent Updation Date</label>
            <div class="col-md-6">
                @if (!empty($motherSubCompanyRelation->percent_updated_at))
                    <input id="percent_updated" type="date" class="form-control" name="percent_updated" value="{{ date("Y-m-d",strtotime($brokerCompanyRelation->percent_updated_at)) }}" autofocus>
                @else
                    <input id="percent_updated" type="date" class="form-control" name="percent_updated" autofocus>
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