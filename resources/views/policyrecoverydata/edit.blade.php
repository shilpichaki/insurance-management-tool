@extends('layouts.app')

@section('style')
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/paymentreceived_index.css') }}"> --}}
@endsection

@section('content')
    <div class="cotainer">
        <form class="form-horizontal" method="POST" action="{{ route('policyrecoverydata.store') }}">

            {{ csrf_field() }}
            <input name="_method" type="hidden" value="put">
            <input name="recovery_id" type="hidden" value="{{$id}}">
            {{-- <input type="hidden" name="order_id" value = "{{$orderid}}"> --}}
            <div class="form-group{{ $errors->has('order_id') ? ' has-error' : '' }}">
                <label for="order_id" class="col-md-4 control-label">Select Order</label>

                <div class="col-md-6">
                    
                    <select id="order_id" class="form-control" name="order_id" autofocus>
                        <option value = "">-Please Select One-</option>
                        @foreach($orderData as $data)
                            @if($data->order_id == $recoveryData->order_id)
                                <option value = "{{$data->order_id}}" selected>{{$data->application_no}}</option>
                                <?php continue;?>
                            @endif
                            <option value = "{{$data->order_id}}">{{$data->application_no}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('order_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('order_id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('recovery_date') ? ' has-error' : '' }}">
                <label for="recovery_date" class="col-md-4 control-label">Recovery Date</label>

                <div class="col-md-6">
                    <input id="recovery_date" type="date" class="form-control" name="recovery_date" value="{{ App\Util::htmlDateConverter($recoveryData->recovery_date) }}" autofocus>

                    @if ($errors->has('recovery_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('recovery_date') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('payment_mode') ? ' has-error' : '' }}">
                <label for="payment_mode" class="col-md-4 control-label">Payment Mode</label>

                <div class="col-md-6">
                    
                    <select id="payment_mode" class="form-control" name="payment_mode" autofocus>
                            <option value = "" @if($recoveryData->payment_mode == "") selected @endif>-Please Select One-</option>
                            <option value = "cheque" @if($recoveryData->payment_mode == "cheque") selected @endif>Cheque</option>
                            <option value = "dd" @if($recoveryData->payment_mode == "dd") selected @endif>Demand Draft</option>
                            <option value = "cash" @if($recoveryData->payment_mode == "cash") selected @endif>Cash</option>
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
                    <input id="instrument_no" type="text" class="form-control" name="instrument_no" value="{{ $recoveryData->instrument_no }}" autofocus>

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
                    <input id="instrument_date" type="date" class="form-control" name="instrument_date" value="{{ App\Util::htmlDateConverter($recoveryData->instrument_date) }}" autofocus>

                    @if ($errors->has('instrument_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('instrument_date') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        
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
@endsection