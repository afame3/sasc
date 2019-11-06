<?php

class RequerimientoModel
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
			$result = array();

			//$stm = $this->pdo->prepare("SELECT * FROM requerimiento where estado_aplicativo=1");
			$stm = $this->pdo->prepare("select
											rq.idrequerimiento,
											rq.sol_negocio,
											rq.sol_tecnico,
											rq.nombre_requerimiento,
											rq.fecha_inicio_planificado,
											rq.fecha_fin_planificado,
											rq.fecha_inicio_construccion,
											rq.fecha_fin_construccion,
											rq.tipo_construccion,
											rq.idaplicativo,
											rq.idestado,
											rq.idestado_cq,
											rq.horas_construccion,
											rq.indicador,
											ap.codigo_aplicativo as aplicativo,
											es.estado as estado,
											pr.nombre_proveedor as proveedor
										from requerimiento rq
										inner join aplicativo ap on rq.idaplicativo=ap.idaplicativo
										inner join proveedor pr on ap.idproveedor=pr.idproveedor
										inner join estado es on rq.idestado=es.idestado
										order by rq.idrequerimiento asc");
 
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$req = new Requerimiento();

				$req->__SET('idrequerimiento', $r->idrequerimiento);
				$req->__SET('sol_negocio', $r->sol_negocio);
				$req->__SET('sol_tecnico', $r->sol_tecnico);
				$req->__SET('nombre_requerimiento', $r->nombre_requerimiento);
				$req->__SET('fecha_inicio_planificado', $r->fecha_inicio_planificado);
				$req->__SET('fecha_fin_planificado', $r->fecha_fin_planificado);
				$req->__SET('fecha_inicio_construccion', $r->fecha_inicio_construccion);
				$req->__SET('fecha_fin_construccion', $r->fecha_fin_construccion);
				$req->__SET('tipo_construccion', $r->tipo_construccion);
				$req->__SET('idaplicativo', $r->idaplicativo);
				$req->__SET('idestado', $r->idestado);
				$req->__SET('idestado_cq', $r->idestado_cq);
				//$req->__SET('idproveedor', $r->idproveedor);
				$req->__SET('horas_construccion', $r->horas_construccion);
				$req->__SET('indicador', $r->indicador);
				
				$req->__SET('aplicativo', $r->aplicativo);
				$req->__SET('estado', $r->estado);
				$req->__SET('proveedor', $r->proveedor);
				
				$result[] = $req;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function Mostrar()
	{

		try
		{
			$id=isset($_GET["idrequerimiento"]) ? $_GET["idrequerimiento"] : NULL;
			//$id = isset($_POST['usuario']) ? $_POST['usuario'] : NULL;
			$result = array();

			$stm = $this->pdo->prepare("select
											rq.idrequerimiento,
											rq.sol_negocio,
											rq.sol_tecnico,
											rq.nombre_requerimiento,
											rq.fecha_inicio_planificado,
											rq.fecha_fin_planificado,
											rq.fecha_inicio_construccion,
											rq.fecha_fin_construccion,
											rq.tipo_construccion,
											rq.idaplicativo,
											rq.idestado,
											rq.idestado_cq,
											rq.horas_construccion,
											rq.indicador,
											ap.codigo_aplicativo as aplicativo,
											es.estado as estado,
											pr.nombre_proveedor as proveedor
										from requerimiento rq
										inner join aplicativo ap on rq.idaplicativo=ap.idaplicativo
										inner join proveedor pr on ap.idproveedor=pr.idproveedor
										inner join estado es on rq.idestado=es.idestado 
									where idrequerimiento= ".$id);

			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$req = new Requerimiento();

				$req->__SET('idrequerimiento', $r->idrequerimiento);
				$req->__SET('sol_negocio', $r->sol_negocio);
				$req->__SET('sol_tecnico', $r->sol_tecnico);
				$req->__SET('nombre_requerimiento', $r->nombre_requerimiento);
				$req->__SET('fecha_inicio_planificado', $r->fecha_inicio_planificado);
				$req->__SET('fecha_fin_planificado', $r->fecha_fin_planificado);
				$req->__SET('fecha_inicio_construccion', $r->fecha_inicio_construccion);
				$req->__SET('fecha_fin_construccion', $r->fecha_fin_construccion);
				$req->__SET('tipo_construccion', $r->tipo_construccion);
				$req->__SET('idaplicativo', $r->idaplicativo);
				$req->__SET('idestado', $r->idestado);
				$req->__SET('idestado_cq', $r->idestado_cq);
				//$req->__SET('idproveedor', $r->idproveedor);
				$req->__SET('horas_construccion', $r->horas_construccion);
				$req->__SET('indicador', $r->indicador);
				
				$req->__SET('aplicativo', $r->aplicativo);
				$req->__SET('estado', $r->estado);
				$req->__SET('proveedor', $r->proveedor);
						
				$result[] = $req;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idrequerimiento)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT req.idaplicativo,req.idrequerimiento,req.sol_negocio,req.sol_tecnico,req.nombre_requerimiento,req.fecha_inicio_planificado,req.fecha_fin_planificado,req.fecha_inicio_construccion,req.fecha_fin_construccion,req.tipo_construccion,ap.codigo_aplicativo,req.idestado,req.idestado_cq,pro.nombre_proveedor,req.horas_construccion,req.indicador FROM requerimiento req
inner join aplicativo ap on ap.idaplicativo=req.idaplicativo
inner join proveedor pro on pro.idproveedor=ap.idproveedor
WHERE idrequerimiento = ?");
					  
			$stm->execute(array($idrequerimiento));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$req = new Requerimiento();

			$req->__SET('idrequerimiento', $r->idrequerimiento);
			$req->__SET('sol_negocio', $r->sol_negocio);
			$req->__SET('sol_tecnico', $r->sol_tecnico);
			$req->__SET('nombre_requerimiento', $r->nombre_requerimiento);
			$req->__SET('fecha_inicio_planificado', $r->fecha_inicio_planificado);
			$req->__SET('fecha_fin_planificado', $r->fecha_fin_planificado);
			$req->__SET('fecha_inicio_construccion', $r->fecha_inicio_construccion);
			$req->__SET('fecha_fin_construccion', $r->fecha_fin_construccion);
			$req->__SET('tipo_construccion', $r->tipo_construccion);
			$req->__SET('idaplicativo', $r->idaplicativo);
			$req->__SET('codigo_aplicativo', $r->codigo_aplicativo);
			$req->__SET('idestado', $r->idestado);
			$req->__SET('idestado_cq', $r->idestado_cq);
			//$req->__SET('idproveedor', $r->idproveedor);
			$req->__SET('nombre_proveedor', $r->nombre_proveedor);
			$req->__SET('horas_construccion', $r->horas_construccion);
			$req->__SET('indicador', $r->indicador);
						
			return $req;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idrequerimiento)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM requerimiento WHERE idrequerimiento = ?");			          

			$stm->execute(array($idrequerimiento));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Requerimiento $data)
	{
		try 
		{
			//$horas=isset($_GET["horas_construccion"]) ? $_GET["horas_construccion"] : NULL;
				
			$sql = "UPDATE requerimiento SET 
						sol_negocio          = ?, 
						sol_tecnico        = ?,
						nombre_requerimiento        = ?,
						fecha_inicio_planificado        = ?,
						fecha_fin_planificado        = ?,
						fecha_inicio_construccion        = ?,
						fecha_fin_construccion        = ?,
						tipo_construccion        = ?,
						idaplicativo        = ?,
						idestado        = ?,
						idestado_cq        = ?,
						horas_construccion        = ?,
						indicador        = ?
					WHERE idrequerimiento = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('sol_negocio'), 
					$data->__GET('sol_tecnico'), 
					$data->__GET('nombre_requerimiento'),
					$data->__GET('fecha_inicio_planificado'),
					$data->__GET('fecha_fin_planificado'),
					$data->__GET('fecha_inicio_construccion'),
					$data->__GET('fecha_fin_construccion'),
					$data->__GET('tipo_construccion'),
					$data->__GET('idaplicativo'),
					$data->__GET('idestado'),
					$data->__GET('idestado_cq'),
					//$data->__GET('idproveedor'),
					$data->__GET('horas_construccion'),
					//$horas,
					$data->__GET('indicador'),
					$data->__GET('idrequerimiento')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Requerimiento $data)
	{
		try 
		{
		$sql = "INSERT INTO requerimiento (sol_negocio,sol_tecnico,nombre_requerimiento,fecha_inicio_planificado,fecha_fin_planificado,fecha_inicio_construccion,fecha_fin_construccion,tipo_construccion,horas_construccion,indicador,idaplicativo,idestado_cq,idestado)
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, (select idaplicativo from aplicativo where estado_aplicativo=1 and codigo_aplicativo=?), (select idestado_cq from estado_cq where estado_cq=?), (select idestado from estado where estado=?))";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
					$data->__GET('sol_negocio'), 
					$data->__GET('sol_tecnico'), 
					$data->__GET('nombre_requerimiento'),
					$data->__GET('fecha_inicio_planificado'),
					$data->__GET('fecha_fin_planificado'),
					$data->__GET('fecha_inicio_construccion'),
					$data->__GET('fecha_fin_construccion'),
					$data->__GET('tipo_construccion'),
					$data->__GET('horas_construccion'),
					$data->__GET('indicador'),
					$data->__GET('aplicativo'),
					//$data->__GET('proveedor'),
					$data->__GET('estado_cq'),
					$data->__GET('estado')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}