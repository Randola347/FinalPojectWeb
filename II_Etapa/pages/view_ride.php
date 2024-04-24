<?php
// Include necessary files
require_once($_SERVER['DOCUMENT_ROOT'] . '/shared/header.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/db/db.php');

// Check if a ride ID is provided in the URL
if (isset($_GET['id'])) {
    $ride_id = $_GET['id'];

    // Query to retrieve ride details with the provided ID
    $sql = "SELECT * FROM rides WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $ride_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the ride is found
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
                        <img src="../Image/logo.png" class="img" alt="Illustrative Purposes">
                        <!-- Information section -->
                        <div class="info">
                            <!-- Label and input field for ride name -->
                            <label for="ridename" class="form-label">Ride Name</label>
                            <!-- Display the ride name -->
                            <input type="text" class="form-control" id="ridename" value="<?php echo $ride['ride_name']; ?>" disabled>
                            <!-- Label and input field for starting location -->
                            <label for="startfrom" class="form-label">Start Location</label>
                            <!-- Display the starting location -->
                            <input type="text" class="form-control" id="location" value="<?php echo $ride['start_from']; ?>" disabled>
                            <label for="startfrom" class="form-label">End Location</label>
                            <!-- Display the starting location -->
                            <input type="text" class="form-control" id="location" value="<?php echo $ride['end_to']; ?>" disabled>
                            <!-- Label and textarea for ride description -->
                            <label for="description" class="form-label">Description</label>
                            <div class="description">
                                <!-- Display the ride description -->
                                <textarea id="description" disabled><?php echo $ride['description']; ?></textarea>
                                <!-- Subheading for schedule -->
                                <h3>Schedule</h3>
                                <!-- Row for schedule inputs -->
                                <div class="row align-items-start ml-3">
                                    <!-- Column for time inputs -->
                                    <div class="col">
                                        <!-- Label and input field for departure time -->
                                        <label for="departure" class="form-label">Departure Time</label>
                                        <!-- Display the departure time -->
                                        <input type="time" class="form-control" id="departure" value="<?php echo $ride['departure_time']; ?>" disabled>
                                        <!-- Label and input field for estimated arrival time -->
                                        <label for="arrival" class="form-label">Estimated Arrival Time</label>
                                        <!-- Display the estimated arrival time -->
                                        <input type="time" class="form-control" id="arrival" value="<?php echo $ride['arrival_time']; ?>" disabled>
                                        <!-- Link to cancel -->
                                        <a class="cancel" href="../index.php">Cancel</a>
                                    </div>
                                    <!-- Column for selecting days -->
                                    <div class="col">
                                        <!-- Label for day selection -->
                                        <label for="days" class="form-label">Days</label>
                                        <!-- Display the days of the ride -->
                                        <div id="days">
                                            <?php
                                            // Convert the ride days from numeric format to day name
                                            $days = explode(',', $ride['days']);
                                            $day_names = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                                            foreach ($day_names as $day_name) {
                                                // Check if the day name is in the ride's days list
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
        // If the ride is not found, display an error message
        echo "The ride was not found.";
    }
} else {
    // If no ride ID is provided in the URL, display an error message
    echo "No ride ID provided.";
}
?>