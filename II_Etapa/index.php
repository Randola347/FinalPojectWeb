<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '../shared/header.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '../actions/index_action.php');

// Si se ha enviado el formulario, los resultados se mostrarán después de la búsqueda
// De lo contrario, se mostrarán todos los viajes disponibles
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $from = $_POST['from'];
    $to = $_POST['to'];

    // Consulta SQL para buscar rides que coincidan con los criterios de búsqueda
    $sql = "SELECT rides.*, users.username 
            FROM rides 
            JOIN users ON rides.user_id = users.id 
            WHERE start_from LIKE '%$from%' AND end_to LIKE '%$to%'";

    $result = $conn->query($sql);
} else {
    // Consulta SQL para obtener todos los rides si no se ha enviado el formulario
    $sql = "SELECT rides.*, users.username 
            FROM rides 
            JOIN users ON rides.user_id = users.id";

    $result = $conn->query($sql);
}
?>

<body>
    <!-- Container for page content -->
    <div class="container">
        <!-- Row for content, centered -->
        <div class="row justify-content-center mt-5">
            <!-- Column with a width of 8 for medium-sized screens -->
            <div class="col-md-8">
                <!-- Card container -->
                <div class="card">
                    <!-- Card body -->
                    <div class="card-body">
                        <a href="../pages/login.php" class="btn">Login</a>
                        <!-- Logo image -->
                        <img src="Image/logo.png" class="img" alt="Fines Ilustrativos">
                        <!-- Title -->
                        <h5 class="title">Welcome to TicoRides.com</h5>
                        <!-- Title for search section -->
                        <p class="title">Search for a Ride</p>
                        <!-- Form for search -->
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <!-- Box containing search form -->
                            <div class="box">
                                <!-- Text for "Form" -->
                                <span>Form</span>
                                <!-- Input field for "From" location -->
                                <input type="text" name="from" class="input-text" placeholder="From" required>
                                <!-- Text for "To" -->
                                <span>To</span>
                                <!-- Input field for "To" location -->
                                <input type="text" name="to" class="input-text" placeholder="To" required>
                                <!-- Button to find rides -->
                                <button type="submit" class="my-button">Find my Ride!</button>
                            </div>
                        </form>
                        <!-- Title for results section -->
                        <p class="title">Results for Rides that match your criteria:</p>
                        <!-- Table displaying ride results -->
                        <div class="table">
                            <!-- Table row with column headings -->
                            <div class="row align-items-start ml-3">
                                <div class="col">
                                    User
                                </div>
                                <div class="col">
                                    Start
                                </div>
                                <div class="col">
                                    End
                                </div>
                                <div class="col">
                                    <!-- Empty column for actions -->
                                </div>
                            </div>
                            <!-- PHP code to display rides -->
                            <?php
                            if ($result->num_rows > 0) {
                                // Mostrar los rides
                                while ($row = $result->fetch_assoc()) {
                                    echo "<div class='row align-items-start ml-3'>";
                                    echo "<div class='col'>" . $row['username'] . "</div>";
                                    echo "<div class='col'>" . $row['start_from'] . "</div>";
                                    echo "<div class='col'>" . $row['end_to'] . "</div>";
                                    echo "<div class='col'>";
                                    echo "<a href='../pages/view_ride.php?id=" . $row['id'] . "' class='button'>View</a>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                            } else {
                                echo "No hay resultados de rides.";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
