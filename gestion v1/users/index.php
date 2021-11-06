<?php
include "../auth/auth.php";
include "../data_management/connection.php";
include "../data_management/user_data.php";
session_start();
controle();
add_emails();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Space</title>
    <style>
        <?php include "../css_style/user.css" ?>
    </style>
</head>
<body>
    <!---Header of the page-->
    <?php include "../header/users_header.php"?>
    <!---body of the page-->
    <main class="mainBody">
        <!--search Area-->
        <div class="main_header">
            <div class="searchBar_container">
                <form action="" method="post">
                    <input type="search" name="search" id="" placeholder="Rechercher ici">
                    <input type="submit" value="Rechercher">
                </form>
            </div>
        </div>
        <!--requests statistics-->
        <div class="statistics_container" id="top_x_div">

        </div>
        <!--Contact Area-->
        <div class="contact_container">
            <span class="contactTitle">Contacter l'administrateure</span>
            <div class="contact">
                <!--Contact Form-->
                <form action="" method="Post">
                    <div class="info_inputs">
                        <input type="text" name="name" id="" placeholder="Votre Nom">
                        <input type="email" name="email" id="" placeholder="Votre E-mail" >                
                    </div>
                    <div class="Messages_content">
                        <input type="text" name="subject" id="" placeholder="Sujet">
                        <textarea name="body" id="MessageArea" cols="50" rows="10" placeholder="Votre message ici"></textarea>
                    </div>
                    <div class="Submit_input">
                        <input type="submit" value="Onvoyer" name="Add_email" >
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
            var data = new google.visualization.arrayToDataTable([
            ['Move', 'Nombre'],
            <?php dmds_stats()?>
                ['','']
    
            ]);
            var options = {
                width: 1000 ,
            legend: { position: 'none' },
            chart: {
                title: 'designations',
                subtitle: '' },
            axes: {
                x: {
                0: { side: 'top', label: 'les statitiques'} // Top x-axis.
                }
            },
            bar: { groupWidth: "20%" }
            };

            var chart = new google.charts.Bar(document.getElementById('top_x_div'));
            // Convert the Classic options to Material options.
            chart.draw(data, google.charts.Bar.convertOptions(options));
        };
    </script>
</html>