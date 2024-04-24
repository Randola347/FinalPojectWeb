<?php
require($_SERVER['DOCUMENT_ROOT'] . '../db/db.php');

session_start();
$user_id = $_SESSION['user_id'];

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si el usuario está autenticado
    if (isset($_SESSION['user_id'])) {
        // Obtener los datos del formulario
        $full_name = $_POST['fullname'];
        $average_speed = $_POST['speedAverage'];
        $about_me = $_POST['aboutMe'];

        // Verificar si ya existen datos para este usuario
        $stmt_select = $conn->prepare("SELECT COUNT(*) FROM user_data WHERE user_id = ?");
        $stmt_select->bind_param("i", $user_id);
        $stmt_select->execute();
        $stmt_select->bind_result($count);
        $stmt_select->fetch();
        $stmt_select->close();

        if ($count > 0) {
            // Si existen datos, actualizarlos
            $stmt_update = $conn->prepare("UPDATE user_data SET full_name = ?, average_speed = ?, about_me = ? WHERE user_id = ?");
            $stmt_update->bind_param("sssi", $full_name, $average_speed, $about_me, $user_id);

            if ($stmt_update->execute()) {
                // Redirigir al usuario al dashboard después de guardar los datos
                header("Location: ../pages/settings.php");
                exit();
            } else {
                // Mostrar un mensaje de error si no se pudieron guardar los datos
                echo "Error al actualizar los datos en la base de datos.";
            }

            $stmt_update->close();
        } else {
            // Si no existen datos, insertar nuevos datos
            $stmt_insert = $conn->prepare("INSERT INTO user_data (full_name, average_speed, about_me, user_id) VALUES (?, ?, ?, ?)");
            $stmt_insert->bind_param("sssi", $full_name, $average_speed, $about_me, $user_id);

            if ($stmt_insert->execute()) {
                // Redirigir al usuario al dashboard después de guardar los datos
                header("Location: ../pages/dashboard.php");
                exit();
            } else {
                // Mostrar un mensaje de error si no se pudieron guardar los datos
                echo "Error al insertar los datos en la base de datos.";
            }

            $stmt_insert->close();
        }
    } else {
        // Si el usuario no está autenticado, redirigirlo al login
        header("Location: ../pages/login.php");
        exit();
    }
} else {
    // Si no se ha enviado el formulario, obtener los datos del usuario
    // Consulta SQL para obtener los datos del usuario desde la tabla user_data
    $query = "SELECT full_name, average_speed, about_me FROM user_data WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($full_name, $average_speed, $about_me);
    $stmt->fetch();
    $stmt->close();
}
