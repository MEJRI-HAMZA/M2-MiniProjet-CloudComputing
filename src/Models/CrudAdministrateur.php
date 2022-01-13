 <?php
 require_once '../Config.php';
 require '../Models/Administrateur.php';
	
	
	class CrudAdministrateur {
		
		private $connection ;
		function __construct (){
			$this->connection=Config::getConnection();
		}
		
		
		public function getAdmin($login,$password){
		//$loginSec = mysql_real_escape_string($login);
		//$passwordSec = mysql_real_escape_string($password);

		$loginSec = $login;
		$passwordSec = $password;
		
		$sql="select * from administrateurs where login='".$loginSec."' and password='".$passwordSec."'";
		$stmt=$this->connection->prepare($sql);
		$stmt->execute();
		$res=$stmt->fetch(PDO::FETCH_NUM);
		return $res;
		}

		// Or using prepared statement
		/*public function getAdmin($login,$password){
			$sql="select * from administrateurs where login=:login and password=:password";
			$stmt=$this->connection->prepare($sql);
			$stmt->bindValue(":login",$login,PDO::PARAM_STR);
			$stmt->bindValue(":password",$password,PDO::PARAM_STR);
			$stmt->execute();
			$res=$stmt->fetch(PDO::FETCH_NUM);
			return $res;
		}*/
		
	}
?>