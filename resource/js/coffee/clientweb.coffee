class @ClientWeb extends Main
	constructor:->
		super
		@actionsWeb = new ActionsWeb @
	codeRequest:->
		data =
			idSocket: @idSocketUser
		@socket.emit 'generateCode', data

	saveCode:(code)->
		@codeSynch = code
		$("#btn-request-code").hide()
		$("#codeWeb").val code
		
	endLoaderCanvas:()->
		@socket.emit 'endLoaderCanvas', @codeSynch

	initializeAction:->
		window.onbeforeunload =()->
			return "Vas a cierras la página, perderas tus puntos, deseas salir?"
		$(".cont-sync-actividad").hide()
		$(".cont-logo-BBB").hide()
		$(".cont-logoH-Pe").show()
		$(".cont-logoBBB-Pe").show()
		@actionsWeb.exec @getAttrConf("nameactionweb"),"init",null

	runAction:(data)->
		@actionsWeb.exec @getAttrConf("nameactionweb"),"run",data.percentage

	nextInteraction:->
		@socket.emit 'nextInteraction', @codeSynch
		
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
		@actionsWeb.exec @getAttrConf("nameactionweb"),"finalize"
		if statusUser()
			length = @getLengthConf("action")-1
		progressWidth = parseInt((@action*100)/length)
		
		$(".progress-bar").css
			width:progressWidth+"%"
		
	endActions:->
		console.log "endActions"

	endStages:->
		console.log "endStages"

	disconnect:->
		window.onbeforeunload = null;
		message "Haz terminado el juego",3000
		setTimeout ->
			window.location.href = "./"
		,2500
