<?php
                include"data_processing.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            <?php
            include "style.php";
            ?>
        </style>
        <script src=style.js></script>
        <title>Gestion des chambres d’un hôtel</title>    
    </head>
    <body>
        <section class="Section" >

        <!--ajouter chambre ----------------------------------------------------------------------------------->

            <div class="add _all" onclick="add()" id="add" > 
                <div>  
                    <h2>Ajouter une Chambre</h2>
                    <form action="" method="post">
                        <input type="text" id="q" name="id_ch" placeholder="Code du chambre">
                        <input type="text" id="q" name="N_lit" placeholder="Nombre de lits">
                        <input type="text" id="q" name="prix" placeholder="Prix">
                        <input type="submit" name="ajouter"  value="ajouter">
                    </form>
                <p class="notification">
                    <?php
                    if(!empty($_POST['id_ch']) && !empty($_POST['N_lit']) && !empty($_POST['prix']))
                    {
                        $requet = "INSERT INTO chambre VALUES (".$_POST['id_ch'].",".$_POST['N_lit'].",".$_POST['prix'].")";
                        insert("ajouter",$requet);
                    }
                    ?>
                </p>
                </div>
                <div>
                    <img src="images/control.png" alt="">
                </div>
            </div>

<!--modifier chambre ----------------------------------------------------------------------------------->

            <div class="update _all" onclick="update()" id="update">
                    <div>  
                        <h2>Modifier une Chambre</h2>
                <form action="" method="post">
                    
                    <select name="id_ch" id="selection">
                    <option value=""disabled selected hidden >chombre id</option>                  
                        <?php
                        import();
                        ?>                          
                    </select>
                    <input type="text" id="q" name="N_lit" placeholder="Nombre de lits">
                    <input type="text" id="q" name="prix" placeholder="Prix">
                    <input type="submit" name="modifier" value="modifier">
                </form>
                <p class="notification">
                    <?php
                     if(!empty($_POST['id_ch']) && !empty($_POST['N_lit']) && !empty($_POST['prix']))
                     {
                            $requet = "UPDATE chambre SET nombre_lit=".$_POST['N_lit'].", prix=".$_POST['prix']." WHERE code_ch=".$_POST['id_ch'];
                            update("modifier",$requet);
                     }
                    ?>
                </p>
                </div>
                <div>
                    <img src="images/Update.png" alt="">
                </div>
            </div>

<!--supprimer chambre -------------------------------------------------------------------------------------------->

            <div class="delete _all" onclick="Delete()" id="delete">
                <div>  
                    <h2>Supprimer une Chambre</h2>
                    <form action="" method="post">
                    <select name="id_ch" id="selection">
                    <option value=""disabled selected hidden >chombre id</option>
                    <option value="tout">tout</option>
                        <?php
                            import();
                        ?>
                    </select>
                        <input type="submit" name="supprimer" value="supprimer">
                    </form>
                    <p class="notification">
                        <?php
                             if(!empty($_POST['id_ch']))
                             {
                                delete('supprimer');
                             }
                        ?>
                    </p>
                </div>
                <div>
                        <img src="images/delet.png" alt="">
                </div>
            </div>

<!--rechercher une chambre -------------------------------------------------------------------------------------------->

            <div class="select _all" onclick="select()" id="select">
                <div>  
                    <h2>Recherecher une Chambre</h2>
                    <form action="" method="post">
                    <select name="id_ch" id="selection">
                        <option value=""disabled selected hidden >chombre id</option>
                        <option value="tout">tout</option>
                        <?php
                            import();
                        ?>
                    </select>
                        <input type="submit" name="rechercher" value="rechercher" >
                    </form>   
                </div>
               <div id="data">
                    <?php
                        if(!empty($_POST['id_ch']))
                        {
                        select("rechercher");
                        }
                    ?>
                   <img src="images/select.png" alt="">       
                </div>
            </div>
        </section>
    </body>
</html>