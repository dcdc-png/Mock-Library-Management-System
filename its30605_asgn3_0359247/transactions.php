<?php
session_start();
require_once "connect_db.php";
require_once "variables.php";

if (!$is_admin) {
    header("Location: index.php");
    exit;
}

$sql_returned = "
    SELECT
        *
    FROM
        `transactions`
    WHERE
        `return_date` IS NOT NULL
    ORDER BY
        `return_date`;
";

$sql_not_returned = "
    SELECT
        `transaction_id`,
        `book_id`,
        `user_id`,
        `borrow_date`
    FROM
        `transactions`
    WHERE
        `return_date` IS NULL;
";

$sql_col_names = "
    SHOW FULL COLUMNS
    FROM
        `transactions`;
";

$result_returned = $conn -> query($sql_returned);
$result_not_returned = $conn -> query($sql_not_returned);
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
    <link rel="stylesheet" href="css/transactions.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="js/navbar.js" defer></script>
    <title>Transactions | The Library</title>
</head>

<body>
    <?php
        include "login_menu.php";
        include "navbar.php";
    ?>

    <main>
        <section>
            <header>
                <h1>Active Transactions</h1>
            </header>

            <table>
                <thead>
                    <tr>
                    <?php foreach ($fields as $field):
                        if ($field === 'Return Date') { continue; } ?>
                        <th><?= $field ?></th>
                    <?php endforeach; ?>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                <?php foreach ($result_not_returned as $txn_data): ?>
                    <tr>
                    <?php foreach ($txn_data as $key => $value): ?>
                        <td><?= $value ?></td>
                    <?php endforeach; ?>
                        <td class="row-buttons">
                            <form method="post" action="return_book.php">
                                <input type="hidden" name="book_id" value="<?= $txn_data['book_id'] ?>">
                                <button type="submit" name="transaction_id" value="<?= $txn_data['transaction_id'] ?>" class="return-button">Return</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <section>
            <header>
                <h1>Recent Transactions</h1>
            </header>

            <table>
                <thead>
                    <tr>
                    <?php foreach ($fields as $field): ?>
                        <th><?= $field ?></th>
                    <?php endforeach; ?>
                    </tr>
                </thead>

                <tbody>
                <?php foreach ($result_returned as $txn_data): ?>
                    <tr>
                    <?php foreach ($txn_data as $key => $value): ?>
                        <td><?= $value ?></td>
                    <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
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