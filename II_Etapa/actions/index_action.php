<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/db/db.php');

// Función para limpiar los datos del formulario
function clean_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// No se ha enviado el formulario de búsqueda, mostrar todos los viajes disponibles
$sql = "SELECT rides.*, users.username 
            FROM rides 
            JOIN users ON rides.user_id = users.id";
$result = $conn->query($sql);

