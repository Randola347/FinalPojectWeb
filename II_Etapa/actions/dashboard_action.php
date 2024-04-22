<?php
// Incluir el archivo de conexión a la base de datos y cualquier otra configuración necesaria
require_once($_SERVER['DOCUMENT_ROOT'] . '/db/db.php');

// Obtener el ID del usuario de la sesión (asumiendo que ya ha iniciado sesión)
session_start();
$user_id = $_SESSION['user_id'];

// Consulta para obtener los rides del usuario
$sql = "SELECT * FROM rides WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Inicializar un array para almacenar los rides
$rides = [];

// Recorrer los resultados y almacenarlos en el array $rides
while ($row = $result->fetch_assoc()) {
    $rides[] = $row;
}

// Verificar si se ha enviado un ID de viaje para eliminar
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Eliminar el viaje de la base de datos
    $sql = "DELETE FROM rides WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();

    // Verificar si la eliminación fue exitosa y mostrar un mensaje al usuario
    if ($stmt->affected_rows > 0) {
        $message = "¡El viaje se eliminó correctamente!";
        $success = true;
    } else {
        $message = "¡No se pudo eliminar el viaje!";
        $success = false;
    }

    // Redireccionar de vuelta a dashboard.php después de la eliminación
    header("Location: dashboard.php");
    exit();
}
