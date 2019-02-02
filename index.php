<?php

require __DIR__ . '/functions.php'; //On indique l'accès nécessaire à functions.php, la différence avec include est que si la connexion n'aboutit pas, alors le reste du code ne fonctionnera pas, on bloquera.

$monsters = getMonsters(); //Appel à la fonction getMonsters() située dans functions.php (détails de cette fonction dans le fichier lui-même.)

?>



<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Monsters League</title>

        <!-- CSS files -->
        <link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Monsters League</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                </ul>

                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav> 

        <div class="jumbotron">
            <h1 class="display-4">Hello, world!</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
        </div>

        <div class="container">
            <table class="table table-hover"> <!-- On crée ici un tableau afin de display nos monstres de notre base de données -->
                <caption><i class="fas fa-info"></i> Members of the monster league</caption> 
                <thead>
                    <tr> <!-- on affiche comme première ligne les caractéristiques de nos monstres -->
                        <th>Name</th>
                        <th>Strength</th>
                        <th>Life</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($monsters as $monster) { ?> <!-- avec une boucle foreach, on affiche alors nos monstres et leurs caractéristiques -->
                        <tr>
                            <td><?php echo $monster->getName(); ?></td>  <!-- on echo le résultat de la fonction getName (soit le nom de notre monstre qu'on applique à notre objet monster, ce getter est situé dans notre classe de même nom -->
                            <td><?php echo $monster->getStrength(); ?></td>
                            <td><?php echo $monster->getLife(); ?></td>
                            <td><?php echo $monster->getType(); ?></td>
                            <!-- Avec ce bouton supprimer, on va supprimer le monstre désiré de notre base de données.-->
                            <!-- on crée un bouton de cette classe pour avoir un design, et notre href redirige vers le fichier delete.php où la suppression du monstre s'effectuera-->
                            <!-- on fait passer un paramètre appelé "nameMonster" par l'URL, auquel on associe le nom du monstre en question grâce au getter getName -->
                            <td> <a class="btn btn-danger" href="delete.php?nameMonster=<?php echo $monster->getName(); ?>"> Supprimer</a></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <div class="row border p-3">
                <div class="form-group col-md-6 offset-md-3">
                    <form method="POST" action="fight.php">
                        <h2 class="text-center">The battle</h2>
                        <select class=" form-control" name="first_monster_name">
                            <option value="">Choose a Monster</option>
                            <?php foreach ($monsters as $key => $monster) { ?>
                                <option value="<?php echo $key; ?>"><?php echo $monster->getName(); ?></option> <!-- Afin que cette fonctionnalité marche avec notre base de données, on utilise un getter-->
                            <?php } ?>
                        </select>
                        <br>
                        <p class="text-center">AGAINST</p>
                        <br>
                        <select class="form-control" name="second_monster_name">
                            <option value="">Choose a Monster</option>
                            <?php foreach ($monsters as $key => $monster) { ?>
                                <option value="<?php echo $key; ?>"><?php echo $monster->getName(); ?></option>
                            <?php } ?>
                        </select>
                        <br>
                        <button class="btn btn-md btn-danger center-block" type="submit">Fight!</button>
                    </form>
                </div>
            </div>
        </div>

        <footer>
            <div class="container">
                <p>Copyright © 2019 Monsters League</p>
            </div>
        </footer>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
    </body>
</html>