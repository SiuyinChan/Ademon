@extends('layouts.app')

@section('content') 

    <div class="product-page container">        
        @if(isset($ads))
            @if(count($ads)>0)
                @foreach($ads as $ad)
                <div class="image">
                    @foreach(json_decode($ad->image) as $image)
                    <img src="/storage/images/ads/{{ $image }}">
                    @endforeach
                </div>
                <div class="info">
                    <h1 class="title">{{ $ad->title }}</h1>
                    <span class="separator"></span>
                    <h3>PRICE</h3>
                    <p class="price">{{ $ad->price }}€</p>
                    <h3>DESCRIPTION</h3>
                    <p class="description">{{ $ad->description }}</p>
                    <h3>CONDITION</h3>
                    <p class="condition">{{ $ad->condition }}</p>
                    <h3>LOCATION</h3>
                    <p class="location">{{ $ad->city }}</p>
                    <h3>SELLER NAME</h3>
                    <p class="name">{{ $user->nickname }}</p> 
                    <h3>CONTACT SELLER</h3>
                    <a class="email" href="mailto: {{ $user->email }}">{{ $user->email }}</p><br><br>
                    
                    <a class="contact" href="mailto: {{ $user->email }}">CONTACT SELLER</a>
                @endforeach 
            @endif 
        @endif                
    </div>

@endsection