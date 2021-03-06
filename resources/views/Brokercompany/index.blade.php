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
                 <div class = "card">
               <table class="table table-bordered my_table" border="1">
                 <!-- ///  Table  Headings ///  -->
                 <thead >
                    <tr class="tell_index">
                       <th>Name</th>
                       <th>Email</th>
                       <th>Address</th>
                       <th>PIN</th>
                       <th>City</th>
                       <th>State</th>
                       <th>Country</th>
                       <th>GSTIN</th>
                       <th  colspan="2">Action</th>
                   </tr>
                 </thead>

                 <!-- ///  End of Table  Headings ///  -->

                  <!-- ///  Table  Data ///  -->

                 <tbody>
                   @foreach($brokerCompanyList as $row)<!--//Fetch Records to show ///-->
                     <tr class="tell_index">
                        <td align="center">{{$row['b_company_name']}}</td>
                        <td align="center">{{$row['b_company_email']}}</td>
                        <td align="center">{{$row['b_company_address']}}</td>
                        <td align="center">{{$row['b_company_pin']}}</td>
                        <td align="center">{{$row['b_company_city']}}</td>
                        <td align="center">{{$row->state['state_name']}}</td>
                        <td align="center">{{$row->country['country_name']}}</td>
                        <td align="center">{{$row['b_company_GSTIN']}}</td>
                        <td align="center"><a href="{{action('BrokercompanyController@edit',$row['b_company_id'])}}" class="btn btn-success">Edit</a></td>
                        {{-- <td>
                           {{ Form::open(['route' => ['Del.route', $row['b_company_id']], 'method' => 'delete']) }}
                           <button type="submit" class="btn btn-danger">Delete</button>
                           {{ Form::close() }}
                        </td> --}}
                    </tr>
                    @endforeach
                 </tbody>
                 <!-- ///  Table  Data ///  -->
              </table> 
            </div>
              <!-- End of Table -->
             </div>
           </div>
         </div>
    </div>
</div>
@endsection