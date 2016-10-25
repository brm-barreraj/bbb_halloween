class @ActionsWeb
	@canvasWeb = new CanvasWeb
	@percAccumulated = 0
	@clientWeb = null
	@classMove = "init"
	@points = 0
	constructor:(ClientWeb,points)->
		ActionsWeb.clientWeb = ClientWeb
		ActionsWeb.points = if points > 0 then points else 0
	
	@addPoint:()=>
		@points++
		$(".cont-text-contador p").text @points
		animate ".contador-BBB-totales","bounce"
		
	exec:(event,type,data)->
		switch event
			when "register"
				if type=="init" then @register.init() else if type=="run" then @register.run(data) else if type=="finalize" then @register.finalize()
			when "canvas"
				if type=="init" then @canvas.init() else if type=="run" then @canvas.run(data) else if type=="finalize" then @canvas.finalize()
			when "playAction"
				if type=="init" then @playAction.init() else if type=="run" then @playAction.run(data) else if type=="finalize" then @playAction.finalize()
			when "door"
				if type=="init" then @door.init() else if type=="run" then @door.run(data) else if type=="finalize" then @door.finalize()
			when "moveHit"
				if type=="init" then @moveHit.init() else if type=="run" then @moveHit.run(data) else if type=="finalize" then @moveHit.finalize()
			when "moveThrow"
				if type=="init" then @moveThrow.init() else if type=="run" then @moveThrow.run(data) else if type=="finalize" then @moveThrow.finalize()
			when "opacity"
				if type=="init" then @opacity.init() else if type=="run" then @opacity.run(data) else if type=="finalize" then @opacity.finalize()

	register:
		init:=>
			if statusUser()
				# Si el usuario ya esta logueado pasa a la siguiente interacción
				@clientWeb.nextInteraction()
			else
				# Si el usuario no está registrado, se registra
				$(".cont-formulario-registro").show()
				$("#btn-register").click =>
					if $("#form-regiter").valid()
						$(".cont-cajaG-Center").css 
							overflow: "visible"
						if $("#idCiudadAcudiente").val() == ""
							message "Debes seleccionar la ciudad",2000
						else if $('#terms').prop('checked') == false
							message "Debes aceptar terminos y condiciones",2000
						else
						    data = $("#form-regiter").serialize()
						    result = sendAjax "actions.php","setRegistry",data
							if result.error == 1
								localStorage.clear()
								deleteCookie "bbb%h_da/t4"
								console.log result,"result"
								stringifyData = JSON.stringify(result.data)
								localStorage.setItem 'bbb%h_da/t4',stringifyData
								setCookie "bbb%h_da/t4",stringifyData,"1"
								message "Te registraste correctamente, sigue jugando",3000
								setTimeout =>
									@clientWeb.nextInteraction()
								,2500
							else if result.error == 2
								message "El usuario ya existe, por favor intenta de nuevo",2000
							else if result.error == 0
								message "Hay datos vacios, por favor ingresa todos los datos",2000
							else 
								message "Ocurrio un error al registar",2000
					else
						$(".cont-cajaG-Center").css 
							overflow: "scroll"
						
				$("#departamento").change ->
				    data=
				        idDepartamento: $(this).val()
				    resCiudades = sendAjax "actions.php","getCity",data
				    ciudadesHtml = "<option value=''>Ciudad</option>"
				    if resCiudades.error == 1
				        ciudades = resCiudades.data
				        i = 0
				        while i < ciudades.length
				          ciudadesHtml += '<option value="' + ciudades[i].id + '">' + ciudades[i].nombre + '</option>'
				          i++
				        $('#idCiudadAcudiente').prop("disabled", false).html ciudadesHtml
				    else
				        $('#idCiudadAcudiente').prop("disabled", true).html ciudadesHtml
		run: ->
			console.log "run register"
		finalize:->
			$(".cont-formulario-registro").hide()

	canvas:
		init: =>
			#$(".cont-info-camino").show()
			$("body").removeClass("bg-puerta").addClass("bg-bosque")
			msg = @clientWeb.getAttrConf "titleAction"
			$("#title-walk").text(msg)
			data =
				from: @clientWeb.getAttrConf "from"
				to: @clientWeb.getAttrConf "to"
				folder: @clientWeb.getAttrConf "folder"
				baseName: @clientWeb.getAttrConf "basename"
				ext: @clientWeb.getAttrConf "ext"
			@canvasWeb.init data
		run:(percentage) =>
			@canvasWeb.runAction percentage
		finalize: =>
			$(".cont-info-camino").hide()
			$("canvas").remove()
			console.log "Finalize action canvas"

	playAction:
		init: =>
			$("body").removeClass("bg-puerta").addClass("bg-bosque")
			message "Dale iniciar en tu móvil para continuar jugando",null
			console.log "playAction"
		run:(percentage)=>
			@percAccumulated+=percentage
			if @percAccumulated >= 100
				@percAccumulated = 0
				@clientWeb.nextInteraction()
		finalize: =>
			hideMessage()
			console.log "playAction"

	door:
		init: =>
			$("body").removeClass("bg-bosque").addClass("bg-puerta")
			$(".cont-info-puerta").show()
			msg = @clientWeb.getAttrConf "titleAction"
			$("#title-door").text(msg)
			@percAccumulated = 0
			@tocAccumulated = 1
		run:(percentage)=>
			$(".Toc-TocS"+@tocAccumulated).show().delay(400).fadeOut(400);
			animate ".Toc-TocS"+@tocAccumulated,"zoomIn"
			@tocAccumulated++
			@percAccumulated+=percentage
			if @percAccumulated >= 100
				@percAccumulated = 0
				@tocAccumulated = 1
				@clientWeb.nextInteraction()
		finalize: =>
			console.log "finalize door"
			$(".cont-info-puerta").hide()

	moveHit:
		init: =>
			$("#info-time-bruja").fadeOut(4000)
			$("body").removeClass("bg-bosque").addClass("bg-puerta")
			time = 15 #seg
			intervalMove = 2
			moveCharacter = ['right','left']
			$(".time").show()
			$(".cont-info-bruja").show()
			interval = setInterval =>
				if time == 0
					$(".time span").css({color:'#fff'})
					clearInterval(interval)
					@clientWeb.nextInteraction()
				else
					$(".time span").text time
					if time <= 5
						$(".time span").css({color:'#c23720'})
						animate ".time","bounce"
					move = time % intervalMove;
					if move == 0
						random = Math.round(Math.random())
						@classMove = moveCharacter[random]
					else
						@classMove = ""
					$("#character-hit").removeClass("move-character-bruja-init move-character-bruja-right move-character-bruja-left")
					$("#character-hit").addClass "move-character-bruja-"+@classMove
				time-=1
			,1000
		run:(direction)=>
			$("#object-hit").addClass "move-object-"+direction
			setTimeout =>
				$("#object-hit").removeClass "move-object-"+direction
				$("#object-hit").addClass "move-object-init"
				if direction == @classMove
					$("#bruja1").hide()
					$("#bruja2").show()
					setTimeout ->
						$("#bruja1").show()
						$("#bruja2").hide()
					,400
					@addPoint()
			,1000
		finalize: =>
			$(".time").hide()
			$(".cont-info-bruja").hide()

	moveThrow:
		init: =>
			$("#info-time-dracula").fadeOut(4000)
			$("body").removeClass("bg-bosque").addClass("bg-puerta")
			time = 15 #seg
			intervalMove = 2
			moveCharacter = ['right','left','center']
			$(".time").show()
			$(".cont-info-dracula").show()
			interval = setInterval =>
				if time == 0
					$(".time span").css({color:'#fff'})
					clearInterval(interval)
					@clientWeb.nextInteraction()
				else
					$(".time span").text time
					if time <= 5
						$(".time span").css({color:'#c23720'})
						animate ".time","bounce"
					move = time % intervalMove;
					random = Math.floor(Math.random() * (moveCharacter.length - 0)) + 0;
					@classMove = moveCharacter[random]
					$("#character-throw").removeClass("move-character-init move-character-center move-character-right move-character-left")
					$("#character-throw").addClass "move-character-"+@classMove
				time-=1
			,1000
		run:(direction)=>
			console.log direction,"run init"
			$("#object-throw").addClass "throw-character-"+direction
			setTimeout =>
				$("#object-throw").removeClass "throw-character-"+direction
				$("#object-throw").addClass "throw-character-init"
				if direction == @classMove
					$("#dracula1").hide()
					$("#dracula2").show()
					setTimeout ->
						$("#dracula1").show()
						$("#dracula2").hide()
					,400
					@addPoint()
			,1000
			
		finalize: =>
			$(".time").hide()
			$(".cont-info-dracula").hide()

	opacity:
		init: =>
			$("body").removeClass("bg-bosque").addClass("bg-puerta")
			time = 15 #seg
			$(".time").show()
			$(".cont-info-fantasma").show()
			interval = setInterval =>
				if time == 0
					$(".time span").css({color:'#fff'})
					clearInterval(interval)
					@clientWeb.nextInteraction()
				else
					$(".time span").text time
					if time <= 5
						$(".time span").css({color:'#c23720'})
						animate ".time","bounce"
				time-=1
			,1000
		run:(percentage)=>
			$("#info-time-fantasma").fadeOut(4000)
			$("#img-opacity").animate
				opacity: "-=0."+percentage
			,2000
			@addPoint()
			@percAccumulated+=percentage
			if @percAccumulated >= 100
				setTimeout ->
					@percAccumulated = 0
					@clientWeb.nextInteraction()
				,1500
		finalize: =>
			data = 
				idUser: getUser("id")
				point: @points
			sendAjax("actions.php","setGame",data);
			$(".time").hide()
			$(".cont-info-fantasma").hide()


