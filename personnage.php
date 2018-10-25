<?php
class Personnage // Présence du mot-clé class suivi du nom de la classe.
{
  // Déclaration des attributs et méthodes ici.
  private $_force;        // La force du personnage
  private $_localisation; // Sa localisation
  private $_experience;   // Son expérience
  private $_degats;       // Ses dégâts

  const FORCE_PETITE = 20;
  const FORCE_MOYENNE = 50;
  const FORCE_GRANDE = 80;

  public static $_fart = "Pouet !";
  public static $_objectNumber = 0;

//accesseurs
  public function degats(){
  	return $this->_degats;
  }

  public function force(){
  	return $this->_force;
  }

  public function localisation(){
  	return $this->_localisation;
  }

  public function experience(){
  	return $this->_experience;
  }

  //Contructor
	public function __construct($force, $degats) // Constructeur demandant 2 paramètres
	{
		$this->setForce($force); // Initialisation de la force.
		$this->setDegats($degats); // Initialisation des dégâts.
		$this->_experience = 1; // Initialisation de l'expérience à 1.
		self::countObjects();
	}


//Mutateurs

    // Mutateur chargé de modifier l'attribut $_force.
  public function setForce($force)
  {
    if (in_array($force, [self::FORCE_PETITE,self::FORCE_MOYENNE,self::FORCE_GRANDE]))
    {
    	$this->_force = $force;
    }
	else {
    	trigger_error('La force d\'un personnage doit être une constante', E_USER_WARNING);
    	return;
  	}
  
  // Mutateur chargé de modifier l'attribut $_experience.
  public function setExperience($experience)
  {
    if (!is_int($experience)) // S'il ne s'agit pas d'un nombre entier.
    {
      trigger_error('L\'expérience d\'un personnage doit être un nombre entier', E_USER_WARNING);
      return;
    }
    
    if ($experience > 100) // On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100.
    {
      trigger_error('L\'expérience d\'un personnage ne peut dépasser 100', E_USER_WARNING);
      return;
    }

    $this->_experience = $expérience;
}

  // Mutateur chargé de modifier l'attribut $_localisation.
    public function setLocalisation($localisation) {
    	if (!is_string($localisation))
    	{
    		trigger_error('La localisation d\'un personnage doit être une chaîne de caractères', E_USER_WARNING);
      		return;
    	}

    	$this->_localisation = $localisation;
    }

  // Mutateur chargé de modifier l'attribut $_degats.
    public function setDegats($degats) {
    	if (!is_int($degats))
    	{
    		trigger_error('Les dégats d\'un personnage doivent être une nombre entier', E_USER_WARNING);
    		return;
    	}

    	$this->_degats = $degats;
    }

//Autres fonctions

    public static function toFart() {
    	echo self::_fart;
    }

    public static function countObjects()
    {
    	self::_objectNumber++;
    }

  public function afficherExperience() {
  	echo $this->_experience;
  }


   public function parler() // Une méthode qui déplacera le personnage (modifiera sa localisation).
  {
  	echo "je suis sun personnage";
  }

    public function deplacer() // Une méthode qui déplacera le personnage (modifiera sa localisation).
  {

  }
        
  public function frapper(Personnage $personnage) // Une méthode qui frappera un personnage (suivant la force qu'il a).
  {
  	$personnage->_degats += $this->_force;
  }
        
  public function gagnerExperience() // Une méthode augmentant l'attribut $experience du personnage.
  {
  	$this->_experience++;
  }
 }