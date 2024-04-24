<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '../db/db.php');

// Check if a user session is set and get the user ID
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $ridename = $_POST['ridename'];
    $startfrom = $_POST['startfrom']; // Change the field name to startfrom
    $endto = $_POST['endto']; // Add the endto field
    $description = $_POST['description'];
    $departure = $_POST['departure'];
    $arrival = $_POST['arrival'];
    $days = isset($_POST['day']) ? implode(", ", $_POST['day']) : ""; // Convert the array of days into a string

    // Validate the data (you can add more validations as needed)
    if (empty($ridename) || empty($startfrom) || empty($endto) || empty($description) || empty($departure) || empty($arrival) || empty($days)) {
        $message = "Please fill out all fields.";
        $success = false; // Add a variable to indicate that there has been an error
    } else {
        // Insert the data into the rides table with the user ID
        $sql = "INSERT INTO rides (ride_name, start_from, end_to, description, departure_time, arrival_time, days, user_id) VALUES ('$ridename', '$startfrom', '$endto', '$description', '$departure', '$arrival', '$days', $user_id)";

        if ($conn->query($sql) === TRUE) {
            $message = "Ride added successfully.";
            $success = true; // Add a variable to indicate that the ride has been added successfully
        } else {
            $message = "Error adding ride: " . $conn->error;
            $success = false; // Add a variable to indicate that there has been an error
        }
    }
}
?>
