<?php
require_once('js.php');
?>
<form id="formdinamico" name="formdinamico" action="nuevos.php?programa" class="formulario" method="post">  
    <table  border="0" class="tablreg" border="1">
        <tr>
            <td>
                <h2><a href="JavaScript:agregarPrograma();">Agregar nuevo(s) programa(s) <img src="imagenes/agregar.png" width="25" height="25" alt="Agregar Campo"/></a></h2>
            </td>
        </tr>
        <tr>
            <td>            
                <select name="id_titulo[1]" id="id_titulo">';    
                <?php
				do {  
                echo '<option value="'.$row_titulo['ID_TITULO'].'">'.$row_titulo['NOMBRE_TITULO'].'</option>';   
                } while ($row_titulo = mysql_fetch_assoc($titulo));
                $rows = mysql_num_rows($titulo);
                if($rows > 0) {
                mysql_data_seek($titulo, 0);
                $row_titulo = mysql_fetch_assoc($titulo);
                }?>
                </select>                     
                <input required="required" type="text" size="60" maxlength="50" name="campo[1]" id="campo" placeholder="Nombre del Programa">
            </td>
        </tr>
    </table>
	
    <div id="contenedorcampos" align="center"></div>    
    <table border="0" border="1" class="tablreg"  >
        <tr>
            <td align="right" width="100" ></td>
            <td align="right" width="495" ><h3>Nota: Todos los campos son requeridos</h3></td>
            <td align="left"><button class="submit"  type="submit">Guardar</button></td>
        </tr>
    </table>
    </form>