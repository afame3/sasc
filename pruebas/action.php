<form action="action.php" method="post">
 <p>Su nombre: <input type="text" name="name" value="<?php echo $_POST['nombre']; ?>" /></p>
 <p>Su edad: <input type="text" name="age" value="<?php echo $_POST['edad']; ?>"/></p>
  <p>Su edad: <input type="text" name="app" value="<?php echo $_POST['aplicativo']; ?>"/></p>
  <p><input type="submit" /></p>
</form>