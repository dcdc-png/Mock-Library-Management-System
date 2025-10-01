<?php
session_start();
require_once "connect_db.php";
require_once "variables.php";

if (($_SERVER['REQUEST_METHOD'] === 'GET') && (isset($_GET['id']))) {
    $book_id = $_GET['id'];

    $sql = "
        SELECT
            *
        FROM
            `books`
        WHERE
            `book_id` = ?
    ";

    $result = $conn -> execute_query($sql, [$book_id]);
    $book_data = $result -> fetch_assoc();

    $conn -> close();

} else {
    header('Location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/books.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="js/navbar.js" defer></script>
    <title><?= "{$book_data['title']} by {$book_data['author']}" ?? "No book found :)" ?> | The Library</title>
</head>

<body>
    <?php
        include "login_menu.php";
        include "navbar.php";
    ?>

    <main>
    <?php if (isset($book_data)): ?>
        <section class="book-info">
            <div class="book-cover">
                <div class="book-cover-container">
                    <img src="img/books/<?= $book_data['book_id'] ?>.jpg" alt="a book cover">
                </div>
            </div>
            <div class="book-details">
                <p class="book-title"><?= $book_data['title'] ?></p>
                <p class="book-author">by: <span class="book-author-name"><?= $book_data['author'] ?></span></p>
                <p class="book-summary"><?= $book_data['summary'] ?></p>

                <form name="borrow" method="post" action="borrow.php">
                    <input type="hidden" name="book_id" value="<?= $book_data['book_id'] ?>">
                    <button type="submit" id="borrow-button" <?= (!$book_data['is_available'] || !$is_logged_in) ? "disabled" : null ?>>BORROW</button>
                    
                    <?php if (!$book_data['is_available']): ?>
                        <span class="book-status">This book is currently unavailable.</span>
                    <?php endif; ?>

                    <?php if (!$is_logged_in): ?>
                        <p class="book-status" id="book-status-no-acc">You must be logged in to borrow books.</p>
                    <?php endif; ?>
                    
                </form>

            </div>
            <div class="book-misc">
                <div class="book-misc-content">
                    <p class="book-misc-header">YEAR PUBLISHED</p>
                    <p><?= $book_data['publication_year'] ?></p>
                </div>
                <div class="book-misc-content">
                    <p class="book-misc-header">GENRE</p>
                    <p><?= $book_data['genre'] ?></p>
                </div>
            </div>
        </section>
    <?php else: ?>
        <h1 id="no-book-found">No book found :)</h1>
    <?php endif; ?>
    </main>

    <?php
    include "footer.php";
    ?>
</body>
</html>

<?php
unset($_SESSION['login_error']);
?>