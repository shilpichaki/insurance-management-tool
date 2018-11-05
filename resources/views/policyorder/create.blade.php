@extends('layouts.app')

@section('content')

<div class="cotainer">
    <form class="form-horizontal" method="POST" action="{{ route('policyorder.store') }}">

        {{ csrf_field() }}
    
        {{-- <div class="form-group{{ $errors->has('s_company_id') ? ' has-error' : '' }}">
            <label for="s_company_id" class="col-md-4 control-label">Sub Company</label>

            <div class="col-md-6">

                <select id="s_company_id" class="form-control" name="s_company_id" autofocus>
                    <option value = "">-Please Select One-</option>
                @foreach ($subcompanylist as $subcompany)
                    <option value="{{ $subcompany->s_company_id }}">{{ $subcompany->s_company_name }}</option>
                @endforeach
                </select>
            </div>
        </div> --}}

<!--Starting of the form-->
        {{-- <div class="form-group{{ $errors->has('order_id') ? ' has-error' : '' }}">
            <label for="order_id" class="col-md-4 control-label">Order Id</label>

            <div class="col-md-6">
                <input id="order_id" type="text" class="form-control" name="order_id" value="{{ old('order_id') }}" autofocus>

                @if ($errors->has('order_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('order_id') }}</strong>
                    </span>
                @endif
            </div>
        </div> --}}

        <div class="form-group{{ $errors->has('order_date') ? ' has-error' : '' }}">
            <label for="order_date" class="col-md-4 control-label">Order Date</label>

            <div class="col-md-6">
                <input id="order_date" type="date" class="form-control" name="order_date" value="{{ old('order_date') }}" autofocus>

                @if ($errors->has('order_date'))
                    <span class="help-block">
                        <strong>{{ $errors->first('order_date') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('application_no') ? ' has-error' : '' }}">
            <label for="application_no" class="col-md-4 control-label">Application No</label>

            <div class="col-md-6">
                <input id="application_no" type="text" class="form-control" name="application_no" value="{{ old('m_company_id') }}" autofocus>

                @if ($errors->has('application_no'))
                    <span class="help-block">
                        <strong>{{ $errors->first('application_no') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('customer_id') ? ' has-error' : '' }}">
            <label for="customer_id" class="col-md-4 control-label">Customer ID</label>

            <div class="col-md-6">
                <input id="customer_id" type="text" class="form-control" name="customer_id" value="{{ old('customer_id') }}" autofocus>

                @if ($errors->has('customer_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('customer_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('case_taker_type') ? ' has-error' : '' }}">
            <label for="case_taker_type" class="col-md-4 control-label">Case Taker</label>

            <div class="col-md-6">
                <select id="case_taker_type" class="form-control" name="case_taker_type" autofocus>
                    <option value = "">-Please Select One-</option>
                    <option value = "direct">Employee</option>
                    <option value = "indirect">Broker Company</option>
                </select>
                @if ($errors->has('case_taker_type'))
                    <span class="help-block">
                        <strong>{{ $errors->first('case_taker_type') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('d_case_taker_id') ? ' has-error' : '' }}">
            <label for="d_case_taker_id" class="col-md-4 control-label">Employee ID</label>

            <div class="col-md-6">
                <input id="d_case_taker_id" type="text" class="form-control" name="d_case_taker_id" value="{{ old('d_case_taker_id') }}" autofocus>

                @if ($errors->has('d_case_taker_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('d_case_taker_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('i_case_taker_id') ? ' has-error' : '' }}">
            <label for="i_case_taker_id" class="col-md-4 control-label">Broker Company ID</label>

            <div class="col-md-6">
                <select id="i_case_taker_id" class="form-control" name="i_case_taker_id" autofocus>
                    <option value = "">-Please Select One-</option>
                @foreach ($brokercompanylist as $brokercompany)
                    <option value="{{ $brokercompany->b_company_id }}">{{ $brokercompany->b_company_name }}</option>
                @endforeach
                </select>
                @if ($errors->has('i_case_taker_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('i_case_taker_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('policy_id') ? ' has-error' : '' }}">
            <label for="policy_id" class="col-md-4 control-label">Policy ID</label>

            <div class="col-md-6">
                <select id="policy_id" class="form-control" name="policy_id" autofocus>
                    <option value = "">-Please Select One-</option>
                @foreach ($policyMaster as $policy)
                    <option value="{{ $policy->policy_id }}">{{ $policy->policy_name }}</option>
                @endforeach
                </select>

                @if ($errors->has('policy_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('policy_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
            <label for="amount" class="col-md-4 control-label">Policy Amount</label>

            <div class="col-md-6">
                <input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') }}" autofocus>

                @if ($errors->has('amount'))
                    <span class="help-block">
                        <strong>{{ $errors->first('amount') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('payment_mode') ? ' has-error' : '' }}">
            <label for="payment_mode" class="col-md-4 control-label">Payment Mode</label>

            <div class="col-md-6">
                
                <select id="payment_mode" class="form-control" name="payment_mode" autofocus>
                    <option value = "">-Please Select One-</option>
                    <option value = "cheque">Cheque</option>
                    <option value = "dd">Demand Draft</option>
                    <option value = "cash">Cash</option>
                </select>
                @if ($errors->has('payment_mode'))
                    <span class="help-block">
                        <strong>{{ $errors->first('payment_mode') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('instrument_no') ? ' has-error' : '' }}">
            <label for="instrument_no" class="col-md-4 control-label">Instrument No</label>

            <div class="col-md-6">
                <input id="instrument_no" type="text" class="form-control" name="instrument_no" value="{{ old('instrument_no') }}" autofocus>

                @if ($errors->has('instrument_no'))
                    <span class="help-block">
                        <strong>{{ $errors->first('instrument_no') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('instrument_date') ? ' has-error' : '' }}">
            <label for="instrument_date" class="col-md-4 control-label">Instrument Date</label>

            <div class="col-md-6">
                <input id="instrument_date" type="date" class="form-control" name="instrument_date" value="{{ old('instrument_date') }}" autofocus>

                @if ($errors->has('instrument_date'))
                    <span class="help-block">
                        <strong>{{ $errors->first('instrument_date') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('nominee_name') ? ' has-error' : '' }}">
            <label for="nominee_name" class="col-md-4 control-label">Nominee Name</label>

            <div class="col-md-6">
                <input id="nominee_name" type="text" class="form-control" name="nominee_name" value="{{ old('nominee_name') }}" autofocus>

                @if ($errors->has('nominee_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nominee_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('nominee_dob') ? ' has-error' : '' }}">
            <label for="nominee_dob" class="col-md-4 control-label">Nominee DOB</label>

            <div class="col-md-6">
                <input id="nominee_dob" type="date" class="form-control" name="nominee_dob" value="{{ old('nominee_dob') }}" autofocus>

                @if ($errors->has('nominee_dob'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nominee_dob') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('nominee_relation_id') ? ' has-error' : '' }}">
            <label for="nominee_relation_id" class="col-md-4 control-label">Nominee Relation</label>

            <div class="col-md-6">
                <select id="nominee_relation_id" class="form-control" name="nominee_relation_id" autofocus>
                    <option value = "">-Please Select One-</option>
                @foreach ($nomineeRelationMaster as $relation)
                    <option value="{{ $relation->relation_code }}">{{ $relation->relation_name }}</option>
                @endforeach
                </select>

                @if ($errors->has('nominee_relation_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nominee_relation_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('handover_to_company_type') ? ' has-error' : '' }}">
            <label for="handover_to_company_type" class="col-md-4 control-label">Handover To Company Type</label>

            <div class="col-md-6">
                
                <select id="handover_to_company_type" class="form-control" name="handover_to_company_type" autofocus>
                    <option value = "">-Please Select One-</option>
                    <option value = "mother">Mother Company</option>
                    <option value = "sub">Sub Company</option>
                </select>
                @if ($errors->has('handover_to_company_type'))
                    <span class="help-block">
                        <strong>{{ $errors->first('handover_to_company_type') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('handover_to_mother_company_id') ? ' has-error' : '' }}">
            <label for="handover_to_mother_company_id" class="col-md-4 control-label">Mother Company Name</label>

            <div class="col-md-6">
                <select id="handover_to_mother_company_id" class="form-control" name="handover_to_mother_company_id" autofocus>
                    <option value = "">-Please Select One-</option>
                @foreach ($mothercompanylist as $mothercompany)
                    <option value="{{ $mothercompany->m_company_id }}">{{ $mothercompany->m_company_name }}</option>
                @endforeach
                </select>

                @if ($errors->has('handover_to_mother_company_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('handover_to_mother_company_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('handover_to_sub_company_id') ? ' has-error' : '' }}">
            <label for="handover_to_sub_company_id" class="col-md-4 control-label">Sub Company Name</label>

            <div class="col-md-6">
                <select id="handover_to_sub_company_id" class="form-control" name="handover_to_sub_company_id" autofocus>
                    <option value = "">-Please Select One-</option>
                @foreach ($subcompanylist as $subcompany)
                    <option value="{{ $subcompany->s_company_id }}">{{ $subcompany->s_company_name }}</option>
                @endforeach
                </select>

                @if ($errors->has('handover_to_sub_company_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('handover_to_sub_company_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('handover_date') ? ' has-error' : '' }}">
            <label for="handover_date" class="col-md-4 control-label">Handover Date</label>

            <div class="col-md-6">
                <input id="handover_date" type="date" class="form-control" name="handover_date" value="{{ old('handover_date') }}" autofocus>

                @if ($errors->has('handover_date'))
                    <span class="help-block">
                        <strong>{{ $errors->first('handover_date') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('plvc') ? ' has-error' : '' }}">
            <label for="plvc" class="col-md-4 control-label">PLVC</label>

            <div class="col-md-6">
                <select id="plvc" class="form-control" name="plvc" autofocus>
                    <option value = "">-Please Select One-</option>
                    <option value = "0">Active</option>
                    <option value = "1">Inacive</option>
                </select>
                @if ($errors->has('handover_date'))
                    <span class="help-block">
                        <strong>{{ $errors->first('handover_date') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('policy_status_id') ? ' has-error' : '' }}">
            <label for="policy_status_id" class="col-md-4 control-label">Policy Status</label>

            <div class="col-md-6">
                <select id="policy_status_id" class="form-control" name="policy_status_id" autofocus>
                    <option value = "">-Please Select One-</option>
                @foreach ($policyStatusMaster as $status)
                    <option value="{{ $status->policy_status_id }}">{{ $status->policy_status_name }}</option>
                @endforeach
                </select>

                @if ($errors->has('policy_status_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('policy_status_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('order_payment_status_id') ? ' has-error' : '' }}">
            <label for="order_payment_status_id" class="col-md-4 control-label">Policy Status</label>

            <div class="col-md-6">
                <select id="order_payment_status_id" class="form-control" name="order_payment_status_id" autofocus>
                    <option value = "">-Please Select One-</option>
                @foreach ($orderPaymentStatus as $orderStatus)
                    <option value="{{ $orderStatus->order_payment_status_id }}">{{ $orderStatus->order_payment_status_name }}</option>
                @endforeach
                </select>

                @if ($errors->has('order_payment_status_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('order_payment_status_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('recovered') ? ' has-error' : '' }}">
            <label for="recovered" class="col-md-4 control-label">Recovered</label>

            <div class="col-md-6">
                <select id="recovered" class="form-control" name="recovered" autofocus>
                    <option value = "">-Please Select One-</option>
                    <option value = "0">No</option>
                    <option value = "1">Yes</option>
                </select>
                @if ($errors->has('recovered'))
                    <span class="help-block">
                        <strong>{{ $errors->first('recovered') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('issuence_date') ? ' has-error' : '' }}">
            <label for="issuence_date" class="col-md-4 control-label">Issuence Date</label>

            <div class="col-md-6">
                <input id="issuence_date" type="date" class="form-control" name="issuence_date" value="{{ old('issuence_date') }}" autofocus>

                @if ($errors->has('issuence_date'))
                    <span class="help-block">
                        <strong>{{ $errors->first('issuence_date') }}</strong>
                    </span>
                @endif
            </div>
        </div>
<!--Form will end in here-->    

        {{-- <div class="form-group{{ $errors->has('m_company_id') ? ' has-error' : '' }}">
            <label for="m_company_id" class="col-md-4 control-label">Mother Company</label>
    
            <div class="col-md-6">
    
                <select id="m_company_id" class="form-control" name="m_company_id" autofocus>
                    <option value = "">-Please Select One-</option>
                @foreach ($mothercompanylist as $mothercompany)
                    <option value="{{ $mothercompany->m_company_id }}">{{ $mothercompany->m_company_name }}</option>
                @endforeach
                </select>
            </div>
        </div>
        
        <div class="form-group{{ $errors->has('deal_percentage') ? ' has-error' : '' }}">
            <label for="deal_percentage" class="col-md-4 control-label">Deal Percent</label>

            <div class="col-md-6">
                <input id="deal_percentage" type="text" class="form-control" name="deal_percentage" value="{{ old('deal_percentage') }}" required autofocus>

                @if ($errors->has('deal_percentage'))
                    <span class="help-block">
                        <strong>{{ $errors->first('deal_percentage') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    
        <div class="form-group{{ $errors->has('percent_created') ? ' has-error' : '' }}">
            <label for="percent_created" class="col-md-4 control-label">Percent Creation Date</label>
    
            <div class="col-md-6">
                <input id="percent_created" type="date" class="form-control" name="percent_created" value="{{ old('percent_created') }}" required autofocus>
            </div>
        </div>
    
        <div class="form-group{{ $errors->has('percent_updated') ? ' has-error' : '' }}">
            <label for="percent_updated" class="col-md-4 control-label">Percent Updation Date</label>
            <div class="col-md-6">
                <input id="percent_updated" type="date" class="form-control" name="percent_updated" value="{{ old('percent_updated') }}" autofocus>
            </div>
        </div> --}}
    
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    submit
                </button>
            </div>
        </div>
    </form>

    <div class = "statement">

    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/policyorder.js') }}"></script>
@endsection