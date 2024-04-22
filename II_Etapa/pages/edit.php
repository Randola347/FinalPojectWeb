<?php
require($_SERVER['DOCUMENT_ROOT'] . '/shared/header.php');
require($_SERVER['DOCUMENT_ROOT'] . '/actions/dashboard_action.php');

// Verificar si se ha enviado el ID del viaje a editar
if (isset($_GET['id'])) {
    $ride_id = $_GET['id'];
} else {
    // Si no se ha enviado el ID, redirigir a la página de dashboard o mostrar un mensaje de error
    header("Location: dashboard.php");
    exit();
}

// Obtener los detalles del viaje que se va a editar de la base de datos
$sql = "SELECT ride_name, start_from, end_to, description, departure_time, arrival_time, days FROM rides WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $ride_id);
$stmt->execute();
$stmt->bind_result($ride_name, $start_from, $end_to, $description, $departure_time, $arrival_time, $days);
$stmt->fetch();
$stmt->close();

// Convertir la cadena de días en un array
$selected_days = explode(',', $days);

// Verificar si se ha enviado el formulario para actualizar los detalles del viaje
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $ride_name = $_POST['ridename'];
    $start_from = $_POST['startfrom'];
    $end_to = $_POST['endto'];
    $description = $_POST['description'];
    $departure_time = $_POST['departure'];
    $arrival_time = $_POST['arrival'];
    $days = implode(',', $_POST['day']);

    // Actualizar los detalles del viaje en la base de datos
    $sql_update = "UPDATE rides SET ride_name=?, start_from=?, end_to=?, description=?, departure_time=?, arrival_time=?, days=? WHERE id=?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("sssssssi", $ride_name, $start_from, $end_to, $description, $departure_time, $arrival_time, $days, $ride_id);
    $stmt_update->execute();

    // Verificar si la actualización fue exitosa y mostrar un mensaje al usuario
    if ($stmt_update->affected_rows > 0) {
        $message = "¡Los detalles del viaje se actualizaron correctamente!";
        $success = true;
    } else {
        $message = "¡No se pudo actualizar los detalles del viaje!";
        $success = false;
    }

    $stmt_update->close();

    // Obtener los detalles actualizados del viaje de la base de datos
    $sql_get_details = "SELECT ride_name, start_from, end_to, description, departure_time, arrival_time, days FROM rides WHERE id = ?";
    $stmt_get_details = $conn->prepare($sql_get_details);
    $stmt_get_details->bind_param("i", $ride_id);
    $stmt_get_details->execute();
    $stmt_get_details->bind_result($ride_name, $start_from, $end_to, $description, $departure_time, $arrival_time, $days);
    $stmt_get_details->fetch();
    $stmt_get_details->close();

    // Convertir la cadena de días en un array
    $selected_days = explode(',', $days);
}
?>

<body>
    <!-- Container for page content -->
    <div class="container">
        <!-- Row for content, centered -->
        <div class="row justify-content-center mt-5">
            <!-- Column with a width of 8 for medium-sized screens -->
            <div class="col-md-8">
                <!-- Logo image -->
                <img src="../Image/logo.png" class="img" alt="Fines Ilustrativos">
                <!-- Card container -->
                <div class="card">
                    <!-- Row for navigation links -->
                    <div class="row align-items-start ml-1">
                        <div class="col">
                            <a href="dashboard.php" class="buttonmain">Dashboard</a>
                        </div>
                        <div class="col">
                            <a href="add.php" class="buttonmain">Rides</a>
                        </div>
                        <div class="col">
                            <a href="settings.php" class="buttonmain">Settings</a>
                        </div>
                    </div>
                </div>
                <!-- Welcome message with user's name -->
                <div class="welcome-user">
                    <span>Welcome</span>
                    <a class="username">barroyo</a>
                    <img src="../Image/user.png" alt="User Icon" class="user-icon">
                    <h2 class="title">Dashboard</h2>
                </div>
                <!-- Breadcrumb links -->
                <div class="dashboard-link">
                    <a href="dashboard.php">Dashboard</a>
                    <span class="arrow">></span>
                    <a href="edit.php">Edit</a>
                </div>
                <!-- Information section -->
                <div class="info">
                    <!-- Mostrar mensajes de éxito o error -->
                    <?php if (isset($message)) : ?>
                        <div class="alert <?php echo isset($success) ? 'alert-success' : 'alert-danger'; ?>" role="alert">
                            <?php echo $message; ?>
                        </div>
                    <?php endif; ?>
                    <!-- Formulario para editar un viaje -->
                    <form method="POST">
                        <!-- Label y campo de entrada para el nombre del viaje -->
                        <label for="ridename" class="form-label">Nombre del Viaje</label>
                        <input type="text" class="form-control" id="ridename" name="ridename" value="<?php echo $ride_name; ?>">
                        <!-- Label y campo de entrada para el lugar de salida -->
                        <label for="startfrom" class="form-label">Lugar de Salida</label>
                        <input type="text" class="form-control" id="startfrom" name="startfrom" value="<?php echo $start_from; ?>">
                        <!-- Label y campo de entrada para el lugar de llegada -->
                        <label for="endto" class="form-label">Lugar de Llegada</label>
                        <input type="text" class="form-control" id="endto" name="endto" value="<?php echo $end_to; ?>">
                        <!-- Label y área de texto para la descripción del viaje -->
                        <label for="description" class="form-label">Descripción</label>
                        <textarea id="description" name="description" class="form-control"><?php echo $description; ?></textarea>
                        <!-- Subtítulo para el horario -->
                        <h3>Cuando</h3>
                        <!-- Fila para los campos de horario -->
                        <div class="row align-items-start ml-3">
                            <!-- Columna para la hora de salida -->
                            <div class="col">
                                <!-- Label y campo de entrada para la hora de salida -->
                                <label for="departure" class="form-label">Hora de Salida</label>
                                <input type="time" class="form-control" id="departure" name="departure" value="<?php echo $departure_time; ?>">
                                <!-- Label y campo de entrada para la hora estimada de llegada -->
                                <label for="arrival" class="form-label">Hora Estimada de Llegada</label>
                                <input type="time" class="form-control" id="arrival" name="arrival" value="<?php echo $arrival_time; ?>">
                                <!-- Enlace para cancelar -->
                                <a class="cancel" href="dashboard.php">Cancelar</a>
                            </div>
                            <!-- Columna para seleccionar los días -->
                            <div class="col">
                                <!-- Label para la selección de días -->
                                <label for="days" class="form-label">Seleccione los Días</label>
                                <div id="days">
                                    <!-- Casillas de verificación para cada día -->
                                    <?php
                                    $week_days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                                    foreach ($week_days as $day) {
                                        $checked = in_array($day, $selected_days) ? 'checked' : '';
                                        echo "<input type='checkbox' id='$day' name='day[]' value='$day' $checked>";
                                        echo "<label for='$day'>$day</label><br>";
                                    }
                                    ?>
                                    <!-- Botón para guardar los cambios -->
                                    <button type="submit" class="save">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
