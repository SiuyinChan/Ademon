<div>
    <form class="searchbar" action="/searchresult" method="POST">
        @csrf        
        <select require="true" name="searchCity" require="true">
            <option value="" disabled selected>All locations</option>
            <option value="Aix-en-Provence">Aix-en-Provence</option>
            <option value="Bordeaux">Bordeaux</option>
            <option value="Canne">Canne</option>
            <option value="Dijon">Dijon</option>
            <option value="Lille">Lille</option>
            <option value="Lyon">Lyon</option>
            <option value="Montpellier">Montpellier</option>
            <option value="Paris">Paris</option>
            <option value="Strasbourg">Strasbourg</option>
        </select>
        <button type="submit"><img src="/icons/icon-search.svg" alt=""></button>
        <input type="text" name="searchProduct" placeholder="Search goods & services" require="true">
    </form>   
</div>