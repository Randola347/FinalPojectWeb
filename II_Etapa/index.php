<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/shared/header.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/db/db.php');
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
                        <!-- Link to login page -->
                        <a href="../pages/login.php" class="btn">Login</a>
                        <!-- Logo image -->
                        <img src="Image/logo.png" class="img" alt="Fines Ilustrativos">
                        <!-- Title -->
                        <h5 class="title">Welcome to TicoRides.com</h5>
                        <!-- Title for search section -->
                        <p class="title">Search for a Ride</p>
                        <!-- Box containing search form -->
                        <div class="box">
                            <!-- Text for "Form" -->
                            <span>Form</span>
                            <!-- Input field for "From" location -->
                            <input type="text" class="input-text" value="Input Text" onfocus="this.value=''">
                            <!-- Text for "To" -->
                            <span>To</span>
                            <!-- Input field for "To" location -->
                            <input type="text" class="input-text" value="Input Text" onfocus="this.value=''">
                            <!-- Button to find rides -->
                            <button class="my-button">Find my Ride!</button>
                        </div>
                        <!-- Title for results section -->
                        <p class="title">Results for Rides that matches your criteria:</p>
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
                            // Consulta para obtener todos los viajes
                            $sql = "SELECT rides.*, users.username 
                            FROM rides 
                            JOIN users ON rides.user_id = users.id
                            ";
                            $result = $conn->query($sql);

                            // Verificar si hay resultados
                            if ($result->num_rows > 0) {
                                // Mostrar los viajes en la tabla
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
                                // Si no hay viajes, mostrar un mensaje de que no hay resultados
                                echo "No hay resultados de viajes.";
                            }
                            ?>
                            <!-- Fin del código PHP -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>