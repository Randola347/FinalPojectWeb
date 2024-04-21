<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/shared/header.php');
?>

<body>
    <!-- Container for page content -->
    <div class="container">
        <!-- Row for content, centered -->
        <div class="row justify-content-center mt-5">
            <!-- Column with a width of 8 for medium-sized screens -->
            <div class="col-md-8">
                <!-- Card container -->
                <div class="card">
                    <!-- Card body -->
                    <div class="card-body">
                        <!-- Link to login page -->
                        <a href="login.php" class="btn">Login</a>
                        <!-- Logo image -->
                        <img src="Image/logo.png" class="img" alt="Fines Ilustrativos">
                        <!-- Title -->
                        <h5 class="title">Welcome to TicoRides.com</h5>
                        <!-- Title for search section -->
                        <p class="title">Search for a Ride</p>
                        <!-- Box containing search form -->
                        <div class="box">
                            <!-- Text for "Form" -->
                            <span>Form</span>
                            <!-- Input field for "From" location -->
                            <input type="text" class="input-text" value="Input Text" onfocus="this.value=''">
                            <!-- Text for "To" -->
                            <span>To</span>
                            <!-- Input field for "To" location -->
                            <input type="text" class="input-text" value="Input Text" onfocus="this.value=''">
                            <!-- Button to find rides -->
                            <button class="my-button">Find my Ride!</button>
                        </div>
                        <!-- Title for results section -->
                        <p class="title">Results for Rides that matches your criteria:</p>
                        <!-- Table displaying ride results -->
                        <div class="table">
                            <!-- Table row with column headings -->
                            <div class="row align-items-start ml-3">
                                <div class="col">
                                    User
                                </div>
                                <div class="col">
                                    Start
                                </div>
                                <div class="col">
                                    End
                                </div>
                                <div class="col">
                                    <!-- Empty column for actions -->
                                </div>
                            </div>
                            <!-- Sample ride entry -->
                            <div class="row align-items-start ml-3">
                                <div class="col">
                                    barroyo
                                </div>
                                <div class="col">
                                    Barrio Los Angeles
                                </div>
                                <div class="col">
                                    Ciudad Quesada
                                </div>
                                <div class="col">
                                    <!-- Button to view ride details -->
                                    <a href="" class="button">View</a>
                                </div>
                            </div>
                            <div class="row align-items-start ml-3">
                                <div class="col">
                                    barroyo
                                </div>
                                <div class="col">
                                    Barrio Los Angeles
                                </div>
                                <div class="col">
                                    Ciudad Quesada
                                </div>
                                <div class="col">
                                    <a href="" class="button">View</a>
                                </div>
                            </div>
                            <div class="row align-items-start ml-3">
                                <div class="col">
                                    barroyo
                                </div>
                                <div class="col">
                                    Ciudad Quesada
                                </div>
                                <div class="col">
                                    Los Angeles
                                </div>
                                <div class="col">
                                    <a href="" class="button">View</a>
                                </div>
                            </div>
                            <div class="row align-items-start ml-3">
                                <div class="col">
                                    yluna
                                </div>
                                <div class="col">
                                    Ciudad Quesada
                                </div>
                                <div class="col">
                                    San Pedro
                                </div>
                                <div class="col">
                                    <a href="" class="button">View</a>
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