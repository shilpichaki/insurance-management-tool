@extends('layouts.app')

@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="panel panel-default">
          <div class="panel-heading"><b>Policy Master Details</b></div>
          <div class="panel-body">
             @if($message = Session::get('success'))
                <div class="alert alert-success">
                   <p>{{$message}}</p>
               </div>
             @endif
            <div>
               <a href="policy/create" class="btn btn-primary">Create New</a>
               <br />
               <br />
               <br/>
                 <!-- ///  Table  starts ///  -->
                 <div>
               <table class="table table-bordered my_table" border="1">
                 <!-- ///  Table  Headings ///  -->
                 <thead >
                    <tr class="tell_index">
                       <th>Policy No</th>
                       <th>Name</th>
                       <th>Mother Company</th>
                       <th>Plan Mode</th>
                       <th>Premium Time</th>
                       <th>Maturity Time</th>
                       <th>Amount</th>
                       <th>Action</th>
                   </tr>
                 </thead>

                 <!-- ///  End of Table  Headings ///  -->

                  <!-- ///  Table  Data ///  -->

                 <tbody>
                   @foreach($policies as $policy)<!--//Fetch Records to show ///-->
                     <tr class="tell_index">
                        <td align="center">{{$policy['policy_no']}}</td>
                        <td align="center">{{$policy['policy_name']}}</td>
                        <td align="center">{{$policy->motherCompany['m_company_name']}}</td>
                        <td align="center">{{$policy['plan_mode']}}</td>
                        <td align="center">{{$policy['premium_time']}}</td>
                        <td align="center">{{$policy['maturity_time']}}</td>
                        <td align="center">{{$policy['amount']}}</td>
                        
                        <td align="center"><a href="{{action('PolicyController@edit',$policy['policy_id'])}}" class="btn btn-success">Edit</a></td>
                        
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