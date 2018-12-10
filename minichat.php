<?php
//Connexion à la base donnée
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=mini_chat;charset=utf8','root','');
    
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT * FROM `mini_chat`');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
    $pseudo = htmlspecialchars($donnees['pseudo']);
 }

$reponse->closeCursor();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="main.css">
    <title>Mini-chat</title>
</head>
<body>
    <form action="minichat_post.php" method="POST" id="form">
        <label>Pseudo: <input type="text" name="pseudo" value="<?php echo$pseudo;?>" id="pseudo"></label>
            <br>
        <label>Message: <input type="text" name="message" value="Entrez votre message ici" id="message"></label>
            <br>
        <input type="submit" value="Envoyer">
    </form>


    
</body>
</html>
<?php

//Connexion à la base donnée
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=mini_chat;charset=utf8','root','');
    
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
setlocale(LC_TIME, "fr_FR");
   
// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT * FROM `mini_chat` ORDER BY ID DESC LIMIT 0, 10');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
	echo '<p>'. htmlspecialchars($donnees['date']).' : <strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
 }

$reponse->closeCursor();

?>