@extends('layouts.app')

@section('style')
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/paymentreceived_index.css') }}"> --}}
@endsection

@section('content')

    @foreach ($orderPaymentToRecover as $orderPayment)
        {{$orderPayment->application_no}}
    @endforeach

@endsection

@section('scripts')
@endsection