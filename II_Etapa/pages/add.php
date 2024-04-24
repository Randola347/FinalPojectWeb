<?php
session_start(); // Start the session if not already started

require($_SERVER['DOCUMENT_ROOT'] . '/shared/header.php'); // Correct the inclusion path for header.php
require($_SERVER['DOCUMENT_ROOT'] . '/actions/add_action.php'); // Ensure inclusion of add_action.php

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
                    <a href="add.php">Add</a>
                </div>
                <!-- Information section -->
                <div class="info">
                    <!-- Show success or error messages -->
                    <?php if (isset($message)) : ?>
                        <div class="alert <?php echo $success ? 'alert-success' : 'alert-danger'; ?>" role="alert">
                            <?php echo $message; ?>
                        </div>
                    <?php endif; ?>
                    <!-- Form for adding a ride -->
                    <form method="POST">
                        <!-- Label and input field for ride name -->
                        <label for="ridename" class="form-label">Ride Name</label>
                        <input type="text" class="form-control" id="ridename" name="ridename" value="" placeholder="Ride Name">
                        <!-- Label and input field for start location -->
                        <label for="startfrom" class="form-label">Start Location</label>
                        <input type="text" class="form-control" id="startfrom" name="startfrom" value="" placeholder="Start Location">
                        <!-- Label and input field for end location -->
                        <label for="endto" class="form-label">End Location</label>
                        <input type="text" class="form-control" id="endto" name="endto" value="" placeholder="End Location">
                        <!-- Label and text area for ride description -->
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" name="description" class="form-control" placeholder="Description"></textarea>
                        <!-- Subtitle for schedule -->
                        <h3>When</h3>
                        <!-- Row for schedule fields -->
                        <div class="row align-items-start ml-3">
                            <!-- Column for departure time -->
                            <div class="col">
                                <!-- Label and input field for departure time -->
                                <label for="departure" class="form-label">Departure Time</label>
                                <input type="time" class="form-control" id="departure" name="departure" value="07:00"> <!-- Default value set to 07:00 -->
                                <!-- Label and input field for estimated arrival time -->
                                <label for="arrival" class="form-label">Estimated Arrival Time</label>
                                <input type="time" class="form-control" id="arrival" name="arrival" value="09:00"> <!-- Default value set to 09:00 -->
                                <!-- Link to cancel -->
                                <a class="cancel" href="dashboard.php">Cancel</a>
                            </div>
                            <!-- Column for selecting days -->
                            <div class="col">
                                <!-- Label for day selection -->
                                <label for="days" class="form-label">Select Days</label>
                                <div id="days">
                                    <!-- Checkboxes for each day -->
                                    <?php
                                    $week_days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                                    foreach ($week_days as $day) {
                                        $checked = isset($selected_days) && in_array($day, $selected_days) ? 'checked' : '';
                                        echo "<input type='checkbox' id='$day' name='day[]' value='$day' $checked>";
                                        echo "<label for='$day'>$day</label><br>";
                                    }
                                    ?>
                                    <!-- Button to save changes -->
                                    <button type="submit" class="save">Save</button>
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