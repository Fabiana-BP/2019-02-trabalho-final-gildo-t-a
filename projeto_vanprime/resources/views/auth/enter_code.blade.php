@extends('layouts.app')

@section('content')
<div class="container len1">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="/verificacodigo">
                        @csrf

                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Código') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control @error('email') is-invalid @enderror" name="code" autofocus>

                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2">
                              <input class="form-control" type="submit" value="Verificar">
                            </div>
                        </div>
                    </div>
              </div>
        </div>
    </div>
</div>
@endsection
