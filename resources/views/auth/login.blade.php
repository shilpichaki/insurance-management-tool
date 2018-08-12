@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="css/styles.css">
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div _ngcontent-c3="" class="login_form"><a _ngcontent-c3="" href=""><img _ngcontent-c3="" rcdk="" alt="" src="logo.jpg"></a><h3 _ngcontent-c3="">Login</h3>
                <form class="ng-pristine ng-invalid ng-touched" method="POST" action="{{ route('login') }}">
                    
                    {{ csrf_field() }}
                    
                    <div _ngcontent-c3="" class="form-group">
                        <input _ngcontent-c3="" class="form-control ng-pristine ng-invalid ng-touched" name="email" ngmodel="" placeholder="Email" required="" type="text" ng-reflect-required="" ng-reflect-name="email" ng-reflect-model="">
                    </div>
                    <div _ngcontent-c3="" class="form-group">
                        <input _ngcontent-c3="" class="form-control ng-untouched ng-pristine ng-invalid" name="password" ngmodel="" placeholder="Password" required="" type="password" ng-reflect-required="" ng-reflect-name="password" ng-reflect-model="">
                    </div>
                    <div _ngcontent-c3="" class="form-group">
                        <button _ngcontent-c3="" class="btn btn-success">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
