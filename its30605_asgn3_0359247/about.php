<?php
session_start();
require_once "connect_db.php";
require_once "variables.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="js/navbar.js" defer></script>
    <title>About Us | The Library</title>
</head>

<body>
    <?php
    include "login_menu.php";
    include "navbar.php";
    ?>

    <main>
        <section>
            <p>guys what are we supposed to put in the about page??? i guess this whole site was made by us three: Jared, Jia Jun, and Ding Cong. it's supposed to mimic a library system where you can browse, borrow, return, edit, and add books etc etc</p>
            <p>we are so thankful for this deadline extension 🙏🙏🙏🙏</p>
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