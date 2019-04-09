<?php
try
{
	// On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'user', 'password');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

if(isset($_POST['ville']) and isset($_POST['haut']) and isset($_POST['bas'])){
    
    $ville = htmlspecialchars($_POST['ville']);
    $haut = htmlspecialchars($_POST['haut']);
    $bas = htmlspecialchars($_POST['bas']);

    $ajout = $bdd -> exec("INSERT INTO meteo ( ville , haut , bas ) 
    VALUES ('$ville', '$haut', '$bas')");

}
if(isset($_POST['delete'])){

    foreach($_POST['checkbox'] as $select){
        $supp = $bdd -> exec("DELETE FROM meteo WHERE ville = '$select'");
    }
}

header('Location: http://localhost/BD/bd.php');
?>