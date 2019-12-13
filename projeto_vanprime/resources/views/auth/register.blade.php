@extends('layouts.app')

@section('content')
<div class="container len1">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('cadastro.store') }}">
                        @csrf
                        <div class="form-group row">
                          <label for="client" class="col-md-4 col-form-label text-md-right" >{{ __('Perfil Pessoal') }}</label>
                          <div class="col-md-1">
                            <input class="form-check-input" type="radio" value="client" id="client" checked name="user_role" >
                          </div>

                          <label for="company" class=" col-md-4 col-form-label text-md-right">{{ __('Perfil Corporativo') }}</label>
                          <div class="col-md-1">
                            <input type="radio" id="company" name="user_role" value="company" class="form-check-input">
                          </div>
                        </div>

                        <div class="form-group row">
                            <label id="label1" for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                                value="{{ old('username') }}" required autocomplete="username" autofocus oninput="validateRegisterUser('username','label1')">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label id="label2" for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                                onchange="validateRegisterUser('name','label2')" required autocomplete="name" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label id="label3" for="cpf" class="col-md-4 col-form-label text-md-right">{{ __('CPF') }}</label>

                            <div class="col-md-6">
                                <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf"
                                value="{{ old('cpf') }}" required autocomplete="cpf" autofocus onchange="validateRegisterUser('cpf','label3')">

                                @error('cpf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label id="label4" for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" onchange="validateRegisterUser('email','label4')">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label id="label5" for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Celular') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                                value="{{ old('phone') }}" required autocomplete="phone" autofocus onchange="validateRegisterUser('phone','label5')">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-md-6">
                            <input type="hidden" name="image_user" id="image_user">
                          </div>
                        </div>

                        <div class="form-group row">
                            <label id="label6" for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                            <div  class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                onchange="validateRegisterUser('password','label6')" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
