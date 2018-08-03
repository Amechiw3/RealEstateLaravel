@extends('layouts.admin3')

@section('content')
<div class="container">
    
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ __('Register') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="appaterno" class="col-md-4 col-form-label text-md-right">{{ __('Middle Name') }}</label>
                        <div class="col-md-8">
                            <input id="appaterno" type="text" class="form-control{{ $errors->has('appaterno') ? ' is-invalid' : '' }}" name="appaterno" value="{{ old('appaterno') }}" required autofocus>
                            @if ($errors->has('appaterno'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('Appaterno') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="apmaterno" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                        <div class="col-md-8">
                            <input id="apmaterno" type="text" class="form-control{{ $errors->has('apmaterno') ? ' is-invalid' : '' }}" name="apmaterno" value="{{ old('apmaterno') }}" required autofocus>
                            @if ($errors->has('apmaterno'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('Apmaterno') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>
                        <div class="col-md-8">
                            <input id="telefono" type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ old('telefono') }}" required autofocus>
                            @if ($errors->has('telefono'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('Telefono') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="usuario" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
                        <div class="col-md-8">
                            <input id="usuario" type="text" class="form-control{{ $errors->has('usuario') ? ' is-invalid' : '' }}" name="usuario" value="{{ old('usuario') }}" required autofocus>
                            @if ($errors->has('usuario'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('Usuario') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                        <div class="col-md-8">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                        <div class="col-md-8">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                        <div class="col-md-8">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                    <div class="form-group pull-right">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        
</div>
@endsection
