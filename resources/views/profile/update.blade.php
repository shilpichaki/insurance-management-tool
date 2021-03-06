@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Profile Update</div>
                
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('paymentreceive.update') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('emp_id') ? ' has-error' : '' }}">
                            <label for="emp_id" class="col-md-4 control-label">Employee ID</label>

                            <div class="col-md-6">
                                <input id="emp_id" type="text" class="form-control" name="emp_id" value = {{$currentUser->empid}} readonly>

                                @if ($errors->has('emp_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('emp_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('emp_first_name') ? ' has-error' : '' }}">
                            <label for="emp_first_name" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="emp_first_name" type="text" class="form-control" name="emp_first_name" value="{{ $currentUser->employee->emp_first_name }}" required autofocus>

                                @if ($errors->has('emp_first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('emp_first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('emp_middle_name') ? ' has-error' : '' }}">
                            <label for="emp_middle_name" class="col-md-4 control-label">Middle Name</label>

                            <div class="col-md-6">
                                <input id="emp_middle_name" type="text" class="form-control" name="emp_middle_name" value="{{ $currentUser->employee->emp_middle_name }}" autofocus>

                                @if ($errors->has('emp_middle_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('emp_middle_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('emp_last_name') ? ' has-error' : '' }}">
                            <label for="emp_last_name" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="emp_last_name" type="text" class="form-control" name="emp_last_name" value="{{ $currentUser->employee->emp_last_name }}" autofocus>

                                @if ($errors->has('emp_last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('emp_last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('emp_dob') ? ' has-error' : '' }}">
                            <label for="emp_dob" class="col-md-4 control-label">DOB</label>

                            <div class="col-md-6">
                                <input id="emp_dob" type="date" class="form-control" name="emp_dob" value="{{ App\Util::htmlDateConverter($currentUser->employee->emp_dob) }}" required autofocus>

                                @if ($errors->has('emp_dob'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('emp_dob') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('emp_email') ? ' has-error' : '' }}">
                            <label for="emp_email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="emp_email" type="email" class="form-control" name="emp_email" value="{{ $currentUser->email }}" required>

                                @if ($errors->has('emp_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('emp_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('emp_phno') ? ' has-error' : '' }}">
                            <label for="emp_phno" class="col-md-4 control-label">Phno</label>

                            <div class="col-md-6">
                                <input id="emp_phno" type="text" class="form-control" name="emp_phno" value="{{ $currentUser->employee->emp_phno }}" required autofocus>

                                @if ($errors->has('emp_phno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('emp_phno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
