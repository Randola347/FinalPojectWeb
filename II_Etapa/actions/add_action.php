<?php
session_start(); // Iniciar la sesión para poder acceder a las variables de sesión

require_once($_SERVER['DOCUMENT_ROOT'] . '../db/db.php');

// Verificar si se ha iniciado sesión y obtener el ID del usuario
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar datos del formulario
    $ridename = $_POST['ridename'];
    $startfrom = $_POST['startfrom']; // Cambiar el nombre del campo a startfrom
    $endto = $_POST['endto']; // Agregar el campo endto
    $description = $_POST['description'];
    $departure = $_POST['departure'];
    $arrival = $_POST['arrival'];
    $days = isset($_POST['day']) ? implode(", ", $_POST['day']) : ""; // Convertir el array de días en una cadena

    // Validar los datos (puedes agregar más validaciones según tus necesidades)
    if (empty($ridename) || empty($startfrom) || empty($endto) || empty($description) || empty($departure) || empty($arrival) || empty($days)) {
        $message = "Por favor complete todos los campos.";
    } else {
        // Insertar los datos en la tabla rides con el ID del usuario
        $sql = "INSERT INTO rides (ride_name, start_from, end_to, description, departure_time, arrival_time, days, user_id) VALUES ('$ridename', '$startfrom', '$endto', '$description', '$departure', '$arrival', '$days', $user_id)";

        if ($conn->query($sql) === TRUE) {
            $message = "Viaje agregado exitosamente.";
        } else {
            $message = "Error al agregar el viaje: " . $conn->error;
        }
    }
}
?>
