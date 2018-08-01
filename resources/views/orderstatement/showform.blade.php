@extends('layouts.app')

@section('content')

<form class="form-horizontal" method="POST" action="{{ route('orderstatement') }}">

    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('company_type') ? ' has-error' : '' }}">
        <label for="company_type" class="col-md-4 control-label">Company Type</label>

        <div class="col-md-6">

            <select id="company_type" class="form-control" name="company_type" required autofocus>
                <option value="mother">Mother</option>
                <option value="sub">Sub</option>
            </select>
        </div>
    </div>

    <div class="form-group{{ $errors->has('m_company_id') ? ' has-error' : '' }}">
        <label for="m_company_id" class="col-md-4 control-label">Mother Company</label>

        <div class="col-md-6">

            <select id="m_company_id" class="form-control" name="m_company_id" required autofocus>
            @foreach ($mothercompanylist as $mothercompany)
                <option value="{{ $mothercompany->m_company_id }}">{{ $mothercompany->m_company_name }}</option>
            @endforeach
            </select>
        </div>
    </div>

    <div class="form-group{{ $errors->has('s_company_id') ? ' has-error' : '' }}">
        <label for="s_company_id" class="col-md-4 control-label">Sub Company</label>

        <div class="col-md-6">

            <select id="s_company_id" class="form-control" name="s_company_id" required autofocus>
            @foreach ($subcompanylist as $subcompany)
                <option value="{{ $subcompany->s_company_id }}">{{ $subcompany->s_company_name }}</option>
            @endforeach
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
@endsection