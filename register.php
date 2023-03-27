<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($password) && !empty($confirm_password)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if ($password == $confirm_password) {
                echo "Registration successful!";
                // Save the user's data to the database or session.
                // Redirect to the login page or another page if needed.
            } else {
                echo "Passwords do not match!";
            }
        } else {
            echo "Invalid email format!";
        }
    } else {
        echo "All fields are required!";
    }
}
?>
