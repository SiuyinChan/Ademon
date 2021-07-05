@extends('layouts.app')

@section('content')
<div class="auth-block">
  <p class="title"> {{ __('Register') }}</p>
      
    <form method="POST" action="{{ route('register') }}">
        @csrf
        
        <label for="name">{{ __('Name') }}</label>                 
            <input id="name" type="text"  name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

             @error('name')
                 <span class="alert" role="alert">
                     <strong>{{ $message }}</strong><br>
                 </span>
             @enderror
    
        <label for="name">{{ __('Nickname') }}</label>               
            <input id="name" type="text" name="nickname" value="{{ old('nickname') }}" required autocomplete="nickname" autofocus>

            @error('nickname')
                <span class="alert" role="alert">
                    <strong>{{ $message }}</strong><br>
                </span>
            @enderror
     

        <label for="name">{{ __('Phone number') }}</label>                  
            <input id="name" type="text" name="phone" value="{{ old('phone') }}" required autocomplete="nickname" autofocus>

            @error('phone')
                <span class="alert" role="alert">
                    <strong>{{ $message }}</strong><br>
                </span>
            @enderror         

        <label for="email">{{ __('E-Mail Address') }}</label>               
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="alert" role="alert">
                    <strong>{{ $message }}</strong><br>
                </span>
            @enderror
      

        <label for="password">{{ __('Password') }}</label>                
            <input id="password" type="password"  name="password" required autocomplete="new-password">

            @error('password')
                <span class="alert" role="alert">
                    <strong>{{ $message }}</strong><br>
                </span>
            @enderror
       

        <label for="password-confirm">{{ __('Confirm Password') }}</label>                  
            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">             

    
        <button type="submit" class="btn btn-primary">
            {{ __('Register') }}
        </button>
</div>
@endsection
