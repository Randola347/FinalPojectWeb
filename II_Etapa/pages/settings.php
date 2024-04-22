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
                <img src="Image/logo.png" class="img" alt="Fines Ilustrativos">
                <!-- Card container -->
                <div class="card">
                    <!-- Row for navigation links -->
                    <div class="row align-items-start ml-1">
                        <div class="col">
                            <a href="dashboard.php" class="buttonmain">Dashboard</a>
                        </div>
                        <div class="col">
                            <a href="rides.php" class="buttonmain">Rides</a>
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
                    <span href="settings.php" class="arrow">> Settings</span>
                </div>
                <!-- Information section -->
                <div class="info">
                    <!-- Label and input field for full name -->
                    <label for="fullname" class="form-label">Nombre Completo</label>
                    <input type="text" class="form-control" id="fullname" placeholder="Bladimir Barroyo">
                    <!-- Label and input field for average speed -->
                    <label for="speedAverage" class="form-label">Velocidad Media</label>
                    <input type="text" class="form-control" id="speedAverage" placeholder="60 km/h">
                    <!-- Label and textarea for personal description -->
                    <label for="aboutMe" class="form-label">Sobre mí</label>
                    <div class="about-me">
                        <textarea id="aboutMe" placeholder="Algo sobre mi va aqui"></textarea>
                        <!-- Buttons for cancel and save -->
                        <div class="buttons">
                            <a href="dashboard.php">Cancelar</a>
                            <button class="save">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>