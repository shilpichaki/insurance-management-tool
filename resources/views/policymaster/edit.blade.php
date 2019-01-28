@extends('layouts.app')

@section('content')


<form action="{{route('policymaster.update')}}" method="post" class="form-horizontal" >
    {{csrf_field()}}
    <div class="panel panel-default">
        <div class="panel-heading"><b>Create New Policy</b></div>

        <input type="hidden"  name='_method' value="PUT">
        <input type="hidden"  name='policy_id' value="{{$id}}">

        <!-- // Form Body // -->

        <div class="panel-body">
            <div class="form-group">
                    <label for="policy_no" class="col-md-4 control-label">Policy No</label>
                    <div class="col-md-6">
                        <input type="text"  name="policy_no" autocomplete="off" class="form-control" id="policy_no" placeholder="Policy No" value = "{{$policyMaster->policy_no}}">
                    </div>
            </div>

            <div class="form-group">
                    <label for="policy_name" class="col-md-4 control-label">Policy Name</label>
                    <div class="col-md-6">
                        <input type="text" name="policy_name" autocomplete="off" class="form-control" id="policy_name" placeholder="Policy Name" value = "{{$policyMaster->policy_name}}">
                    </div>
            </div>

            <div class="form-group{{ $errors->has('m_company_id') ? ' has-error' : '' }}">
                <label for="m_company_id" class="col-md-4 control-label">Mother Company</label>
        
                <div class="col-md-6">
        
                    <select id="m_company_id" class="form-control" name="m_company_id" autofocus>
                        <option value = "">-Please Select One-</option>
                    @foreach ($mothercompanylist as $mothercompany)
                        @if ($mothercompany->m_company_id == $policyMaster->m_company_id)
                            <option value="{{ $mothercompany->m_company_id }}" selected>{{ $mothercompany->m_company_name }}</option>
                        @else
                            <option value="{{ $mothercompany->m_company_id }}">{{ $mothercompany->m_company_name }}</option>
                        @endif
                    @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                    <label for="plan_mode" class="col-md-4 control-label">Plan Mode</label>
                    <div class="col-md-6">
                        <input type="text" autocomplete="off" name="plan_mode" class="form-control" id="plan_mode" placeholder="Yearly/Half-Yearly/etc.." value = "{{$policyMaster->plan_mode}}">
                    </div>
            </div>

            <div class="form-group">
                    <label for="premium_time" class="col-md-4 control-label">Premium Time</label>
                    <div class="col-md-6">
                        <input type="text"  name="premium_time" autocomplete="off" class="form-control" id="premium_time" placeholder="Premium Time" value = "{{$policyMaster->premium_time}}">
                    </div>
            </div>

            <div class="form-group">
                    <label for="maturity_time" class="col-md-4 control-label">Maturity Time</label>
                    <div class="col-md-6">
                        <input type="text"  name="maturity_time"autocomplete="off" class="form-control" id="maturity_time" placeholder="Maturity Time" value = "{{$policyMaster->maturity_time}}">
                    </div>
            </div>

            <div class="form-group">
                    <label for="amount" class="col-md-4 control-label" >Policy Amount</label>
                    <div class="col-md-6">
                        <input type="text" name="amount" autocomplete="off" class="form-control" id="amount" placeholder="Policy Amount" value = "{{$policyMaster->amount}}">
                    </div>
            </div>

            <div class="form-group">
                    <label for="status" class="col-md-4 control-label" >Policy Issuing Status</label>
                    <div class="col-md-6">
                        <input type="text" name="status" autocomplete="off" class="form-control" id="status" placeholder="Pending/Issued" value = "{{$policyMaster->issuing_status}}">
                    </div>
            </div>

            <!-- //End of Form Body // -->
            <button type="submit" class="btn btn-primary">Update</button>
            <input type="button" class="btn btn-primary" value="Go back" onclick="history.back()">
        </div>
    </div>
</form>
@endsection
