<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/shared/header.php');
?>

<body>
    <div class="container">
        <!-- Container for page content -->
        <div class="row justify-content-center mt-5">
            <!-- Row for content, centered -->
            <div class="col-md-8">
                <!-- Column with a width of 8 for medium-sized screens -->
                <img src="../Image/logo.png" class="img" alt="Fines Ilustrativos">
                <!-- Logo image -->
                <div class="card">
                    <!-- Card container -->
                    <div class="row align-items-start ml-1">
                        <!-- Row for navigation links -->
                        <div class="col">
                            <!-- Column for each navigation link -->
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
                <div class="welcome-user">
                    <!-- Welcome message with user's name -->
                    <span>Welcome</span>
                    <a class="username">barroyo</a>
                    <img src="../Image/user.png" alt="User Icon" class="user-icon">
                    <h2 class="title">Dashboard</h2>
                </div>

                <div class="dashboard-link">
                    <!-- Link to the dashboard -->
                    <a href="#">Dashboard</a>
                    <span class="arrow">></span>
                </div>

                <p class="title">My Rides</p>
                <!-- Title for the section -->
                <div class="card">
                    <!-- Card container for ride information -->
                    <div class="card-body">
                        <!-- Body of the card -->
                        <p class="title">Your current list of Rides</p>
                        <!-- Title for the list of rides -->
                        <div class="buttonplus" onclick="location.href='add.php'">
                            <!-- Button to add a new ride -->
                            <div class="plus horizontal"></div>
                            <div class="plus vertical"></div>
                        </div>
                        <!-- Table displaying ride information -->
                        <div class="table">
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
                            <div class="row align-items-start ml-3">
                                <div class="col">
                                    Brete
                                </div>
                                <div class="col">
                                    Barrio Los Angeles
                                </div>
                                <div class="col">
                                    Ciudad Quesada
                                </div>
                                <div class="col">
                                    <a href="rides.php" class="button">Edit -</a>
                                    <a href="" class="button">Delete</a>
                                </div>
                            </div>
                            <div class="row align-items-start ml-3">
                                <div class="col">
                                    Casa
                                </div>
                                <div class="col">
                                    Ciudad Quesada
                                </div>
                                <div class="col">
                                    Los Angeles
                                </div>
                                <div class="col">
                                    <a href="rides.php" class="button">Edit -</a>
                                    <a href="" class="button">Delete</a>
                                </div>
                            </div>
                            <div class="row align-items-start ml-3">
                                <div class="col">
                                    Of cina Chepe
                                </div>
                                <div class="col">
                                    Ciudad Quesada
                                </div>
                                <div class="col">
                                    San Pedro
                                </div>
                                <div class="col">
                                    <a href="rides.php" class="button">Edit -</a>
                                    <a href="" class="button">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="buttonplus2" onclick="location.href='add.php'">
                        <!-- Button to add a new ride (similar to the previous one) -->
                        <div class="plus horizontal"></div>
                        <div class="plus vertical"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>


</html>