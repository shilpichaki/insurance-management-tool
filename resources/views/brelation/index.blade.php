@extends('layouts.app')

@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="panel panel-default">
          <div class="panel-heading"><b>Broker Company Relation Details</b></div>
          <div class="panel-body">
             @if($message = Session::get('success'))
                <div class="alert alert-success">
                   <p>{{$message}}</p>
               </div>
             @endif
            <div>
               <a href="brelation/create" class="btn btn-primary">Create New</a>
               <br />
               <br />
               <br/>
                 <!-- ///  Table  starts ///  -->
                 <div>
               <table class="table table-bordered my_table" border="1">
                 <!-- ///  Table  Headings ///  -->
                 <thead >
                    <tr class="tell_index">
                       <th>Broker Company</th>
                       <th>Deal %</th>
                       <th>Deal Start Date</th>
                       <th>Deal End Date</th>
                       <th  colspan="2">Action</th>
                   </tr>
                 </thead>

                 <!-- ///  End of Table  Headings ///  -->

                  <!-- ///  Table  Data ///  -->

                 <tbody>
                   @foreach($brokerCompanyRelation as $relation)<!--//Fetch Records to show ///-->
                     <tr class="tell_index">
                        <td align="center">{{$relation->brokerCompany['b_company_name']}}</td>
                        <td align="center">{{$relation['deal_percentage']}}</td>
                        <td align="center">{{date("d/m/Y",strtotime($relation['percent_created_at']))}}</td>
                        <td align="center">
							@if($relation['percent_updated_at']!= "")
								{{date("d/m/Y",strtotime($relation['percent_updated_at']))}}
							@else
								{{"Deal has not been updated yet"}}
							@endif
						</td>
                        <td align="center"><a href="{{action('BrokercompanyrelationsController@edit',$relation['company_relation_id'])}}" class="btn btn-success">Edit</a></td>
                        
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