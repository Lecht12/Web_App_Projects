<?php

#connexion a la base de donner 

function connection($DB)
{
    $server   ="localhost:3309";
    $User     ="root";
    $password =""; 
    
    $connect = mysqli_connect($server,$User,$password,$DB);
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
      }


    return   $connect;
}

#ajouter une chambre 

function insert($button,$_requet,$p1 ="id_ch",$p2="N_lit",$p3="prix")
{
    if(isset($_POST[$button]))
                {
                    if(!empty($_POST[$p1]) && !empty($_POST[$p2])&& !empty($_POST[$p3]))
                    {
                        $connect = connection("hotel");
                            $val = $_requet;
                            if ($connect->query($val) === TRUE) {
                                echo "l'operation est efectue!";
                            } 
                            else
                            {
                                echo"cette chambre est deja exist!";
                            }
                        $connect->close();
                    }
                }
}

#modifier une chambre 

function update($button,$_requet,$p1 ="id_ch",$p2="N_lit",$p3="prix")
{
    if(isset($_POST[$button]))
                {
                        $connect = connection("hotel");
                
                        
                    if(!empty($_POST[$p1]) && !empty($_POST[$p2])&& !empty($_POST[$p3]))
                    {
                             $val = $_requet;
                        if ($connect->query($val) === TRUE) {
                            echo "l'operation est efectue!";
                          } else {
                            echo "Error:" . $val;
                            echo $connect->error;
                          }
                                   
                    }
                
                    $connect->close();
                }
}

#supprimer une chambre 

function delete($button,$p1 ="id_ch")
{
    if(isset($_POST[$button]))
                {
                        $connect = connection("hotel");
                    if($_POST["id_ch"] == "tout")
                        {
                           $val ="DELETE FROM chambre"; 
                        }
                    else
                        {
                           $val = "DELETE FROM chambre WHERE code_ch=".$_POST['id_ch'];
                        }
                        
                    if(!empty($_POST[$p1]))
                    {
                        if ($connect->query($val) === TRUE) {
                            echo "l'operation est efectue!";
                          } else {
                            echo "Error:" . $val;
                            echo $connect->error;
                          }
                    }
                    $connect->close();
                }
}

#importer le code du chambre

function import()
{
    $connect = connection("hotel");
                        $val = "SELECT code_ch FROM chambre";
                        $data = mysqli_query($connect,$val);
                        while($array = mysqli_fetch_row($data))
                        {
                        echo' <option value="'.$array[0].'">'.$array[0].'</option>';
                        }

    $connect->close();
    return $array;
}
function select($button)
{

    if(isset($_POST[$button]))
    {
        $connect = connection("hotel");
        if( $_POST["id_ch"]=="tout")
        {
            $requet = "SELECT * FROM chambre";
        }
        else
        {
            $requet = "SELECT * FROM chambre WHERE code_ch=".$_POST['id_ch'];
        }
       
        $execut = mysqli_query($connect,$requet);
        if($connect->query($requet))
        {
            echo
        "
        <table>
        <tr>
            <th>
                code du chambres
            </th>
            <th>
                Nombre des lits
            </th>
            <th>
                Prix
            </th>
        </tr>
        ";
           while($data = mysqli_fetch_row($execut))
           {
               echo"
                <tr>
                <td>"
                    .
                    $data[0]
                    .
                    "
                </t>
                <td>
                "
                    .
                    $data[1]
                    .
                "
                </td>
                <td>
                "
                    .
                    $data[2]
                    .
                "
                </td>
                </tr>
               ";
            
           }
           echo"</table>";
        }
        else
        {
            echo"error".$requet.
            "<br>".$connect->error."<br>".$connect->errno;
        }
        $connect->close();
    }
}