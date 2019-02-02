<?php

try { //on fait un try catch pour pouvoir gérer nos différentes exceptions
    $bdd = new PDO('mysql:host=localhost;dbname=monster','root','');  //on se connecte à notre base de données "monster", grâce à notre host 'localhost' et notre id ='root' et mdp =''
    } catch (Exception $e) {//On essaie de catch notre exception e
        die("Erreur".$e->getMessage()); //alias de la fonction exit
    }

    $pdo = $bdd->prepare('DELETE FROM monsters WHERE Name=:name'); //on prépare notre requête où l'on va supprimer le monstre désiré
    // le monstre est supprimé grâce au nom de celui-ci que l'on fait naviguer par l'URL (c'est vu dans index.php)

    $pdo->bindValue(':name', $_GET['nameMonster']); //ici on associe le nom récupéré par _GET nameMonster soit ce qu'il y'a dans le href du bouton "Supprimer", et on l'assigne à :name,
    // ce qui permettra alors de pouvoir bien effectuer la requête de suppression juste au dessus.

    if($execution = $pdo->execute()){ //ici, on va exécuter alors la requête préparée, et vérifier si elle s'est bien effectuée avec un if
    ?>
        <script> //ici dans le cas où la suppression a été réussie, cela nous renverra une petite notification comme quoi la suppression a été réussie
        alert("Suppression réussie");
        window.location.href=('index.php'); //et cela nous renverra à la page index.php, où l'on pourra voir notre BDD qui a été update.
        </script>
    <?php
    }
    else //il s'agit du coup dans la suppression n'a pas fonctionné.
    {
    ?>
        <script>
        alert("Suppression non-réussie");
        window.location.href=('index.php');
        </script>
    <?php
    }
    ?>

?>