@extends('layouts.app')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/paymentreceived_index.css') }}">
@endsection

@section('content')
<div class = "container"> 
<h2>Payment Done</h2>

<div class="paymentReceivedHeader">
    <div class="container">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-2">Date</div>
            <div class="col-sm-3">Company</div>
            <div class="col-sm-2">Company Type</div>
            <div class="col-sm-2">Payment Mode</div>
            <div class="col-sm-2">Amount</div>
        </div>
    </div>
</div>

@foreach ($paymentReceived as $payment)

    <div class="collapsible">
        <div class="container">
            <div class="row">
                <div class="col-sm-1"><span class="dropdown-arrow">Hello</span></div>
                <div class="col-sm-2">{{App\Util::phpDateFetch($payment->instrument_date)}}</div>
                <div class="col-sm-3">{{$payment->company_name}}</div>
                <div class="col-sm-2">{{$payment->company_type}}</div>
                <div class="col-sm-2">{{$payment->payment_mode}}</div>
                <div class="col-sm-2">{{$payment->payment_amount}}</div>
            </div>
        </div>
    </div>
    <div class="content">
        <table class="table table-bordered table-striped table-hover">
            <thead >
                <tr>
                    <th>Application No.</th>
                    <th>Policy Name</th>
                    <th>Applicient Name</th>
                    <th>Amount</th>
                </tr>
            </thead>
        <?php 
            $executing = false;
            $notExecuting = true;
        ?>
            <tbody>
        @foreach ($paymentReceivedDetails as $paymentDetail)
            @if ($paymentDetail->payment_id == $payment->payment_id)
                <tr>
                    <td>{{$paymentDetail->application_no}}</td>
                    <td>{{$paymentDetail->policy_name}}</td>
                    <td>{{$paymentDetail->customer_name}}</td>
                    <td>{{$paymentDetail->amount}}</td>
                </tr>
                <?php
                    $executing = true;
                    $notExecuting = false;
                ?>
            @else
                <?php 
                    $notExecuting = true;
                ?>
            @endif

            @if ($executing && $notExecuting)
                <?php break;?>
            @endif
        @endforeach
            </tbody>
        </table>
    </div>
@endforeach

{{-- <div class="collapsible">Open Section 1</div>
<div class="content">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>
<div class="collapsible">Open Section 2</div>
<div class="content">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>
<div class="collapsible">Open Section 3</div>
<div class="content">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div> --}}
</div>
<br>
<div class="container">
    <h2>Pending Payment</h2>
    <input type="text" id="searchInput" onkeyup="pendingResultSearch()" placeholder="Search for names..">
    <table id = "pendingPayment" class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <td>Application No</td>
                <td>Policy Name</td>
                <td>Company Name</td>
                <td>Company Type</td>
                <td>Amount</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendingPayments as $pendingPayment)
                <tr>
                    <td>{{$pendingPayment->application_no}}</td>
                    <td>{{$pendingPayment->policy_name}}</td>
                    <td>{{$pendingPayment->company_name}}</td>
                    <td>{{$pendingPayment->handover_to_company_type}}</td>
                    <td>{{$pendingPayment->amount}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script src="{{ asset('dashboard/js/paymentreceived_index.js') }}"></script>
@endsection