@extends('layouts.app')

@section('content')
<?php
$totalProfit = 0;
?>
<div class="table-responsive">
<table class="table table-bordered" border="1">
<tr><th>Application No</th><th>Customer Name</th><th>Company Name</th><th>Policy Name</th><th>Policy Amount</th><th>Profit</th><th>Order Date</th></tr>
    @foreach($statements as $statement)
<tr><td>{{$statement->application_no}}</td><td>{{$statement->customer_name}}</td><td>{{$statement->company_name}}</td><td>{{$statement->policy_name}}</td><td align="right">{{$statement->amount}}</td><td align="right">{{$statement->profit}}</td><td>{{date("d/m/Y",strtotime($statement->order_date))}}</td></tr>
    <?php $totalProfit = (float)$totalProfit + (float)$statement->profit;?>
    @endforeach
<tr><td colspan="5" align="right">Total Profit</td><td align="right"><?php echo number_format($totalProfit,2);?></td><td></td></tr>
</table>

</div>
    <a href = "{{ URL::previous() }}">
    <button type="button" class="btn btn-primary">
        Back
    </button>
    </a>
@endsection