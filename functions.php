<?php
require __DIR__ . '/monster.php';
function getMonsters()
{
    try  //on fait un try catch pour pouvoir gérer nos différentes exceptions
    {
        $bdd = new PDO('mysql:host=localhost;dbname=monster','root',''); //on se connecte à notre base de données "monster", grâce à notre host 'localhost' et notre id ='root' et mdp =''
    } catch (Exception $e) 
    { //On essaie de catch notre exception e
        die("Erreur".$e); //alias de la fonction exit
    }

    $query = $bdd->query('SELECT * FROM monsters'); // on fait une demande à notre BDD afin de sélectionner TOUS les attributs de la table 'monsters'
    while($donnees = $query->fetch()){ //recupère les lignes de nos monstres 
        $monstersTemporaire = new Monster($donnees['Name'],$donnees['Strength'],$donnees['Life'],$donnees['Type']); //on crée un monstre temporaire avec les données de notre base de données que l'on introduit dans notre constructeur
        $monstersTab[] = $monstersTemporaire;//on crée un tableau avec ces monstres
    }
    return $monstersTab; //on retourne ce tableau d'objets de monstres.

}

/**
 * Our complex fighting algorithm!
 *
 * @return array With keys winning_ship, losing_ship & used_jedi_powers
 */
function fight(monster $firstMonster, monster $secondMonster)
{
    $firstMonsterLife = $firstMonster->getLife(); //comme dans tout le code, on récupère les attributs de notre code avec nos getters, ici getLife
    $secondMonsterLife = $secondMonster->getLife();

    while ($firstMonsterLife > 0 && $secondMonsterLife > 0) {
        $firstMonsterLife = $firstMonsterLife - $secondMonster->getStrength(); //ici on utilise le getter getStrength afin de faire notre combat
        $secondMonsterLife = $secondMonsterLife - $firstMonster->getStrength();
    }

    if ($firstMonsterLife <= 0 && $secondMonsterLife <= 0) {
        $winner = null;
        $looser = null;
    } elseif ($firstMonsterLife <= 0) {
        $winner = $secondMonster;
        $looser = $firstMonster;
    } else {
        $winner = $firstMonster;
        $looser = $secondMonster;
    }

    return array(
        'winner' => $winner,
        'looser' => $looser,
    );
}