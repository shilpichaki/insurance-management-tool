@extends('layouts.app')

@section('content')

<div class="cotainer">
    <form class="form-horizontal" method="POST" action="{{ route('msrelation.store') }}">

        {{ csrf_field() }}

        <input name="_method" type="hidden" value="put">
        <input name="relation_id" type="hidden" value="{{$id}}">
    
        <div class="form-group{{ $errors->has('s_company_id') ? ' has-error' : '' }}">
            <label for="s_company_id" class="col-md-4 control-label">Sub Company</label>

            <div class="col-md-6">

                <select id="s_company_id" class="form-control" name="s_company_id" autofocus>
                    <option value = "">-Please Select One-</option>
                @foreach ($subcompanylist as $subcompany)
                    <option value="{{ $subcompany->s_company_id }}">{{ $subcompany->s_company_name }}</option>
                    @if ($subcompany->s_company_id == $motherSubCompanyRelation->s_company_id)
                        <option value="{{ $subcompany->s_company_id }}" selected>{{ $subcompany->s_company_name }}</option>
                    @else
                        <option value="{{ $subcompany->s_company_id }}">{{ $subcompany->s_company_name }}</option>
                    @endif
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
                    @if ($mothercompany->m_company_id == $motherSubCompanyRelation->m_company_id)
                        <option value="{{ $mothercompany->m_company_id }}" selected>{{ $mothercompany->m_company_name }}</option>
                    @else
                        <option value="{{ $mothercompany->m_company_id }}">{{ $mothercompany->m_company_name }}</option>
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
                <input id="deal_percentage" type="text" class="form-control" name="deal_percentage" value="{{ $motherSubCompanyRelation->deal_percentage }}" required autofocus>

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
                <input id="percent_created" type="date" class="form-control" name="percent_created" value="{{ date("Y-m-d",strtotime($motherSubCompanyRelation->percent_created_at)) }}" required autofocus>
            </div>
        </div>
    
        <div class="form-group{{ $errors->has('percent_updated') ? ' has-error' : '' }}">
            <label for="percent_updated" class="col-md-4 control-label">Percent Updation Date</label>
            <div class="col-md-6">
                @if (!empty($motherSubCompanyRelation->percent_updated_at))
                    <input id="percent_updated" type="date" class="form-control" name="percent_updated" value="{{ date("Y-m-d",strtotime($motherSubCompanyRelation->percent_updated_at)) }}" autofocus>
                @else
                    <input id="percent_updated" type="date" class="form-control" name="percent_updated" autofocus>
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

    <div class = "statement">

    </div>
</div>
@endsection