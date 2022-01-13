<?php
	require_once '../../Views/Etudiant/AjouterEtudiant.php';
	require '../../Models/CrudEtudiant.php';
	

	if ( isset ( $_POST['insert'] ) ) {
		
				$matricle		   	=		htmlentities($_POST['matricule']);
				$nom		   		=		htmlentities($_POST['nom']);
				$prenom		   		=		htmlentities($_POST['prenom']);
				$adresse		   	=		htmlentities($_POST['adresse']);
				$idClasse		   	=		htmlentities($_POST['idClasse']);

			$newEtudiant = new Etudiant ($matricle,$nom,$prenom,$adresse,$idClasse);
			$newCEtudiant = new CrudEtudiant ();
			$res = $newCEtudiant->addEtudiant($newEtudiant);
		if (isset ($res) ) header ( 'location:../../Views/Etudiant/ok.php');
		else header ( 'location:../../Views/Etudiant/ko.php');
	}				
?>
					
						
						
					
				
		



	




