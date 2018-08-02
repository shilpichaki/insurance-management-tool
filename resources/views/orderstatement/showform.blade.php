@extends('layouts.app')

@section('content')

<div class="cotainer">
    <form class="form-horizontal" method="POST" action="{{ route('orderstatement') }}">

        {{ csrf_field() }}
    
        <div class="form-group{{ $errors->has('company_type') ? ' has-error' : '' }}">
            <label for="company_type" class="col-md-4 control-label">Company Type</label>
    
            <div class="col-md-6">
    
                <select id="company_type" class="form-control" name="company_type" required autofocus>
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
    
        <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
            <label for="start_date" class="col-md-4 control-label">Start Date</label>
    
            <div class="col-md-6">
                <input id="start_date" type="date" class="form-control" name="start_date" value="{{ old('start_date') }}" required autofocus>
                </select>
            </div>
        </div>
    
        <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
            <label for="end_date" class="col-md-4 control-label">Start Date</label>
            <div class="col-md-6">
                <input id="end_date" type="date" class="form-control" name="end_date" value="{{ old('end_date') }}" required autofocus>
                </select>
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

@section('scripts')
    <script src="{{ asset('js/ajax.js') }}"></script>
@endsection