<?php
class CodigoAplicatvo
{
private $pdo;

	public function __CONSTRUCT()
	{
		try
		{
      		require_once("/db.php");
			$this->pdo=Conectar::conexion();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}	
	public function porcen($idaplicativo=9)
	{
	return $idaplicativo;
	}

	public function Codigo()
	{

		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select codigo_aplicativo from aplicativo 
										WHERE estado_aplicativo = 1 ");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$cod = new Aplicativo();

				$cod->__SET('codigo_aplicativo', $r->codigo_aplicativo);

								
				$result[] = $cod;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Porcentaje($idaplicativo)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT pa.porcentaje_regresion,pa.porcentaje_mejora FROM parametro pa
								inner join aplicativo ap on pa.idaplicativo=ap.idaplicativo
								WHERE ap.estado_aplicativo=1 and ap.idaplicativo = ?");
			          

			$stm->execute(array($idaplicativo));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$por = new Aplicativo();

			$por->__SET('porcentaje_regresion', $r->porcentaje_regresion);
			$por->__SET('porcentaje_mejora', $r->porcentaje_mejora);

			
			return $por;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	
}
?>
			
