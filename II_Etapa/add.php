<?php
require($_SERVER['DOCUMENT_ROOT'] . '../shared/header.php');
require($_SERVER['DOCUMENT_ROOT'] . '../actions/add_action.php');
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
                    <img src="Image/user.png" alt="User Icon" class="user-icon">
                    <h2 class="title">Dashboard</h2>
                </div>
                <!-- Breadcrumb links -->
                <div class="dashboard-link">
                    <a href="dashboard.php">Dashboard</a>
                    <span class="arrow">></span>
                    <a href="rides.php">Rides</a>
                    <span href="add.php" class="arrow">> Add</span>
                </div>
                <!-- Information section -->
                <div class="info">
                    <!-- Mostrar mensajes de éxito o error -->
                    <?php if (isset($message)) : ?>
                        <div class="alert <?php echo isset($success) ? 'alert-success' : 'alert-danger'; ?>" role="alert">
                            <?php echo $message; ?>
                        </div>
                    <?php endif; ?>
                    <!-- Formulario para agregar un viaje -->
                    <form method="POST">
                        <!-- Label y campo de entrada para el nombre del viaje -->
                        <label for="ridename" class="form-label">Nombre del Viaje</label>
                        <input type="text" class="form-control" id="ridename" name="ridename" placeholder="Input Text">
                        <!-- Label y campo de entrada para el lugar de salida -->
                        <label for="startfrom" class="form-label">Lugar de Salida</label>
                        <input type="text" class="form-control" id="startfrom" name="startfrom" placeholder="Input Text">
                        <!-- Label y campo de entrada para el lugar de llegada -->
                        <label for="endto" class="form-label">Lugar de Llegada</label>
                        <input type="text" class="form-control" id="endto" name="endto" placeholder="Input Text">
                        <!-- Label y área de texto para la descripción del viaje -->
                        <label for="description" class="form-label">Descripción</label>
                        <textarea id="description" name="description" class="form-control" placeholder="Add here The description of the ride"></textarea>
                        <!-- Subtítulo para el horario -->
                        <h3>Cuando</h3>
                        <!-- Fila para los campos de horario -->
                        <div class="row align-items-start ml-3">
                            <!-- Columna para la hora de salida -->
                            <div class="col">
                                <!-- Label y campo de entrada para la hora de salida -->
                                <label for="departure" class="form-label">Hora de Salida</label>
                                <input type="time" class="form-control" id="departure" name="departure" value="07:00">
                                <!-- Label y campo de entrada para la hora estimada de llegada -->
                                <label for="arrival" class="form-label">Hora Estimada de Llegada</label>
                                <input type="time" class="form-control" id="arrival" name="arrival" value="08:30">
                                <!-- Enlace para cancelar -->
                                <a class="cancel" href="dashboard.php">Cancelar</a>
                            </div>
                            <!-- Columna para seleccionar los días -->
                            <div class="col">
                                <!-- Label para la selección de días -->
                                <label for="days" class="form-label">Seleccione los Días</label>
                                <div id="days">
                                    <!-- Casillas de verificación para cada día -->
                                    <input type="checkbox" id="monday" name="day[]" value="Monday">
                                    <label for="monday">Monday</label><br>
                                    <input type="checkbox" id="tuesday" name="day[]" value="Tuesday">
                                    <label for="tuesday">Tuesday</label><br>
                                    <input type="checkbox" id="wednesday" name="day[]" value="Wednesday">
                                    <label for="wednesday">Wednesday</label><br>
                                    <input type="checkbox" id="thursday" name="day[]" value="Thursday">
                                    <label for="thursday">Thursday</label><br>
                                    <input type="checkbox" id="friday" name="day[]" value="Friday">
                                    <label for="friday">Friday</label><br>
                                    <input type="checkbox" id="saturday" name="day[]" value="Saturday">
                                    <label for="saturday">Saturday</label><br>
                                    <input type="checkbox" id="sunday" name="day[]" value="Sunday">
                                    <label for="sunday">Sunday</label><br>
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