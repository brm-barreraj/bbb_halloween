<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-25 17:17:56
         compiled from "./templates/mobile.html" */ ?>
<?php /*%%SmartyHeaderCode:961846755809c239c95626-71831359%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b1c6d44f7b59294784551ada52bb86c54cf1b8f' => 
    array (
      0 => './templates/mobile.html',
      1 => 1477414896,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '961846755809c239c95626-71831359',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5809c239ca1666_38197388',
  'variables' => 
  array (
    'random' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5809c239ca1666_38197388')) {function content_5809c239ca1666_38197388($_smarty_tpl) {?><!DOCTYPE html><!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="es-CO"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="es-CO"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="es-CO"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="es-CO"> <!--<![endif]--><head><meta charset="utf-8"><title>El Dulce Más Buscado - Bon Bon Bum</title><meta name="description" content="Meta description Ready"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="css/libs/bootstrap.min.css"><link rel="stylesheet" href="css/libs/animate.min.css"><link rel="stylesheet" href="css/main.min.css"><link rel="stylesheet" href="css/gestos-syn-mobile.min.css"><!-- Web Fonts--><link href="https://fonts.googleapis.com/css?family=Varela+Round|Roboto:400italic,300,700,400" rel="stylesheet" type="text/css"><!-- Google Tag Manager --><?php echo '<script'; ?>
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
></head><body class="bg-bosque box" id="box-action"><div class="cont-alerts-HB hiden"><p class="texto-alertas">Buenas por aquí ando</p></div><div class="rayo-C"><img src="images/Img-RayoA.png" alt=""></div><section class="cont-Sync"><div class="caja-Sync-juegoHB"><div class="cont-Sync-Izq"><img class="img-responsive" src="images/Img-cajaM1.png"></div><div class="cont-Sync-Cen"><h5 class="titulos-infor-juego">ingresa el código que aparece en la pantalla, y empieza a jugar</h5><input class="codigo-sync" id="codeMobile" type="number" maxlength="5"></div><div class="cont-Sync-Der"><img class="img-responsive" src="images/Img-cajaM2.png"></div></div></section><section class="con-caminar hiden"><div class="caja-instr-juegoHB"><div class="cont-instrc-Izq"><img src="images/Img-cajaP1B.png"></div><div class="cont-instrc-CenHB2"><h5 class="titulos-infor-juego">USA TUS DEDOS PARA DAR CADA PASO</h5></div><div class="cont-instrc-Der"><img src="images/Img-cajaP2B.png"></div></div><div class="cont-item-Def cont-pasos pos-2 pie-dere" id="foot1"><img class="img-responsive" src="images/Img-FDer.png"></div><div class="cont-item-Def cont-pasos pos-1 pie-izq" id="foot2"><img class="img-responsive" src="images/Img-FIzq.png"></div><div class="cont-spriteM-caminar"></div></section><section class="con-puerta hiden"><div class="caja-instr-juegoHB"><div class="cont-instrc-Izq"><img src="images/Img-cajaP1B.png"></div><div class="cont-instrc-CenHB2"><h5 class="titulos-infor-juego">toca la pantalla hasta que se abra la puerta</h5></div><div class="cont-instrc-Der"><img src="images/Img-cajaP2B.png"></div></div><div class="cont-item-Def pos-1" id="door-tap"><img src="images/Img-ManijaMobile.png" alt=""></div><div class="cont-spriteM-puertaM"></div></section><section class="con-play-action hiden"><div class="caja-instr-juegoHB"><div class="cont-instrc-Izq"><img src="images/Img-cajaP1B.png"></div><div class="cont-instrc-CenHB2"><h5 class="titulos-infor-juego">Dale en iniciar para continuar</h5></div><div class="cont-instrc-Der"><img src="images/Img-cajaP2B.png"></div></div><button class="btn-iniciarJ" id="btn-init-throw"><div class="caja-button-juegoHB"><div class="cont-instrc-Izq"><img src="images/Img-cajaP1B.png"></div><div class="cont-btn-CenHB2"><h5 class="titulos-boton">iniciar</h5></div><div class="cont-instrc-Der"><img src="images/Img-cajaP2B.png"></div></div></button></section><section class="con-dracula hiden"><div class="caja-instr-juegoHB"><div class="cont-instrc-Izq"><img src="images/Img-cajaP1B.png"></div><div class="cont-instrc-CenHB2"><h5 class="titulos-infor-juego">desliza tu dedo y apunta bien, buena suerte	</h5></div><div class="cont-instrc-Der"><img src="images/Img-cajaP2B.png"></div></div><div class="cont-item-Def pos-2" id="throw-swipe"><img src="images/Img-AjosMobile.png"></div><div class="cont-spriteM-dracula"></div></section><section class="con-bruja hiden"><div class="caja-instr-juegoHB"><div class="cont-instrc-Izq"><img src="images/Img-cajaP1B.png"></div><div class="cont-instrc-CenHB2"><h5 class="titulos-infor-juego">mueve la escoba de lado a lado con  tus dedos.</h5></div><div class="cont-instrc-Der"><img src="images/Img-cajaP2B.png"></div></div><div class="cont-item-Def pos-2 hiden"></div><div id="broom-swipe"><img class="img-responsive" src="images/Img-EscobaMobile.png"></div><div class="cont-spriteM-bruja"></div></section><section class="con-fantasma hiden"><div class="caja-instr-juegoHB"><div class="cont-instrc-Izq"><img src="images/Img-cajaP1B.png"></div><div class="cont-instrc-CenHB2"><h5 class="titulos-infor-juego">sacude tu celular y haz que el fantasma desaparezca</h5></div><div class="cont-instrc-Der"><img src="images/Img-cajaP2B.png"></div></div><button class="btn-iniciarJ"><div class="caja-button-juegoHB"><div class="cont-instrc-Izq"><img src="images/Img-cajaP1B.png"></div><div class="cont-btn-CenHB2"><h5 class="titulos-boton">iniciar</h5></div><div class="cont-instrc-Der"><img src="images/Img-cajaP2B.png"></div></div></button><div class="cont-spriteM-fantasma"></div></section><section class="cont-cargador hiden"><div class="row"><div class="cont-tips-juegoM hiden"><h2>tu objetivo es reunir todos los bon bon bum que puedas.</h2></div><div class="cont-logo-CargaII hiden"><img class="img-responsive" src="images/Img-LogoHallowBBB.png"></div><div class="mano-cargador"><img src="images/Img-ManoLoading.png"></div><div class="cont-porcentaje-carga"><h3>100</h3></div></div></section><section class="cont-bienvenida-desktop-H hiden"><div class="row"><div class="cont-titulos-HW"><h1> Corre ya por tu celular, </h1><em class="subtitulo-principal">lo necesitarás para jugar y encontrar...</em></div><div class="conte-BBB-LogoH"><img class="img-responsive" src="images/Img-BBBLogo.png" alt=""></div><div class="cont-nombre-hallowen"><img class="img-responsive" src="images/Img-LogoHallow.png" alt="El dulce más buscado"></div></div></section><!--Footer--><footer class="container-fluid"><div class="row"><div class="cont-logo-BBB"><a href="#" onClick="seguimientoEventos('footer','clic','Colombina')"><img class="img-responsive" src="images/Img-LogoBBB.png" title="Paso 1" alt="Paso 1"/></a></div><div class="cont-logoH-Pe hiden"><img class="img-responsive" src="images/Img-LogoHallowBBB.png" alt=""></div><div class="cont-logoBBB-Pe hiden"><img class="img-responsive" src="images/Img-LogoBBB.png" alt=""></div></div></footer><!--/-Footer--><?php $_smarty_tpl->tpl_vars['random'] = new Smarty_variable(rand(1,20), null, 0);?><!--Scripts--><?php echo '<script'; ?>
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
 type="text/javascript" src="js/libs/hammer.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="js/libs/shake.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="js/actionsmobile.min.js?<?php echo $_smarty_tpl->tpl_vars['random']->value;?>
"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="js/clientmobile.min.js?<?php echo $_smarty_tpl->tpl_vars['random']->value;?>
"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 type="text/javascript" src="js/eventsmobile.min.js?<?php echo $_smarty_tpl->tpl_vars['random']->value;?>
"><?php echo '</script'; ?>
></body></html><?php }} ?>
