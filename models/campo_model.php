<?php

class CampoModel
{

private $pdo;

	public function __CONSTRUCT()
	{
		try
		{
      		require_once("db/db.php");
			$this->pdo=Conectar::conexion();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	/*
	public function Listar()
	{
		
		try
		{
			//$id = isset($_POST['usuario']) ? $_POST['usuario'] : NULL;
			//$ap = isset($_POST['codigo']) ? $_POST['codigo'] : NULL;
			$result = array();

			$stm = $this->pdo->prepare("select ca.sol_tecnico,ca.nombre_requerimiento,ap.codigo_aplicativo as aplicativo,us.matricula as usuario,ca.fecha_estimada,ca.hora_estimada,ca.hora_estimada_final from calculadora ca
					 inner join aplicativo ap on ca.idaplicativo=ap.idaplicativo
					 inner join usuario us on ca.idusuario=us.idusuario
					 where ca.estado=1
					 order by ca.idcalculadora desc");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$cal = new Calculadora();

				//$cal->__SET('idcalculadora', $r->idcalculadora);
				$cal->__SET('sol_tecnico', $r->sol_tecnico);
				$cal->__SET('nombre_requerimiento', $r->nombre_requerimiento);
				$cal->__SET('fecha_estimada', $r->fecha_estimada);
				$cal->__SET('hora_estimada', $r->hora_estimada);
				//$cal->__SET('regresion_total', $r->regresion_total);
				//$cal->__SET('porcentaje_regresion', $r->porcentaje_regresion);
				//$cal->__SET('porcentaje_mejora', $r->porcentaje_mejora);
				//$cal->__SET('porcentaje_regresion_manual', $r->porcentaje_regresion_manual);
				$cal->__SET('hora_estimada_final', $r->hora_estimada_final);
				//$cal->__SET('estado', $r->estado);
				$cal->__SET('aplicativo', $r->aplicativo);
				$cal->__SET('usuario', $r->usuario);
				
				
				$result[] = $cal;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	*/
	public function Obtener($idcampo)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM campo WHERE idcampo = ?");
			          

			$stm->execute(array($idcampo));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$cam = new Campo();

				$cam->__SET('idcampo', $r->idcampo);
				$cam->__SET('codigo', $r->codigo);
				$cam->__SET('version', $r->version);
				$cam->__SET('fecha_emision', $r->fecha_emision);
				$cam->__SET('empleado_idempleado', $r->empleado_idempleado);
				
			return $cam;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idcampo)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM campo WHERE idcampo = ?");			          

			$stm->execute(array($idcampo));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Campo $data)
	{
		try 
		{
			$sql = "UPDATE campo SET 
						codigo          = ?, 
						version        = ?,
						fecha_emision        = ?,
						empleado_idempleado      = ?
					WHERE idcampo = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('codigo'), 
					$data->__GET('version'), 
					$data->__GET('fecha_emision'),
					$data->__GET('empleado_idempleado')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Campo $data)
	{
		try 
		{
		/*	
			if ($_POST['regresion_total']==0){
				
				//$hepf: horas estimadas de pruebas funcionales
				//$hepr: horas estimadas de prueba de regresión
				//$herm: horas estimadas de regresión manual
				//$hera: horas estimadas de regresión automatizada
				
				$hepf=($_POST['hora_estimada']-$_POST['hora_estimada']*$_POST['porcentaje_regresion']);//ok

				$hepr=($_POST['hora_estimada']-$hepf);//ok
				//$herm=(($hepr)*$_POST['porcentaje_regresion_manual']);
				$herm=(($_POST['hora_estimada']-($_POST['hora_estimada']-$_POST['hora_estimada']*$_POST['porcentaje_regresion']))*$_POST['porcentaje_regresion_manual']);
				//$hera=($hepr-$herm - ($hepr-$herm)*$_POST['porcentaje_mejora']);
				$hera=($hepr-$herm-($hepr-$herm)*$_POST['porcentaje_mejora']);
				
				$valor=$hepf+$herm+$hera;
				
			}
			else
			{
				$hepf=0;
				
				$hepr=$_POST['hora_estimada'];//500
				
				$herm=(($_POST['hora_estimada']-($_POST['hora_estimada']-$_POST['hora_estimada']*1))*$_POST['porcentaje_regresion_manual']);
				$hera=($hepr-$herm-($hepr-$herm)*$_POST['porcentaje_mejora']);
				
				$valor=$hepf+$herm+$hera;
			}
			
			$fecha_estimada=date('Y-m-d');			
		*/
		$fecha_emision=date('Y-m-d');//ESPECIFICAR MM/SS

		$sql = "INSERT INTO campo (codigo,version,fecha_emision,empleado_idempleado) 
		        VALUES (?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
					$data->__GET('codigo'), 
					$data->__GET('version'), 
					//$data->__GET('fecha_emision'),
					$fecha_emision,
					$data->__GET('empleado_idempleado')
					/*
					$data->__GET('regresion_total'),
					$data->__GET('porcentaje_regresion'),
					$data->__GET('porcentaje_mejora'),
					$data->__GET('porcentaje_regresion_manual'),
					//$data->__GET('hora_estimada_final'),
					//$hora_estimada_final=$valor,
					//$data->__GET('estado'),
					$data->__GET('idaplicativo'),
					$data->__GET('idusuario')
					*/
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	

}