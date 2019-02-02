<?php

class monster {
	private $name ; //pour mettre un nom par défaut si nécessaire.
	private $strength;
	private $life;
	private $type;
	// on crée alors ici notre constructeur de monstres que l'on rentre avec 4 paramètres
	function __construct($name,$strength, $life, $type){ //mettre double underscore pour le constructeur
		$this->name = $name;
		$this->strength = $strength;
		$this->life = $life;
		$this->type = $type;
	}
	// voici nos getters qui nous seront utiles pour récupérer les différentes caractéristiques de nos monstres
	function getName(){
		return $this->name;
	}

	function getStrength(){
		return $this->strength;
	}

	function getLife(){
		return $this->life;
	}

	function getType(){
		return $this->type;
	}
}


//REMARQUE : il n'y a pas de Setters ici car notre projet n'en demande pas le besoin, mais il serait judicieux de les créer.
