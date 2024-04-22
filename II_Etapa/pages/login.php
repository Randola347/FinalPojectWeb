<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '../shared/header.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '../actions/login_action.php');
?>

<body>
    <!-- Background image container -->
    <img src="../Image/fondo_login.jpg" class="background-image" alt="Fines Ilustrativos">
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
                        <img src="../Image/logo.png" class="img" alt="Fines Ilustrativos">

                        <!-- Login form -->
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div>
                                <!-- Username input -->
                                <label for="fromLocation" class="form-label">Nombre de Usuario</label>
                                <input type="text" class="form-control" id="fromLocation" name="username" placeholder="Usuario">

                                <!-- Password input -->
                                <label class="form-label">Contraseña</label>
                                <input type="password" class="form-control" name="password" placeholder="Contraseña">

                                <!-- Error message -->
                                <?php if (isset($_SESSION['error'])) { ?>
                                    <div class="alert alert-danger mt-3" role="alert">
                                        <?php echo $_SESSION['error']; ?>
                                    </div>
                                <?php unset($_SESSION['error']);
                                } ?>

                                <!-- Link to registration page -->
                                <p class="pUser"> ¿No tiene cuenta? <a href="register.php">Regístrese aquí</a></p>

                                <!-- Button to submit login -->
                                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>