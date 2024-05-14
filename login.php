<?php
include_once 'config.php';
include_once 'function.php';

// checking for errorss
$errors = array();

if (isset($_POST['login'])) {

    $employeeObj = new employeeData($conn);
    // Insert data
    $employeeObj->login_data();
    $_SESSION['loggedIn'] = true;

    //it is for validation 
    if (empty($email)) {
        $errors[] = "Email is required*";
    }
    if (empty($password)) {
        $errors[] = "Password is required*";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login form</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php include_once 'header.php'; ?>

    <div class="container">

    
        <h1 style="color: black; text-align:center; font-weight:800">Login form</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                <?php if (!empty($errors) && in_array("Email is required*", $errors)) { ?>
                    <span class="error">Email is required*</span>
                <?php } ?>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <?php if (!empty($errors) && in_array("Password is required*", $errors)) { ?>
                    <span class="error">Password is required*</span>
                <?php } ?>
            </div>
            <button type="submit" id="login" name="login" class="btn btn-primary" value="login">Login</button>
            <a href="index.php" class="btn btn-success">Register</a>
        </form>

    </div>



    <?php include_once 'footer.php'; ?>
</body>

</html>

