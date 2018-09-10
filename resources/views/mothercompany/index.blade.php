@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading"><b>Mother Company Details</b></div>
		<div class="panel-body">
			@if($message = Session::get('success'))
				<div class="alert alert-success">
				<p>{{$message}}</p>
			</div>
			@endif
			<div>
			<a href="mothercompany/create" class="btn btn-primary">Create New</a>
			<br />
			<br />
			<br/>
				<!-- ///  Table  starts ///  -->
			<div class="card">	
			<table class="table table-bordered my_table" border="1">
				<!-- ///  Table  Headings ///  -->
				<thead >
					<tr class="tell_index">
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
				@foreach($motherCompanyList as $row)<!--//Fetch Records to show ///-->
					<tr class="tell_index">
						<td align="center">{{$row['m_company_id']}}</td>
						<td align="center">{{$row['m_company_name']}}</td>
						<td align="center">{{$row['m_avg_feedback_day']}}</td>
						<td align="center">{{$row['m_company_email']}}</td>
						<td align="center">{{$row['m_company_address']}}</td>
						<td align="center">{{$row['m_company_pin']}}</td>
						<td align="center">{{$row['m_company_city']}}</td>
						<td align="center">{{$row['m_company_state']}}</td>
						<td align="center">{{$row['m_company_country']}}</td>
						<td align="center">{{$row['m_company_GSTIN']}}</td>
						<td align="center"><a href="{{action('MothercompanyController@edit',$row['m_company_id'])}}" class="btn btn-success">Edit</a></td>
						<td>
							<form action="{{action('MothercompanyController@destroy',$row['m_company_id'])}}" method="post">
							{{csrf_field()}}
							<input name="_method" type="hidden" value="DELETE">
							<button class="btn btn-danger" type="submit">Delete</button>
							</form>
						</td>
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