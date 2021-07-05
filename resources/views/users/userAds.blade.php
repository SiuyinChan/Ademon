@extends('layouts.app')

@section('content')

<div class='dashboard container'>
  
  <ul class="menu">
    <li><img src="/icons/icon-user.svg" alt=""><a href="/user-information">My information</a></li>
    <li><img src="/icons/icon-ad.svg" alt=""> <a href="/user-ads">My ads</a></li>
</ul>
  <div class='userAds'>

    <h4>TITLE</h4>
    <h4>PRICE</h4>
    <h4>ACTION</h4>
  
    @foreach($ads as $ad)
      <p class="title">{{ $ad->title }}</p>
      <p class="price">{{ $ad->price }}€</p>
      <a href="/ads-details/{{ $ad->id }}"><span class="btn-text">modify</span></a>
    @endforeach
  </div>
</div>

@endsection