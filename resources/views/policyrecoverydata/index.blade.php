@extends('layouts.app')

@section('style')
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/paymentreceived_index.css') }}"> --}}
@endsection

@section('content')

@foreach($recoverdPolicyData as $recoveryData)
<?php 
    // var_dump($recoveryData);
    // var_dump( $recoveryData->order_details->customer_details);
?>
@endforeach
    <div class="container">
        <div class="recoverdPolicy">
            <div class="card">
                <h2>Recovered Policies</h2>
                <table class="table table-bordered my_table">
                    <thead>
                        <tr class="tell_index">
                            <th>Customer Name</th>
                            <th>Application No</th>
                            <th>Amount</th>
                            <th>Recovery Date</th>
                            <th>Payment Mode</th>
                            <th>Instrument No(If any)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recoverdPolicyData as $recoveryData)
                        <tr class="tell_index">
                            <td>{{$recoveryData->order_details->customer_details->customer_name}}</td>
                            <td>{{$recoveryData->order_details->application_no}}</td>
                            <td>{{$recoveryData->order_details->amount}}</td>
                            <td>{{App\Util::phpDateFetch($recoveryData->recovery_date)}}</td>
                            <td>{{$recoveryData->instrument_no}}</td>
                            <td>{{$recoveryData->instrument_no}}</td>
                            <td><a href="{{action('PolicyrecoverydataController@edit',$recoveryData->recovery_id)}}" class="btn btn-success">Edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="policyToBeRecovered">
            <div class="card">
                <h2>Policies to be Recovered</h2>
                <table class="table table-bordered my_table">
                    <thead>
                        <tr class="tell_index">
                            <th>Customer Name</th>
                            <th>Application No</th>
                            <th>Amount</th>
                            <th>Company Name</th>
                            <th>Payment Date</th>
                            <th>Payment Mode</th>
                            <th>Instrument No(If any)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderPaymentToRecover as $orderPayment)
                        <tr class="tell_index">
                            <td>{{$orderPayment->customer_details->customer_name}}</td>
                            <td>{{$orderPayment->application_no}}</td>
                            <td>{{$orderPayment->amount}}</td>
                            <td>
                                @if($orderPayment->handover_to_company_type == "sub")
                                    {{$orderPayment->sub_company_details->s_company_name}}
                                @elseif($orderPayment->handover_to_company_type == "mother")
                                    {{$orderPayment->mother_company_details->m_company_name}}
                                @endif
                            </td>
                            <td>{{App\Util::phpDateFetch($orderPayment->instrument_date)}}</td>
                            <td>{{$orderPayment->payment_mode}}</td>
                            <td>{{$orderPayment->instrument_no}}</td>
                            <td><a href="{{action('PolicyrecoverydataController@create',$orderPayment->order_id)}}" class="btn btn-success">Create</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    

@endsection

@section('scripts')
@endsection