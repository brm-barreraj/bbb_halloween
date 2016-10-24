<?php 
	require('db/requires.php');
	setcookie('ml_usuario',base64_encode('0-1-2-3-4- -6-7-8'),time()+50000);/*Esta linea debe ser eliminada*/
	/*Verifica si existe cookie*/
	if(isset($_COOKIE['ml_usuario'])){
		$ml_usuario=base64_decode($_COOKIE['ml_usuario']);
		/*separando los datos por -*/
		$datos_usuario=explode('-',$ml_usuario);
		/*signando datos de usuario a variables*/
		$FbId=$datos_usuario[0];
		$Email=$datos_usuario[1];
		$Foto_de_perfil=$datos_usuario[2];
		$Nombre=$datos_usuario[3];
		$Apellido=$datos_usuario[4];
		$Sexo=$datos_usuario[5];
		$Celular=$datos_usuario[6];
		$Pais=$datos_usuario[7];
		$Ciudad=$datos_usuario[8];printVar($datos_usuario);
		/*enviando datos a la plantilla para su uso*/
		$smarty->assign('fbid',$FbId);
		$smarty->assign('email',$Email);
		$smarty->assign('foto',$Foto_de_perfil);
		$smarty->assign('nombre',$Nombre);
		$smarty->assign('apellido',$Apellido);
		$smarty->assign('sexo',$Sexo);
		$smarty->assign('celular',$Celular);
		$smarty->assign('pais',$Pais);
		$smarty->assign('ciudad',$Ciudad);
		$smarty->display('index.html');
	}
	
?>