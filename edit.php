<?php
include_once 'config.php';
include_once 'function.php';
$employeeObj = new employeeData($conn);
$errors = array();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    if (empty($name)) {
        $errors[] = "Name is required";
    }

    if (empty($phone)) {
        $errors[] = "Phone is required";
    }
    if (empty($email)) {
        $errors[] = "Email is required";
    }


    if (empty($errors)) {
        // Insert data
        $row_select = $employeeObj->updateData($name, $phone, $email);
    }
} else {
    $user_id = $_GET['id'];
    $row_select = $employeeObj->getUser($user_id);
}
?>

<html>

<body>
    <?php include_once 'header.php'; ?>
    <div class="container">
        <h1 style="color: black; text-align:center; font-weight:800">Edit page</h1>

        <form action="" method="POST">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $row_select['name']; ?>">
                <br>
            </div>
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row_select['phone']; ?>">
                <br>
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value=" <?php echo $row_select['email']; ?>">
                <br>
            </div>

            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
            <a href="displaydata.php" class="btn btn-secondary">View Data</a>
        </form>
    </div>
    <div class="container">
        <?php
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo "<p style='color:red; text-align:center; font-weight:800'>$error</p>";
            }
        }
        ?>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>