<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login_email = $_POST["login_email"];
    $login_password = $_POST["login_password"];

    if (!empty($login_email) && !empty($login_password)) {
        // Check the user's credentials against the database or saved session data.
        // Replace the following example check with your own database validation logic.
        $is_valid = example_check_credentials($login_email, $login_password);

        if ($is_valid) {
            $_SESSION["first_name"] = "John"; // Replace "John" with the user's first name from your database.
            $_SESSION["email"] = $login_email;
            header("Location: welcome.php");
            exit;
        } else {
            echo "Invalid email or password!";
        }
    } else {
        echo "Both fields are required!";
    }
}

// Example function to check credentials. Replace this with your own logic.
function example_check_credentials($email, $password) {
    // Perform database query and password validation here.
    // This is just an example, so we're using hardcoded values.
    $stored_email = "user@example.com";
    $stored_password = "password123";

    if ($email == $stored_email && $password == $stored_password) {
        return true;
    } else {
        return false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login Form</h1>
    <form action="login.php" method="POST">
        <label for="login_email">Email Address:</label>
        <input type="email" name="login_email" id="login_email" required>
        <br>
        <label for="login_password">Password:</label>
        <input type="password" name="login_password" id="login_password" required>
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
