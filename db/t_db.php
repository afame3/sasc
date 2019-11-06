	<?php
class Conectar{
	
	public static function conexion()
	{
		try
		{
			/*
			//MySQL
			$pdo = new PDO('mysql:host=localhost;dbname=db_automatizacion', 'root', 'j4n3tst3f');
			*/
			
			//SQL
			$pdo = new PDO( "sqlsrv:Server=QTCTSQLC01 ; Database = DB_TELECREDITO ", "", "", array(PDO::SQLSRV_ATTR_DIRECT_QUERY => true));
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
}
?>