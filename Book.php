<?php
// Represents a book in the library.
class Book
{
    private string $isbn;
    private string $title;
    private string $author;

    public function __construct(string $isbn, string $title, string $author)
    {
        $this->isbn = $isbn;
        $this->title = $title;
        $this->author = $author;
    }

    public function getIsbn(): string
    {
        return $this->isbn;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getDetails(): string
    {
        return $this->title . " by " . $this->author . " (ISBN: " . $this->isbn . ")";
    }
}
