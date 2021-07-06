<div>
    <form class="searchbar" action="/searchresult" method="POST">
        @csrf
        <select required name="searchCity">
            <option value="" disabled selected>All locations</option>
            @if(isset($cities))
                @if(count($cities)>0)
                    @foreach($cities as $city)
                        <option value="{{ $city->city_name }}">{{ $city->city_name }}</option>
                    @endforeach
                @endif
            @endif
        </select>
        <button type="submit"><img src="/icons/icon-search.svg" alt=""></button>
        <input type="text" name="searchProduct" placeholder="Search goods & services" required>
    </form>
</div>
