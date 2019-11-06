<?php

class EmpleadoModel
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
			$stm = $this->pdo->prepare("select * from empleado order by empleado_nombre");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new Empleado();

				$emp->__SET('idempleado', $r->idempleado);
				$emp->__SET('empleado_numero', $r->empleado_numero);
				$emp->__SET('empleado_nombre', $r->empleado_nombre);
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
							
				$result[] = $emp;
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
	public function Registrar(Empleado $data)
	{
		try 
		{
		
		//$fecha_estimada=date('Y-m-d');			
		//$fecha_emision=date('Y-m-d');//ESPECIFICAR MM/SS
		$empleado_estado='Activo';	//todo empleado nace con el estado activo

		$sql = "INSERT INTO empleado (empleado_numero,empleado_nombre,empleado_dni,empleado_direccion,empleado_telefono,empleado_estado,empleado_email) 
		        VALUES (?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
					$data->__GET('empleado_numero'), 
					$data->__GET('empleado_nombre'), 
					$data->__GET('empleado_dni'),
					$data->__GET('empleado_direccion'),
					$data->__GET('empleado_telefono'),
					$empleado_estado,
					$data->__GET('empleado_email')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}