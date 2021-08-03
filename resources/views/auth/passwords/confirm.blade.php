@extends('layouts.app')

@section('content')
<div class="container">
    {{ __('Please confirm your password before continuing.') }}

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-0 mt-2">
            <button type="submit" class="btn btn-warning col-4 mx-auto">
                {{ __('パスワード変更') }}
            </button>
        </div>
        <div class="form-group row mb-0 mt-2">
            @if (Route::has('password.request'))
                <a class="btn btn-link mt-2 col-6 mx-auto" href="{{ route('password.request') }}">
                    {{ __('パスワードを忘れた') }}
                </a>
            @endif
        </div>
    </form>
</div>
@endsection
