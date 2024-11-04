<?php

require_once 'Library.php';

$library = new Library();

$library->addBook(new Book("The Great Gatsby", "F. Scott Fitzgerald", 1925, "Fiction"));
$library->addBook(new Book("1984", "George Orwell", 1949, "Dystopian"));
$library->addBook(new Book("To Kill a Mockingbird", "Harper Lee", 1960, "Fiction"));
$library->addBook(new Book("Animal Farm", "George Orwell", 1945, "Satire"));

$library->removeBookByTitle("1984");

$orwellBooks = $library->findBooksByAuthor("George Orwell");

echo "List of all books in the library:\n";
foreach ($library->listAllBooks() as $book) {
    echo $book->getBookInfo() . "\n";
}

echo "\nBooks by George Orwell:\n";
foreach ($orwellBooks as $book) {
    echo $book->getBookInfo() . "\n";
}

echo "Press Enter to exit...";
$f = readline();
