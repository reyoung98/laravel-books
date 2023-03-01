const search = document.querySelector('#book-search');
const results = document.querySelector('.search-results');
const resultContainer = document.querySelector('.search-results-outer')


const findBooks = async () => {
    const response = await fetch(`/api/books/search?search=${search.value}`)
    const books = await response.json();

    resultContainer.style.display = "block";

    results.innerHTML = '';
    for (let book of books) {
        const bookItem = document.createElement('a');
        bookItem.classList.add('book-item')
        bookItem.setAttribute('href', `/book/${book.id}`)
        bookItem.innerHTML = `
        <img src="${book.image}">
        <p>${book.title}</p>
        `
        results.appendChild(bookItem)
    }
}

search.addEventListener('input', findBooks)



