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

$resultat = $bdd -> query('SELECT * FROM meteo');

// if(isset($_POST['delete'])){
//     $checkbox = $_POST['checkbox'];

//     $supp = $bdd -> exec("DELETE FROM meteo
//     WHERE ville = '$checkbox'");
// }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tableau</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    <form method="POST" action="http://localhost/BD/chargement.php">
        <table>
            <tr>
                <th>Ville</th>
                <th>Maxima</th>
                <th>Minima</th>
            </tr>
            <?php
                while ($donnees = $resultat -> fetch())
                {
                echo "<tr>
                        <td><input name='checkbox[]' type='checkbox' value='".$donnees['ville']."'/> ".$donnees['ville']."</td>
                        <td>".$donnees['haut']."</td>
                        <td>".$donnees['bas']."</td>
                    </tr>";
                }
                $resultat->closeCursor();
            ?>
        </table>
        <p>Ville: <input type="text" name="ville"></p>
        <p>Maxima: <input type="number" name="haut"></p>
        <p>Minima : <input type="number" name="bas"></p>
        <input type="submit" value="Ajouter">
        <input name="delete" type="submit" value="Supprimez">
    </form>
</body>
</html>