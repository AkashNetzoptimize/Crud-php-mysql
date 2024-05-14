<?php
include_once 'config.php';
include_once 'function.php';
$errors = array();

if (isset($_POST['submit'])) {  
    $employeeObj = new employeeData($conn);
    $employeeObj->insertData();

    
    if (empty($name)) {
        $errors[] = "Name is required*";
    }

    if (empty($phone)) {
        $errors[] = "Phone is required*";
    }
    if (empty($email)) {
        $errors[] = "Email is required*";
    }
    if (empty($password)) {
        $errors[] = "Password is required*";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Registration form</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php include_once 'header.php'; ?>
    <div class="container">
        <h1 style="color: black; text-align:center; font-weight:800">Registration form </h1>
        <form action="index.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
                <?php if (!empty($errors) && in_array("Name is required*", $errors)) { ?>
                    <span class="error">Name is required*</span>
                <?php } ?>
                <br>
            </div>
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone">
                <?php if (!empty($errors) && in_array("Phone is required*", $errors)) { ?>
                    <span class="error">Phone is required*</span>
                <?php } ?>
                <br>
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email">
                <?php if (!empty($errors) && in_array("Email is required*", $errors)) { ?>
                    <span class="error">Email is required*</span>
                <?php } ?>
                <br>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <?php if (!empty($errors) && in_array("Password is required*", $errors)) { ?>
                    <span class="error">Password is required*</span>
                <?php } ?>
                <br>
            </div>
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
        </form>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>
