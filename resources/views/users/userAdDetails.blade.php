@extends('layouts.app')

@section('content')

<div class='dashboard container'>

    <ul class="menu">
        <li><img src="/icons/icon-user.svg" alt=""><a href="/user-information">User information</a></li>
        <li><img src="/icons/icon-ad.svg" alt=""> <a href="/user-ads">Published ads</a></li>
    </ul>

    
    <div class='userInfo'>

        <div class="adInfo">
            
            <form action="/ads-details/{{ $ad->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                        {{$error}}<br/>
                    @endforeach
                @endif
                
                <label for="productName">Product name</label>
                <input type="text" name="productName" value="{{ $ad->title }}">
                
                <label for="productPrice">Price</label>
                <input type="text" name="productPrice" value="{{ $ad->price }}">
                
                <label for="productDescription">Description</label>
                <textarea name="productDescription" rows="10" cols="50">{{ $ad->description }}</textarea>
                
                <label for="productCategory">Category</label>
                <select name="productCategory">
                    @if(isset($categories))
                        @if(count($categories)>0)
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ ($ad->category_id == $category->id)? "selected" : "" ; }}>{{ $category->name }}</option>
                            @endforeach
                    
                        @endif
                    
                    @endif
                </select>
                
                <label for="productCondition">Condition</label>
                <select name="productCondition">
                    <option value="verygood" {{ ($ad->condition == 'verygood')? "selected" : "" ; }}>Very good</option>
                    <option value="good" {{ ($ad->condition == 'good')? "selected" : "" ; }}>good</option>
                    <option value="average" {{ ($ad->condition == 'average')? "selected" : "" ; }}>average</option>
                </select>
                
                <label for="productLocation">Location</label>
                <select name="productLocation">
                    <option value="" disabled selected>Select location</option>
                    @if(isset($cities))
                        @if(count($cities)>0)
                            @foreach($cities as $city)
                            <option value="{{ $city->city_name }}" {{ ($ad->city == $city->city_name)? "selected" : "" ; }}>{{ $city->city_name }}</option>
                            @endforeach
                                
                        @endif
                                
                    @endif
                            </select>
                            
                            <!-- <label for="productPic">Pictures</label>
                                <input type="file" name="productPic[]" multiple> -->
                                
                                <button type="submit">Save</button>
                            </form>
                            
                            <form class="userInformation" method="POST" action="/destroy-ad/{{ $ad->id }}">
                                @csrf
                                
                                <button class="delete" type="submit">Delete this ad</button>
                                
                            </form>
                            
                        </div>
                        
                    </div>
                    
                    @endsection
                </div>