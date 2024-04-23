<?php
require($_SERVER['DOCUMENT_ROOT'] . '../db/db.php');
// Variable para almacenar los mensajes
$message = "";

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar datos del formulario
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar si el campo 'confirm_password' está definido en $_POST
    if (isset($_POST['confirm_password'])) {
        $confirm_password = $_POST['confirm_password'];

        // Verificar si todos los campos obligatorios están completos
        if (empty($name) || empty($lastname) || empty($phone) || empty($username) || empty($password) || empty($confirm_password)) {
            $message = "<span style='color: red;'>Por favor complete todos los campos.</span>";
        } elseif ($password != $confirm_password) {
            $message = "<span style='color: red;'>Las contraseñas no coinciden.</span>";
        } else {
            // Verificar si el nombre de usuario o el número de teléfono ya existen en la base de datos
            $query = "SELECT * FROM users WHERE username = '$username' OR phone = '$phone'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                $message = "<span style='color: red;'>Ya existe un usuario con el mismo nombre de usuario o número de teléfono.</span>";
            } else {
                // Cifrar la contraseña
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Insertar usuario en la base de datos
                $query = "INSERT INTO users (name, last_name, phone, username, password, confirm_password) 
                          VALUES ('$name', '$lastname', '$phone', '$username', '$hashed_password', '$confirm_password')";

                if (mysqli_query($conn, $query)) {
                    // Usuario registrado exitosamente
                    $message = "<span style='color: green;'>Usuario registrado exitosamente.</span>";
                    // Redirigir al usuario al login.php
                    header("Location: login.php");
                    exit(); // Asegúrate de salir después de redirigir para evitar que el script continúe ejecutándose
                } else {
                    $message = "<span style='color: red;'>Error al registrar el usuario: " . mysqli_error($conn) . "</span>";
                }
            }
        }
    } else {
        $message = "<span style='color: red;'>Error: Confirmación de contraseña no recibida.</span>";
    }
}
?>