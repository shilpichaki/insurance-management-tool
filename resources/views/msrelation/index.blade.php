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
               <a href="msrelation/create" class="btn btn-primary">Create New</a>
               <br />
               <br />
               <br/>
                 <!-- ///  Table  starts ///  -->
               <table class="table table-bordered table-striped table-hover">
                 <!-- ///  Table  Headings ///  -->
                 <thead >
                    <tr>
                       <th>Mother Company</th>
                       <th>Sub Company</th>
                       <th>Deal %</th>
                       <th>Deal Start Date</th>
                       <th>Deal End Date</th>
                       <th  colspan="2">Action</th>
                   </tr>
                 </thead>

                 <!-- ///  End of Table  Headings ///  -->

                  <!-- ///  Table  Data ///  -->

                 <tbody>
                   @foreach($motherSubCompanyRelation as $relation)<!--//Fetch Records to show ///-->
                     <tr>
                        <td align="center">{{$relation->motherCompany->m_company_name}}</td>
                        <td align="center">{{$relation->subCompany->s_company_name}}</td>
                        <td align="center">{{$relation['deal_percentage']}}</td>
                        <td align="center">{{$relation['percent_created_at']}}</td>
                        <td align="center">{{$relation['percent_updated_at']}}</td>
                        <td align="center"><a href="{{action('MothersubcompanyrelationsController@edit',$relation['company_relation_id'])}}" class="btn btn-success">Edit</a></td>
                        
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