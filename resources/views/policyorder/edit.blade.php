@extends('layouts.app')

@section('content')

<div class="cotainer">
    <form class="form-horizontal" method="POST" action="{{ route('policyorder.store') }}">

        {{ csrf_field() }}
        <input name="_method" type="hidden" value="put">
        <input name="order_id" type="hidden" value="{{$id}}">
<!--Starting of the form-->

        <div class="form-group{{ $errors->has('order_date') ? ' has-error' : '' }}">
            <label for="order_date" class="col-md-4 control-label">Order Date</label>

            <div class="col-md-6">
                <input id="order_date" type="date" class="form-control" name="order_date" value="{{ date("Y-m-d",strtotime($policyOrder->order_date)) }}" autofocus>

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
                <input id="application_no" type="text" class="form-control" name="application_no" value="{{ $policyOrder->application_no }}" autofocus>

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
                <input id="customer_id" type="text" class="form-control" name="customer_id" value="{{ $policyOrder->customer_id }}" autofocus>

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
                    <option value = "" @if($policyOrder->case_taker_type == "") selected @endif>-Please Select One-</option>
                    <option value = "direct" @if($policyOrder->case_taker_type == "direct") selected @endif>Employee</option>
                    <option value = "indirect" @if($policyOrder->case_taker_type == "indirect") selected @endif>Broker Company</option>
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
                <input id="d_case_taker_id" type="text" class="form-control" name="d_case_taker_id" value="{{ $policyOrder->d_case_taker_id }}" autofocus>

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
                    @if ($brokercompany->b_company_id == $policyOrder->i_case_taker_id)
                        <option value="{{ $brokercompany->b_company_id }}" selected>{{ $brokercompany->b_company_name }}</option>
                    @else
                        <option value="{{ $brokercompany->b_company_id }}">{{ $brokercompany->b_company_name }}</option>
                    @endif
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
                    @if($policy->policy_id == $policyOrder->policy_id)
                        <option value="{{ $policy->policy_id }}" selected>{{ $policy->policy_name }}</option>
                        <?php continue;?>
                    @endif
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
                <input id="amount" type="text" class="form-control" name="amount" value="{{ $policyOrder->amount }}" autofocus>

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
                    <option value = "" @if($policyOrder->payment_mode == "") selected @endif>-Please Select One-</option>
                    <option value = "cheque" @if($policyOrder->payment_mode == "cheque") selected @endif>Cheque</option>
                    <option value = "dd" @if($policyOrder->payment_mode == "dd") selected @endif>Demand Draft</option>
                    <option value = "cash" @if($policyOrder->payment_mode == "cash") selected @endif>Cash</option>
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
                <input id="instrument_no" type="text" class="form-control" name="instrument_no" value="{{ $policyOrder->instrument_no }}" autofocus>

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
                <input id="instrument_date" type="date" class="form-control" name="instrument_date" value="{{ date("Y-m-d",strtotime($policyOrder->instrument_date)) }}" autofocus>

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
                <input id="nominee_name" type="text" class="form-control" name="nominee_name" value="{{ $policyOrder->nominee_name }}" autofocus>

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
                <input id="nominee_dob" type="date" class="form-control" name="nominee_dob" value="{{ date("Y-m-d",strtotime($policyOrder->nominee_dob)) }}" autofocus>

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
                    @if($relation->relation_code == $policyOrder->nominee_relation_id)
                        <option value="{{ $relation->relation_code }}" selected>{{ $relation->relation_name }}</option>
                        <?php continue;?>
                    @endif
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
                    @if($policyOrder->handover_to_company_type == "mother")
                        <option value = "mother" selected>Mother Company</option>
                        <option value = "sub">Sub Company</option>
                    @elseif($policyOrder->handover_to_company_type == "sub")
                        <option value = "mother">Mother Company</option>
                        <option value = "sub" selected>Sub Company</option>
                    @endif
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
                    @if ($mothercompany->m_company_id == $policyOrder->handover_to_mother_company_id)
                        <option value="{{ $mothercompany->m_company_id }}" selected>{{ $mothercompany->m_company_name }}</option>
                    @else
                        <option value="{{ $mothercompany->m_company_id }}">{{ $mothercompany->m_company_name }}</option>
                    @endif
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
                    @if ($subcompany->s_company_id == $policyOrder->handover_to_sub_company_id)
                        <option value="{{ $subcompany->s_company_id }}" selected>{{ $subcompany->s_company_name }}</option>
                    @else
                        <option value="{{ $subcompany->s_company_id }}">{{ $subcompany->s_company_name }}</option>
                    @endif
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
                <input id="handover_date" type="date" class="form-control" name="handover_date" value="{{ date("Y-m-d",strtotime($policyOrder->handover_date)) }}" autofocus>

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
                    @if($policyOrder->plvc == 0)
                        <option value = "0" selected>Active</option>
                        <option value = "1">Inactive</option>
                    @else
                        <option value = "0">Active</option>
                        <option value = "1" selected>Inactive</option>
                    @endif
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
                    @if($status->policy_status_id == $policyOrder->policy_status_id)
                        <option value="{{ $status->policy_status_id }}" selected>{{ $status->policy_status_name }}</option>
                        <?php continue;?>
                    @endif
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
                    @if($orderStatus->order_payment_status_id == $policyOrder->order_payment_status_id)
                        <option value="{{ $orderStatus->order_payment_status_id }}" selected>{{ $orderStatus->order_payment_status_name }}</option>
                        <?php continue;?>
                    @endif
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
                    @if($policyOrder->recovered == 0)
                        <option value = "0" selected>No</option>
                        <option value = "1">Yes</option>
                    @else
                        <option value = "0">No</option>
                        <option value = "1" selected>Yes</option>
                    @endif
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
                <input id="issuence_date" type="date" class="form-control" name="issuence_date" value="{{ date("Y-m-d",strtotime($policyOrder->issuence_date)) }}" autofocus>

                @if ($errors->has('issuence_date'))
                    <span class="help-block">
                        <strong>{{ $errors->first('issuence_date') }}</strong>
                    </span>
                @endif
            </div>
        </div>
<!--Form will end in here-->    
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