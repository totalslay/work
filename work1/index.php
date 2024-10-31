<?php

class Book
{
    private $title;
    private $author;
    private $publishedYear;
    private $genre;

    public function __construct($title, $author, $publishedYear, $genre)
    {
        $this->title = $title;
        $this->author = $author;
        $this->publishedYear = $publishedYear;
        $this->genre = $genre;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getPublishedYear()
    {
        return $this->publishedYear;
    }

    public function setPublishedYear($year)
    {
        $this->publishedYear = $year;
    }

    public function getGenre()
    {
        return $this->genre;
    }

    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    public function getBookInfo()
    {
        return "Title: {$this->title}, Author: {$this->author}, Year: {$this->publishedYear}, Genre: {$this->genre}";
    }
}

class Library
{
    private $books = [];

    public function addBook(Book $book)
    {
        $this->books[] = $book;
    }

    public function removeBookByTitle($title)
    {
        foreach ($this->books as $key => $book) {
            if ($book->getTitle() === $title) {
                unset($this->books[$key]);
                return true;
            }
        }
        return false;
    }

    public function findBooksByAuthor($author)
    {
        $result = [];
        foreach ($this->books as $book) {
            if ($book->getAuthor() === $author) {
                $result[] = $book;
            }
        }
        return $result;
    }

    public function listAllBooks()
    {
        return $this->books;
    }
}

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

