@extends('layouts.app')

@section('content')
<div class="container">
<div>
     <h2>Broker Company Details<h2>
</div>
<a href="brokercompany/create" class="btn btn-primary">ADD NEW</a>
    <table class="table table-bordered " style="margin-top:10px;">
        <thead>
            <tr>
                  <th>company_id</th>
                  <th>company_name</th>
                  <th>feedback_day</th>
                  <th>company_email</th>
                  <th>company_address</th>
                  <th>company_pin</th>
                  <th>company_city</th>
                  <th>company_state</th>
                  <th>company_country</th>
                  <th>company_gstinno</th>
                  <th  colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($brokerCompanyList as $row)
            <tr>
                   <td>{{$row['b_company_id']}}</td>
                   <td>{{$row['b_company_name']}}</td>
                   <td>{{$row['b_avg_feedback_day']}}</td>
                   <td>{{$row['b_company_email']}}</td>
                   <td>{{$row['b_company_address']}}</td>
                   <td>{{$row['b_company_pin']}}</td>
                   <td>{{$row['b_company_city']}}</td>
                   <td>{{$row['b_company_state']}}</td>
                   <td>{{$row['b_company_country']}}</td>
                   <td>{{$row['b_company_GSTIN']}}</td>
                    <td><a href="brokercompany/edit" class="btn btn-success">Edit</a></td>
                    <td><a href="brokercompany/delete" class="btn btn-danger">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
<div>
@endsection