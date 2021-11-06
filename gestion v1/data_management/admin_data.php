<?php
function connect()
{
    return $connect = connection("localhost:3309",'root','','gestion_stock');
}

/***************************************************************homepage backend **************************************************/
function count_users()
{
    $connect = connect();
    $requet_selct_users = "SELECT count(*) FROM users_stock ";
    $execut_requet = mysqli_query($connect,$requet_selct_users);
    $data = mysqli_fetch_row($execut_requet)[0];
    echo $data;
}
function count_dmds()
{
    $connect = connect();
    $requet_selct_users = "SELECT count(*) FROM demandes ";
    $execut_requet = mysqli_query($connect,$requet_selct_users);
    $data = mysqli_fetch_row($execut_requet)[0];
    echo $data;
}
function count_des()
{
    $connect = connect();
    $requet_selct_users = "SELECT count(*) FROM gestion_stock ";
    $execut_requet = mysqli_query($connect,$requet_selct_users);
    $data = mysqli_fetch_row($execut_requet)[0];
    echo $data;
}
function visters_counter()
{
    setcookie('count', isset($_COOKIE['count']) ? $_COOKIE['count']++ : 1);
    $_SESSION["visitCount"] = $_COOKIE['count'];
    return $_SESSION["visitCount"];
}

function designation_stats()
{
    $connect = connect();
    $requet_selct_des = "SELECT * FROM stock_statistiques";
    $execut_requet = mysqli_query($connect,$requet_selct_des);
    if($execut_requet)
    {
        while($data = mysqli_fetch_assoc($execut_requet))
        {
            echo "[\"".$data["des"]."\", ".$data["Qt_stock"]."],";
        }
    }
}
/*------------------------------users management back end-------------------------------------*/

