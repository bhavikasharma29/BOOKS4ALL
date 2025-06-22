const books = [
    { id: 1, title: "The Great Gatsby", city: "Jaipur", publication: "Penguin", author: "F. Scott Fitzgerald", img: "greatgastby.webp" },
    { id: 2, title: "A Brief History of Time", city: "Lucknow", publication: "HarperCollins", author: "Stephen Hawking", img: "briefhistoryoftime.jpeg" },
    { id: 3, title: "1984", city: "Agra", publication: "Macmillan", author: "George Orwell", img: "img_1984.jpg" },
    { id: 4, title: "Diary of Anne Frank", city: "Agra", publication: "Macmillan", author: "Anne Frank", img: "diaryofanne.jpg" }
];

function displayBooks(bookList) {
    const bookListContainer = document.querySelector('.book-list');
    bookListContainer.innerHTML = '';

    bookList.forEach(book => {
        const bookCard = document.createElement('div');
        bookCard.classList.add('book-card');
        bookCard.innerHTML = `
            <img src="${book.img}" alt="${book.title}">
            <h3>${book.title}</h3>
            <p><strong>City:</strong> ${book.city}</p>
            <p><strong>Publication:</strong> ${book.publication}</p>
            <p><strong>Author:</strong> ${book.author}</p>
            <button onclick="requestBook(${book.id})">Request Book</button>
        `;
        bookListContainer.appendChild(bookCard);
    });
}

function requestBook(bookId) {
    const book = books.find(b => b.id === bookId);

    if (!book) {
        alert("Book not found!");
        return;
    }

    // Data to be sent to PHP
    const formData = new FormData();
    formData.append("book_name", book.title);
    formData.append("author", book.author);
    formData.append("publication", book.publication);
    formData.append("city", book.city);
    formData.append("grade", "");  // You can modify this to collect user input for grade

    // Sending request to PHP
    fetch("requested_books_connect.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data);  // Display success/error message from PHP
    })
    .catch(error => {
        console.error("Error:", error);
        alert("Request failed. Please try again.");
    });
}

// Initialize the book list on page load
displayBooks(books);
