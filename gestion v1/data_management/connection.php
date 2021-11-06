<?php
function connection($Server_name,$Host_name,$Password,$Database)
{
    $conact = mysqli_connect($Server_name,$Host_name,$Password,$Database);
    if($conact->connect_error)
    {
        die("ther is an  error".connection_status().mysqli_connect_error().mysqli_connect_errno() );
    }
    else
    {
        return $conact;
    }
}
