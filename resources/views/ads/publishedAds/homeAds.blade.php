@extends('layouts.app')

@section('content')
@include('components.searchbar')
    <div class="container">
        <div class="side-bar">
            <div class="card-header">
                <strong>Categories</strong>
            </div>

            <div class="card-body">
                <ul class=category-list>
                    @if(isset($categories))
                        @if(count($categories)>0)
                            @foreach($categories as $category)
                                <li><a href="{{ url('/view-ads/' . $category->id) }}">{{ $category->name }}</a></li>
                            @endforeach

                        @endif

                    @endif
                </ul>
            </div>
        </div>

        <div class="products-list">
            <h3>HOME</h3>
            <ul>
                 @if(isset($ads))
                     @if(count($ads)>0)
                         @foreach($ads as $ad)
                             <li class="product-card">
                            <div>
                                <a href="{{ url('/product-details/' . $ad->id) }}"><img src="/storage/images/ads/{{ json_decode($ad->image)[0] }}"></a>
                            </div>
                            <div class="product-info">
                                <a  class="title" href="{{ url('/product-details/' . $ad->id) }}">{{ $ad->title }}</a>
                                <p class="price">{{ $ad->price }}€</p>
                                <p class="date">{{ $ad->created_at}}</p>
                                <p class="description">{{ $ad->description }}</p>
                                <a href="#"><img class="icon" src="/icons/icon-heart.svg" alt=""></a>
                                <a  class="view-details" href="{{ url('/product-details/' . $ad->id) }}">View details</a>
                            </div>
                         @endforeach
                     @endif
                 @endif
             </ul>
        </div>

    </div>

@endsection
