<?php
include_once 'config.php';
include_once 'function.php';

if (!isset($_SESSION['loggedIn'])) {
    header("Location: login.php");
    exit();
}

$logout_button = '<form action="login.php" method="post">
    <button type="submit">Logout</button> </form>';

include_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>

<body>
    <div class="container">
        <div style="text-align:right;">
            <?php echo $logout_button; ?>
        </div>
        <h1 style="color: black; text-align:center; font-weight:800">Welcome page</h1>
    </div>
    <?php include_once 'footer.php'; ?>
</body>

</html>