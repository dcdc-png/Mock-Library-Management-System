<?php
session_start();
require_once "connect_db.php";
require_once "variables.php";

if (!$is_admin) {
    header("Location: index.php");
    exit;
}

if (($_SERVER['REQUEST_METHOD'] === 'GET') && (isset($_GET['id']))) {
    $book_id = $_GET['id'];

    $sql_book_data = "
        SELECT
            *
        FROM
            `books`
        WHERE
            `book_id` = ?
    ";

    $sql_col_names = "
        SHOW FULL COLUMNS
        FROM
            `books`;
    ";

    $result_book_data = $conn -> execute_query($sql_book_data, [$book_id]);
    $book_data = $result_book_data -> fetch_assoc();

    $result_col_names = $conn -> query($sql_col_names);
    $fields = array();
    while ($arr = $result_col_names -> fetch_assoc()) {
        $fields[] = $arr['Comment'];
    };

    // $field_count = count($fields);
    // $combined_book_data = array_combine($fields, $book_data);
    $counter = 0;

    $conn -> close();

} else {
    header('Location: view.php');
    exit;
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/edit_book.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="js/navbar.js" defer></script>
    <title>Edit Book Data | The Library</title>
</head>

<body>
    <?php
        include "login_menu.php";
        include "navbar.php";
    ?>

    <main>
    <?php if (isset($book_data)): ?>
        <section>
            <header>
                <h1>Edit</h1>
            </header>

            <form name="edit-form" action="update.php" method="post" class="edit-form">
            <?php foreach($book_data as $key => $val): ?>
                <div>
                <?php if ($key === 'summary'): ?>
                    <textarea name="<?= $key ?>" id="<?= $key ?>"><?= $val ?></textarea>
                    
                <?php elseif ($key === 'book_id'): ?>
                    <input type="text" name="<?= $key ?>" id="<?= $key ?>" value="<?= $val ?>" readonly>

                <?php elseif ($key === 'title'): ?>
                    <input type="text" name="<?= $key ?>" id="<?= $key ?>" value="<?= $val ?>" required>
                    
                <?php else: ?>
                    <input type="text" name="<?= $key ?>" id="<?= $key ?>" value="<?= $val ?>">
                <?php endif; ?>
                    <label for="<?= $key ?>"><?= $fields[$counter] ?></label>
                </div>
                <?php $counter++;
            endforeach; ?>
                <button type="submit">Save</button>
            </form>
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