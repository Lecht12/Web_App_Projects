<?php
include "../auth/auth.php";
include "../data_management/connection.php";
include "../data_management/admin_data.php";
session_start();
controle();
delete_des();
add_des();
update_des();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/table2excel.js"></script>
    <title>Gestion de stock </title>
    <style>
        <?php 
        include "../css_style/gestion_stock.css";
        include "../css_style/gestion_users.css";

        ?>
    </style>
</head>
<body>
    <!-- header of the page-->
    <?php include "../header/admin_header.php"?>
    
    <!--body of the page-->
    <section class="body_container">
    <!--body header-->
        <div class="header_g">
            <h1>Gestion de Stock</h1>
        </div>
    <!--Searsh Area-->
        <div class="Searsh">
            <form action="" method="post">
                <label for="searsh_des">Rechercher</label>
                <select name="searsh_des" id="">
                    <option value="" disabled selected hidden>rechercher une designiation</option>
                    <?php get_des()?>
                </select>
                <input type="submit" value="Rechercher" name="find">
            </form>
        </div>
    <!--main body of the page-->
        <div class="body_g">
    <!--management table-->
            <div class="table_g">
                <table id="stock_m">
                    <tr class="table_g_header">
                        <th id="des">
                            desiginiation
                        </th>
                         <th>
                             bon de commande
                         </th>   
                         <th>
                             l'annee
                         </th>
                         <th>

                         </th>
                    </tr>
                    <?php select_des_bnd()?>
                </table>
            </div>
            <div>
                <a href="#" class="far fa-file-excel" onclick="printing_stm();">Telecharger</a>
            </div>
            
    <!--show hidden parts-->
            <div class="add_symbol" onclick="display_add_Des(1);">
                <span class="add">ajouter</span>
                <i class="fas fa-plus"></i>
            </div>
            <div class="add_symbol" onclick="display_edit_Des(1);">
                <span class="add" >Modifier</span>
                <i class="far fa-edit"></i>
            </div>
    <!--operations on table'data-->
            <div class="operations_g" id="add_des" >
                <span id="close_btn" onclick="display_add_Des(0)" class="close_btn"><i class="fas fa-times"></i></span>
                <h1>Ajouter une designiation</h1>
                <form action="" method="post">
                    <div>
                        <input type="text" name="des_name" id="" placeholder="Designation">
                        <input type="number"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="bnd" id="" placeholder="Bon de commande">
                        <input type="date" name="date" id="" placeholder="La date">
                    </div>
                    <input type="submit" name="add_des" value="Ajouter">
                </form>
            </div>
    <!--hidden part of the page-->
            <div class="hidden_g" id="edit_des">
            <span id="close_btn" onclick="display_edit_des(0)" class="close_btn"><i class="fas fa-times"></i></span>
                <h1>Modifier une designiation</h1>
                <form action="" method="post">
                    <div>
                        <select name="des_name" >
                            <option value="" disabled selected hidden>Designiation</option>
                            <?php get_des()?>
                        </select>
                        <input type="number"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="bnd" id="" placeholder="Bon de commande">
                        <input type="date" name="date" id="" placeholder="La date">
                    </div>
                    <input type="submit" name="edit_des" value="Modifier">
                </form>
            </div>
                <!--download file code--> 
        </div>
    </section>
</body>
    <script>
        function printing_stm()
        {
            var table2excel = new Table2Excel();
            table2excel.export(document.querySelector("#stock_m"));
        }
        function display_add_Des(stat)
        {
            var users_form = document.querySelector("#add_des");
            if(stat ==1 )
            {
                users_form.style.display="flex";
            }
            else
            users_form.style.display="none";
        }
        function display_edit_Des(stat)
        {
            var users_form = document.querySelector("#edit_des");
            if(stat ==1 )
            {
                users_form.style.display="flex";
            }
            else
            users_form.style.display="none";
        }
    </script>
</html>