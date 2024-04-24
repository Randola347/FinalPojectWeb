<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/shared/header.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/db/db.php');


// Verificar si se proporcionó un ID de viaje en la URL
if (isset($_GET['id'])) {
    $ride_id = $_GET['id'];

    // Consulta para obtener los detalles del viaje con el ID proporcionado
    $sql = "SELECT * FROM rides WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $ride_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si se encontró el viaje
    if ($result->num_rows == 1) {
        $ride = $result->fetch_assoc();
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
                        <!-- Information section -->
                        <div class="info">
                            <!-- Label and input field for ride name -->
                            <label for="ridename" class="form-label">Nombre del Viaje</label>
                            <!-- Mostrar el nombre del viaje -->
                            <input type="text" class="form-control" id="ridename" value="<?php echo $ride['ride_name']; ?>" disabled>
                            <!-- Label and input field for starting location -->
                            <label for="startfrom" class="form-label">Lugar de Salida</label>
                            <!-- Mostrar el lugar de salida -->
                            <input type="text" class="form-control" id="location" value="<?php echo $ride['start_from']; ?>" disabled>
                            <!-- Label and textarea for ride description -->
                            <label for="description" class="form-label">Descripción</label>
                            <div class="description">
                                <!-- Mostrar la descripción del viaje -->
                                <textarea id="description" disabled><?php echo $ride['description']; ?></textarea>
                                <!-- Subheading for schedule -->
                                <h3>Cuando</h3>
                                <!-- Row for schedule inputs -->
                                <div class="row align-items-start ml-3">
                                    <!-- Column for time inputs -->
                                    <div class="col">
                                        <!-- Label and input field for departure time -->
                                        <label for="departure" class="form-label">Hora de Salida</label>
                                        <!-- Mostrar la hora de salida -->
                                        <input type="time" class="form-control" id="departure" value="<?php echo $ride['departure_time']; ?>" disabled>
                                        <!-- Label and input field for estimated arrival time -->
                                        <label for="arrival" class="form-label">Hora Estimada de Llegada</label>
                                        <!-- Mostrar la hora de llegada estimada -->
                                        <input type="time" class="form-control" id="arrival" value="<?php echo $ride['arrival_time']; ?>" disabled>
                                         <!-- Link to cancel -->
                                         <a class="cancel" href="../index.php">Cancelar</a>
                                    </div>
                                    <!-- Column for selecting days -->
                                    <div class="col">
                                        <!-- Label for day selection -->
                                        <label for="days" class="form-label">Dias</label>
                                        <!-- Mostrar los días del viaje -->
                                        <div id="days">
                                            <?php
                                            // Convertir los días del viaje de formato numérico a nombre del día
                                            $days = explode(',', $ride['days']);
                                            $day_names = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                                            foreach ($day_names as $day_name) {
                                                // Verificar si el nombre del día está en la lista de días del viaje
                                                if (in_array($day_name, $days)) {
                                                    echo "<div><input type='checkbox' id='$day_name' name='day' value='$day_name' checked disabled>";
                                                    echo "<label for='$day_name'>$day_name</label></div>";
                                                } else {
                                                    echo "<div><input type='checkbox' id='$day_name' name='day' value='$day_name' disabled>";
                                                    echo "<label for='$day_name'>$day_name</label></div>";
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>

        </html>
<?php
    } else {
        // Si no se encontró el viaje, mostrar un mensaje de error
        echo "No se encontró el viaje.";
    }
} else {
    // Si no se proporcionó un ID de viaje en la URL, mostrar un mensaje de error
    echo "No se proporcionó un ID de viaje.";
}
?>