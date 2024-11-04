<?php

class Book
{
    private $title;
    private $author;

    public function __construct($title, $author)
    {
        $this->title = $title;
        $this->author = $author;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAuthor()
    {
        return $this->author;
    }
}

class BookAlreadyExistsException extends Exception
{
}
class LibraryFullException extends Exception
{
}

class Library
{
    private $books = [];
    private $maxBooks;

    public function __construct($maxBooks)
    {
        $this->maxBooks = $maxBooks;
    }

    public function addBook(Book $book)
    {
        foreach ($this->books as $existingBook) {
            if ($existingBook->getTitle() === $book->getTitle()) {
                throw new BookAlreadyExistsException("Book '{$book->getTitle()}' already exists in the library.");
            }
        }

        if (count($this->books) >= $this->maxBooks) {
            throw new LibraryFullException("Library is full. Maximum number of books: {$this->maxBooks}.");
        }

        $this->books[] = $book;
    }

    public function getBooks()
    {
        return $this->books;
    }

    public function getAvailableSpaces()
    {
        return $this->maxBooks - count($this->books);
    }
}

$library = new Library(5);

while (true) {
    echo "\nOptions:\n";
    echo "1. Add a book\n";
    echo "2. View books\n";
    echo "3. Exit\n";
    echo "Choose an option (1-3): ";
    $option = readline();

    switch ($option) {
        case '1':
            echo "Enter book title: ";
            $title = readline();
            echo "Enter book author: ";
            $author = readline();

            try {
                $book = new Book($title, $author);
                $library->addBook($book);
                echo "Book '{$title}' by '{$author}' added successfully.\n";
                echo "Available spaces in library: " . $library->getAvailableSpaces() . "\n";
            } catch (BookAlreadyExistsException $e) {
                echo "Error: " . $e->getMessage() . "\n";
            } catch (LibraryFullException $e) {
                echo "Error: " . $e->getMessage() . "\n";
            }
            break;

        case '2':
            echo "\nBooks in the library:\n";
            if (count($library->getBooks()) === 0) {
                echo "No books available in the library.\n";
            } else {
                foreach ($library->getBooks() as $book) {
                    echo "Book: " . $book->getTitle() . ", Author: " . $book->getAuthor() . "\n";
                }
            }
            break;

        case '3':
            echo "Exiting the program...\n";
            exit;

        default:
            echo "Invalid option! Please choose a valid option (1-3).\n";
            break;
    }
}



/* Example
try {
    $library = new Library(2); 

    $book1 = new Book("1984", "George Orwell");
    $library->addBook($book1);

    $book2 = new Book("Fahrenheit 451", "Ray Bradbury");
    $library->addBook($book2);

    $book3 = new Book("1984", "George Orwell");
    $library->addBook($book3); 
} catch (BookAlreadyExistsException $e) {
    echo "Error: " . $e->getMessage() . "\n";
} catch (LibraryFullException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

foreach ($library->getBooks() as $book) {
    echo "Book: " . $book->getTitle() . ", Author: " . $book->getAuthor() . "\n";

echo "Press Enter to exit...";
$f = readline(); 


test
public function testAddBookSuccessfully() {
        $library = new Library(2);
        $book = new Book("1984", "George Orwell");

        $library->addBook($book);
        $this->assertCount(1, $library->getBooks());
    }

    public function testAddDuplicateBookThrowsException() {
        $this->expectException(BookAlreadyExistsException::class);

        $library = new Library(5);
        $book1 = new Book("1984", "George Orwell");
        $library->addBook($book1);

        $book2 = new Book("1984", "George Orwell"); 
        $library->addBook($book2);
    }

    public function testAddBookWhenLibraryIsFullThrowsException() {
        $this->expectException(LibraryFullException::class);

        $library = new Library(1);
        $book1 = new Book("1984", "George Orwell");
        $library->addBook($book1);

        $book2 = new Book("Fahrenheit 451", "Ray Bradbury"); 
        $library->addBook($book2);
    }

    public function testGetBooksReturnsAllAddedBooks() {
        $library = new Library(5);
        $book1 = new Book("1984", "George Orwell");
        $book2 = new Book("Fahrenheit 451", "Ray Bradbury");

        $library->addBook($book1);
        $library->addBook($book2);

        $books = $library->getBooks();
        $this->assertCount(2, $books);
        $this->assertEquals("1984", $books[0]->getTitle());
        $this->assertEquals("Fahrenheit 451", $books[1]->getTitle());
    }
}*/


