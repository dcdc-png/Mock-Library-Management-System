<?php
session_start();
require_once "connect_db.php";
require_once "variables.php";

if (!$is_admin) {
    header("Location: index.php");
    exit;
}

$sql = "
    SHOW FULL COLUMNS
    FROM
        `books`;
";

$result = $conn -> query($sql);
$fields = array();
$field_ids = array();

while ($arr = $result -> fetch_assoc()) {
    $fields[] = $arr['Comment'];
    $field_ids[] = $arr['Field'];
};

$combined_fields = array_combine($field_ids, $fields);

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
    <link rel="stylesheet" href="css/add_book.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="js/navbar.js" defer></script>
    <title>Add New Book</title>
</head>

<body>
    <?php
        include "login_menu.php";
        include "navbar.php";
    ?>

    <main>
        <section>
            <header class="header">
                <h1>Add</h1>
            </header>

            <form name="add-form" action="save_book.php" method="post" class="add-form">
            <?php foreach($combined_fields as $id => $name): ?>
                <?php if ($id === 'book_id'): continue;
                
                elseif ($id === 'summary'): ?>
                    <div>
                        <textarea name="<?= $id ?>" id="<?= $id ?>"></textarea>
                        <label for="<?= $id ?>"><?= $name ?></label>
                    </div>

                <?php elseif ($id === 'title'): ?>
                    <div>
                        <input type="text" name="<?= $id ?>" id="<?= $id ?>" name="<?= $name ?>" required>
                        <label for="<?= $id ?>"><?= $name ?></label>
                    </div>

                <?php else: ?>
                    <div>
                        <input type="text" name="<?= $id ?>" id="<?= $id ?>" name="<?= $name ?>">
                        <label for="<?= $id ?>"><?= $name ?></label>
                    </div>
                <?php endif;
            endforeach; ?>
                <button type="submit">Save</button>
            </form>
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