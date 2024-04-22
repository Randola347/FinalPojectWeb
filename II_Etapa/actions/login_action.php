<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once($_SERVER['DOCUMENT_ROOT'] . '/db/db.php');

// Función para limpiar los datos del formulario
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

    // Consulta para obtener los datos del usuario
    $sql = "SELECT id, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Las credenciales son válidas, inicia sesión y redirige al dashboard
            $_SESSION['user_id'] = $row['id'];
            header("Location: dashboard.php");
            exit();
        } else {
            $_SESSION['error'] = "Nombre de usuario o contraseña incorrectos.";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Nombre de usuario o contraseña incorrectos.";
        header("Location: login.php");
        exit();
    }
}


