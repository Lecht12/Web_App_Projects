<style>
   
*
{
    margin: 0;
    padding: 0;
    background-attachment: cover;
    font-family: sans-serif;
    box-shadow: none;
}
body
{
    width: 100wh;
    height: 100vh;
    margin: 0;
    font-family: sans-serif;
}
.Section
{
    background-color:transparent;
    position: relative;
    height: 100vh;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background: url(images/Hotel-back.jpg);
    background-size:100% 100%;
    background-repeat: no-repeat;
}
.Section::after
{
    content: "Hotel transylvania";
    text-align: center;
    font-size: 60px;
    font-weight: 500;
    color: #ffffff;
    font-family: cursive,sans-serif;
    background:linear-gradient(-30deg,#D99B29 50%,#102445 50%);
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    opacity: .5;
}
._all
{
    background-color: transparent;
    position: absolute;
    width: 60%;
    height: 60vh;
    border: 1px solid #F3C610;
    z-index: 10;
    border-radius: 0px 50px 0px 0px;
    visibility: visible;
}
._all::after
{
    content: '';
    color:rgb(92, 78, 41);
    writing-mode: vertical-lr;
    display: flex;
    justify-content: center;
    align-items: center;
    text-transform: uppercase;
    letter-spacing: .1rem;
    font-weight: bold;
    font-family: "Verdana";
    font-size: 12px;
    background-color: #F3C610;
    position: absolute;
    left: -50px;
    top: 0;
    width: 50px;
    height: 15vh;
}
._all:hover::after
{
    background-color: aliceblue;
    color: black;
}
._all:nth-child(1):after
{
    top: 0;
    content: "ajouter";

}
._all:nth-child(2):after
{
    top: 15vh;
    content: "Modifier";
}
._all:nth-child(3):after
{
    top: 30vh;
    content: "Supprimer";
}
._all:nth-child(4):after
{
    top: 45vh;
    content: "Rechercher";
}
._all
{
    z-index: 3;
    display: flex;
    flex-direction: row;
}
._all div
{
    width: 50%;
    height: 100%;
    background-color: azure;
}
._all div:first-child
{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    background: linear-gradient(30deg,rgb(255, 255, 255)90%,#F3C610 10%);
}
._all div:first-child .notification
{
    margin-top: 30px;
    padding: 0px;
    border-radius: 10px;
    font-size: 16px;
    letter-spacing: .1rem;
    width: fit-content;
    height: fit-content;
    display: flex;
    align-items: center;
    justify-content:center ;
    background-color: transparent;
    color: rgb(211, 36, 36);
    border-radius: 0px 10px 10px 10px;
}
._all div:nth-child(2)
{
    background-color: #10f3c6;
    border-radius: 0px 50px 0px 0px;
    overflow-y:auto;
    height: 100%;
}
._all div:nth-child(2) img
{
    width: 400px;
}
._all div form
{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction:column ;
}
._all div form input[type="text"]
{
    position: relative;
    margin: 10px;
    width: 300px;
    height: 30px;
    border: none;
    border-bottom: 1px solid rgb(0, 0, 0);
    background: transparent;
    outline: none;
    visibility: visible;
}
._all div form input[type="submit"]
{
    width: 150px;
    height: 40px;
    border: none;
    background-color:#F3C610;
    border-radius: 2px;
    outline: none;
}
._all div form input[type="submit"]:hover
{
    background-color: crimson;
    color: white;
    cursor: pointer;
}
._all div form select
{
    position: relative;
    margin: 10px;
    width: 300px;
    height: 30px;
    border: none;
    border-bottom: 1px solid rgb(0, 0, 0);
    background: transparent;
    outline: none;
}
._all div form select option
{
    position: relative;
    height: 30px;
    padding: 5px;
    height: 20px;
    height: 20px;
    font-size: 16px;
    font-family:sans-serif;
    color: #636262;
}
._all div h2
{
    margin-bottom:20px;
    letter-spacing: .1rem;
    font-size: 25px;
    font-weight: 400;
}
._all div h2::first-letter
{
    color: #10f3c6;
    font-size: 30px;
    font-weight: bold;
    border-bottom: 1px solid #F3C610;
    margin-right:3px ;
}
._all #data
{
    display: flex;
    justify-content: center;
    align-items: center;
    height: fit-content;
    
}
._all #data table
{
    margin-top: 0px;
    position: absolute;
    right: 0;
    width: 455px;
    top: 0;
    background-color: #ffffff;
    border-radius: 0px 50px 0px 0px ;
}
th {
    background-color:transparent;
    color: rgb(0, 0, 0);
    padding: 10px;
  }
tr:nth-child(even) {
    background-color: #636262;
    color: #ffffff;
}
._all #data table ,tr ,td
{
    border-bottom: 1px solid rgb(36, 34, 34);
    padding-top:5px ;
    text-align: left;
}
.add
{               
    z-index: 10;
}
<?php
    if(isset($_POST["ajouter"]))
    {
        echo"
        .add
            {
                z-index: 10;

            }
                ";
    }
    elseif(isset($_POST["modifier"])) 
    {

        echo
        "
        .update
            {
                z-index: 10;

            }
                ";
    }
    elseif(isset($_POST["supprimer"])) 
    {

        echo
        "
        .delete
            {
                z-index: 10;

            }
                ";
    }
    elseif(isset($_POST["rechercher"])) 
    {

        echo
        "
        #select
            {
                z-index: 10;

            }
                ";
    }
?>
</style>
