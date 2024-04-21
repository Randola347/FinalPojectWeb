<?php
require($_SERVER['DOCUMENT_ROOT'].'/shared/header.php');
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

                            <!-- Registration form -->
                            <form>
                                <div>
                                    <!-- Input field for first name -->
                                    <label for="name" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="name" placeholder="Nombre">

                                    <!-- Input field for last name -->
                                    <label for="lastname" class="form-label">Apellido</label>
                                    <input type="password" class="form-control" id="lastname" placeholder="Apellido">

                                    <!-- Input field for phone number -->
                                    <label for="phone" class="form-label">Teléfono</label>
                                    <input type="text" class="form-control" id="phone" placeholder="(XXX) XXX-XXX">

                                    <!-- Input field for username -->
                                    <label for="username" class="form-label">Nombre de Usuario</label>
                                    <input type="text" class="form-control" id="username"
                                        placeholder="Nombre de Usuario">

                                    <!-- Input field for password -->
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" id="password" placeholder="*******">

                                    <!-- Input field for confirming password -->
                                    <label for="rpassword" class="form-label">Repita Contraseña</label>
                                    <input type="password" class="form-control" id="rpassword" placeholder="*******">

                                    <!-- Link to login page -->
                                    <p class="pUser"> Ya tiene Usuario? <a href="login.php">Iniciar Sesión</a></p>

                                    <!-- Button to submit registration -->
                                    <a href="dashboard.php" class="btn btn-primary btn-block">Registrese</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>