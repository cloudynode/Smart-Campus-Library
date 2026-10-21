<?php
require_once __DIR__ . '/User.php';
require_once __DIR__ . '/Book.php';

// A Member is a type of User.
class Member extends User
{
    private string $memberId;

    /** @var Book[] */
    private array $borrowedBooks = [];

    public function __construct(
        int $id,
        string $name,
        string $email,
        string $memberId
    ) {
        parent::__construct($id, $name, $email);
        $this->memberId = $memberId;
    }

    public function getMemberId(): string
    {
        return $this->memberId;
    }

    /** Add a Book object to this member's borrowed-book list. */
    public function borrowBook(Book $book): void
    {
        $this->borrowedBooks[] = $book;
    }

    /** @return Book[] */
    public function getBorrowedBooks(): array
    {
        return $this->borrowedBooks;
    }

    public function getRole(): string
    {
        return "Library Member";
    }

    public function getDetails(): string
    {
        $bookList = [];

        foreach ($this->borrowedBooks as $book) {
            $bookList[] = $book->getTitle() . " by " . $book->getAuthor();
        }

        $booksText = empty($bookList)
            ? "No books borrowed"
            : implode(", ", $bookList);

        return "ID: {$this->getId()}\n"
            . "Name: {$this->getName()}\n"
            . "Email: {$this->getEmail()}\n"
            . "Role: {$this->getRole()}\n"
            . "Member ID: {$this->memberId}\n"
            . "Borrowed Books: {$booksText}";
    }
}
