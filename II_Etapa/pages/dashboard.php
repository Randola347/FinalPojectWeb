<?php
// Include necessary files
require_once($_SERVER['DOCUMENT_ROOT'] . '../shared/header.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '../actions/dashboard_action.php');

// Check if a user session is set
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // If no session is set or username is not available, display a default value
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
                        <!-- Column for each navigation link -->
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
                    <a href="#">Dashboard</a>
                    <span class="arrow">></span>
                </div>

                <!-- Title for the section -->
                <p class="title">My Rides</p>
                <!-- Card container for ride information -->
                <div class="card">
                    <!-- Body of the card -->
                    <div class="card-body">
                        <!-- Your current list of Rides -->
                        <p class="title">Your current list of Rides</p>
                        <!-- Button to add a new ride -->
                        <div class="buttonplus" onclick="location.href='../pages/add.php'">
                            <div class="plus horizontal"></div>
                            <div class="plus vertical"></div>
                        </div>
                        <!-- Show success or error messages -->
                        <?php if (isset($message)) : ?>
                            <div class="alert <?php echo isset($success) ? 'alert-success' : 'alert-danger'; ?>" role="alert">
                                <?php echo $message; ?>
                            </div>
                        <?php endif; ?>
                        <!-- Table displaying ride information -->
                        <div class="table">
                            <!-- Table row with column headings -->
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
                            <!-- Loop through rides and display information -->
                            <?php
                            foreach ($rides as $ride) {
                                echo "<div class='row align-items-start ml-3'>";
                                echo "<div class='col'>" . $ride['ride_name'] . "</div>";
                                echo "<div class='col'>" . $ride['start_from'] . "</div>";
                                echo "<div class='col'>" . $ride['end_to'] . "</div>";
                                echo "<div class='col'>";
                                echo "<a href='edit.php?id=" . $ride['id'] . "' class='button'>Edit -</a>";
                                echo "<a href='?delete_id=" . $ride['id'] . "' class='button'>Delete</a>";
                                echo "</div>";
                                echo "</div>";
                            }
                            ?>
                        </div>
                    </div>
                    <!-- Button to add a new ride (similar to the previous one) -->
                    <div class="buttonplus2" onclick="location.href='../pages/add.php'">
                        <div class="plus horizontal"></div>
                        <div class="plus vertical"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>