<?php
require($_SERVER['DOCUMENT_ROOT'] . '../shared/header.php');
require($_SERVER['DOCUMENT_ROOT'] . '../actions/settings_actions.php');


if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // Si no hay una sesión iniciada o el nombre de usuario no está disponible, muestra un valor predeterminado
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
                        <label for="fullname" class="form-label">Nombre Completo</label>
                        <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Nombre Completo" value="<?php echo htmlspecialchars($full_name); ?>">
                        <!-- Label and input field for average speed -->
                        <label for="speedAverage" class="form-label">Velocidad Media</label>
                        <input type="text" name="speedAverage" class="form-control" id="speedAverage" placeholder="km/h" value="<?php echo htmlspecialchars($average_speed); ?>">
                        <!-- Label and textarea for personal description -->
                        <label for="aboutMe" class="form-label">Sobre mí</label>
                        <textarea name="aboutMe" id="aboutMe" class="form-control" placeholder="Algo sobre mí va aquí"><?php echo htmlspecialchars($about_me); ?></textarea>
                        <!-- Buttons for cancel and save -->
                        <div class="buttons">
                            <a href="dashboard.php" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>