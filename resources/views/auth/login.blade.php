@extends('layouts.applte')

@section('content')
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group has-feedback">
        <input id="email" type="text" class="form-control{{ $errors->has('Email') ? ' is-invalid' : '' }}" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autofocus>
        <span class="fa fa-envelope form-control-feedback"></span>
        @if ($errors->has('Email'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    
    <div class="form-group has-feedback">
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value="123456" name="password" placeholder="{{ __('Password') }}" required>
        <span class="fa fa-lock form-control-feedback"></span>
        @if ($errors->has('password'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
    
    <div class="form-group row">
        <div class="col-xs-8">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 
                    {{ __('Remember Me') }} 
                </label>
            </div>
        </div>
        <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">
                {{ __('Login') }}
            </button>            
        </div>        
    </div>
    <a class="btn btn-link center-block" href="{{ route('password.request') }}">
        {{ __('Forgot Your Password?') }}
    </a>
</form>
@endsection
