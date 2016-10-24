class @ClientMobile extends Main
	constructor:->
		super
		@actionsMobile = new ActionsMobile

	requestCode:->
		code = $("#codeMobile").val()
		if code != null && code != ''
			@compareCode(code)
		else
			message "Código inválido",2000

	compareCode:(code)->
		data =
			code: code
			idSocket: @idSocketUser
		@socket.emit 'validateCode', data
	
	endLoaderCanvas:()->
		console.log "endLoaderCanvas 2"
		hideMessage()

	synchronize:(data)->
		if data.idStatus == 1
			@loaderSynchronize()
			@initializeAction()
			$(".step-send-code").hide()
		else if data.idStatus == 2
			message "El código esta en uso",2000
		else 
			message "El código es incorrecto",2000

	initializeAction:->
		window.onbeforeunload =()->
			return "Vas a cierras la página, perderas tus puntos, deseas salir?"
		$(".cont-Sync").hide()
		@actionsMobile.exec @getAttrConf("nameactionmobile"),"init"

	runAction:(percentage)->
		data =
			'percentage' : percentage
		@socket.emit 'send',@idSocketUser,'c1','runAction',data

	nextInteraction:->
		@increaseInteraction()
		console.log @interaction,"@Interaction"
		if @interaction == @getAttrConf "interactions"
			@endInteractions()
			@nextAction()
				
	nextAction:->
		@increaseAction()
		console.log @action,"@action"
		if @action < @getLengthConf "action"
			@initializeAction()
		else if @action == @getLengthConf "action"
			@endActions()
			@nextStage()

	nextStage:->
		@increaseStage()
		console.log @stage,"@Stage"
		if @stage >= @getLengthConf("stage")
			@endStages()

	endInteractions:->
		@actionsMobile.exec @getAttrConf("nameactionmobile"),"finalize"
		
	endActions:->
		window.onbeforeunload = null;
		window.location.href = "./sync"
		console.log "endActions"

	endStages:->
		console.log "endStages"

	disconnect:->
		window.onbeforeunload = null;
		message "Haz terminado el juego",3000
		setTimeout ->
			window.location.href = "./sync"
		,2500
