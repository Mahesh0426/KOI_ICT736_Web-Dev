<?php
require_once 'book.php';
class Library {
    private $books = [];

    public function addBook(Book $book) {
        $this->books[] = $book;
    }

    public function displayBooks() {
        echo "Library Books:\n";
        foreach ($this->books as $book) {
            echo "- " . $book->getInfo() . "\n";
        }
    }

    public function getBookByTitle($title) {
        foreach ($this->books as $book) {
            if ($book->getTitle() === $title) {
                return $book;
            }
        }
        return null;
    }
}
?>