<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once($_SERVER['DOCUMENT_ROOT'] . '/db/db.php');

// Function to sanitize form data
function clean_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = clean_input($_POST['username']);
    $password = $_POST['password'];

    // Query to fetch user data
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Credentials are valid, start session and redirect to dashboard
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username']; // Store username in session
            header("Location: dashboard.php");
            exit();
        } else {
            $_SESSION['error'] = "Incorrect username or password.";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Incorrect username or password.";
        header("Location: login.php");
        exit();
    }
}
?>
