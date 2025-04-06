<?php
if (isset($_COOKIE["login_username"])) {
    $username_cookie = $_COOKIE["login_username"];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'demo_login');

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Use a prepared statement to fetch user data safely
    $select_query = "SELECT Name, email, mobile, regno, signup_username FROM login WHERE signup_username = ?";
    $stmt = $conn->prepare($select_query);

    if ($stmt) {
        $stmt->bind_param("s", $username_cookie);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            echo "
                <h3>User Profile</h3>
                <p><strong>Name:</strong> {$row['Name']}</p>
                <p><strong>Email:</strong> {$row['email']}</p>
                <p><strong>Mobile:</strong> {$row['mobile']}</p>
                <p><strong>Reg No:</strong> {$row['regno']}</p>
                <p><strong>Username:</strong> {$row['signup_username']}</p>
            ";
        } else {
            echo "<p>No user found in the database.</p>";
        }

        $stmt->close();
    } else {
        echo "<p>Query preparation failed.</p>";
    }

    $conn->close();
} else {
    echo "<p>No user logged in.</p>";
}
?>
