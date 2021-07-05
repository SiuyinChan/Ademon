@extends('layouts.app')

@section('content')

<div class="auth-block">
    <p class="title">{{ __('Login') }}</p>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        
            <label for="email">{{ __('E-Mail Address') }}</label><br>
            
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus><br>

                @error('email')
                    <span role="alert" class="alert">
                        <strong>{{ $message }}</strong><br>
                    </span>
                @enderror
        

       
            <label for="password">{{ __('Password') }}</label><br>
            
                <input id="password" type="password" name="password" required autocomplete="current-password"><br>
                @error('password')
                    <span role="alert" class="alert">
                        <strong>{{ $message }}</strong><br>
                    </span>
                @enderror        

      
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label  for="remember">
                        {{ __('Remember Me') }}<br>
                    </label> 


                <button type="submit">
                    {{ __('Login') }}
                </button><br>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
         
    </form>
</div>

@endsection
