const bookList = document.getElementById('latest-books')

const getData = async () => {

    // display the animated loader
    bookList.innerHTML = `<li class="loader"></li>`;

    const response = await fetch('/api/books/latest')
    
    // hide the animated loader
    bookList.innerHTML= '';

    const books = await response.json();

    for(let book of books) {
        const item = document.createElement('div');
        item.classList.add('book-card')
        item.innerHTML = `
                <h3 class="title">${book.title}</h3>
                <div class="book-info">
                    <div>
                        <img src="${book.image}">
                        <div class="format">${book.format}</div>
                        <div class="isbn">ISBN: ${book.isbn}</div>
                    </div>
                    <div class="description">${book.description}</div>
                </div>
        `
        bookList.appendChild(item)
    }
}

getData();