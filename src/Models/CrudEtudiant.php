 <?php
 require_once '../../Config.php';
 require '../../Models/Etudiant.php';
	
	
	class CrudEtudiant {
		
		private $connection ;
		function __construct (){
			$this->connection=Config::getConnection();
		}
		
		public function getAllEtudiants (){
			$sql="select * from etudiant";
			$stmt=$this->connection->prepare($sql);
			$stmt->execute();
			$res=$stmt->fetchall(PDO::FETCH_NUM);
			return $res;
		}
		public function getEtudiantByMatricule($matricule){
			$sql="select * from etudiant where matricule= :matricule";
			$stmt=$this->connection->prepare($sql);
			$stmt->bindValue(":matricule",$matricule,PDO::PARAM_INT);
			$stmt->execute();
			$res=$stmt->fetch(PDO::FETCH_NUM);
			return $res;
		}
		
		public function removeEtudiant( $matricule){
			$sql="delete from etudiant where matricule= :matricule";
			$stmt=$this->connection->prepare($sql);
			$stmt->bindValue(":matricule",$matricule,PDO::PARAM_INT);	
			$res=$stmt->execute();
			return $res;
		}
		public function addEtudiant (Etudiant $obj){
					$matSec=	mysql_real_escape_string(	$obj->getMatricule()	);
					$nomSec=  	mysql_real_escape_string(	$obj->getNom()			);
					$pnomSec=	mysql_real_escape_string(	$obj->getPrenom()		);
					$adSec=		mysql_real_escape_string(	$obj->getAdresse()		);
					$idSec=		mysql_real_escape_string(	$obj->getId_classe()	);
		  $sql="insert into etudiant values($matSec,'$nomSec','$pnomSec','$adSec',$idSec)";
		  $res=$this->connection->exec($sql);
		  return $res;
				
		}
		public function upDateEtudiant( Etudiant $obj){
			$matricule=	$obj->getMatricule();
			$nom=		$obj->getNom();		
			$prenom=	$obj->getPrenom();											
			$adresse=	$obj->getAdresse();
			$id_classe=	$obj->getId_classe();

				$sql="update etudiant set nom=:nom,prenom=:prenom,
					  adresse=:adresse,id_classe=:id_classe 
					  where matricule=:matricule";
				$stmt=$this->connection->prepare($sql);
				$stmt->bindValue(":nom",$nom,PDO::PARAM_STR);
				$stmt->bindValue(":prenom",$prenom,PDO::PARAM_STR);
				$stmt->bindValue(":adresse",$adresse,PDO::PARAM_STR);
				$stmt->bindValue(":id_classe",$id_classe,PDO::PARAM_INT);
				$stmt->bindValue(":matricule",$matricule,PDO::PARAM_INT);
				$stmt->execute();
				$res=$stmt->fetch(PDO::FETCH_ASSOC);
				return $res;
		}




		/*public function addEtudiant(Etudiant $obj){
			//verification d'inexistance du matricule 
				if (!getEtudiantByMatricule($obj->getMatricule())){
					$matricule=$obj->getMatricule();
					$nom=$obj->getNom();		
					$prenom=$obj->getPrenom();											
					$adresse=$obj->getAdresse());
					$id_classe=$obj->getId_classe();
						$sql="insert into classe value($matricule,'$nom','$prenom','adresse',$id_classe)";
						$res=$this->connection->exec($sql);
						return $res;
				}
		}
		public function getEtudiantByNom($nom){
			$sql="select * from Etudiant where nom= :nom";
			$stmt=$this->connection->prepare($sql);
			$stmt->bindValue(":nom",$nom,PDO::PARAM_STR);
			$stmt->execute();
			$res=$stmt->fetch(PDO::FETCH_ASSOC);
			return $res;
		}
		public function getEtudiantByPrenom($prenom){
			$sql="select * from Etudiant where prenom= :prenom";
			$stmt=$this->connection->prepare($sql);
			$stmt->bindValue(":prenom",$prenom,PDO::PARAM_STR);
			$stmt->execute();
			$res=$stmt->fetch(PDO::FETCH_ASSOC);
			return $res;
		}
		
		public function getEtudiantByAdresse($adresse){
			$sql="select * from Etudiant where adresse= :adresse";
			$stmt=$this->connection->prepare($sql);
			$stmt->bindValue(":adresse",$adresse,PDO::PARAM_STR);
			$stmt->execute();
			$res=$stmt->fetch(PDO::FETCH_ASSOC);
			return $res;
		}*/
	}
?>