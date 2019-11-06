<?php
?><script type="text/javascript">
var campos = 1;  
    function agregarPrograma(){
    campos++;
    var NvoCampo= document.createElement("div");
    NvoCampo.id= "divcampo_"+(campos);
    NvoCampo.innerHTML= 
        "<table  border='0'   class='tablreg'>" +
        "   <tr>" +
        "     <td>" +
        "       <select name='id_titulo[" + campos + "]' id='id_titulo" + campos + "'>"+        
        "           <option value='0'>Elija opción</option>"+
        "       </select>"+     
        "       <input required='required' type='text' size='60' maxlength='50'name='campo[" + campos + "]'  id='campo" + campos + "' placeholder='Nombre del Programa'>" +
        "       <a href='JavaScript:quitarCampo(" + campos +");'> <img src='imagenes/eliminar.png' width='25' height='25'/></a>" +      
        "     </td>" +
        "   </tr>"
        "</table>";
    var contenedor= document.getElementById("contenedorcampos");
    contenedor.appendChild(NvoCampo);
  }
</script>
