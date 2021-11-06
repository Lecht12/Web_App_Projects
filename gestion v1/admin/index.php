<?php
include "../auth/auth.php";
include "../data_management/connection.php";
include "../data_management/admin_data.php";
session_start();
$_SSESION['visiters'] = visters_counter();
controle();
?>
<html lang="en">    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/admin.js"></script>
    <title>Admin</title>
    <style>
    <?php
        include "../css_style/admin.css"
    ?>
    </style>
</head>
<body >
    <!--header of the page -->
    <?php
        include "../header/admin_header.php"
    ?>
    <!--body of the page -->

    <section class="body_section">
        <!--header of the body-->
        <div class="body_header">
            <div class="search_area">
                <form action="">
                    <input type="search" name="" id="" placeholder="Rechercher ici" >
                    <input type="submit" value="Rechercher">
                </form>
            </div>
            <!--admin avatar-->
            <div class="admin">
                <div class="admin_pc">
                    <img src="../images/admin_pic.png" alt="">
                    <span>Bienvenu Admin</span>
                </div>
            </div>
        </div>
        <!--the body of the body_section-->
            <!--infos bar -->
        <div id="infos_bar">
            <div class="users">
                <div>
                    <i class="fas fa-users"></i>
                    <h2>Les utilisateurs</h2>
                </div>
                <span><?php count_users()?></span>
            </div>
            <div class="visitors">
                <div>
                    <i class="far fa-eye"></i>
                    <h2>les visiteures</h2>
                </div>
                <span><?php echo $_SSESION['visiters']?> </span>
            </div>
            <div class="requests">
                <div>
                    <i class="fas fa-clipboard-list"></i>
                    <h2>les demmendes</h2>
                </div>
                <span><?php count_dmds()?></span>
            </div>
            <div class="products">
                <div>
                    <i class="fas fa-align-left"></i>
                    <h2>les disignations</h2>
                </div>
                <span><?php count_des()?></span>
            </div>
        </div>
         <!--pages statistics -->
         <div class="graph">
            
            <div class="visitors_graph" id="piechart_3d" ></div>

            <div class="" id="chart_div"></div>
            
            <div class="" id="curve_chart"></div>
            
            <div class="" id="top_x_div"></div>     
         
        </div>
    </section>

    <!--footer of the page -->
    <footer class="footer">
    </footer>
</body>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
//--------------------------------------------------fist one-----------------------------------------------------------
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['users',     <?php count_users()?>],
            ['demandes',  <?php count_dmds()?>],

            ]);

            var options = {
            title: 'utilisateures & demandes',
            is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
//-------------------------------------------------S.one-------------------------------------------------------------
        google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawDualY);

    function drawDualY() {
        var data = new google.visualization.DataTable();
        data.addColumn('timeofday', 'Day');
        data.addColumn('number', 'visiters');
        data.addColumn('number', 'users');

        data.addRows([
            [{v: [8, 0, 0], f: '8 am'}, 3, <?php count_users()?>],
            [{v: [9, 0, 0], f: '9 am'}, 5, <?php count_users()?>],
            [{v: [10, 0, 0], f:'10 am'}, 3, <?php count_users()?>],
            [{v: [11, 0, 0], f: '11 am'}, 7, <?php count_users()?>],
            [{v: [12, 0, 0], f: '12 pm'}, 5, <?php count_users()?>],
            [{v: [13, 0, 0], f: '1 pm'}, 4, <?php count_users()?>],
            [{v: [14, 0, 0], f: '2 pm'}, 7, <?php count_users()?>],
            [{v: [15, 0, 0], f: '3 pm'}, 2, <?php count_users()?>],
            [{v: [16, 0, 0], f: '4 pm'}, 9, <?php count_users()?>],
            [{v: [17, 0, 0], f: '5 pm'}, 6, <?php count_users()?>],
        ]);

        var options = {
            chart: {
            title: 'visiteures & Utilisateures',
            
            },
            series: {
            0: {axis: 'visiters'},
            1: {axis: 'users'}
            },
            axes: {
            y: {
                MotivationLevel: {label: 'users & dmmnds'},
            }
            },
            hAxis: {
            title: 'Time of Day',
            format: 'h:mm a',
            viewWindow: {
                min: [7, 30, 0],
                max: [17, 30, 0]
            }
            },
            vAxis: {
            title: 'Rating (scale of 1-50)'
            }
        };

        var materialChart = new google.charts.Bar(document.getElementById('chart_div'));
        materialChart.draw(data, options);
        }
    </script>
    <script>
//-------------------------------------------------------T.one-------------------------------------------------------
    google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'desigeation', 'demandes'],
          ['2019',  100,      70],
          ['2020',  150,      50],
          ['2021',  <?php count_des()?>,       <?php count_dmds()?>],
        ]);

        var options = {
          title: 'designation & demandes',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
//-------------------------------------------------------F.one-------------------------------------------------------
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Move', 'Nombre'],
            <?php  designation_stats()?>
            ['','']
 
        ]);
        var options = {
          legend: { position: 'none' },
          chart: {
            title: 'designations',
            subtitle: '' },
          axes: {
            x: {
              0: { side: 'top', label: 'les statitiques'} // Top x-axis.
            }
          },
          bar: { groupWidth: "50%" ,groupBackgroundcolor: "red" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>
</html>