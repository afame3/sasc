<?php

class CotizacionModel
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

			//$stm = $this->pdo->prepare("SELECT * FROM aplicativo where estado_aplicativo=1");
			
			//$stm = $this->pdo->prepare("select c.idcotizacion,c.numero_cotizacion,emp.razon_social,em.nombre_empleado,c.descripcion_cotizacion,c.estado_cotizacion from cotizacion c
//inner join empresa emp on c.empresa_idempresa=emp.idempresa
//inner join empleado em on c.empleado_idempleado=em.idempleado where c.estado_cotizacion in ('Rechazada','Pendiente')");

$stm = $this->pdo->prepare("select c.idcotizacion,c.cotizacion_numero,c.cotizacion_fecha,c.cotizacion_descripcion,emp.empresa_razon_social,
eml.empleado_nombre,c.cotizacion_estado
from cotizacion c
inner join empresa emp on c.empresa_idempresa=emp.idempresa
inner join empleado eml on c.empleado_idempleado=eml.idempleado where c.cotizacion_estado in ('Registrado','Pendiente','Aprobado')
order by c.cotizacion_numero desc");

			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$cot = new Cotizacion();

				$cot->__SET('idcotizacion', $r->idcotizacion);
				$cot->__SET('cotizacion_numero', $r->cotizacion_numero);
				$cot->__SET('cotizacion_fecha', $r->cotizacion_fecha);
				$cot->__SET('empresa_razon_social', $r->empresa_razon_social);
				$cot->__SET('empleado_nombre', $r->empleado_nombre);
				$cot->__SET('cotizacion_descripcion', $r->cotizacion_descripcion);
				$cot->__SET('cotizacion_estado', $r->cotizacion_estado);
								
				$result[] = $cot;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function ListarAdm()
	{

		try
		{
			$result = array();

			//$stm = $this->pdo->prepare("SELECT * FROM aplicativo where estado_aplicativo=1");
			
			//$stm = $this->pdo->prepare("select c.idcotizacion,c.numero_cotizacion,emp.razon_social,em.nombre_empleado,c.descripcion_cotizacion,c.estado_cotizacion from cotizacion c
//inner join empresa emp on c.empresa_idempresa=emp.idempresa
//inner join empleado em on c.empleado_idempleado=em.idempleado where c.estado_cotizacion in ('Rechazada','Pendiente')");

$stm = $this->pdo->prepare("select c.idcotizacion,c.cotizacion_numero,c.cotizacion_fecha,c.cotizacion_descripcion,emp.empresa_razon_social,
eml.empleado_nombre,c.cotizacion_estado
from cotizacion c
inner join empresa emp on c.empresa_idempresa=emp.idempresa
inner join empleado eml on c.empleado_idempleado=eml.idempleado where c.cotizacion_estado='Aprobado'
order by c.cotizacion_numero desc");

			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$cot = new Cotizacion();

				$cot->__SET('idcotizacion', $r->idcotizacion);
				$cot->__SET('cotizacion_numero', $r->cotizacion_numero);
				$cot->__SET('cotizacion_fecha', $r->cotizacion_fecha);
				$cot->__SET('empresa_razon_social', $r->empresa_razon_social);
				$cot->__SET('empleado_nombre', $r->empleado_nombre);
				$cot->__SET('cotizacion_descripcion', $r->cotizacion_descripcion);
				$cot->__SET('cotizacion_estado', $r->cotizacion_estado);
								
				$result[] = $cot;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
/*	
	public function Mostrar()
	{

		try
		{
			$id=isset($_GET["idcotizacion"]) ? $_GET["idcotizacion"] : NULL;
			//$id = isset($_POST['usuario']) ? $_POST['usuario'] : NULL;
			$result = array();

			$stm = $this->pdo->prepare("select c.idcotizacion,c.numero_cotizacion,c.estado_cotizacion,emp.razon_social,em.nombre_empleado,c.descripcion_cotizacion,c.fecha_cotizacion,c.observacion_cotizacion,c.sub_total,c.fecha_observacion,c.version,c.visita,c.link_documento,c.link_adjunto from cotizacion c
inner join empresa emp on c.empresa_idempresa=emp.idempresa
inner join empleado em on c.empleado_idempleado=em.idempleado
where c.estado_cotizacion in ('Rechazada','Pendiente','Aprobada','Registrado') and c.idcotizacion= ".$id);

			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$cot = new Cotizacion();

				$cot->__SET('idcotizacion', $r->idcotizacion);
				$cot->__SET('numero_cotizacion', $r->numero_cotizacion);
				$cot->__SET('estado_cotizacion', $r->estado_cotizacion);
				$cot->__SET('razon_social', $r->razon_social);
				$cot->__SET('nombre_empleado', $r->nombre_empleado);
				$cot->__SET('descripcion_cotizacion', $r->descripcion_cotizacion);
				$cot->__SET('fecha_cotizacion', $r->fecha_cotizacion);
				$cot->__SET('observacion_cotizacion', $r->observacion_cotizacion);
				$cot->__SET('sub_total', $r->sub_total);
				$cot->__SET('fecha_observacion', $r->fecha_observacion);
				$cot->__SET('version', $r->version);
				$cot->__SET('visita', $r->visita);
				$cot->__SET('link_documento', $r->link_documento);
				$cot->__SET('link_adjunto', $r->link_adjunto);
				
				$result[] = $cot;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
*/
	public function Obtener($idcotizacion)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("select c.idcotizacion,c.cotizacion_numero,c.cotizacion_estado,emp.empresa_razon_social,em.empleado_nombre,c.cotizacion_descripcion,c.cotizacion_fecha
from cotizacion c
inner join empresa emp on c.empresa_idempresa=emp.idempresa
inner join empleado em on c.empleado_idempleado=em.idempleado
WHERE c.idcotizacion = ?");
			          

			$stm->execute(array($idcotizacion));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$cot = new Cotizacion();

				$cot->__SET('idcotizacion', $r->idcotizacion);
				$cot->__SET('cotizacion_numero', $r->cotizacion_numero);
				$cot->__SET('cotizacion_estado', $r->cotizacion_estado);
				$cot->__SET('empresa_razon_social', $r->empresa_razon_social);
				$cot->__SET('empleado_nombre', $r->empleado_nombre);
				$cot->__SET('cotizacion_descripcion', $r->cotizacion_descripcion);
				$cot->__SET('cotizacion_fecha', $r->cotizacion_fecha);
				
			return $cot;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idcotizacion)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM cotizacion WHERE idcotizacion = ?");			          

			$stm->execute(array($idcotizacion));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
/*
	public function Actualizar(Cotizacion $data)
	{
		try 
		{
			$sql = "UPDATE cotizacion SET 
						numero_cotizacion          = ?, 
						estado_cotizacion        = ?,
						empresa_idempresa        = ?,
						empleado_idempleado            = ?,,
						descripcion_cotizacion	=	?,
						fecha_cotizacion	=	?,
						observacion_cotizacion	=	?,
						sub_total	=	?,
						fecha_observacion	=	?,
						version	=	?
					WHERE idcotizacion = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('numero_cotizacion'), 
					$data->__GET('estado_cotizacion'), 
					$data->__GET('empresa_idempresa'),
					$data->__GET('empleado_idempleado'),
					$data->__GET('descripcion_cotizacion'),
					$data->__GET('fecha_cotizacion'),
					$data->__GET('observacion_cotizacion'),
					$data->__GET('sub_total'),
					$data->__GET('fecha_observacion'),
					$data->__GET('version'),
					$data->__GET('idcotizacion')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
*/
	public function Actualizar(Cotizacion $data)
	{
		try 
		{
			//$fecha_observacion=date('Y-m-d');
			
			$sql = "UPDATE cotizacion SET 
						cotizacion_numero        = ?,
						cotizacion_descripcion        = ?,
						cotizacion_estado        = ?
					WHERE idcotizacion = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('cotizacion_numero'), 
					$data->__GET('cotizacion_descripcion'),
					$data->__GET('cotizacion_estado'), 
					//$data->__GET('empresa_idempresa'),
					//$data->__GET('empleado_idempleado'),
					
					//$data->__GET('fecha_cotizacion'),
					$data->__GET('idcotizacion')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Cotizacion $data)
	{
		try 
		{
			$cotizacion_estado='Registrado';
			//$cotizacion_fecha=date('Y-m-d');//ESPECIFICAR MM/SS
			$cotizacion_fecha=date('Y-m-d H:i:s'); // 2001-03-10 17:16:18 (el formato DATETIME de MySQL)
			
		$sql = "INSERT INTO cotizacion (cotizacion_numero,cotizacion_fecha,cotizacion_descripcion,cotizacion_estado,empleado_idempleado,empresa_idempresa) 
		        VALUES (?, ?, ?, ?,(select idempleado from empleado where empleado_nombre=?), (select idempresa from empresa where empresa_razon_social=?))";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('cotizacion_numero'), 
				$cotizacion_fecha,
				$data->__GET('cotizacion_descripcion'),
				//$data->__GET('estado_cotizacion'), 
				$cotizacion_estado,
				$data->__GET('empleado'),
				$data->__GET('empresa')
				//$data->__GET('fecha_cotizacion'),
				//$data->__GET('observacion_cotizacion'),
				//$data->__GET('visita'),
				//$data->__GET('sub_total')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	/*
	public function Codigo()
	{

		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select codigo_aplicativo from aplicativo 
										WHERE estado_aplicativo = '1' ORDER BY codigo_aplicativo ASC ");
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
	*/
	
	/*
	public function Ida()
	{

		try
		{

			//$id=$_POST['codigo'];
			$id = isset($_POST['codigo']) ? $_POST['codigo'] : NULL;
			//$id=VPLU;
			$result = array();
//".$id."
			//$stm = $this->pdo->prepare("select idaplicativo from aplicativo 
				//						WHERE codigo_aplicativo = '$id' and estado_aplicativo = 1");
										
			$stm = $this->pdo->prepare("select ap.idaplicativo,ap.codigo_aplicativo, pa.porcentaje_regresion,pa.porcentaje_mejora from aplicativo ap
										inner join parametro pa on pa.idaplicativo=ap.idaplicativo
										where ap.codigo_aplicativo= '$id' and pa.estado = 1");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$ida = new Aplicativo();

				$ida->__SET('idaplicativo', $r->idaplicativo);
				$ida->__SET('codigo_aplicativo', $r->codigo_aplicativo);
				$ida->__SET('porcentaje_regresion', $r->porcentaje_regresion);
				$ida->__SET('porcentaje_mejora', $r->porcentaje_mejora);

				$result[] = $ida;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	*/

}