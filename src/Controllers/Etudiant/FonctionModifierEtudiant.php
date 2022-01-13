<?php	
	require '../../Models/CrudEtudiant.php';
	
	if ( isset ( $_GET ['matricule'] ) ){
		$PDOCEtudiant = new CrudEtudiant();
		$tabInfo = $PDOCEtudiant->getEtudiantByMatricule ( $_GET ['matricule'] );	
		require '../../Views/Etudiant/ModifierEtudiant.php';
	}
	elseif ( isset ( $_POST['Modifier'] ) ) {
						$id     		=		htmlentities($_POST['matricule'])  ;
						$nom   			=		htmlspecialchars($_POST['nom']);
						$prenom 	  	=		htmlspecialchars($_POST['prenom']);
						$adresse   		=		htmlspecialchars($_POST['adresse']);
						$idClasse   	=		htmlspecialchars($_POST['idClasse']);
			$newEtudiant = new Etudiant ($id,$nom,$prenom,$adresse,$idClasse);
			$PDOCEtudiant = new CrudEtudiant();
			$res = $PDOCEtudiant->upDateEtudiant($newEtudiant);
			if (isset ($res) ) header ( 'location:../../Views/Etudiant/ok.php');
			else header ( 'location:../../Views/Etudiant/ko.php');
			
		
	}
	else header ( 'location:../../Controllers/Etudiant/FonctionListerEtudiant.php' );
?>