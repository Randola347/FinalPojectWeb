<?php
require($_SERVER['DOCUMENT_ROOT'] . '../db/db.php');

// Variable to store messages
$message = "";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if 'confirm_password' field is set in $_POST
    if (isset($_POST['confirm_password'])) {
        $confirm_password = $_POST['confirm_password'];

        // Check if all mandatory fields are filled
        if (empty($name) || empty($lastname) || empty($phone) || empty($username) || empty($password) || empty($confirm_password)) {
            $message = "<span style='color: red;'>Please fill out all fields.</span>";
        } elseif ($password != $confirm_password) {
            $message = "<span style='color: red;'>Passwords do not match.</span>";
        } elseif (!preg_match('/^\d{8}$/', $phone)) {
            // Check if phone number has exactly 8 digits
            $message = "<span style='color: red;'>Phone number must be 8 digits long.</span>";
        } else {
            // Check if username or phone number already exists in the database
            $query = "SELECT * FROM users WHERE username = '$username' OR phone = '$phone'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                $message = "<span style='color: red;'>A user with the same username or phone number already exists.</span>";
            } else {
                // Hash the password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Insert user into the database
                $query = "INSERT INTO users (name, last_name, phone, username, password, confirm_password) 
                          VALUES ('$name', '$lastname', '$phone', '$username', '$hashed_password', '$confirm_password')";

                if (mysqli_query($conn, $query)) {
                    // User registered successfully
                    $message = "<span style='color: green;'>User registered successfully.</span>";

                    // Get the ID of the newly inserted user
                    $user_id = mysqli_insert_id($conn);

                    // Insert empty record in user_data table with the user_id of the newly created user
                    $query_user_data = "INSERT INTO user_data (full_name, average_speed, about_me, id_user) VALUES ('', '', '', $user_id)";

                    mysqli_query($conn, $query_user_data);

                    // Redirect user to login.php
                    header("Location: login.php");
                    exit(); // Make sure to exit after redirecting to prevent script from continuing execution
                } else {
                    $message = "<span style='color: red;'>Error registering user: " . mysqli_error($conn) . "</span>";
                }
            }
        }
    } else {
        $message = "<span style='color: red;'>Error: Confirm password not received.</span>";
    }
}
?>
