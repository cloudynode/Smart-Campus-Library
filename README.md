# Smart Campus Library Management System

## Requirements
- PHP 8.0 or newer recommended
- A browser
- VS Code (or any code editor)

## Run using PHP's built-in server
1. Open this folder in VS Code.
2. Open the terminal in this folder.
3. Run: `php -S localhost:8000`
4. Open `http://localhost:8000` in your browser.

You can also place this folder in your XAMPP `htdocs` directory and visit
`http://localhost/SmartCampusLibrary/`.

## Files
- `User.php`: abstract base class, protected fields, getters, validated email setter.
- `Member.php`: member subclass and borrowed Book object list.
- `Librarian.php`: librarian subclass.
- `Book.php`: book model.
- `index.php`: creates sample objects and displays polymorphic details.

## Expected demo
- One librarian
- Two members
- Two books
- Member 1 borrows both books; Member 2 borrows the second book.
- The browser displays each user's details and the two book records.

## Notes
This is a simple in-memory demonstration, as requested by the exam. It does not
use a database or persistent storage. For the PDF documentation, run the page
and capture a screenshot of the browser output. Add that screenshot to your
submission document.
