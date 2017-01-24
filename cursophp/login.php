<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Acceso Usuarios</title>
</head>
<body>
<form action="script_acceso_usuario.php" method="post" name="frm_ingreso">
      <table width="500" align="center">
        <tr>
          <td colspan="2" align="center"><h1>FORMULARIO DE ACCESO</h1></td>
        </tr>
        <tr>
          <td width="33%" align="right">Email: </td>
          <td width="67%" align="left">
              <input name="email" type="text" id="email" size="30" />
          </td>
        </tr>
        <tr>
          <td align="right">Contrase&ntilde;a: </td>
          <td align="left">
              <input name="password" type="password" id="contrasena" size="30" />
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="left">
              <input type="submit" name="Submit" value="Ingresar"/>
          </td>
        </tr>
      </table>
    </form>
</body>
</html>
