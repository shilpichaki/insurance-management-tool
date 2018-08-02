@extends('layouts.app')

@section('content')
    @foreach($statements as $statement)
        {{$statement->application_no}}|{{$statement->customer_name}}|{{$statement->company_name}}|{{$statement->policy_name}}|{{$statement->amount}} <br>
    @endforeach
    <a href = "{{ URL::previous() }}">
    <button type="button" class="btn btn-primary">
        Back
    </button>
    </a>
@endsection