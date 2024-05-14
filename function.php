<?php
include_once 'config.php';

// This is the class employeeData
class employeeData
{
    private $conn;

    // Constructor to initialize the database connection
    function __construct($conn)
    {
        $this->conn = $conn;
    }




    // This function is used to insert data into the database in employee table
    function insertData()
    {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        //check if email exist in the database 
        $sql_select = "SELECT * FROM employess WHERE email = '$email'";
        $query_select = mysqli_query($this->conn,  $sql_select);
        $row_select = mysqli_fetch_assoc($query_select);

        // Check if a record with the provided email exists
        if ($row_select !== null && $row_select['email'] == $email) {
            echo "Email already exists";
        } else {


            // insert data into the database 
            $sql = "INSERT INTO employess(name, phone, email, password) VALUES ('$name', '$phone', '$email', '$hashed_password')";

            // Execute the query
            $query = mysqli_query($this->conn, $sql);
            if ($query) {
                header("location:thankyou.php");
            } else {
                echo "Data not inserted";
            }
        }
    }









    // This function is used to get user data from the database in employee table
    public function getUser($id)
    {
        $sql = "SELECT * FROM employess WHERE id = '$id'";
        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }







    //This function is used to login the user 
    function login_data()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];


        $sql = "SELECT * FROM employess";
        $query = mysqli_query($this->conn, $sql);

        while ($row = mysqli_fetch_assoc($query)) {
            if ($row['email'] == $email && password_verify($password, $row['password'])) {
                echo "Login successful";
                header("location: welcome.php");
                exit; // stop further execution
            } elseif ($row['email'] == $email && !password_verify($password, $row['password'])) {
                echo "Incorrect password";
                return;
            }
        }
        echo "User not found";
    }






    // This function is used to display data from the database in employee table
    function displayData()
    {
        $sql = "SELECT * FROM employess";
        $result = $this->conn->query($sql);
        return $result;
    }







    // This function is used to update data in the database in employee table
    function updateData($name, $phone, $email)
    {


        $id = $_GET['id'];
        $sql_update = "UPDATE employess SET name= '$name', phone= '$phone', email= '$email' WHERE  id= '$id'";
        $query_update = mysqli_query($this->conn, $sql_update);

        if ($query_update) {
            echo "Data updated successfully";

            // Select updated data from the database 
            $sql_select = "SELECT * FROM employess WHERE id = '$id'";
            $query_select = mysqli_query($this->conn, $sql_select);

            if ($query_select) {
                $row_select = mysqli_fetch_assoc($query_select);
                return $row_select;
            } else {
                echo "Error retrieving updated data";
                return null;
            }
        }
    }






    // This function is used to delete data from the database in employee tablefunction deleteData($id)
    function deleteData($id)
    {
        $sql = "DELETE FROM employess WHERE id = '$id'";
        // echo $sql;
        $query = mysqli_query($this->conn, $sql);
        if ($query) {
            echo "Data deleted successfully";
        } else {
            echo "Error deleting data: " . mysqli_error($this->conn);
        }
    }
}
