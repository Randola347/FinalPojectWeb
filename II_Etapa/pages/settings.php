<?php
// Include necessary files
require($_SERVER['DOCUMENT_ROOT'] . '../shared/header.php');
require($_SERVER['DOCUMENT_ROOT'] . '../actions/settings_actions.php');

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
                    <a href="dashboard.php">Dashboard</a>
                    <span href="settings.php" class="arrow">> Settings</span>
                </div>
                <!-- Information section -->
                <div class="info">
                    <!-- Form for updating user settings -->
                    <form method="post" action="../actions/settings_actions.php">
                        <!-- Label and input field for full name -->
                        <label for="fullname" class="form-label">Full Name</label>
                        <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Full Name" value="<?php echo htmlspecialchars($full_name); ?>">
                        <!-- Label and input field for average speed -->
                        <label for="speedAverage" class="form-label">Average Speed</label>
                        <input type="text" name="speedAverage" class="form-control" id="speedAverage" placeholder="km/h" value="<?php echo htmlspecialchars($average_speed); ?>">
                        <!-- Label and textarea for personal description -->
                        <label for="aboutMe" class="form-label">About Me</label>
                        <textarea name="aboutMe" id="aboutMe" class="form-control" placeholder="Something about me goes here"><?php echo htmlspecialchars($about_me); ?></textarea>
                        <!-- Buttons for cancel and save -->
                        <div class="buttons">
                            <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>