<?php
require($_SERVER['DOCUMENT_ROOT'].'/shared/header.php');
?>


<body>
    <!-- Container for page content -->
    <div class="container">
        <!-- Row for content, centered -->
        <div class="row justify-content-center mt-5">
            <!-- Column with a width of 8 for medium-sized screens -->
            <div class="col-md-8">
                <!-- Logo image -->
                <img src="logo.png" class="img" alt="Fines Ilustrativos">
                <!-- Card container -->
                <div class="card">
                    <!-- Row for navigation links -->
                    <div class="row align-items-start ml-1">
                        <div class="col">
                            <a href="dashboard.html" class="buttonmain">Dashboard</a>
                        </div>
                        <div class="col">
                            <a href="rides.html" class="buttonmain">Rides</a>
                        </div>
                        <div class="col">
                            <a href="settings.html" class="buttonmain">Settings</a>
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
                    <!-- Label and input field for ride name -->
                    <label for="ridename" class="form-label">Nombre del Viaje</label>
                    <input type="text" class="form-control" id="ridename" placeholder="Input Text">
                    <!-- Label and input field for starting location -->
                    <label for="startfrom" class="form-label">Lugar de Salida</label>
                    <input type="text" class="form-control" id="location" placeholder="Input Text">
                    <!-- Label and textarea for ride description -->
                    <label for="description" class="form-label">Descripción</label>
                    <div class="description">
                        <textarea id="description" placeholder="Add here The description of the ride"></textarea>
                        <!-- Subheading for schedule -->
                        <h3>Cuando</h3>
                        <!-- Row for schedule inputs -->
                        <div class="row align-items-start ml-3">
                            <!-- Column for time inputs -->
                            <div class="col">
                                <!-- Label and input field for departure time -->
                                <label for="departure" class="form-label">Hora de Salida</label>
                                <input type="time" class="form-control" id="departure" value="07:00">
                                <!-- Label and input field for estimated arrival time -->
                                <label for="arrival" class="form-label">Hora Estimada de Llegada</label>
                                <input type="time" class="form-control" id="arrival" value="08:30">
                                <!-- Link to cancel -->
                                <a class="cancel" href="dashboard.html">Cancelar</a>
                            </div>
                            <!-- Column for selecting days -->
                            <div class="col">
                                <!-- Label for day selection -->
                                <label for="days" class="form-label">Seleccione los Dias</label>
                                <div id="days">
                                    <!-- Checkboxes for each day -->
                                    <input type="checkbox" id="monday" name="day" value="Monday">
                                    <label for="monday">Monday</label><br>
                                    <input type="checkbox" id="tuesday" name="day" value="Tuesday">
                                    <label for="tuesday">Tuesday</label><br>
                                    <input type="checkbox" id="wednesday" name="day" value="Wednesday">
                                    <label for="wednesday">Wednesday</label><br>
                                    <input type="checkbox" id="thursday" name="day" value="Thursday">
                                    <label for="thursday">Thursday</label><br>
                                    <input type="checkbox" id="friday" name="day" value="Friday">
                                    <label for="friday">Friday</label><br>
                                    <input type="checkbox" id="saturday" name="day" value="Saturday">
                                    <label for="saturday">Saturday</label><br>
                                    <input type="checkbox" id="sunday" name="day" value="Sunday">
                                    <label for="sunday">Sunday</label><br>
                                    <!-- Button to save changes -->
                                    <button class="save">Guardar</button>
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