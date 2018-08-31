@extends('layouts.app')

@section('content')

<?php
$grossProfit = 0;
$brokerPayment = 0;
$netProfit = 0;
$totalProfit = 0;
?>
<div class="card">
<table class="table table-bordered my_table" border="1">
    <tbody>
        <tr class="tell_index">
            <th>Application No</th>
            {{-- <th>Customer Name</th> --}}
            <th>Company Name</th>
            <th>Policy Name</th>
            <th>Policy Amount</th>
            <th>Gross Profit</th>
            <th>Employee Name</th>
            <th>Broker Company</th>
            <th>Payment</th>
            <th>Net Profit</th>
            {{-- <th>Order Date</th> --}}
        </tr>
        
        @foreach($statements as $statement)
            <?php 
                $grossProfit = (float)$grossProfit + (float)$statement->profit;
                if(!isset($statement->broker_payment))
                {    
                    $statement->broker_payment = 0;
                    $statement->broker_company_name = "";
                    $brokerPayment = (float)$brokerPayment + 0;
                    $netProfit = (float)$statement->profit - 0;
                }
                else 
                {
                    $netProfit = (float)$statement->profit - $statement->broker_payment;
                }
                $totalProfit = (float)$totalProfit + (float)$netProfit;
            ?>
            <tr data-orderid = "{{$statement->order_id}}" class="tell_index">
                <td>{{$statement->application_no}}</td>
                {{-- <td>{{$statement->customer_name}}</td> --}}
                <td>{{$statement->company_name}}</td>
                <td>{{$statement->policy_name}}</td>
                <td align="right">{{$statement->amount}}</td>
                <td align="right">{{$statement->profit}}</td>
                <td id = "{{$statement->d_case_taker_id}}">{{$statement->emp_name}}</td>
                <td>@if (isset($statement->broker_company_name)) {{$statement->broker_company_name}} @endif</td>
                <td align="right">@if (isset($statement->broker_payment)) {{$statement->broker_payment}} @endif</td>
                <td align="right">{{number_format($netProfit,2)}}</td>
                {{-- <td>{{date("d/m/Y",strtotime($statement->order_date))}}</td> --}}
            </tr>
        @endforeach
    
        <tr class="tell_total">
            <td colspan="8" class="text-right">Total Profit</td>
            <td colspan="1" class="text-left"><?php echo number_format($totalProfit,2);?></td>
        </tr>
    </tbody>
</table>

{{-- Button --}}
<a href = "{{ URL::previous() }}">
    <button type="button" class="btn btn-primary">
        Back
    </button>
</a>

<!--Heirerchy-->
<div class="showRelationship">
    <div class="eh_container">
        <div class="eh_c_c">
            <span class="eh_show_close"><i class="fa fa-close"></i></span>
            <ul class="eh_breadcrumbs">
                <li><a class="btn"><i class="fa fa-user-circle-o"></i> Suman</a></li>
                <li class="active"><a class="btn"><i class="fa fa-user-circle-o"></i> Rishu</a></li>
                <li><a class="btn"><i class="fa fa-user-circle-o"></i> VK</a></li>
                <li><a class="btn"><i class="fa fa-user-circle-o"></i> Guddu</a></li>
            </ul>
        </div>
    </div>
</div>

</div>
    
@endsection

@section("scripts")
<script src={{asset("dashboard/js/ajax.js")}}></script>
@endsection