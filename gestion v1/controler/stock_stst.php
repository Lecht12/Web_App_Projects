<?php
include "../auth/auth.php";
include "../data_management/connection.php";
include "../data_management/admin_data.php";
session_start();
controle();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/table2excel.js"></script>
    <title>statistiques de stock</title>

    <style>
        <?php
        include "../css_style/stock_sts.css";
        include "../css_style/gestion_users.css";
        ?>
    </style>
</head>
<body>
    <!--header of the page-->
    <?php include "../header/controller_headre.php" ?>
    
    <!--body of the page-->
    <section class="body_section">
        <div class="s_container">
            <div class="s_header">
                <h1>statistiques de stock</h1>
            </div>
    <!--Searsh Area -->
            <div class="Searsh">
                <form action="" method="post">
                    <label for="searsh_users">Rechercher</label>
                    <select name="searsh_des" id="">
                        <option value="" disabled selected hidden>rechercher un designiation</option>
                        <?php get_des();?>
                    </select>
                    <input type="submit" value="Rechercher" name="find">
                </form>
            </div>
            <div class="s_body">
                <div class="s_table" >
                    <table id="table_p" >
                        <tr class="table_header" >
                            <th id="des">
                                desiginiation
                            </th>
                            <th>
                                quantité accueil 
                            </th>
                            <th>
                                quantité consommé
                            </th>
                            <th>
                                l'annee
                            </th>
                        </tr>
                        <?php select_des() ?>     
                    </table>
                </div>
                <div class="operations_">
                    <span onclick="printing();"><i class="far fa-file-excel">Telecharger</i></span>

                </div>
            </div>
        </div>
    </section>
</body>
    <script>
        function printing()
            {
                var table2excel = new Table2Excel();
                table2excel.export(document.querySelector("#table_p"));
            }
    </script>
</html>