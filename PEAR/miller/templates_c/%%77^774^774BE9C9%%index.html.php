<?php /* Smarty version 2.6.6, created on 2015-05-09 00:20:04
         compiled from index.html */ ?>
<html>
<head>
	<title>form de registro </title>
</head>
<body>
	<form id="formRegistro">
		nombre: <input type="text" name="nombre" id="nombre" value="<?php echo $this->_tpl_vars['nombre']; ?>
"><br>
		apellido: <input type="text" name="apellido" id="apellido" value="<?php echo $this->_tpl_vars['apellido']; ?>
"><br>
		fecha de nacimiento: <input type="date" name="fecha" id="fecha"><br>
		numero de cedula: <input type="text" name="cedula" id="cedula"><br>
		correo electronico: <input type="text" name="email" value="<?php echo $this->_tpl_vars['email']; ?>
" id="email"><br>
		celular: <input type="text" name="celular" id="celular" value="<?php echo $this->_tpl_vars['celular']; ?>
"><br>
		pais:<select name="pais" id="pais" value="<?php echo $this->_tpl_vars['pais']; ?>
">
			<option value="">opciones....</option>
			<option value="7">Pais de mier</option>

		</select><br>
		ciudad:<select name="ciudad" id="ciudad" value="<?php echo $this->_tpl_vars['ciudad']; ?>
">
			<option value="">opciones....</option>
			<option value="7">Ciudad de mier</option>

		</select><br>
		<?php if ($this->_tpl_vars['sexo'] == 'M'): ?>
		genero:<input type="radio" value="M" name="sexo"  checked>Masculino
		<input type="radio" value="F" name="sexo">Femenino<br>
		<?php elseif ($this->_tpl_vars['sexo'] == 'F'): ?>
		genero:<input type="radio" value="M" name="sexo">Masculino
		<input type="radio" value="F" name="sexo" checked>Femenino<br>
		<?php else: ?>
		genero:<input type="radio" value="M" name="sexo">Masculino
		<input type="radio" value="F" name="sexo">Femenino<br>
		<?php endif; ?>
		
		acepto <a href="">terminos y condiciones</a> <input type="checkbox" name="terminos" value="S"><br>
		acepto <a href="">politicas de privacidad</a> <input type="checkbox" name="politica" value="S"><br>
		deseo recibir newsletters <input type="checkbox" name="newsletter" value="S"><br>
	</form>
</body>
</html>

<!-- <?php echo $this->_tpl_vars['fbid']; ?>
 -->
<!-- <?php echo $this->_tpl_vars['email']; ?>
 -->
<!-- <?php echo $this->_tpl_vars['foto']; ?>
 -->
<!-- <?php echo $this->_tpl_vars['nombre']; ?>
 -->
<!-- <?php echo $this->_tpl_vars['apellido']; ?>
 -->
<!-- <?php echo $this->_tpl_vars['sexo']; ?>
 -->
<!-- <?php echo $this->_tpl_vars['celular']; ?>
 -->
<!-- <?php echo $this->_tpl_vars['pais']; ?>
 -->
<!-- <?php echo $this->_tpl_vars['ciudad']; ?>
 -->
