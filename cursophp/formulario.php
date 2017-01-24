<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Formulario de Registro</title>
<script>
	function validar(){
		if(document.registro.nombre.value.length==0){
				alert("Debe ingresar su nombre")
				document.registro.nombre.focus()
				return 0;
			}
		
		if(document.registro.email.value.length==0){
				alert("Debe ingresar su email")
				document.registro.email.focus()
				return 0;
			}
		if(document.registro.pais.selectedIndex==0){
				alert("Debe seleccionar un pais")
				document.registro.pais.focus()
				return 0;
			}
		document.registro.submit();
	}
</script>
</head>

<body>
<form id="registro" name="registro" method="post" action="script_guarda.php">
  <p>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" />
  </p>
  <p>
    <label for="email">Email:</label>
    <input type="text" name="email" id="email" />
  </p>
  <p>
    <label for="pais">Pais:</label>
    <select name="pais" id="pais">
    <option>Seleccionar</option>
    <option>Colombia</option>
    <option>Peru</option>
    <option>Chile</option>
    <option>Ecuador</option>
    <option>Argentina</option>
    </select>
  </p>
  <p>
    <label for="password">Constraseña:</label>
    <input type="password" name="password" id="password" />
  </p>
  <p>
    <input name="enviar" type="button" value="Enviar" onclick="validar();">
  </p>
</form>
</body>
</html>