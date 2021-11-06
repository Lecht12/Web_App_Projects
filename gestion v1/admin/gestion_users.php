<?php
session_start();
include "../data_management/admin_data.php";
include "../auth/auth.php";
include "../data_management/connection.php";
controle();
add_users();
delete_users();
update_users()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestion des'utilisateurs</title>
    <style>
        <?php include "../css_style/gestion_users.css"?>
    </style>
</head>
<body>
    <!--header of the page-->
    <?php
    include '../header/admin_header.php'
    ?>
    <!--body of the page-->
    <section class="body_s">
        <div class="header_s">
            <h1>Gestion des'utilisateurs</h1>
        </div>
    <!--Searsh Area-->
        <div class="Searsh">
            <form action="" method="post">
                <label for="searsh_users">Rechercher</label>
                <select name="searsh_users" id="">
                    <option value="" disabled selected hidden>rechercher un etulisateure</option>
                    <?php rechercher()?>
                </select>
                <input type="submit" value="Rechercher" name="find">
            </form>
        </div>
    <!-- users counts table-->
        <div class="container">
            <div class="accounts">
                <?php select_users();?>
            </div>
            <div class="add_symbol" onclick="display_add_User(1);">
                <span class="add">ajouter</span>
                <i class="fas fa-plus"></i>
            </div>
            <div class="add_symbol" onclick="display_edit_User(1);">
                <span class="add" >Modifier</span>
                <i class="far fa-edit"></i>
            </div>
    <!-- operations on users-->
            <div class="operations" id="add_user">
                <span id="close_btn" class="close_btn" onclick="display_add_User(0)"><i class="fas fa-times"></i></span>
                <div>
                    <h2>Ajouter un utilisateur</h2>
                </div>
    <!-- add user-->
                <div>
                    <form action="" method="post">
                        <div>
                            <input type="text" name="name" id="" placeholder="Nom">
                            <input type="text" name="fonction" id="" placeholder="Fonction">
                            <input type="text" name="login" id="" placeholder="Login">
                            <select name="statu" id="roles">
                                <option value="" hidden selected disabled>Role</option>
                                <option value="Admin">Admin</option>
                                <option value="Controler">Controler</option>
                                <option value="User">User</option>
                            </select>
                            <input type="password" name="pass" id="" placeholder="mot de passe">
                            <input type="password" name="pass_cmfrm" id="" placeholder="confirmer le mot de passe">
                        </div>
                        <input type="submit" name="add" value="ajouter">
                    </form>
                </div>
            </div>
            <div class="others" id="edit-user">
                <span id="close_btn" onclick="display_edit_User(0)" class="close_btn"><i class="fas fa-times"></i></span>
                <div>
                <h2>Modifier un utilisateur</h2>
                </div>
    <!-- update user-->
                <form action="" method="post">
                    <div>
                        <select name="login" id="#">
                            <option value=""hidden disabled selected >login</option>
                            <?php rechercher(); ?>
                        </select>
                        <input type="text" name="name" id="" placeholder="Nom">
                        <input type="text" name="function"  placeholder="Fonction">
                        <select name="statu">
                            <option value="#" disabled selected hidden >Role</option>
                            <option value="Admin">Admin</option>
                            <option value="Controler">Controler</option>
                            <option value="User">User</option>
                        </select>
                        <input type="password" name="pass" id="pass" placeholder="mot de passe">
                    </div>
                    <input type="submit" value="Modifier" name="edit">
                </form>
            </div>
        </div>
    </section>
</body>
<script>
        function display_add_User(stat)
        {
            var users_form = document.querySelector("#add_user");
            if(stat ==1 )
            {
                users_form.style.display="flex";
            }
            else
            users_form.style.display="none";
        }
        function display_edit_User(stat)
        {
            var users_form = document.querySelector("#edit-user");
            if(stat ==1 )
            {
                users_form.style.display="flex";
            }
            else
            users_form.style.display="none";
        }
    </script>
    <style>
    </style>
</html>