
<select id="opciones" name="opciones">
    <option value="1">Primera opción</option>
    <option value="2">Segunda opción</option>
    <option value="3">Tercera opción</option>
</select>
<script>

var lista = document.getElementById("opciones");
 
// Obtener el índice de la opción que se ha seleccionado
var indiceSeleccionado = lista.selectedIndex;
// Con el índice y el array "options", obtener la opción seleccionada
var opcionSeleccionada = lista.options[indiceSeleccionado];
 
// Obtener el valor y el texto de la opción seleccionada
var textoSeleccionado = opcionSeleccionada.text;
var valorSeleccionado = opcionSeleccionada.value;
 
alert("Opción seleccionada: " + textoSeleccionado + "\n Valor de la opción: " + valorSeleccionado);

</script>
 

<input 
type="button" 
value="Ver texto seleccionado" 
onclick="alert(document.getElementById('opciones').options[document.getElementById('opciones').selectedIndex].text);" 
/>
