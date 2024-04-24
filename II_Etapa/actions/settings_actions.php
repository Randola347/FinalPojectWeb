<?php
require($_SERVER['DOCUMENT_ROOT'] . '../db/db.php');

session_start();
$user_id = $_SESSION['user_id'];

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the user is authenticated
    if (isset($_SESSION['user_id'])) {
        // Get form data
        $full_name = $_POST['fullname'];
        $average_speed = $_POST['speedAverage'];
        $about_me = $_POST['aboutMe'];

        // Check if data already exists for this user
        $stmt_select = $conn->prepare("SELECT COUNT(*) FROM user_data WHERE user_id = ?");
        $stmt_select->bind_param("i", $user_id);
        $stmt_select->execute();
        $stmt_select->bind_result($count);
        $stmt_select->fetch();
        $stmt_select->close();

        if ($count > 0) {
            // If data exists, update it
            $stmt_update = $conn->prepare("UPDATE user_data SET full_name = ?, average_speed = ?, about_me = ? WHERE user_id = ?");
            $stmt_update->bind_param("sssi", $full_name, $average_speed, $about_me, $user_id);

            if ($stmt_update->execute()) {
                // Redirect user to dashboard after saving data
                header("Location: ../pages/settings.php");
                exit();
            } else {
                // Show error message if data could not be saved
                echo "Error updating data in the database.";
            }

            $stmt_update->close();
        } else {
            // If data doesn't exist, insert new data
            $stmt_insert = $conn->prepare("INSERT INTO user_data (full_name, average_speed, about_me, user_id) VALUES (?, ?, ?, ?)");
            $stmt_insert->bind_param("sssi", $full_name, $average_speed, $about_me, $user_id);

            if ($stmt_insert->execute()) {
                // Redirect user to dashboard after saving data
                header("Location: ../pages/dashboard.php");
                exit();
            } else {
                // Show error message if data could not be saved
                echo "Error inserting data into the database.";
            }

            $stmt_insert->close();
        }
    } else {
        // If user is not authenticated, redirect to login
        header("Location: ../pages/login.php");
        exit();
    }
} else {
    // If form has not been submitted, get user data
    // SQL query to retrieve user data from user_data table
    $query = "SELECT full_name, average_speed, about_me FROM user_data WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($full_name, $average_speed, $about_me);
    $stmt->fetch();
    $stmt->close();
}
