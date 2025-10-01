<?php
session_start();
require_once "connect_db.php";
require_once "variables.php";

if (!$is_admin) {
    header("Location: index.php");
    exit;
}

$sql_book_data = "
    SELECT
        *
    FROM
        `books`;
";

$sql_col_names = "
    SHOW FULL COLUMNS
    FROM
        `books`;
";

$result_book_data = $conn -> query($sql_book_data);
$result_col_names = $conn -> query($sql_col_names);

$fields = array();
while ($k = $result_col_names -> fetch_assoc()) {
    $fields[] = $k['Comment'];
};

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
    <link rel="stylesheet" href="css/view.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>View Book Data | The Library</title>
</head>

<body>
    <?php
        include "login_menu.php";
        include "navbar.php";
    ?>

    <main>
        <div></div>
        <section>
            <header>
                <h1>View All Books</h1>
            </header>

            <table>
                <thead>
                    <tr>
                    <?php foreach ($fields as $field): ?>
                        <th><?= $field ?></th>
                    <?php endforeach; ?>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                <?php foreach ($result_book_data as $book_data): ?>
                    <tr>
                    <?php foreach ($book_data as $key => $value):
                        if ($key === 'summary'): ?>
                            <td><p><?= $value ?></p></td>
                        <?php else: ?>
                            <td><?= $value ?></td>
                        <?php endif;
                    endforeach; ?>
                        <td class="buttons">
                            <a href="books.php?id=<?= $book_data['book_id'] ?>"><button type="button">View</button></a>
                            
                            <form method="get" action="edit_book.php">
                                <button type="submit" name="id" value="<?= $book_data['book_id'] ?>">Edit</button>
                            </form>
                            
                            <form method="post" action="delete.php" onsubmit="return confirm(`Are you sure you want to delete <?= $book_data['title'] ?>?`)">
                                <button type="submit" name="book_id" value="<?= $book_data['book_id'] ?>">Delete</button>
                            </form>
                        </td>
                <?php endforeach; ?>
                    </tr>
                </tbody>
            </table>
        </section>
        <div></div>
    </main>

    <?php
    include "footer.php";
    ?>
</body>
</html>

<?php
unset($_SESSION['login_error']);
?>