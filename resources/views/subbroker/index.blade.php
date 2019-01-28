@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in
                    <br>
                             <br>
                             <br>
                             <br>                 

                    <!-- ///  Table  starts ///  -->
                    <div class="card">
                                <table class="table table-bordered my_table" border="1">
                                    <!-- ///  Table  Headings ///  -->
                                    <thead >
                                        <tr class="tell_index">
                                            <th>Sub Broker Name</th>
                                            <th>Policy No.</th>
                                            <th>Policy Holder Name</th>
                                            <th>Policy Name</th>
                                            <th>Policy Amount</th>
                                            <th>Issuing Status</th>
                                        
                                            <!-- <th colspan="2">Action</th> -->
                                        </tr>
                                    </thead>
                                    <!-- ///  End of Table  Headings ///  -->

                                    <!-- ///  Table  Data ///  -->

                                    <tbody>
                                    
                                        <!-- dd($policy); -->
                                        @foreach($policy as $row)
                                        <tr class="tell_index">
                                            <td align="center">{{ $name }}</td>
                                            <td align="center">{{ $row->policy_no }}</td>
                                            <td align="center">{{ $row->policy_holder_name }}</td>
                                            <td align="center">{{ $row->policy_name }}</td>
                                            <td align="center">{{ $row->amount }}</td>
                                            <td align="center">{{ $row->issuing_status }}</td>
                                        
                                            <!-- <td align="center"><a href="{{action('PolicyController@edit',$row['id'])}}" class="btn btn-success">Edit</a></td>  -->
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <!-- ///  Table  Data ///  -->
                                </table>
                            </div>
                            <!-- End of Table -->  
                             <br>
                             <br>
                             <br>
                             <br>           
                            <!-- ///  Table  starts ///  -->
                            <div class="card">
                                <table class="table table-bordered my_table" border="1">
                                    <!-- ///  Table  Headings ///  -->
                                    <thead >
                                        <tr class="tell_index">
                                            <th>Joinee Name(s)</th>
                                            <th>Policy No.</th>
                                            <th>Policy Holder Name</th>
                                            <th>Policy Name</th>
                                            <th>Policy Amount</th>
                                            <th>Issuing Status</th>
                                        </tr>
                                    </thead>  
                                    <!-- ///  End of Table  Headings ///  --> 
                                    <!-- ///  Table  Data ///  -->

                                    <tbody>
                                    
                                        <!-- dd($policy); -->
                                        @foreach($sub_brokers as $sub_broker)
                                        @foreach($sub_broker->policies as $policy)
                                        <tr class="tell_index">
                                        
                                            <td align="center">{{ $sub_broker->emp_first_name }}</td>
                                            
                                            <td align="center">{{ $policy->policy_no }}</td>
                                            <td align="center">{{ $policy->policy_holder_name}}</td>
                                            <td align="center">{{ $policy->policy_name }}</td>
                                            <td align="center">{{ $policy->amount }}</td>
                                            <td align="center">{{ $policy->issuing_status }}</td>
                                            
                                           
                                            
                                        </tr>
                                        @endforeach
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
