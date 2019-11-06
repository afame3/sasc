<?php

class DetalleCampoModel
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
	
	public function Listar()
	{
		
		try
		{
			//$id = isset($_POST['usuario']) ? $_POST['usuario'] : NULL;
			//$ap = isset($_POST['codigo']) ? $_POST['codigo'] : NULL;
			$result = array();


			$stm = $this->pdo->prepare("select c.codigo,a.nombre_area,r.parametro_medicion,dc.numero_trabajador,dc.punto,r.costo_unitario,dc.costo_parametro from detalle_campo dc
					inner join campo c on c.idcampo=dc.campo_idcampo
					inner join riesgo r on r.idriesgo=dc.riesgo_idriesgo
					inner join area a on a.idarea=dc.area_idarea;");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$dca = new DetalleCampo();

				//$cal->__SET('iddetalle_campo', $r->iddetalle_campo);
				$dca->__SET('codigo', $r->codigo);
				$dca->__SET('nombre_area', $r->nombre_area);
				$dca->__SET('parametro_medicion', $r->parametro_medicion);
				$dca->__SET('numero_trabajador', $r->numero_trabajador);
				$dca->__SET('punto', $r->punto);
				$dca->__SET('costo_unitario', $r->costo_unitario);
				$dca->__SET('costo_parametro', $r->costo_parametro);
	
				$result[] = $dca;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function Obtener($iddetalle_campo)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM detalle_campo WHERE iddetalle_campo = ?");
			          

			$stm->execute(array($iddetalle_campo));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$dca = new DetalleCampo();

				$dca->__SET('iddetalle_campo', $r->iddetalle_campo);
				$dca->__SET('numero_detalle_campo', $r->numero_detalle_campo);
				$dca->__SET('numero_trabajador', $r->numero_trabajador);
				$dca->__SET('punto', $r->punto);
				$dca->__SET('costo_parametro', $r->costo_parametro);
				$dca->__SET('campo_idcampo', $r->campo_idcampo);
				$dca->__SET('riesgo_idriesgo', $r->riesgo_idriesgo);
				$dca->__SET('area_idarea', $r->area_idarea);
				
			return $dca;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($iddetalle_campo)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM detalle_campo WHERE iddetalle_campo = ?");			          

			$stm->execute(array($iddetalle_campo));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(DetalleCampo $data)
	{
		try 
		{
			$sql = "UPDATE detalle_campo SET 
						numero_detalle_campo          = ?, 
						numero_trabajador        = ?,
						punto        = ?,
						costo_parametro          = ?, 
						campo_idcampo        = ?,
						riesgo_idriesgo        = ?,
						area_idarea      = ?
					WHERE idcampo = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('numero_detalle_campo'), 
					$data->__GET('numero_trabajador'), 
					$data->__GET('punto'),
					$data->__GET('costo_parametro'), 
					$data->__GET('campo_idcampo'), 
					$data->__GET('riesgo_idriesgo'),
					$data->__GET('area_idarea')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(DetalleCampo $data)
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
		//$fecha_emision=date('Y-m-d');//ESPECIFICAR MM/SS

		$sql = "INSERT INTO detalle_campo (numero_detalle_campo,numero_trabajador,punto,costo_parametro,campo_idcampo,riesgo_idriesgo,area_idarea) 
		        VALUES (?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
					$data->__GET('numero_detalle_campo'), 
					$data->__GET('numero_trabajador'), 
					$data->__GET('punto'),
					$data->__GET('costo_parametro'),
					$data->__GET('campo_idcampo'),
					$data->__GET('riesgo_idriesgo'),
					$data->__GET('area_idarea')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	

}