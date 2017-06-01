<?php

include_once "ClassClient.php";
include_once "ClassFacture.php";
include_once "ClassProduit.php";
include_once "ClassDFacture.php";
include_once "ClassClientManager.php";

?>


<?php

	//MAIN
	
	/*NOUVEAU PRODUIT*/
	//Données à passer au produit
	$donneesProd = array	(	
								'NumProduit' => '1',
								'Des'		 => 'Pommes golden',
								'Prix' 	 	 => '3'
							);
							
	//Création d'un nouveau produit
	$produit = new Produit();
	
	//Hydratation du produit
	$produit->hydrate($donneesProd);
	
	
	/*NOUVELLE FACTURE*/
	//Données à passer à la facture
	$donneesFacture = array	(	
								'NumFacture' => '1',
								'Date'		 => '2017-06-01',
								'Reg' 	 	 => 'CB'
							);
							
	//Création d'une nouvelle facture
	$facture = new Facture();
	
	//Hydratation de la facture
	$facture->hydrate($donneesFacture);
	
	//Ajout du produit commandé à la facture
	$facture->addProduits($produit,10);

	
	/*NOUVEAU CLIENT*/
	//Données à passer au client
	$donneesClient = array	(	
								'IdClient' 	=> '1',
								'Nom'		=> 'Dupont',
								'Prenom' 	=> 'Jean',
								'Adresse' 	=> '8 rue des Prés',
								'Cp' 		=> '67000',
								'Ville' 	=> 'Strasbourg',
								'Pays' 		=> 'France'
							);
							
	//Création d'un nouveau client
	$client = new Client();
	
	//Hydratation du client
	$client->hydrate($donneesClient);
	
	//Ajout de la facture du client, au client
	$client->addFacture($facture);
	
	
	/*INTERACTIONS AVEC LA BASE DE DONNEES*/
	
	//INSERTION
		//Ouverture de la base
		$bdd = new PDO('mysql:host=localhost;dbname=facture_prof', 'root', '');
		
		//Assignation de la base de données à un attribut d'un objet de la classe ClientManager
		$clientStock = new ClientManager($bdd);
		
		//Ajout du client dans la base de données
		$clientStock->addClient($client);
	
	/*//UPDATE
		//Nouvelles données à passer au client
		$majClient = array	(	
									'IdClient' 	=> '1',
									'Nom'		=> 'Dupont',
									'Prenom' 	=> 'Jean',
									'Adresse' 	=> '12 avenue du Lac',
									'Cp' 		=> '35000',
									'Ville' 	=> 'Rennes',
									'Pays' 		=> 'France'
								);
		
		//Hydratation du client
		$client->hydrate($majClient);
		
		//Mise à jour de la base de données
		$clientStock->updateClient($client);
	
	//DELETE
		//Suppression d'un client de la base de données
		$clientStock->deleteClient($client);
*/
?>