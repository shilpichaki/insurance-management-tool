@extends('layouts.app')

@section('style')
<style>
    .collapsible {
        background-color: #777;
        color: white;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
    }
    
    .active, .collapsible:hover {
        background-color: #555;
    }
    
    .content {
        padding: 0 18px;
        display: none;
        overflow: hidden;
        background-color: #f1f1f1;
    }
</style>
@endsection

@section('content')
<div class = "container"> 
<h2>Collapsibles</h2>

<p>Collapsible Set:</p>

@foreach ($paymentReceived as $payment)
    <div class="collapsible">{{$payment->instrument_date}} | {{$payment->company_name}}</div>
    <div class="content">
        <table>
        @foreach ($paymentReceivedDetails as $paymentDetail)
            @if ($paymentDetail->payment_id == $payment->payment_id)
                <tr>
                    <td>{{$paymentDetail->application_no}}</td>
                    <td>{{$paymentDetail->policy_name}}</td>
                    <td>{{$paymentDetail->customer_name}}</td>
                    <td>{{$paymentDetail->amount}}</td>
                </tr>
                <?php break;?>
            @endif
        @endforeach
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
@endsection

@section('scripts')
<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;
    
    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    }
    </script>
@endsection