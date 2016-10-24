<?php
require("db/requires.php");
if (isset($_POST['action']) && $_POST['action'] != "") {
	$action = $_POST['action'];
	$General = new General;
	switch ($action) {
		// Verifica si un usuario es correcto
		case 'getLogin':
			if (isset($_POST['user']) && $_POST['user'] != "" && isset($_POST['password']) && $_POST['password'] != "") {
				$user = $_POST['user'];
				$password = $_POST['password'];
				$login = $General->getTotalDatos('BbbhParticipante',null,array("correo"=>$user,"contrasenia"=>$password));
				if (is_array($login) && count($login)>0) {
					// El usuario es correcto
					$result['data']=$login[0];
					$result['error']=1;
				}else{
					// El usuario es incorrecto
					$result['error']=0;
				}
			}else{
				// El usuario es incorrecto
				$result['error']=0;
			}
		break;
		// Traelas ciudades de un departamento
		case 'getCity':
			if (isset($_POST['idDepartamento']) && $_POST['idDepartamento'] != "") {
				$idDepartamento= (int) $_POST['idDepartamento'];
				$ciudades = $General->getTotalDatos('BbbhCiudad',null,array("idDepartamento"=>$idDepartamento));
				if (is_array($ciudades) && count($ciudades)>0) {
					$result['data']=$ciudades;
					$result['error']=1;
				}else{
					$result['error']=0;
				}
			}
		break;
		// Registro de un usuario
		case 'setRegistry':
			if (isset($_POST['nombreAcudiente']) && $_POST['nombreAcudiente'] != "" &&
				isset($_POST['apellidoAcudiente']) && $_POST['apellidoAcudiente'] != "" &&
				isset($_POST['tipoDocumentoAcudiente']) && $_POST['tipoDocumentoAcudiente'] != "" &&
				isset($_POST['documentoAcudiente']) && $_POST['documentoAcudiente'] != "" &&
				isset($_POST['idCiudadAcudiente']) && $_POST['idCiudadAcudiente'] != "" &&
				isset($_POST['correoAcudiente']) && $_POST['correoAcudiente'] != "" &&
				isset($_POST['telefonoAcudiente']) && $_POST['telefonoAcudiente'] != "" &&
				isset($_POST['direccionAcudiente']) && $_POST['direccionAcudiente'] != "" &&
				isset($_POST['contrasenia']) && $_POST['contrasenia'] != "" &&
				isset($_POST['apodo']) && $_POST['apodo'] != "" &&
				isset($_POST['nombreParticipante']) && $_POST['nombreParticipante'] != "" &&
				isset($_POST['apellidoParticipante']) && $_POST['apellidoParticipante'] != "" &&
				isset($_POST['correoParticipante']) && $_POST['correoParticipante'] != "" &&
				isset($_POST['telefonoParticipante']) && $_POST['telefonoParticipante'] != "") 
			{
					
				$nombreAcudiente = $_POST['nombreAcudiente'];
				$apellidoAcudiente = $_POST['apellidoAcudiente'];
				$tipoDocumentoAcudiente = $_POST['tipoDocumentoAcudiente'];
				$documentoAcudiente = $_POST['documentoAcudiente'];
				$idCiudadAcudiente = (int) $_POST['idCiudadAcudiente'];
				$correoAcudiente = $_POST['correoAcudiente'];
				$telefonoAcudiente = $_POST['telefonoAcudiente'];
				$direccionAcudiente = $_POST['direccionAcudiente'];
				$contrasenia = $_POST['contrasenia'];
				$apodo = $_POST['apodo'];
				$nombreParticipante = $_POST['nombreParticipante'];
				$apellidoParticipante = $_POST['apellidoParticipante'];
				$correoParticipante = $_POST['correoParticipante'];
				$telefonoParticipante = $_POST['telefonoParticipante'];
				
				$cond = "correo='".$correoParticipante."' or apodo='".$apodo."'";
				$user = $General->getTotalDatos('BbbhParticipante',array('id'),$cond);
				if (is_array($user) && count($user)>0) {
					// Usuario ya existe
					$result['error']=2;
				}else{
					$Participante = new General;
					$Participante->apodo = $apodo;
					$Participante->contrasenia = $contrasenia;
					$Participante->nombre = $nombreParticipante;
					$Participante->apellido = $apellidoParticipante;
					$Participante->correo = $correoParticipante;
					$Participante->telefono = $telefonoParticipante;
					$idParticipante = $Participante->setInstancia('BbbhParticipante');
					if ($idParticipante>0) {
						$Acudiente = new General;
						$Acudiente->nombre = $nombreAcudiente;
						$Acudiente->apellido = $apellidoAcudiente;
						$Acudiente->tipoDocumento = $tipoDocumentoAcudiente;
						$Acudiente->documento = $documentoAcudiente;
						$Acudiente->idCiudad = $idCiudadAcudiente;
						$Acudiente->correo = $correoAcudiente;
						$Acudiente->telefono = $telefonoAcudiente;
						$Acudiente->direccion = $direccionAcudiente;
						$Acudiente->idParticipante = $idParticipante;
						$idAcudiente = $Acudiente->setInstancia('BbbhAcudiente');
						if ($idAcudiente>0) {
							// Inserto correctamente
							$user = $General->getTotalDatos('BbbhParticipante',null,array("id"=>$idParticipante));
							$result['data']=$user[0];
							$result['error']=1;
						}else{
							// Ocurrio un error al insertar
							$result['error']=3;
						}
					}else{
						// Ocurrio un error al insertar
						$result['error']=3;
					}
				}
			}else{
				// Datos vacios
				$result['error']=0;
			}

		break;
		// Guarda el puntaje del juego
		case 'setGame':
			if (isset($_POST['idUser']) && $_POST['idUser'] != "" && isset($_POST['point']) && $_POST['point'] != "") {
				$idUser = $_POST['idUser'];
				$point = $_POST['point'];
				$user = $General->getTotalDatos('BbbhParticipante',array('id'),array("id"=>$idUser));
				if (is_array($user) && count($user)>0) {
					// Usuario ya existe
					$General = new General;
					$General->idParticipante = $idUser;
					$General->puntaje = $point;
					$idGame = $General->setInstancia('BbbhJuego');
					if ($idGame>0) {
						// Inserto correctamente
						$result['data']=$idGame;
						$result['error']=1;
					}else{
						// Ocurrio un error al insertar
						$result['error']=3;
					}
					
				}else{
					//EL usuario Ya existe
					$result['error']=2;
				}
			}else{
				//EL usuario no existe
				$result['error']=0;
			}
		break;
	}
	echo json_encode($result);
}
?>