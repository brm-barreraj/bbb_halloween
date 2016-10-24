/*
*función que valida el formulario de preventas octubre
*(campos: nombre, email, cedula, y numero de contacto.)
*/


/*comienza verificando que la pagina haya cargado totalmente*/
jQuery(document).ready(function () {
	/*se agrega un metodo de validacion llamdo string; se encarga de 
	* validar que las cadenas de caracteres ingresadas no contengan
	* caracteres especiales.
	*/
	jQuery.validator.addMethod("string", function(value, element) 
    {
        return this.optional(element) || /^[a-z" "ñÑáéíóúÁÉÍÓÚ,.;]+$/i.test(value);
    });

	/*aquí comienza la validacion campo por campo, esta validacion 
	*se efectua a traves de la libreria jquery.validate*/
	
		jQuery("#formRegistro").validate({
			rules: {
				nombre:{
					required: true,
					string: true,
					minlength: 3,
					maxlength: 50
				},
				apellido:{
					required: true,
					string: true,
					minlength: 4 ,
					maxlength: 100
				},

				cedula: {
					required: true,
					number: true,
					minlength: 5 ,
					maxlength: 15
				},
				fecha{
					required: true,
					date: true,
				},
				email{
					required: true,
					mail: true,
				},
				celular{
					required: true,
					number: true,
					minlength: 10,
					maxlength: 15,
				},
				pais{
					required: true,
				},
				ciudad{
					required: true,
				},
				terminos{
					required: true,
				},
				politica{
					required: true,
				}

				
			}, 
			messages: {
				nombre:{
					required:'Campo necesario',
					string: 'Únicamente admite letras (a-z)',
					minlength:'Nombre muy corto',
					maxlength:'Nombre muy largo'
				},
				apellido:{
					required: 'Campo necesario',
					string: 'Únicamente admite letras (a-z)',
					minlength: 'Debe ser mayor a 4 carácteres' ,
					maxlength: 'Debe ser menor a 50 carácteres',
				},

				cedula:{
					required:'Campo necesario',
					number: 'Únicamente admite digitos (0-9)',
					minlength:'Número de cédula muy corto',
					maxlength: 'Número de cédula muy largo'
				},
				fecha{
					required: 'Campo necesario',
					date: 'Formato de fecha no válido',
				},
				email{
					required: 'Campo necesario',
					mail: 'Formato de correo electrónico no válido',
				},
				celular{
					required: 'Campo necesario',
					number: 'Únicamente admite digitos (0-9)',
					minlength:'Debe ser mayor a 10 dígitos',
					maxlength: 'Debe ser menor a 15 dígitos'
				},
				pais{
					required: 'Campo necesario',
				},
				ciudad{
					required: 'Campo necesario',
				},
				terminos{
					required: 'Campo necesario',
				},
				politica{
					required: 'Campo necesario',
				}

			}
		});

		jQuery("#formRegistro").click(function(){
			if(jQuery("#formulario").valid()){
				alert('vakudi');
				/*var nombre,cedula,mes,url;
				nombre=jQuery("#nombre").val();
				cedula=jQuery("#cedula").val();
				mes=jQuery("#mes").val();
				url="registro.php";
				jQuery.ajax({
					type:"POST",
					dataType:"json",
					url:url,
					data:{
						nombre:nombre,
						cedula:cedula,
						mes:mes,
					},
					success:function(data){
						alert(ok);
					}
				});*/
			} else {
				alert('bad');
				return false;
			}
		});
	
});