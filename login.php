<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'course_login');
    
    // Check connection
    if ($conn->connect_error) 
    {
        die('Connection failed: ' . $conn->connect_error);
    } 
    else 
    {
        $login_username = $_POST['login_username']; // Assuming this field exists in the form
        $login_password = $_POST['login_password'];
        // Prepare the query to fetch the signup_username and signup_password
        $select_query = "SELECT signup_username, signup_password FROM c_login WHERE signup_username = ?";
        $stmt = $conn->prepare($select_query);

        // Bind the parameter (the login_username input from the form)
        $stmt->bind_param("s", $login_username);

        // Execute the query
        $stmt->execute();

        // Store the result
        $stmt->store_result();

        // Check if any rows are returned
        if ($stmt->num_rows > 0) 
        {
            // Bind the result to variables
            $stmt->bind_result($fetched_username, $fetched_password);

            // Fetch the result
            $stmt->fetch();

            // Display the fetched values
           

            if (password_verify($login_password, $fetched_password))
            {
                setcookie("login_username", $login_username, time() + (7 * 24 * 60 * 60), "/");
                echo "<script> window.location.href = './home_2.html';</script>";
            } 
            else 
            {
                echo "<script>alert('Invalid password.'); window.location.href = 'index.php';</script>";
            }
        } else {
            echo "<script>alert('NOO USER NAME FOUND .'); window.location.href = 'index.php';</script>";
        }

        // Close the prepared statement
        $stmt->close();
    }
}
?>
