 <?php
 require_once '../../Config.php';
 require_once '../../Models/Classe.php';
	
	
	class CrudClasse {
		
		private $connection ;
		
		function __construct (){
			$this->connection=Config::getConnection();
		}
		
		public function getAllClasses (){
			$sql="select * from classe";
			$stmt=$this->connection->prepare($sql);
			$stmt->execute();
			$res=$stmt->fetchall(PDO::FETCH_NUM);
			return $res;
		}
		public function getClasseById($id){
			$sql="select * from Classe where Id_classe= :ID";
			$stmt=$this->connection->prepare($sql);
			$stmt->bindValue(":ID",$id,PDO::PARAM_INT);
			$stmt->execute();
			$res=$stmt->fetch(PDO::FETCH_NUM);
			return $res;
		}
		public function getClasseByNom($nom){
			$sql="select * from Classe where Nom_classe= :nom";
			$stmt=$this->connection->prepare($sql);
			$stmt->bindValue(":nom",$nom,PDO::PARAM_STR);
			$stmt->execute();
			$res=$stmt->fetch(PDO::FETCH_NUM);
			return $res;
		}
		public function upDateClasse( $id,$nom ){
			$sql="update Classe set Nom_classe=:Nom where Id_classe=:Id"  ;
			$stmt=$this->connection->prepare($sql);
			$stmt->bindValue(":Nom",$nom,PDO::PARAM_STR);
			$stmt->bindValue(":Id",$id,PDO::PARAM_INT);
			$stmt->execute();
			$res=$stmt->fetch(PDO::FETCH_NUM);
			return $res;
		}
		public function removeClasse ($id){
			$sql="delete from Classe where Id_classe= :Id";
			$stmt=$this->connection->prepare($sql);
			$stmt->bindValue(":Id",$id,PDO::PARAM_INT);
			$res=$stmt->execute();
			return $res;
		}
		
		public function addClasse($nom){

			$nomSec = mysql_real_escape_string($nom);

			$sql="insert into Classe values(NULL,'".$nomSec."')";
			$res=$this->connection->exec($sql);
			return $res;
		}
	}
?>