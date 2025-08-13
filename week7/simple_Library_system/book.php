<?php

class Book {
    private $title;
    private $author;

    public function __construct($title, $author) {
        $this->title = $title;
        $this->author = $author;
    }

    public function getInfo() {
        return "{$this->title} by {$this->author}";
    }

    public function getTitle() {
        return $this->title;
    }
}
?>