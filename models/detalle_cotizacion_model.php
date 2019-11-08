<?php

class DetalleCotizacionModel
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
*/

	
	public function Mostrar() //mostrar todo el detalle de una cotización específica lis_detalle_cotizacion.php
	{

		try
		{
			$id=isset($_GET["idcotizacion"]) ? $_GET["idcotizacion"] : NULL;
			//$id = isset($_POST['usuario']) ? $_POST['usuario'] : NULL;
			$result = array();

			$stm = $this->pdo->prepare("select iddetalle_cotizacion,detalle_cotizacion_version,detalle_cotizacion_monto,detalle_cotizacion_comentario,
detalle_cotizacion_fecha,detalle_cotizacion_visita,detalle_cotizacion_adjunto_pdf,detalle_cotizacion_pago,
detalle_cotizacion_documento,detalle_cotizacion_condicion,detalle_cotizacion_gasto,detalle_cotizacion_estado,cotizacion_idcotizacion,detalle_cotizacion_adjunto_word,detalle_cotizacion_adjunto_excel
from detalle_cotizacion
where (cotizacion_idcotizacion='$id') order by detalle_cotizacion_fecha desc" );

			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$dco = new DetalleCotizacion();

				$dco->__SET('iddetalle_cotizacion', $r->iddetalle_cotizacion);
				$dco->__SET('detalle_cotizacion_version', $r->detalle_cotizacion_version);
				$dco->__SET('detalle_cotizacion_monto', $r->detalle_cotizacion_monto);
				$dco->__SET('detalle_cotizacion_comentario', $r->detalle_cotizacion_comentario);
				$dco->__SET('detalle_cotizacion_fecha', $r->detalle_cotizacion_fecha);
				$dco->__SET('detalle_cotizacion_visita', $r->detalle_cotizacion_visita);
				$dco->__SET('detalle_cotizacion_adjunto_pdf', $r->detalle_cotizacion_adjunto_pdf);
				$dco->__SET('detalle_cotizacion_pago', $r->detalle_cotizacion_pago);
				$dco->__SET('detalle_cotizacion_documento', $r->detalle_cotizacion_documento);
				$dco->__SET('detalle_cotizacion_condicion', $r->detalle_cotizacion_condicion);
				$dco->__SET('detalle_cotizacion_gasto', $r->detalle_cotizacion_gasto);
				$dco->__SET('detalle_cotizacion_estado', $r->detalle_cotizacion_estado);
				$dco->__SET('cotizacion_idcotizacion', $r->cotizacion_idcotizacion);
				$dco->__SET('detalle_cotizacion_adjunto_word', $r->detalle_cotizacion_adjunto_word);
				$dco->__SET('detalle_cotizacion_adjunto_excel', $r->detalle_cotizacion_adjunto_excel);
								
				$result[] = $dco;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}




	public function Obtener($iddetalle_cotizacion)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("select iddetalle_cotizacion,detalle_cotizacion_version,detalle_cotizacion_monto,detalle_cotizacion_comentario,
detalle_cotizacion_fecha,detalle_cotizacion_visita,detalle_cotizacion_adjunto_pdf,detalle_cotizacion_pago,
detalle_cotizacion_documento,detalle_cotizacion_condicion,detalle_cotizacion_gasto,detalle_cotizacion_estado,cotizacion_idcotizacion,detalle_cotizacion_adjunto_word,detalle_cotizacion_adjunto_excel
from detalle_cotizacion
where iddetalle_cotizacion= ?");
			          

			$stm->execute(array($iddetalle_cotizacion));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$dco = new DetalleCotizacion();

				$dco->__SET('iddetalle_cotizacion', $r->iddetalle_cotizacion);
				$dco->__SET('detalle_cotizacion_version', $r->detalle_cotizacion_version);
				$dco->__SET('detalle_cotizacion_monto', $r->detalle_cotizacion_monto);
				$dco->__SET('detalle_cotizacion_comentario', $r->detalle_cotizacion_comentario);
				$dco->__SET('detalle_cotizacion_documento', $r->detalle_cotizacion_documento);
				$dco->__SET('detalle_cotizacion_condicion', $r->detalle_cotizacion_condicion);
				$dco->__SET('detalle_cotizacion_gasto', $r->detalle_cotizacion_gasto);
				$dco->__SET('detalle_cotizacion_estado', $r->detalle_cotizacion_estado);
				$dco->__SET('detalle_cotizacion_fecha', $r->detalle_cotizacion_fecha);
				$dco->__SET('detalle_cotizacion_visita', $r->detalle_cotizacion_visita);
				$dco->__SET('detalle_cotizacion_adjunto_pdf', $r->detalle_cotizacion_adjunto_pdf);
				$dco->__SET('detalle_cotizacion_pago', $r->detalle_cotizacion_pago);
				$dco->__SET('cotizacion_idcotizacion', $r->cotizacion_idcotizacion);
				$dco->__SET('detalle_cotizacion_adjunto_word', $r->detalle_cotizacion_adjunto_word);
				$dco->__SET('detalle_cotizacion_adjunto_excel', $r->detalle_cotizacion_adjunto_excel);
							
			return $dco;
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

	public function ActualizarAdjunto(DetalleCotizacion $data)
	{
		try 
		{
			//$detalle_cotizacion_fecha=date('Y-m-d H:i:s');
			switch ($data->__GET('detalle_cotizacion_condicion')) {
				
				case 'pdf':
				
					$sql = "UPDATE detalle_cotizacion SET 
						detalle_cotizacion_adjunto_pdf        = ?,
						detalle_cotizacion_condicion	= ?
						
					WHERE iddetalle_cotizacion = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					//$detalle_cotizacion_fecha,
					$data->__GET('detalle_cotizacion_adjunto_pdf'),
					$data->__GET('detalle_cotizacion_condicion'),
					$data->__GET('iddetalle_cotizacion')
					
					)
				);
					break;
				case 'docx':
					$sql = "UPDATE detalle_cotizacion SET 
						detalle_cotizacion_adjunto_word        = ?,
						detalle_cotizacion_condicion	= ?
						
					WHERE iddetalle_cotizacion = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					//$detalle_cotizacion_fecha,
					$data->__GET('detalle_cotizacion_adjunto_word'),
					$data->__GET('detalle_cotizacion_condicion'),
					$data->__GET('iddetalle_cotizacion')
					
					)
				);
					break;
				case 'xlsx':
				$sql = "UPDATE detalle_cotizacion SET 
						detalle_cotizacion_adjunto_excel        = ?,
						detalle_cotizacion_condicion	= ?
						
					WHERE iddetalle_cotizacion = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					//$detalle_cotizacion_fecha,
					$data->__GET('detalle_cotizacion_adjunto_excel'),
					$data->__GET('detalle_cotizacion_condicion'),
					$data->__GET('iddetalle_cotizacion')
					
					)
				);
					
					break;
			}
			
			//$detalle_cotizacion_condicion=$extension;
			
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(DetalleCotizacion $data)
	{
		try 
		{
			$detalle_cotizacion_fecha=date('Y-m-d H:i:s');
			
			
			$sql = "UPDATE detalle_cotizacion SET 
						detalle_cotizacion_version        = ?,
						detalle_cotizacion_monto        = ?,
						detalle_cotizacion_comentario        = ?,
						detalle_cotizacion_fecha	=	?,
						detalle_cotizacion_visita        = ?,
						detalle_cotizacion_pago        = ?,
						detalle_cotizacion_documento        = ?,
						detalle_cotizacion_gasto        = ?,
						detalle_cotizacion_estado        = ?
						
					WHERE iddetalle_cotizacion = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('detalle_cotizacion_version'), 
					$data->__GET('detalle_cotizacion_monto'), 
					$data->__GET('detalle_cotizacion_comentario'),
					$detalle_cotizacion_fecha,
					$data->__GET('detalle_cotizacion_visita'),
					//$data->__GET('detalle_cotizacion_adjunto_pdf'),
					$data->__GET('detalle_cotizacion_pago'),
					$data->__GET('detalle_cotizacion_documento'),
					//$data->__GET('detalle_cotizacion_condicion'),
					$data->__GET('detalle_cotizacion_gasto'),
					$data->__GET('detalle_cotizacion_estado'),
					//$data->__GET('detalle_cotizacion_adjunto_word'),
					//$data->__GET('detalle_cotizacion_adjunto_excel'),
					$data->__GET('iddetalle_cotizacion')
										
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(DetalleCotizacion $data)
	{
		try 
		{
			//$cotizacion_idcotizacion=isset($_GET["idcotizacion"]) ? $_GET["idcotizacion"] : NULL;
			//$cotizacion_estado='Registrado';
			//$cotizacion_fecha=date('Y-m-d');//ESPECIFICAR MM/SS
			$detalle_cotizacion_fecha=date('Y-m-d H:i:s'); // 2001-03-10 17:16:18 (el formato DATETIME de MySQL)
			
		$sql = "insert into detalle_cotizacion (
						detalle_cotizacion_version,
						detalle_cotizacion_monto,
						detalle_cotizacion_comentario,
						detalle_cotizacion_fecha,
						detalle_cotizacion_visita,
						detalle_cotizacion_pago,
						detalle_cotizacion_documento,
						detalle_cotizacion_gasto,
						detalle_cotizacion_estado,
						cotizacion_idcotizacion
						)
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('detalle_cotizacion_version'), 
				$data->__GET('detalle_cotizacion_monto'),
				$data->__GET('detalle_cotizacion_comentario'),
				$detalle_cotizacion_fecha,
				$data->__GET('detalle_cotizacion_visita'),
				//$data->__GET('detalle_cotizacion_adjunto_pdf'),
				$data->__GET('detalle_cotizacion_pago'),
				$data->__GET('detalle_cotizacion_documento'),
				//$data->__GET('detalle_cotizacion_condicion'),
				$data->__GET('detalle_cotizacion_gasto'),
				$data->__GET('detalle_cotizacion_estado'),
				$data->__GET('cotizacion_idcotizacion')
				//$data->__GET('detalle_cotizacion_adjunto_word'),
				//$data->__GET('detalle_cotizacion_adjunto_excel')
				
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