$(document).ready ->
  $('#form-regiter').validate
    rules:
      nombreAcudiente:
        required: true
        accept: '[a-zA-Z]+'
      apellidoAcudiente:
        required: true
        accept: '[a-zA-Z]+'
      tipoDocumentoAcudiente: required: true
      documentoAcudiente:
        required: true
        number: true
      idCiudadAcudiente:
        required: true
        number: true
      departamento:
        required: true
        number: true
      correoAcudiente:
        required: true
        email: true
      telefonoAcudiente:
        required: true
        number: true
      direccionAcudiente: required: true
      contrasenia: required: true
      apodo:
        required: true
        minlength: 5
        maxlength: 15
      nombreParticipante:
        required: true
        accept: '[a-zA-Z]+'
      apellidoParticipante:
        required: true
        accept: '[a-zA-Z]+'
      correoParticipante:
        required: true
        email: true
      telefonoParticipante:
        required: true
        number: true
    messages:
      nombreAcudiente:
        required: 'Debes ingresar el nombre de tu acudiente'
        accept: 'El nombre solo debe llevar letras'
      apellidoAcudiente:
        required: 'Debes ingresar el apellido de tu acudiente'
        accept: 'El apellido solo debe llevar letras'
      tipoDocumentoAcudiente: required: 'Debes indicar el tipo de documento de tu acudiente'
      documentoAcudiente:
        required: 'Debes ingresar el número de documento de tu acudiente'
        number: 'El número de documento es inválido'
      idCiudadAcudiente:
        required: 'Debes indicar la ciudad de tu acudiente'
        number: 'Debes indicar la ciudad de tu acudiente'
      departamento:
        required: 'Debes indicar el departamento de tu acudiente'
        number: 'Debes indicar el departamento de tu acudiente'
      correoAcudiente:
        required: 'Debes ingresar el correo de tu acudiente'
        email: 'El correo es incorrecto'
      telefonoAcudiente:
        required: 'Debes ingresar el teléfono de tu acudiente'
        number: 'El teléfono es inválido, solo debe llevar números'
      direccionAcudiente: required: 'Debes ingresar la dirección de tu acudiente'
      contrasenia: required: 'Debes ingresar tu contraseña'
      apodo:
        required: 'Debes ingresar tu nickname'
        minlength: 'El nickname debe ser mayor de 5 caracteres'
        maxlength: 'El nickname debe ser menor de 15 caracteres'
      nombreParticipante:
        required: 'Debes ingresar tu nombre'
        accept: 'EL nombre solo debe llevar letras'
      apellidoParticipante:
        required: 'Debes ingresar tu apellido'
        accept: 'EL apellido solo debe llevar letras'
      correoParticipante:
        required: 'Debes ingresar tu correo'
        email: 'El correo es incorrecto'
      telefonoParticipante:
        required: 'Debes ingresar tu teléfono'
        number: 'El teléfono es inválido, solo debe llevar números'
  return