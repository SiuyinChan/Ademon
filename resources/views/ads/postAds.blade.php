@extends('layouts.app')

@section('content')
 <div class="post-ad-block">
    <h1>Post your ad!</h1>
        <div class="post-ad-card">
            <form action="/postedads" method="POST" enctype="multipart/form-data">
                @csrf

                @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                        {{$error}}<br/>
                    @endforeach
                @endif

                <label for="productName">Product name</label>
                <input type="text" name="productName">

                <label for="productPrice">Price</label>
                <input type="text" name="productPrice">

                <label for="productDescription">Description</label>
                <textarea name="productDescription" rows="10" cols="50"></textarea>

                <label for="productCategory">Category</label>
                <select name="productCategory">
                    <option value="" disabled selected>Select category</option>
                    @if(isset($categories))
                        @if(count($categories)>0)
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach

                        @endif

                    @endif
                </select>

                <label for="productCondition">Condition</label>
                <select name="productCondition">
                        <option value="" disabled selected>Select condition</option>
                        <option value="verygood">Very good</option>
                        <option value="good">Good</option>
                        <option value="average">Average</option>
                </select>

                <label for="productLocation">Location</label>
                <select name="productLocation">
                    <option value="" disabled selected>Select location</option>
                    @if(isset($cities))
                        @if(count($cities)>0)
                            @foreach($cities as $city)
                                <option value="{{ $city->city_name }}">{{ $city->city_name }}</option>
                            @endforeach

                        @endif

                    @endif
                </select>

                <label for="productPic">Pictures</label>
                <input type="file" name="productPic[]" multiple>

                <button type="submit">Post your ads</button>
            </form>
        </div>
    </div>

@endsection
