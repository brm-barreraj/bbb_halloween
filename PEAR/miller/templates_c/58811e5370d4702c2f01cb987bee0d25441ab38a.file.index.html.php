<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-09 18:16:54
         compiled from ".\templates\index.html" */ ?>
<?php /*%%SmartyHeaderCode:25660554e28bdb4db81-47667489%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58811e5370d4702c2f01cb987bee0d25441ab38a' => 
    array (
      0 => '.\\templates\\index.html',
      1 => 1431188213,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25660554e28bdb4db81-47667489',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_554e28bdd7a5e9_81279742',
  'variables' => 
  array (
    'nombre' => 0,
    'apellido' => 0,
    'email' => 0,
    'celular' => 0,
    'pais' => 0,
    'ciudad' => 0,
    'sexo' => 0,
    'fbid' => 0,
    'foto' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_554e28bdd7a5e9_81279742')) {function content_554e28bdd7a5e9_81279742($_smarty_tpl) {?><html>
<head>
	<title>form de registro </title>
	<?php echo '<script'; ?>
  src="js/jquery-1.9.0.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
  src="js/jquery.validate.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
  src="js/validacion.js"><?php echo '</script'; ?>
>

</head>
<body>
	<form id="formRegistro">
		nombre: <input type="text" name="nombre" id="nombre" value="<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
"><br>
		apellido: <input type="text" name="apellido" id="apellido" value="<?php echo $_smarty_tpl->tpl_vars['apellido']->value;?>
"><br>
		fecha de nacimiento: <input type="date" name="fecha" id="fecha"><br>
		numero de cedula: <input type="text" name="cedula" id="cedula"><br>
		correo electronico: <input type="text" name="email" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" id="email"><br>
		celular: <input type="text" name="celular" id="celular" value="<?php echo $_smarty_tpl->tpl_vars['celular']->value;?>
"><br>
		pais:<select name="pais" id="pais" value="<?php echo $_smarty_tpl->tpl_vars['pais']->value;?>
">
			<option value="">opciones....</option>
			<option value="7">Pais de mier</option>

		</select><br>
		ciudad:<select name="ciudad" id="ciudad" value="<?php echo $_smarty_tpl->tpl_vars['ciudad']->value;?>
">
			<option value="">opciones....</option>
			<option value="7">Ciudad de mier</option>

		</select><br>
		<?php if ($_smarty_tpl->tpl_vars['sexo']->value=='M') {?>
		genero:<input type="radio" value="M" name="sexo"  checked>Masculino
		<input type="radio" value="F" name="sexo">Femenino<br>
		<?php } elseif ($_smarty_tpl->tpl_vars['sexo']->value=='F') {?>
		genero:<input type="radio" value="M" name="sexo">Masculino
		<input type="radio" value="F" name="sexo" checked>Femenino<br>
		<?php } else { ?>
		genero:<input type="radio" value="M" name="sexo">Masculino
		<input type="radio" value="F" name="sexo">Femenino<br>
		<?php }?>
		
		acepto <a href="">terminos y condiciones</a> <input type="checkbox" name="terminos" value="S"><br>
		acepto <a href="">politicas de privacidad</a> <input type="checkbox" name="politica" value="S"><br>
		deseo recibir newsletters <input type="checkbox" name="newsletter" value="S"><br>
	</form>
		<button id="enviar">Registrar</button>
</body>
</html>

<!-- <?php echo $_smarty_tpl->tpl_vars['fbid']->value;?>
 -->
<!-- <?php echo $_smarty_tpl->tpl_vars['email']->value;?>
 -->
<!-- <?php echo $_smarty_tpl->tpl_vars['foto']->value;?>
 -->
<!-- <?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
 -->
<!-- <?php echo $_smarty_tpl->tpl_vars['apellido']->value;?>
 -->
<!-- <?php echo $_smarty_tpl->tpl_vars['sexo']->value;?>
 -->
<!-- <?php echo $_smarty_tpl->tpl_vars['celular']->value;?>
 -->
<!-- <?php echo $_smarty_tpl->tpl_vars['pais']->value;?>
 -->
<!-- <?php echo $_smarty_tpl->tpl_vars['ciudad']->value;?>
 -->

<?php }} ?>
