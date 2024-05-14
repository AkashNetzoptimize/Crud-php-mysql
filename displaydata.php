<?php
include_once 'config.php';
include_once 'function.php';

// Check if the delete button is clicked
if (isset($_POST['delete_post'])) {
    $id = $_POST['delete_id'];
    $employeeObj = new employeeData($conn);
    $employeeObj->deleteData($id);
}

// Create an instance of the employeeData class
$obj = new employeeData($conn);
// Call the displayData method to fetch data
$result = $obj->displayData();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Display data</title>

</head>

<body>
    <?php include_once 'header.php'; ?>
    <div class="container-sm">
        <h2>Employee Data</h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["phone"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";


                        // Edit button
                        echo "<td>
                     <form method='get' action='edit.php'>
                        <input type='hidden' name='id' value='" . $row['id'] . "'>
                         <button type='submit' class='btn btn-primary' name='update_post' onclick='return confirmAction(\"update\")'><i class='fas fa-edit'></i> Edit</button>
                     </form>
                   </td>";

                        // Delete button
                        echo "<td>
                                <form method='post' action='displaydata.php' onsubmit='return confirmDelete();'>
                                    <input type='hidden' name='delete_id' value='" . $row['id'] . "'>
                                    <button type='submit' class='btn btn-danger' name='delete_post'><i class='fas fa-trash-alt'></i> Delete</button>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php include 'footer.php'; ?>

    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this item?");
        }
    </script>
</body>

</html>