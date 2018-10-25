<?php

public function chargerClasse($classe) {
	require $classe . '.php';
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

class Jeu {
	$perso1 = new Personnage(Personnage::FORCE_MOYENNE, 0);
	$perso1::toFart();
}
?>