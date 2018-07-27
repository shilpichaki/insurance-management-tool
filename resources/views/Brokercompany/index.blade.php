@extends('home')

@section('content')
        <div class="row">
            <div class="col-md-12">
            <br />
            <h3 aling="center"><b>Broker Company Data</b></h3>
            <br />
            <table class="table table-responsive">
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
               </tr>
           
                    @foreach ($brokerCompanyList as $row)
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
                </tr>
            @endforeach
            </table>
        </div>
        </div>
@endsection)