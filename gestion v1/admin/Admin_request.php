<?php
include "../auth/auth.php";
include "../data_management/connection.php";
include "../data_management/admin_data.php";
session_start();
 controle();
 add_request()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande</title>
    <style>
        <?php 
        include "../css_style/users_request.css"
        ?>
    </style>
</head>
<body>
    <!--The page's Header-->
    <?php include '../header/Admin_header.php' ?>
    <!--the page's body-->
    <main class="MainBody">

        <!--des_NUMBER ELEMENT-->
        
        <div class="Number_inputs" >
            <div class="heading">
                <h2>sélectionner le nombre de désignations</h2>
            </div>
            <form action="" method="post">
                <div>
                    <input type="Number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="Nb" id="NumberRank"  placeholder="Nombre des Designiations">
                    <span id="plus" onclick="rank(1);"><i class="fas fa-plus"></i></span>
                    <span id="moins" onclick="rank(0);"><i class="fas fa-minus"></i></span>
                </div> 
                <input type="submit" name="add">
            </form>
        </div>

        <!--REQUESTS HIDDEN ELEMENT-->

        <div class="request">
            <?php
                if(!empty($_POST["Nb"]))
                {
                    echo"
                        <div class=\"heading\">
                            <h2>remplir les champs et confirmer la demand</h2>
                        </div>
                    ";
                }
            ?>
            <form action="" method="post">
                <div class="php_container">
                    <?php
                        if(isset($_POST["add"]))
                        {
                            for($i=1;$i<=$_POST["Nb"];$i++)
                            {
                                echo 
                                "   
                                    <div>
                                        <select name=\"des_name\" id=\"des\">
                                            <option value=\"\" hidden disabled selected>Désignations</option>
                                            ";
                                get_des();
                                echo"
                                        </select>
                                        <input type=\"number\" name=\"nbr\" id=\"Num\" placeholder=\"Le nombre\">
                                    </div>
                                ";
                            }
                        }
                    ?>
                </div>
                
                <?php
                    if(!empty($_POST["Nb"]) && $_POST["Nb"]>0)
                        {
                            echo "<input type=\"submit\" value=\"Demander\" name=\"Add_request\">";
                        }
                ?>
            </form>
        </div>
    </main>
</body>
<script>
            function rank(x)
            {
                var Rank_Area =  document.querySelector("#NumberRank");
                if(x == 1)
                {
                    Rank_Area.stepUp();                    
                }
                else if(x == 0)
                {
                    Rank_Area.stepDown();  
                    if(Rank_Area.Value<"0")
                    {
                        return Rank_Area =0;
                    }                    
                }
            }
        </script>
</html>