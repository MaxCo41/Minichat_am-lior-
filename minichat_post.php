<?php
if (isset($_POST["pseudo"]) AND $_POST["message"]){

setlocale (LC_TIME, 'fr_FR.utf8','fra');
$date = strftime("%A %d %B %T");
echo $date;
// Connexion à la base de données
try
{
        $bdd = new PDO('mysql:host=localhost;dbname=mini_chat;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}



// Insertion du message à l'aide d'une requête préparée



$req = $bdd->prepare('INSERT INTO mini_chat (pseudo, message, date) VALUES(?, ?, NOW())');

$req->execute(array($_POST['pseudo'], $_POST['message']));

}
  
else
{
    header('location:minichat_erreur.php');
}
// Redirection du visiteur vers la page du minichat
header('Location: minichat.php');
?>