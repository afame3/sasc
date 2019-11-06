<?php
require_once('propiedades.php');
?>
<div>
 
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
       <div>
            Seleccione periodo:
            <select onchange="test()" name="name" id="lista">
                <option value="0" selected>Haga clic aquí</option>
                <option value="1" <?php if($_POST['name']=='1') echo 'selected="selected" ';?>> ENERO</option>
                <option value="2"  <?php if($_POST['name']=='2') echo 'selected="selected" ';?>>FEBRERO</option>
                <option value="3"  <?php if($_POST['name']=='3') echo 'selected="selected" ';?>>MARZO</option>
                <option value="4"  <?php if($_POST['name']=='4') echo 'selected="selected" ';?>>ABRIL</option>
                <option value="5"  <?php if($_POST['name']=='5') echo 'selected="selected" ';?>>MAYO</option>
                <option value="6"  <?php if($_POST['name']=='6') echo 'selected="selected" ';?>>JUNIO</option>
                <option value="7"  <?php if($_POST['name']=='7') echo 'selected="selected" ';?>>JULIO</option>
                <option value="8"  <?php if($_POST['name']=='8') echo 'selected="selected" ';?>>AGOSTO</option>
                <option value="9"  <?php if($_POST['name']=='9') echo 'selected="selected" ';?>>SEPTIEMBRE</option>
                <option value="10"  <?php if($_POST['name']=='10') echo 'selected="selected" ';?>>OCTUBRE</option>
                <option value="11"  <?php if($_POST['name']=='11') echo 'selected="selected" ';?>>NOVIEMBRE</option>
                <option value="12"  <?php if($_POST['name']=='12') echo 'selected="selected" ';?>>DICIEMBRE</option>
            </select>
            <input type="submit" name="submit" value="Consultar">
            <input type="button" onclick=" generateexcel('testTable') " value="Exportar a Excel">
        </div>
     </form>
</div>

