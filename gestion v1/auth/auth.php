<?php

function deconnection()
{
    session_destroy();
    header("location: ../index.php");
}
function controle()
{
    if(isset($_POST["logout"]))
    {
        deconnection();
    }
    if(empty($_SESSION['function']))
    {
        header("location: ../index.php");
    }
}
function get_data($posted)
{
    return $_POST[$posted];
}

function select_user($table,$con,$log,$pass)
{
    $function = "";
    $Post_name ="";
    $requet = "SELECT * FROM ".$table." WHERE login='".$log."' and password='".$pass."'";
    $execut = mysqli_query($con,$requet);
    if($execut)
        {
           while($data = mysqli_fetch_assoc($execut))
           {
                $Post_name = $data['fonction'];
                $function = $data["states"];
           }
        }
    $_SESSION["function"] = $function;
    $_SESSION["Post_name"] = $Post_name;
    return $function;
}

function select_function($table,$con,$log,$pass)
{
    $Post_name ="";
    $requet = "SELECT * FROM ".$table." WHERE login='".$log."' and password='".$pass."'";
    $execut = mysqli_query($con,$requet);
    if($execut)
        {
           while($data = mysqli_fetch_assoc($execut))
           {
                $Post_name = $data['fonction'];
           }
        }
    $_SESSION["Post_name"] = $Post_name;
    return $_SESSION["Post_name"] ;
}
function check($function)
{
    if(empty($function))
    {
       echo "<script>alert(\"votre Fonction n’est pas autorisé !\");</script>";
    }
}

function redirect($function)
{
    if($function == "Admin")
    {
        header("location: admin/index.php");
    }
    elseif($function == "Controler")
    {
        header("location: controler/index.php");
    }
    elseif($function == "User")
    {
        header("location: users/index.php");
    }
}