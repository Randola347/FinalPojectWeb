<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '../shared/header.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '../actions/dashboard_action.php');

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // Si no hay una sesión iniciada o el nombre de usuario no está disponible, muestra un valor predeterminado
    $username = "no carga";
}

?>

<body>
    <div class="container">
        <!-- Container for page content -->
        <div class="row justify-content-center mt-5">
            <!-- Row for content, centered -->
            <div class="col-md-8">
                <!-- Column with a width of 8 for medium-sized screens -->
                <img src="../Image/logo.png" class="img" alt="Fines Ilustrativos">
                <!-- Logo image -->
                <div class="card">
                    <!-- Card container -->
                    <div class="row align-items-start ml-1">
                        <!-- Row for navigation links -->
                        <div class="col">
                            <!-- Column for each navigation link -->
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
                <div class="welcome-user">
                    <!-- Welcome message with user's name -->
                    <span>Welcome</span>
                    <a class="username"><?php echo $username; ?></a>
                    <img src="../Image/user.png" alt="User Icon" class="user-icon">
                    <h2 class="title">Dashboard</h2>
                </div>

                <div class="dashboard-link">
                    <!-- Link to the dashboard -->
                    <a href="#">Dashboard</a>
                    <span class="arrow">></span>
                </div>

                <p class="title">My Rides</p>
                <!-- Title for the section -->
                <div class="card">
                    <!-- Card container for ride information -->
                    <div class="card-body">
                        <!-- Body of the card -->
                        <p class="title">Your current list of Rides</p>
                        <!-- Title for the list of rides -->
                        <div class="buttonplus" onclick="location.href='../pages/add.php'">
                            <!-- Button to add a new ride -->
                            <div class="plus horizontal"></div>
                            <div class="plus vertical"></div>
                        </div>
                        <?php if (isset($message)) : ?>
                            <div class="alert <?php echo isset($success) ? 'alert-success' : 'alert-danger'; ?>" role="alert">
                                <?php echo $message; ?>
                            </div>
                        <?php endif; ?>
                        <!-- Table displaying ride information -->
                        <div class="table">
                            <div class="row align-items-start ml-3">
                                <div class="col">
                                    Name
                                </div>
                                <div class="col">
                                    Start
                                </div>
                                <div class="col">
                                    End
                                </div>
                                <div class="col">
                                    Actions
                                </div>
                            </div>
                            <?php
                            foreach ($rides as $ride) {
                                echo "<div class='row align-items-start ml-3'>";
                                echo "<div class='col'>" . $ride['ride_name'] . "</div>";
                                echo "<div class='col'>" . $ride['start_from'] . "</div>";
                                echo "<div class='col'>" . $ride['end_to'] . "</div>";
                                echo "<div class='col'>";
                                echo "<a href='edit.php?id=" . $ride['id'] . "' class='button'>Edit -</a>";;
                                echo "<a href='?delete_id=" . $ride['id'] . "' class='button'>Delete</a>";;
                                echo "</div>";
                                echo "</div>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="buttonplus2" onclick="location.href='../pages/add.php'">
                        <!-- Button to add a new ride (similar to the previous one) -->
                        <div class="plus horizontal"></div>
                        <div class="plus vertical"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>