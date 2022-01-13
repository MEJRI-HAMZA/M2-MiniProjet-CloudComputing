<?php
require '../../Models/CrudEtudiant.php';
	
	if ( isset ( $_GET['matricule'] ) ) {
		$PDOCEtudiant = new CrudEtudiant();
		$res = $PDOCEtudiant->removeEtudiant(htmlentities($_GET['matricule']));
		
		if (isset ($res) ) header ( 'location:../../Views/Etudiant/ok.php');
		else header ( 'location:../../Views/Etudiant/ko.php');
	}
?>