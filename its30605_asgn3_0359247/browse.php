<?php
session_start();
require_once "connect_db.php";
require_once "variables.php";

$sql = "
    SELECT
        book_id,
        isbn,
        title,
        author
    FROM
        `books`
";

$result = $conn -> query($sql);
$conn -> close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="js/navbar.js" defer></script>
    <title>Browse All Books</title>
</head>

<body>
    <?php
    include "login_menu.php";
    include "navbar.php";
    ?>

    <main>
        <section class="spotlight">
            <header class="spotlight-header">
                <h1>All Books</h1>
            </header>
            <div class="spotlight-content">
            <?php if (isset($result)):
                foreach ($result as $book_data): ?>
                    <div class="card">
                        <div class="card-image">
                            <div class="card-image-container">
                                <a href="books.php?id=<?= $book_data['book_id'] ?>"><img src="img/books/<?= $book_data['book_id'] ?>.jpg" alt="book cover"></a>
                            </div>
                        </div>
                        <div class="card-details">
                            <a href="books.php?id=<?= $book_data['book_id'] ?>" class="book-title"><?= $book_data['title'] ?></a>
                            <p class="book-author">by: <span class="book-author-name"><?= $book_data['author'] ?></span></p>
                        </div>
                    </div>
                <?php endforeach;
            endif; ?>
            </div>
        </section>
    </main>

    <?php
    include "footer.php";
    ?>
</body>
</html>

<?php
unset($_SESSION['login_error']);
?>