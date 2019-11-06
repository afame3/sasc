with(document.login){
	onsubmit = function(e){
		e.preventDefault();
		ok = true;
		if(ok && matricula.value==""){
			ok=false;
			alert("Debe escribir un nombre de usuario");
			matricula.focus();
		}
		if(ok && clave.value==""){
			ok=false;
			alert("Debe escribir su password");
			clave.focus();
		}
		if(ok){ submit(); }
	}
}
