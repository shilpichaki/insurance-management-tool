@extends('layouts.app')

@section('style')
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/paymentreceived_index.css') }}"> --}}
@endsection

@section('content')
    <div class="container">
        <div class="recoverdPolicy">
            <div class="card">
                <table class="table table-bordered my_table">
                    <thead>
                        <tr class="tell_index">
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="policyToBeRecovered">

        </div>
    </div>
    @foreach ($orderPaymentToRecover as $orderPayment)
        {{$orderPayment->application_no}}
    @endforeach

@endsection

@section('scripts')
@endsection