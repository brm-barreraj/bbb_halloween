<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-25 17:20:52
         compiled from "./templates/ranking.html" */ ?>
<?php /*%%SmartyHeaderCode:226342574580be98ac01448-04090136%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa82d7164065ff2420699642c0529a5e44e507b6' => 
    array (
      0 => './templates/ranking.html',
      1 => 1477414896,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '226342574580be98ac01448-04090136',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_580be98ac0d135_32154792',
  'variables' => 
  array (
    'ranking' => 0,
    'rank' => 0,
    'pos' => 0,
    'apodo' => 0,
    'random' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580be98ac0d135_32154792')) {function content_580be98ac0d135_32154792($_smarty_tpl) {?><!DOCTYPE html><!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="es-CO"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="es-CO"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="es-CO"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="es-CO"> <!--<![endif]--><head><meta charset="utf-8"><title>El Dulce Más Buscado - Bon Bon Bum</title><meta name="description" content="Meta description Ready"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="css/libs/bootstrap.min.css"><link rel="stylesheet" href="css/libs/animate.min.css"><link rel="stylesheet" href="css/main.min.css"><style type="text/css">body {
	background-image: url('images/Bg-Ranking.jpg')!important
}
.cont-logo-BBB{
	display: none;
}
</style><!-- Web Fonts--><link href="https://fonts.googleapis.com/css?family=Varela+Round|Roboto:400italic,300,700,400" rel="stylesheet" type="text/css"><!-- Google Tag Manager --><?php echo '<script'; ?>
 type="text/javascript">(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TCW2D9');<?php echo '</script'; ?>
><!-- End Google Tag Manager -->
<!--[if lt IE]>
<?php echo '<script'; ?>
 src="//html5shiv.googlecode.com/svn/trunk/html5.js"><?php echo '</script'; ?>
>
<![endif]--><?php echo '<script'; ?>
 src="js/libs/modernizr-2.6.2.min.js"><?php echo '</script'; ?>
></head><body class="bg-bosque box" id="box-action"><section class="cont-ranking"><div class="cont-titulos-HW"><h1 class="titulo-ranking"> bien hecho, disfruta del dulce más buscado,</h1><em class="subtitulo-principal">el delicioso bon bon bum morazulfresh.
</em></div><div class="cont-fondo-G" style="margin-top:0px"><div class="cont-cajaG-Iz"><img src="images/Img-cajaG1.png"></div><div class="cont-cajaG-Center"><div class="hiden" id="position"><h2 class="titulo-posicion-H">tu posición
</h2><p class="text-mi-resultado">69
</p></div><div class="contenedor-tabla-rank"><table class="posiciones-juegoH"><thead><tr><th class="titulo-apodos">Apodo
</th><th class="titulo-puntos">Puntuación</th></tr></thead><tbody><?php $_smarty_tpl->tpl_vars["pos"] = new Smarty_variable("0", null, 0);?>
<?php  $_smarty_tpl->tpl_vars['rank'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rank']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ranking']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rank']->key => $_smarty_tpl->tpl_vars['rank']->value) {
$_smarty_tpl->tpl_vars['rank']->_loop = true;
?>
<?php $_smarty_tpl->tpl_vars["apodo"] = new Smarty_variable($_smarty_tpl->tpl_vars['rank']->value->apodo, null, 0);?>
<?php $_smarty_tpl->tpl_vars["pos"] = new Smarty_variable($_smarty_tpl->tpl_vars['pos']->value+1, null, 0);?><tr data-apodo="<?php echo $_smarty_tpl->tpl_vars['apodo']->value;?>
" data-pos="<?php echo $_smarty_tpl->tpl_vars['pos']->value;?>
"><td><?php echo $_smarty_tpl->tpl_vars['apodo']->value;?>
</td><td><?php if ($_smarty_tpl->tpl_vars['rank']->value->puntaje==null) {?>
0
<?php } else { ?>
<?php echo $_smarty_tpl->tpl_vars['rank']->value->puntaje;?>

<?php }?>
</td></tr><?php } ?></tbody></table></div><h2 class="titulo-fin-rank"><a href="./game">Sigue jugando para acumular más puntos. </a></h2></div><div class="cont-cajaG-Der"><img src="images/Img-cajaG2.png"></div><div class="cont-logoH-PeII"><img class="img-responsive" src="images/Img-LogoHallowBBB.png" alt=""></div><div class="cont-logoBBB-PeII"><img class="img-responsive" src="images/Img-LogoBBB.png" alt=""></div></div></section><section class="cont-bienvenida-mobile-H hiden"><div class="row"><div class="cont-titulos-HW"><h1> Corre a tu computador y abre este enlace </h1><em class="subtitulo-principal">lo necesitarás para jugar</em></div><div class="conte-BBB-LogoH"><img class="img-responsive" src="images/Img-BBBLogo.png" alt=""></div><div class="cont-nombre-hallowen"><img class="img-responsive" src="images/Img-LogoHallow.png" alt="El dulce más buscado"></div></div></section><!--Footer--><footer class="container-fluid"><div class="row"><div class="cont-logo-BBB"><a href="#" onClick="seguimientoEventos('footer','clic','Colombina')"><img class="img-responsive" src="images/Img-LogoBBB.png" title="Paso 1" alt="Paso 1"/></a></div><div class="cont-logoH-Pe hiden"><img class="img-responsive" src="images/Img-LogoHallowBBB.png" alt=""></div><div class="cont-logoBBB-Pe hiden"><img class="img-responsive" src="images/Img-LogoBBB.png" alt=""></div></div></footer><!--/-Footer--><?php $_smarty_tpl->tpl_vars['random'] = new Smarty_variable(rand(1,20), null, 0);?><!--Scripts--><?php echo '<script'; ?>
 type="text/javascript" src="js/libs/jquery.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="js/libs/jquery.validate.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="js/libs/bootstrap.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="https://sbbb-julian10404.c9users.io/socket.io/socket.io.js"><?php echo '</script'; ?>
><!--script(src="http://104.36.19.174:3000/socket.io/socket.io.js")--><?php echo '<script'; ?>
 type="text/javascript" src="js/functions.min.js?<?php echo $_smarty_tpl->tpl_vars['random']->value;?>
"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="js/config.min.js?<?php echo $_smarty_tpl->tpl_vars['random']->value;?>
"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="js/main.min.js?<?php echo $_smarty_tpl->tpl_vars['random']->value;?>
"><?php echo '</script'; ?>
><!-- Google Tag Manager (noscript) --><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TCW2D9" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><!-- End Google Tag Manager (noscript) --><?php echo '<script'; ?>
 type="text/javascript" src="js/ranking.min.js?<?php echo $_smarty_tpl->tpl_vars['random']->value;?>
"><?php echo '</script'; ?>
></body></html><?php }} ?>
