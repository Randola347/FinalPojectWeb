<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/shared/header.php');
?>


<div class="welcome-user">
    <!-- Welcome message with user's name -->
    <span>Welcome</span>
    <a class="username">barroyo</a>
    <img src="Image/user.png" alt="User Icon" class="user-icon">
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
        <div class="buttonplus" onclick="location.href='add.html'">
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
                    <a href="rides.html" class="button">Edit -</a>
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
                    <a href="rides.html" class="button">Edit -</a>
                    <a href="" class="button">Delete</a>
                </div>
            </div>
        </div>
    </div>
    <div class="buttonplus2" onclick="location.href='add2.html'">
        <!-- Button to add a new ride (similar to the previous one) -->
        <div class="plus horizontal"></div>
        <div class="plus vertical"></div>
    </div>
</div>
</body>
</html>