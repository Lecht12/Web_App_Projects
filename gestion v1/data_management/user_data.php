<?php 

function connect()
{
    return $connect = connection("localhost:3309",'root','','gestion_stock');
}

function add_emails()
{
    if(isset($_POST["Add_email"]))
    {
        if(!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["subject"]) && !empty($_POST["body"]))
        {
            $add_email = "INSERT INTO mails VALUES('','".$_SESSION['fonction']."','".$_POST["name"]."','".$_POST["email"]."','".$_POST["subject"]."','".$_POST["body"]."')";
            $exe_add_email = mysqli_query(connect(),$add_email);
            if($exe_add_email)
            {
                echo"
                <script>
                    alert(\"email envoye\");
                </script>";
            }
            else
            {
                echo"
                <script>
                    alert(\"error\");
                </script>";
            }
        }
    }
}
function get_des()
{
    $connect = connect();
    $requet_selct_des = "SELECT des FROM gestion_stock ";
    $execut_requet = mysqli_query($connect,$requet_selct_des);
    if($execut_requet)
    {
        while($data = mysqli_fetch_assoc($execut_requet))
        {
            echo "<option value=\"".$data['des']."\">".$data['des']."</option>";
        }
    }
}
function add_request()
{
    if(isset($_POST["Add_request"]))
    {
        if(!empty($_POST["des_name"]) && !empty($_POST["nbr"]))
        {
            $add_request = "INSERT INTO demandes VALUES('','".$_POST["des_name"]."',".$_POST["nbr"].",'".date("Y-m-d")."','".$_SESSION["fonction"]."')";
            $exe_add_request = mysqli_query(connect(),$add_request);
            if($exe_add_request)
            {
                echo"
                <script>
                    alert(\"Demande Envoye\");
                </script>";
            }
            else
            {
                echo"
                <script>
                    alert(\"error\");
                </script>";
            }
        }
    }
}

function dmds_stats()
{
    $connect = connect();
    $requet_selct_des = "SELECT * FROM demandes WHERE fonction ='".$_SESSION["fonction"]."'";
    $execut_requet = mysqli_query($connect,$requet_selct_des);
    if($execut_requet)
    {
        while($data = mysqli_fetch_assoc($execut_requet))
        {
            echo "[\"".$data["Des"]."\", ".$data["Number"]."],";
        }
    }
}