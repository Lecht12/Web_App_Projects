<?php
include "../auth/auth.php";
include "../data_management/connection.php";
include "../data_management/admin_data.php";
session_start();
refuse_requests();
 controle();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>les demandes</title>
    <script src="../js/table2excel.js"></script>
    <style>
        <?php
            include "../css_style/gestion_dmd.css";
            include "../css_style/gestion_users.css";
        ?>
    </style>
</head>
<body>
    <!--header of the page-->
    <?php
    include "../header/admin_header.php";
    ?>

    <!--body of the page-->
        <section class="body_section">
            <div class="s_header">
                <h1>Les demandes</h1>
            </div>
                    <!--Searsh Area-->
            <div class="Searsh">
                <form action="" method="post">
                    <label for="searsh_des">Rechercher</label>
                    <select name="searsh_des" id="">
                        <option value="" disabled selected hidden>rechercher une designation</option>
                        <?php get_des()?>
                    </select>
                    <input type="submit" value="Rechercher" name="find">
                    
                </form>
            </div>
            <div class="s_body ">
                <div class="s_table" >
                    <table id="table_dmd" >
                        <tr class="table_header" >
                            <th>
                                id
                            </th>
                            <th>
                                Fonction
                            </th>
                            <th id="des">
                                desiginiation
                            </th>
                            <th>
                                Quantite
                            </th>
                            <th>
                                la date
                            </th>
                            <th>
                                Accepter
                            </th>
                            <th>
                                Refuser
                            </th>
                        </tr>
                        <?php select_requests()?>
                    </table>
                </div>
                <div class="operation">
                    <span onclick="printing();">Telecharger<i class="far fa-file-excel"></i></span>
                    <script>
                        function printing()
                        {
                            var table2excel = new Table2Excel();
                            table2excel.export(document.querySelector("#table_dmd"));
                        }
                    </script>
                </div>
            </div>
    </section>
</body>
</html>