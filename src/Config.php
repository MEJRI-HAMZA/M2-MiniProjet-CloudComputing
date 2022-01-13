<?php
	class Config {
		
		public static function getConnection(){
			
				$dns='mysql:host=db;dbname=hamza_mejri_database';
				$user='root';
				$password='example';
				$PDOobject = new PDO ($dns,$user,$password);
			
			return $PDOobject;
		}
	}
?>