<?php
require($_SERVER['DOCUMENT_ROOT'] . '../shared/header.php');
require($_SERVER['DOCUMENT_ROOT'] . '../actions/edit.php');
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // Si no hay una sesión iniciada o el nombre de usuario no está disponible, muestra un valor predeterminado
    $username = "no carga";
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
                    <a class="username"><?php echo $username; ?></a>
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