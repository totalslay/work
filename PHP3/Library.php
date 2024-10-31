<?php

require_once 'Book.php';

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

