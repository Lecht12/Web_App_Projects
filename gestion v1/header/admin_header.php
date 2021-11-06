<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
<style>
    <?php
    include 'header_style.css'
    ?>
</style>

<header class="header">
    <div class="nav_avatar">
        <img src="../images/stock_g.png">
    </div>
    <div class="nav_container">
        <span>admin</span>
        <nav>
            <ul>
                <li>
                    <a href="index.php"><i class="fas fa-home"></i></a>
                    <a href="index.php">Accueil</a>
                </li>
                <li>
                    <a href="gestion_users.php"><i class="fas fa-users"></i></a>
                    <a href="gestion_users.php">gestion des utulisateurs</a>
                </li>
                <li>
                    <a href="stock_stst.php"> 
                    <i class="far fa-chart-bar"></i>
                    </a>
                    <a href="stock_stst.php">statistiques de stock</a>
                </li>
                <li>
                    <a href="gestion_stock.php"><i class="fas fa-cubes"></i></a>
                    <a href="gestion_stock.php">gestion de stock</a>
                </li>
                 <li>
                     <a href="controle_dmd.php"><i class="fas fa-tasks"></i></a>
                    <a href="controle_dmd.php">controle des demandes </a>
                </li>
                <li>
                <a href="Admin_request.php"><i class="fas fa-file-medical"></i></a>
                    <a href="Admin_request.php">Demande</a>
                </li>
                <li>
                <a href=""><i class="fas fa-inbox"></i></a>
                <a href="email.php">boîte de réception</a>
                </li>
            </ul>
            <span>les parametres</span>
            <ul class="ul" onclick="close_ul();">
                <li>
                    <i class="fas fa-sliders-h"></i>
                    <a href="">paramertres</a>
                </li>
                <li>
                    <i class="fas fa-cogs"></i>
                    <a href="">options</a>
                </li>
                <li>
                    <i class="fas fa-sign-out-alt"></i>
                    <form action="" method="POST"><input type="submit" name="logout" value="logout"></form>
                </li>
            </ul>
        </nav>
    </div>
</header>
