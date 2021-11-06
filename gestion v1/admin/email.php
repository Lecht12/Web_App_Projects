<?php
    include "../auth/auth.php";
    include "../data_management/connection.php";
    include "../data_management/admin_data.php";
    session_start();
    controle();
    delete_email()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>emails</title>
<!--=========================================================================================================-->
    <style>
        <?php include "../css_style/email_style.css"?>
    </style>
<!--=========================================================================================================-->
</head>
<body>
    <!--header of the page-->
    <?php include "../header/admin_header.php" ?>
    <!--main body of the page-->
    <main class="MainBody">
        <div class="body_header">
            <span>La boîte de réception</span>
            <div class="messages">
                <span id="counter"></span>
                <i class="fas fa-bell"></i>
            </div>
        </div>
        <form action="" method="post">
        <button type="submit" name="dalete_email"></button>
        </form>
    <!--emails Area-->
        <div class="emailsBody">
    <!--emails-->
        <?php select_emails() ?>
        </div>
    </main>
</body>
<!--=========================================================================================================-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!--=========================================================================================================-->
<!--=========================================================================================================-->
<script>
    $(document).ready(function(){
        var matched = $(".name");
        document.getElementById("counter").innerHTML =matched.length;
    });
</script>
</html>