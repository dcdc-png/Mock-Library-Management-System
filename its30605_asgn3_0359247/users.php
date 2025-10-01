<?php
session_start();
require_once "connect_db.php";
require_once "variables.php";

if (!$is_admin) {
    header("Location: index.php");
    exit;
}

$sql_users = "
    SELECT
        `user_id`,
        `username`,
        `is_admin`,
        `is_disabled`
    FROM
        `users`;
";

$sql_col_names = "
    SHOW FULL COLUMNS
    FROM
        `users`;
";


$result_users = $conn -> query($sql_users);
$result_col_names = $conn -> query($sql_col_names);
$fields = array();
while ($k = $result_col_names -> fetch_assoc()) {
    if ($k['Comment'] === 'Password') { continue; }
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
    <title>Users | The Library</title>
</head>

<body>
    <?php
        include "login_menu.php";
        include "navbar.php";
    ?>

    <main>
        <section>
            <header>
                <h1>All Users</h1>
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
                <?php foreach ($result_users as $user_data): ?>
                    <tr>
                    <?php foreach ($user_data as $key => $value):
                        if ($key === 'is_disabled') { continue; }?>
                        <td><?= $value ?></td>
                    <?php endforeach; ?>
                        <td>
                            <form action="enable_disable_user.php" method="post" name="enable_disable_user">
                                <input type="hidden" name="user_id" value="<?= $user_data['user_id'] ?>">
                                <button type="submit" class="return-button"><?= $user_data['is_disabled'] ? "Enable" : "Disable" ?></button>
                            </form>
                        </td>
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