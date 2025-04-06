<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $Name = $_POST['Name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];  
    $regno = $_POST['regno'];
    $signup_username = $_POST['signup_username'];
    $signup_password = password_hash($_POST['signup_password'], PASSWORD_DEFAULT); 

    
    $conn = new mysqli('localhost', 'root', '', 'course_login');

   
    if ($conn->connect_error) 
    {
        die('Connection failed: ' . $conn->connect_error);
    }
    else
    {
        $check_stmt = $conn->prepare("SELECT email FROM c_login WHERE email = ?");
        $check_stmt->bind_param("s", $email);
        $check_stmt->execute();
        $check_stmt->store_result();

        if ($check_stmt->num_rows > 0) {
            echo "<script>
                    alert('Error: User already exists with this email.');
                    window.location.href = 'index.php';
                </script>";
        } else {
            // Insert user into database
            $stmt = $conn->prepare("INSERT INTO c_login (Name, email, mobile, regno, signup_username, signup_password) VALUES (?, ?, ?, ?, ?, ?)");
            if ($stmt === false) {
                die("Prepare failed: " . $conn->error);
            }

            $stmt->bind_param("ssssss", $Name, $email, $mobile, $regno, $signup_username, $signup_password);
            
            if (!$stmt->execute()) { 
                echo "Error: " . $stmt->error; 
            } else { 
                echo "<script>
                        alert('Registration Successful.');
                        window.location.href = 'index.php'; // Redirect to c_login page after signup
                    </script>";
            }
            $stmt->close();
        }

        // Close connections
        $check_stmt->close();
        $conn->close();
    }
}
?>;