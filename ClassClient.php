
<?php

//classe Client
class Client{


	//Données Membres
	private $_IdClient;
	private $_Nom;
	private $_Prenom;
	private $_Adresse;
	private $_Cp;
	private $_Ville;
	private $_Pays;

	
	private $_collectFacture=array();
	

	//Fcts Membres

	
	public function __construct(){
	
	}

	public function __destruct(){

	}



	//Mutateurs

	public function getId(){

		return $this->_IdClient;
	}

	public function getNom(){

		return $this->_Nom;
	}

	public function getPrenom(){

		return $this->_Prenom;
	}

	public function getAdresse(){

		return $this->_Adresse;
	}

	public function getCp(){

		return $this->_Cp;
	}


	public function getVille(){

		return $this->_Ville;

	}

	public function getPays(){

		return $this->_Pays;

	}

	public function setIdClient($mId){
		
		$this->_IdClient=$mId;

	}

	public function setNom($mNom){

		$this->_Nom=$mNom;

	}

	public function setPrenom($mPrenom){

		$this->_Prenom=$mPrenom;

	}

	public function setAdresse($mAdresse){

		$this->_Adresse=$mAdresse;

	}

	public function setCp($mCp){

		$this->_Cp=$mCp;

	}

	public function setVille($mVille){

		$this->_Ville=$mVille;

	}

	public function setPays($mPays){

		$this->_Pays=$mPays;

	}
	
	//Fonction permettant de donner des valeurs aux attributs de l'objet
	public function hydrate(array $donnees)
	{
	  foreach ($donnees as $key => $value)
	  {
		// On récupère le nom du setter correspondant à l'attribut.
		$method = 'set'.ucfirst($key);
			
		// Si le setter correspondant existe...
		if (method_exists($this, $method))
		{
		  //...on appelle le setter.
		  $this->$method($value);
		}
	  }
	}

	public function affiche(){

		echo $this->_IdClient."<br/>";
		echo $this->_Nom."<br/>";
		echo $this->_Prenom."<br/>";
		echo $this->_Adresse."<br/>";
		echo $this->_Cp."<br/>";
		echo $this->_Ville."<br/>";
		echo $this->_Pays."<br/>";
		//echo $this->_collectFacture[$i]->affiche();"<br/>";

		// Affichage des produits dans la facture
  		foreach(self::getFactClient() as $valeur) {
 
    		echo $valeur->affiche().'<br/>';
    	
  		}

	}

	public function getFactClient(){

		return $this->_collectFacture;

	}

	public function addFacture(Facture $mCollection){

		if (!in_array($mCollection,$this->_collectFacture)){
			$mCollection->setClient($this);
			$this->_collectFacture[]=$mCollection;
		}
		
			

	}


	
}


?>