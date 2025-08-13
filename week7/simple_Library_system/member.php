<?php
require_once 'book.php';
class Member {
    private $name;
    private $membershipType;
    private $borrowedBooks = [];

    public function __construct($name, $membershipType) {
        $this->name = $name;
        $this->membershipType = $membershipType;
    }

    public function borrowBook(Book $book) {
        $this->borrowedBooks[] = $book;
    }

    public function displayBorrowedBooks() {
        echo "{$this->name}'s Borrowed Books:\n";
        foreach ($this->borrowedBooks as $book) {
            echo "- " . $book->getInfo() . "\n";
        }
    }
}
?>