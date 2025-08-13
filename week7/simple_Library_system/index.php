<?php
// Import  all class files
require_once 'book.php';
require_once 'library.php';
require_once 'member.php';

// Create library
$library = new Library();

// Add books to library
$library->addBook(new Book("Atomic Habits", "James Clear"));
$library->addBook(new Book("Principle of building  AI Agents", "Sam Bhagwat"));
$library->addBook(new Book("A simple guide to RAG", "Abhinav Kimothi"));

// Display all books
$library->displayBooks();

// Create members
$member1 = new Member("Mahesh Kunwar", "Premium");
$member2 = new Member("Nazamul md", "Standard");

// Members borrow books
$member1->borrowBook($library->getBookByTitle("Atomic Habits"));
$member1->borrowBook($library->getBookByTitle("Principle of building  AI Agents"));
$member2->borrowBook($library->getBookByTitle("A simple guide to RAG"));

// Display borrowed books
$member1->displayBorrowedBooks();
$member2->displayBorrowedBooks();
?>