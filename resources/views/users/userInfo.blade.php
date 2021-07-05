@extends('layouts.app')

@section('content')

<div class='dashboard container'>

<ul class="menu">
    <li><img src="/icons/icon-user.svg" alt=""><a href="/user-information">My information</a></li>
    <li><img src="/icons/icon-ad.svg" alt=""> <a href="/user-ads">My ads</a></li>
</ul>


    <div class="userInfo">
    
        <form class="userInformation" method="POST" action="/user-information">
            @csrf
            
            <label for="name">My name</label>
            <input type="text" value="{{ $user->name }}" name="name">
            
            <label for="nickname">My nickname</label>
            <input type="text" value="{{ $user->nickname }}" name="nickname">
            
            <label for="phone">My phone number</label>
            <input type="text" value="{{ $user->phone }}" name="phone">
            
            <label for="email">My email</label>
            <input type="text" value="{{ $user->email }}" name="email">
            
            <!-- <label for="address">Your address</label>
                <input type="text" value="{{ $user->address }}" name="address"> -->
                
                <button type="submit">Save</button>
                
            </form>
            
            <form class="userInformation" method="POST" action="/destroy-info">
                @csrf
                
                <button class="delete" type="submit">Delete my account</button>
                
            </form>
    </div>
</div>

@endsection