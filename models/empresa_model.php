<?php

class EmpresaModel
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

			//$stm = $this->pdo->prepare("select * from empleado where estado_empleado=1 order by nombre_empleado asc");
			$stm = $this->pdo->prepare("select * from empresa order by empresa_razon_social");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$em = new Empresa();

				$em->__SET('idempresa', $r->idempresa);
				$em->__SET('empresa_numero', $r->empresa_numero);
				$em->__SET('empresa_razon_social', $r->empresa_razon_social);
				//$emp->__SET('dni', $r->dni);
				//$emp->__SET('direccion_empleado', $r->direccion_empleado);
				//$emp->__SET('telefono_empleado', $r->telefono_empleado);
				//$emp->__SET('estado_empleado', $r->estado_empleado);
				//$emp->__SET('email', $r->email);
				//$cal->__SET('porcentaje_regresion_manual', $r->porcentaje_regresion_manual);
				//$cal->__SET('hora_estimada_final', $r->hora_estimada_final);
				//$cal->__SET('estado', $r->estado);
				//$cal->__SET('aplicativo', $r->aplicativo);
				//$cal->__SET('usuario', $r->usuario);
							
				$result[] = $em;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	/*
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
	*/
	public function Registrar(Empresa $data)
	{
		try 
		{
		
		$empresa_estado='Activo';			
		
		//$fecha_emision=date('Y-m-d');//ESPECIFICAR MM/SS

		$sql = "INSERT INTO empresa (empresa_numero,empresa_razon_social,empresa_ruc,empresa_estado,empresa_direccion,empresa_telefono,empresa_contacto,empresa_correo) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
					$data->__GET('empresa_numero'), 
					$data->__GET('empresa_razon_social'), 
					$data->__GET('empresa_ruc'),
					$empresa_estado,
					$data->__GET('empresa_direccion'),
					$data->__GET('empresa_telefono'),
					$data->__GET('empresa_contacto'),
					$data->__GET('empresa_correo')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	
}