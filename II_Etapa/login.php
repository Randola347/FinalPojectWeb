<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/shared/header.php');
?>


<body>
    <!-- Background image container -->
    <img src="Image/fondo_login.jpg" class="background-image" alt="Fines Ilustrativos">
    <!-- Container for page content -->
    <div class="container">
        <!-- Row for content, justified to the left -->
        <div class="row justify-content-left mt-5">
            <!-- Column with a width of 4 for medium-sized screens -->
            <div class="col-md-4">
                <!-- Card container -->
                <div class="card">
                    <!-- Card body -->
                    <div class="card-body">
                        <!-- Logo image -->
                        <img src="Image/logo.png" class="img" alt="Fines Ilustrativos">

                        <!-- Login form -->
                        <form>
                            <div>
                                <!-- Username input -->
                                <label for="fromLocation" class="form-label">Nombre de Usuario</label>
                                <input type="text" class="form-control" id="fromLocation" placeholder="Usuario">

                                <!-- Password input -->
                                <label class="form-label">Contraseña</label>
                                <input type="password" class="form-control" placeholder="Contraseña">

                                <!-- Link to registration page -->
                                <p class="pUser"> No tiene Usuario? <a href="register.php">Registrese Aquí</a></p>

                                <!-- Button to submit login -->
                                <a href="dashboard.php" class="btn btn-primary btn-block">Iniciar Sesión</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>