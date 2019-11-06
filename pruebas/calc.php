<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Calculadora sencilla de AJAX</title>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script>
function realizaProceso(valorCaja1, valorCaja2, operacion){
        var parametros = {
                "valorCaja1" : valorCaja1,
                "valorCaja2" : valorCaja2,
                "operacion" : operacion
        };
        $.ajax({
                data:  parametros,
                url:   'suma.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando...");
                },
                success:  function (response) {
                        $("#resultado").html(response);
                }
        });
}
</script>
    </head>
    <body>
        <form action="suma.php" method="post">
            Introduce valor 1
            <input type="number" name="valorCaja1" id="valor1" value="0" /><br />
            Elige la operación:
            <select id="operacion" name="operacion">
                <option value="suma">+</option>
                <option value="resta">-</option>
            </select><br />
            Introduce valor 2
            <input type="number" name="valorCaja2" id="valor2" value="0" /><br />
            <input type="submit" onclick="realizaProceso($('#valor1').val(), $('#valor2').val(), $('#operacion').val());return false;" value="Calcular"/>
        </form>
        Resultado: <span id="resultado"></span>
    </body>
</html>
 


<?php 
 $operacion = $_POST['operacion']
 
$resultado = $_POST['valorCaja1'] + $_POST['valorCaja2']; 
 
$resultadoresta = $_POST['valorCaja1'] - $_POST['valorCaja2']; 
 
if ($operacion == 'resta') {
    echo $resultadoresta;
} else {
    echo $resultado;
} 
?>
 