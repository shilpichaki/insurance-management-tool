@extends('layouts.app')

@section('content')

     <form action="{{ action('BrokercompanyController@store') }}" method="post" class="form-horizontal" >
         <h2>Enter Data</h2>
          <div class="form-group">
          {{ csrf_field() }}
           <input type="text" name="company_id" placeholder="company_id"><br/>
           <input type="text" name="company_name" placeholder="company_name"><br/>
           <input type="text" name="feedback_day" placeholder="feedback"><br/>
           <input type="text" name="company_email" placeholder="company_email"><br/>
           <input type="text" name="company_address" placeholder="company_address"><br/>
           <input type="text" name="company_pin" placeholder="company_pin"><br/>
           <input type="text" name="company_city" placeholder="company_city"><br/>
           <input type="text" name="company_state" placeholder="company_state"><br/>
           <input type="text" name="company_country" placeholder="company_country"><br/>
           <input type="text" name="company_gstinno" placeholder="company_gstinno"><br/>
           <input class="btn btn-primary" type="submit" value="Submit">
        
         </div>
     </form>
@endsection