function rechercher()
{
    $connect = connect();
    $requet_selct_users = "SELECT login FROM users_stock ";
    $execut_requet = mysqli_query($connect,$requet_selct_users);
    if($execut_requet)
    {
        while($data = mysqli_fetch_assoc($execut_requet))
        {
            echo "<option value=\"".$data['login']."\">".$data['login']."</option>";
        }
    }
}
function delete_user()
{
    $i =1;
    if(isset($_POST['delete'.$i++]));
            {
                $connect = connect();
                if(!empty($_POST['login'.$i++]))
                {
                    $requet_selct_users = "DELETE FROM users_stock WHERE login ='".$_POST['login'.$i++]."'";
                    $execut_requet = mysqli_query($connect,$requet_selct_users);
                    if($execut_requet)
                    {
                            echo"
                            <script>
                                alert(\"Bien supprime\");
                            </script>";
                    }
                }
                
            }
}
function select_users()
{

    $connect = connect();
    $i = 1;
    $requet_selct_users = "SELECT * FROM users_stock ";
    if(isset($_POST['find']))
    {
        if(!empty($_POST['searsh_users']))
        {
            $requet_selct_users = "SELECT * FROM users_stock WHERE login ='".$_POST['searsh_users']."'";
        }
    }
    else
    {
        $requet_selct_users = "SELECT * FROM users_stock ";
    }
    $execut_requet = mysqli_query($connect,$requet_selct_users);
    if($execut_requet)
    {
        echo
        "
            <table>
                <tr id=\"table_header\">
                    <th>
                        Nom
                    </th>
                    <th>
                        login
                    </th>
                    <th>
                        mot de passe
                    </th>
                            <th>
                    fonction
                    </th>
                    <th>
                        Role
                    </th>
                    <th>
                    </th>
        ";
        while($data_users = mysqli_fetch_assoc($execut_requet))
        {
            echo
            "
               </tr>            
                    <tr>
                        <td>
                            ".$data_users['name']."
                        </td>
                        <td>
                            ".$data_users['login']."
                        </td>
                        <td>
                            ".password_hash($data_users['password'],PASSWORD_DEFAULT)."
                        </td>
                        <td>
                            ".$data_users['fonction']."
                        </td>
                        <td>
                            ".$data_users['states']."
                        </td>
                        <td class=\"edit_delete\" >
                            <form action=\"#\" method=\"post\"><button type=\"submit\" name=\"delete".$data_users["ID"]."\"><i class=\"far fa-trash-alt\"></i></button></form>
                        </td>
                </tr>
                    
            ";
            
        }
        echo"</table>";
    }
}
function delete_users()
{
    for ($i=1; $i <= 500; $i++) 
    {
        if (isset($_POST['delete'.$i])) 
            {
                $delete_rq ="delete from users_stock where id =".$i;
                $exe_delete_rq =mysqli_query(connect(),$delete_rq);
                if($exe_delete_rq)
                {
                    echo"
                    <script>
                        alert(\"Bien Supprime\");
                    </script>";
                }
            }
    }  
}
function add_users()
{
    if(isset($_POST['add']));
        {
            $connect = connect();
            if(!empty($_POST['login']) and !empty($_POST['fonction']) and !empty($_POST['statu']) and !empty($_POST['name']) && !empty($_POST['pass_cmfrm']))
               {
                   if($_POST['pass_cmfrm'] == $_POST['pass'])
                    {
                        $requet_selct_users = "INSERT INTO users_stock VALUES('','".$_POST['name']."','".$_POST['login']."','".$_POST['fonction']."','".$_POST['statu']."','".$_POST['pass_cmfrm']."')";
                        $execut_requet = mysqli_query($connect,$requet_selct_users);
                        $incr_rq   = "ALTER TABLE users_stock AUTO_INCREMENT 1";
                        $exe_incr  =mysqli_query(connect(),$incr_rq);
                        if($execut_requet and $exe_incr)
                            {
                                echo"
                                <script>
                                    alert(\"Bien ajoute\");
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
                    else
                    {
                        echo"
                        <script>
                        alert(\"le mot de passe est incorrect\");
                        </script>";
                    }
                }
            
        }
}
function update_users()
{
    if(isset($_POST["edit"]))
    {
        if(!empty($_POST["name"]) && !empty($_POST["statu"]) && !empty($_POST["function"]) && !empty($_POST["pass"]))
        {
            $update_rq = "UPDATE `users_stock` SET `name` = '".$_POST["name"]."',states= '".$_POST["statu"]."', `fonction` = '".$_POST["function"]."', `password` = '".$_POST["pass"]."' WHERE `users_stock`.`login` = '".$_POST["login"]."'";
            $exe_update_rq = mysqli_query(connect(),$update_rq);
            if($exe_update_rq)
            {
                echo"
                <script>
                    alert(\"Bien Modifie\");
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
/**********************************************************stock stats backend*******************************************************/
function select_des()
{
    $connect = connect();
    $requet_selct_des = "SELECT * FROM stock_statistiques ";
    if(isset($_POST['find']))
    {
        if(!empty($_POST['searsh_des']))
        {
            $requet_selct_des = "SELECT * FROM stock_statistiques WHERE des ='".$_POST['searsh_des']."'";
        }
    }
    else
    {
        $requet_selct_des = "SELECT * FROM stock_statistiques ";
    }
    $execut_requet = mysqli_query($connect,$requet_selct_des);
    if($execut_requet)
    {
        while($data_stock = mysqli_fetch_assoc($execut_requet))
        {
            echo
            "           
                <tr>
                    <td>
                        ".$data_stock['des']."
                    </td>
                    <td>
                        ".$data_stock['Qt_stock']."
                    </td>
                    <td>
                        ".$data_stock['Qt_con']."
                    </td>
                    <td>
                        ".$data_stock['Annee']."
                    </td>
                </tr>
                    
            ";
        }
        echo"</table>";
    }

}
/*----------------------------------gestion stock backend---------------------------------*/
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

function select_des_bnd()
{

    $connect = connect();
    $i = 1;
    $requet_selct_des = "SELECT * FROM gestion_stock ";
    if(isset($_POST['find']))
    {
        if(!empty($_POST['searsh_users']))
        {
            $requet_selct_des = "SELECT * FROM gestion_stock WHERE login ='".$_POST['searsh_des']."'";
        }
    }
    else
    {
        $requet_selct_des = "SELECT * FROM gestion_stock ";
    }
    $execut_requet = mysqli_query($connect,$requet_selct_des);
    if($execut_requet)
    {
        while($data_des = mysqli_fetch_assoc($execut_requet))
        {
            echo
            "
               </tr>            
                    <tr>
                        <td>
                            ".$data_des['des']."
                        </td>
                        <td>
                            ".$data_des['bon_de_commande']."
                        </td>
                        <td>
                            ".$data_des['date']."
                        </td>
                        <td class=\"edit_delete\" >
                            <form action=\"#\" method=\"post\"><button type=\"submit\" name=\"delete".$data_des["id"]."\"><i class=\"far fa-trash-alt\"></i></button></form>
                        </td>
                </tr>
                    
            ";
        }
    }
}
function delete_des()
{
    for ($i=1; $i <= 500; $i++) 
    {
        if (isset($_POST['delete'.$i])) 
            {
                $delete_rq ="delete from gestion_stock where id =".$i;
                $exe_delete_rq =mysqli_query(connect(),$delete_rq);
                if($exe_delete_rq)
                {
                    echo"
                    <script>
                        alert(\"Bien Supprime\");
                    </script>";
                }
            }
    }  
}

function add_des()
{
    if(isset($_POST["add_des"]))
    {
        if(!empty($_POST["des_name"]) && !empty($_POST["bnd"]) && !empty($_POST["date"]))
        {
            $add_des = "INSERT INTO gestion_stock VALUES('','".$_POST["des_name"]."',".$_POST["bnd"].",'".$_POST["date"]."')";
            $exe_add_des = mysqli_query(connect(),$add_des);
            if($exe_add_des)
            {
                echo"
                <script>
                    alert(\"Bien Ajoute\");
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

function update_des()
{
    if(isset($_POST["edit_des"]))
    {
        if(!empty($_POST["des_name"]) && !empty($_POST["bnd"]) && !empty($_POST["date"]))
        {
            $update_rq = "UPDATE `gestion_stock` SET bon_de_commande = ".$_POST["bnd"]." , date ='".$_POST["date"]."' WHERE des='".$_POST['des_name']."';";
            $exe_update_rq = mysqli_query(connect(),$update_rq);
            if($exe_update_rq)
            {
                echo"
                <script>
                    alert(\"Bien Modifie\");
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
/*-------------------------------------------------------request back end---------------------------------------------------------------------- */
function select_requests()
{

    $connect = connect();
    $requet_selct_users = "SELECT * FROM demandes ";
    if(isset($_POST['find']))
    {
        if(!empty($_POST['searsh_des']))
        {
            $requet_selct_users = "SELECT * FROM demandes WHERE Des ='".$_POST['searsh_des']."'";
        }
    }
    else
    {
        $requet_selct_users = "SELECT * FROM demandes";
    }
    $i=1;
    $execut_requet = mysqli_query($connect,$requet_selct_users);
    if($execut_requet)
    {
        while($data_users = mysqli_fetch_assoc($execut_requet))
        {
            echo
            "
               </tr>            
                    <tr>
                        <td>
                        ".$i++."
                        </td>
                        <td>
                            ".$data_users['fonction']."
                        </td>
                        <td>
                        ".$data_users['Des']."
                        </td>
                        <td>
                            ".$data_users['Number']."
                        </td>
                        <td>
                        ".$data_users['Date']."
                        </td>
                        <td class=\"edit_delete\">
                            <form action=\"\" method=\"post\">
                                <button type=\"submit\" name=\"Accept".$data_users["id"]."\"><i class=\"fas fa-check\"></i></button>
                            </form>
                        </td>
                        <td class=\"edit_delete\">
                            <form action=\"\" method=\"post\">
                                <button type=\"submit\" name=\"Refuse".$data_users["id"]."\"><i class=\"fas fa-times\"></i></button>
                            </form>
                        </td>
                </tr>
                    
            ";
        }
    }
}
function refuse_requests()
{
    for ($i=1; $i <= 500; $i++) 
    {
        if (isset($_POST['Refuse'.$i])) 
            {
                $delete_rq ="delete from demandes where id =".$i;
                $exe_delete_rq =mysqli_query(connect(),$delete_rq);
                if($exe_delete_rq)
                {
                    echo"
                    <script>
                        alert(\"Bien Supprime\");
                    </script>";
                }
            }
    }  
}
/*--------------------------------------------------email backend --------------------------------------------------------*/
function select_emails()
{
    $connect = connect();
    $i = 1;
    $requet_selct_emails = "SELECT * FROM mails ";
    $execut_requet = mysqli_query($connect,$requet_selct_emails);
    if($execut_requet)
    {
        while($data_emails = mysqli_fetch_assoc($execut_requet))
        {
            echo"
            <div class=\"name\">
                <form class=\"delete_email\" action=\"\" method=\"post\">
                <button type=\"submit\" name=\"delete_email".$data_emails["ID"]."\"><i class=\"far fa-trash-alt\"></i>Supprimer</button>
                </form>
                <div class=\"infos_Area\">
                    <i class=\"far fa-user\"></i>
                    <span>".$data_emails["Name"]."</span>
                </div>
                <div class=\"email_Area\">
                    <a href=\"mailto: ".$data_emails['E-mail']."\">".$data_emails['E-mail']."</a>
                    <span class=\"function\">".$data_emails["fonction"]."</span>
                 </div>
                <div class=\"subject\">
                    <span>".$data_emails['subject']."</span>
                </div>
                <div class=\"email_content\">
                <p>Text ".$data_emails['Body']."</p>
                </div>
            </div>";
        }
    }
}
function delete_email()
{
    for ($i=1; $i <= 500; $i++) 
    {
        if (isset($_POST['delete_email'.$i]))
            {
                $delete_rq ="delete from mails where id =".$i;
                $exe_delete_rq =mysqli_query(connect(),$delete_rq);
                if($exe_delete_rq)
                {
                    echo"
                    <script>
                        alert(\"Bien Supprime\");
                    </script>";
                }
            }
    }
}
/*--------------------------------------------------send_request backend----------------------------------------------------------------------*/
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
