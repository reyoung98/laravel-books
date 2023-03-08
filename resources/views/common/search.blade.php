<div class="search-container">
    <form action={{route('search-results')}} method="get">
        <input id="book-search" type="text" name="q" id="" placeholder="Search all books">

        <div class="search-results-outer">
            <div class="search-results"></div>
            <button class="see-more" type="submit">See more results...</button>
        </div>
    </form>

    
</div>

@vite('resources/js/search/book-search.js')