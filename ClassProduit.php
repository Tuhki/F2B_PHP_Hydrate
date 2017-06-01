<?php


//Classe Produit
class Produit{


	//Données Membres
	private $_NumProduit;
	private $_Des;
	private $_Puht;

	
	//Fcts Membres
	public function __construct(){
	
	}

	public function __destruct(){
	
	}


	//Mutateurs

	public function getNumProduit(){


		return $this->_NumProduit;
	}

	public function getDes(){


		return $this->_Des;
	}

	public function getPrixHt(){


		return $this->_Puht;
	}

	

	public function setNumProduit($mNum){

		$this->_NumProduit=$mNum;

	}

	public function setDes($mDes){

		$this->_Des=$mDes;

	}

	public function setPrix($mPrixHt){

		$this->_Puht=$mPrixHt;

	}

	

	public function affiche(){

		echo $this->_NumProduit."<br/>";
		echo $this->_Des."<br/>";
		echo $this->_Puht."<br/>";
		
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

	
}




?>