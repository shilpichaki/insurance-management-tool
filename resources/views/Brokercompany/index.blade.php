@extends('layouts.app')

@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="panel panel-default">
          <div class="panel-heading"><b>Broker Company Details</b></div>
          <div class="panel-body">
             @if($message = Session::get('success'))
                <div class="alert alert-success">
                   <p>{{$message}}</p>
               </div>
             @endif
            <div>
               <a href="brokercompany/create" class="btn btn-primary">Create New</a>
               <br />
               <br />
               <br/>
                 <!-- ///  Table  starts ///  -->
               <table class="table table-bordered table-striped table-hover">
                 <!-- ///  Table  Headings ///  -->
                 <thead >
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

                 <!-- ///  End of Table  Headings ///  -->

                  <!-- ///  Table  Data ///  -->

                 <tbody>
                   @foreach($brokerCompanyList as $row)<!--//Fetch Records to show ///-->
                     <tr>
                        <td align="center">{{$row['b_company_id']}}</td>
                        <td align="center">{{$row['b_company_name']}}</td>
                        <td align="center">{{$row['b_avg_feedback_day']}}</td>
                        <td align="center">{{$row['b_company_email']}}</td>
                        <td align="center">{{$row['b_company_address']}}</td>
                        <td align="center">{{$row['b_company_pin']}}</td>
                        <td align="center">{{$row['b_company_city']}}</td>
                        <td align="center">{{$row['b_company_state']}}</td>
                        <td align="center">{{$row['b_company_country']}}</td>
                        <td align="center">{{$row['b_company_GSTIN']}}</td>
                        <td align="center"><a href="{{action('BrokercompanyController@edit',$row['b_company_id'])}}" class="btn btn-success">Edit</a></td>
                        <td>
                           {{ Form::open(['route' => ['Del.route', $row['b_company_id']], 'method' => 'delete']) }}
                           <button type="submit" class="btn btn-danger">Delete</button>
                           {{ Form::close() }}
                        </td>
                    </tr>
                    @endforeach
                 </tbody>
                 <!-- ///  Table  Data ///  -->
              </table> 
              <!-- End of Table -->
             </div>
           </div>
         </div>
    </div>
</div>
@endsection