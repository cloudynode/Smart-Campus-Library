<?php
require_once __DIR__ . '/User.php';
require_once __DIR__ . '/Book.php';
require_once __DIR__ . '/Member.php';
require_once __DIR__ . '/Librarian.php';

// Create one librarian, two members, and two books.
$librarian = new Librarian(
    1,
    "Maria Santos",
    "maria.santos@library.edu",
    "LIB-001",
    "Morning"
);

$member1 = new Member(
    2,
    "Juan Dela Cruz",
    "juan.delacruz@student.edu",
    "MEM-101"
);

$member2 = new Member(
    3,
    "Ana Reyes",
    "ana.reyes@student.edu",
    "MEM-102"
);

$book1 = new Book("978-0132350884", "Clean Code", "Robert C. Martin");
$book2 = new Book("978-0596009205", "Head First Design Patterns", "Eric Freeman");

// Simulate borrowing by storing Book objects in each member's array.
$member1->borrowBook($book1);
$member1->borrowBook($book2);
$member2->borrowBook($book2);

// Store different child-class objects in an array typed as User instances.
$users = [$librarian, $member1, $member2];

// Basic HTML output for a readable browser screenshot.
function escapeHtml(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Campus Library Management System</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            padding: 32px 18px;
            font-family: Arial, Helvetica, sans-serif;
            background: #f3f6fb;
            color: #172033;
        }
        .container { max-width: 1000px; margin: 0 auto; }
        header {
            padding: 28px;
            border-radius: 16px;
            background: #173b63;
            color: white;
            margin-bottom: 24px;
        }
        header h1 { margin: 0 0 8px; font-size: 27px; }
        header p { margin: 0; color: #d9e7f7; }
        h2 { margin: 26px 0 14px; color: #173b63; }
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 16px;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            border: 1px solid #dfe6ef;
            box-shadow: 0 4px 14px rgba(23, 59, 99, .06);
        }
        .card h3 { margin: 0 0 14px; color: #176b87; }
        .card p { margin: 8px 0; overflow-wrap: anywhere; }
        .role {
            display: inline-block;
            padding: 5px 9px;
            background: #e7f3f8;
            border-radius: 20px;
            color: #17566b;
            font-size: 12px;
            font-weight: bold;
        }
        .book { border-left: 4px solid #e0a63b; }
        footer { margin-top: 26px; color: #657087; font-size: 13px; }
        @media print {
            body { background: white; padding: 0; }
            .card { box-shadow: none; break-inside: avoid; }
        }
    </style>
</head>
<body>
<div class="container">
    <header>
        <h1>Smart Campus Library</h1>
        <p>Library users, book records, and borrowing details</p>
    </header>

    <h2>Registered Users</h2>
    <div class="cards">
        <?php foreach ($users as $user): ?>
            <section class="card">
                <h3><?= escapeHtml($user->getName()) ?></h3>
                <p><span class="role"><?= escapeHtml($user->getRole()) ?></span></p>
                <?php
                // Polymorphism: each object runs its own getDetails() implementation.
                $details = explode("\n", $user->getDetails());
                foreach ($details as $line):
                    $parts = explode(": ", $line, 2);
                ?>
                    <p>
                        <strong><?= escapeHtml($parts[0]) ?>:</strong>
                        <?= escapeHtml($parts[1] ?? '') ?>
                    </p>
                <?php endforeach; ?>
            </section>
        <?php endforeach; ?>
    </div>

    <h2>Books in the Demo</h2>
    <div class="cards">
        <?php foreach ([$book1, $book2] as $book): ?>
            <section class="card book">
                <h3><?= escapeHtml($book->getTitle()) ?></h3>
                <p><strong>Author:</strong> <?= escapeHtml($book->getAuthor()) ?></p>
                <p><strong>ISBN:</strong> <?= escapeHtml($book->getIsbn()) ?></p>
            </section>
        <?php endforeach; ?>
    </div>

    <footer>IT214 · Object Oriented Programming · Midterm Laboratory Exam</footer>
</div>
</body>
</html>
