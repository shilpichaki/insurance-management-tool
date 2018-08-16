@extends('layouts.app')

@section('content')
<?php
$totalProfit = 0;
?>
<div class="card">
<table class="table table-bordered my_table" border="1">
    <tbody>
        <tr class="tell_index">
            <th>Application No</th>
            <th>Customer Name</th>
            <th>Company Name</th>
            <th>Employee Name</th>
            <th>Policy Name</th>
            <th>Policy Amount</th>
            <th>Profit</th>
            <th>Order Date</th>
        </tr>
        
        @foreach($statements as $statement)
            <tr data-orderid = "{{$statement->order_id}}" class="tell_index">
                <td>{{$statement->application_no}}</td>
                <td>{{$statement->customer_name}}</td>
                <td>{{$statement->company_name}}</td>
                <td id = "{{$statement->d_case_taker_id}}">{{$statement->emp_name}}</td>
                <td>{{$statement->policy_name}}</td>
                <td align="right">{{$statement->amount}}</td>
                <td align="right">{{$statement->profit}}</td>
                <td>{{date("d/m/Y",strtotime($statement->order_date))}}</td>
            </tr>
            <?php $totalProfit = (float)$totalProfit + (float)$statement->profit;?>
        @endforeach
    
        <tr class="tell_total">
            <td colspan="5" class="text-right">Total Profit</td>
            <td colspan="3" class="text-left"><?php echo number_format($totalProfit,2);?></td>
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