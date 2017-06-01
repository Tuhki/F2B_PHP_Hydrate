<?php

	class ClientManager
	{
		
		private $_database;
	
		
		public function __construct($db)
		{
			$this->_database = $db;
		}
		
		public function __destruct(){
			
		}
		
		//Insertion d'un client dans la base de donn�es
		public function addClient(Client $cli){
			
			//On r�cup�re les donn�es du client
			$envoi = $this->_database->prepare('INSERT INTO client(NumClient,NomClient,PrenomClient,AdresseClient,Cp,VilleClient,PaysClient)VALUES(:ID,:Nom,:Prenom,:Adr,:Cp,:Ville,:Pays)');
			
			//On envoie les donn�es dans la base
			$envoi->execute(array	(
										'ID' 	=>$cli->getId(),
										'Nom'		=>$cli->getNom(),
										'Prenom'	=>$cli->getPrenom(),
										'Adr'		=>$cli->getAdresse(),
										'Cp'		=>$cli->getCp(),
										'Ville'		=>$cli->getVille(),
										'Pays'		=>$cli->getPays()
									));
			
			//On referme la base
			$envoi->closeCursor();
			
			//On indique que l'insertion s'est bien pass�e
			echo 'Insertion des donn�es client effectu�e.<br/>';
			
		}
		
		//Modification d'un client dans la base de donn�es
		public function updateClient(Client $cli){
			
			//On r�cup�re les donn�es du client
			$update = $this->_database->prepare('	UPDATE 	client 	
													SET		NumClient 		= :ID, 
															NomClient 		= :Nom, 
															PrenomClient 	= :Prenom, 
															AdresseClient 	= :Adresse, 
															Cp 				= :CP, 
															VilleClient 	= :Ville, 
															PaysClient 		= :Pays
													WHERE 	NumClient 		= :ID
												');
			
			$update->bindValue(':ID', 		$cli->getId(), 		PDO::PARAM_INT);
			$update->bindValue(':Nom', 		$cli->getNom(), 	PDO::PARAM_STR);
			$update->bindValue(':Prenom', 	$cli->getPrenom(),	PDO::PARAM_STR);
			$update->bindValue(':Adresse', 	$cli->getAdresse(),	PDO::PARAM_STR);
			$update->bindValue(':CP', 		$cli->getCp(), 		PDO::PARAM_INT);
			$update->bindValue(':Ville', 	$cli->getVille(), 	PDO::PARAM_STR);
			$update->bindValue(':Pays', 	$cli->getPays(), 	PDO::PARAM_STR);

			$update->execute();
		
			//On referme la base
			$update->closeCursor();
			
			//On indique que la mise � jour s'est bien pass�e
			echo 'Mise � jour des donn�es client effectu�e.<br/>';
		}
		
		//Suppression d'un client
		public function deleteClient(Client $cli){
			
			//On supprime le client de la base de donn�es
			$this->_database->exec('DELETE FROM client WHERE NumClient = '.$cli->getId());
			
			//On indique que la suppression s'est bien d�roul�e
			echo 'Suppression du client effectu�e.<br/>';
			
		}
		
	}


?>