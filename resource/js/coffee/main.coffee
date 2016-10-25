class @Main
	constructor:->
		@socket = io.connect 'https://sbbb-julian10404.c9users.io'
		#@socket = io.connect 'http://104.36.19.174:3000'
		@stage = 0
		@action = 0
		@interaction = 0
		@codeSynch = 0

	connectSocket:->
		@idSocketUser = @socket.socket.sessionid

	loaderSynchronize:->
		console.log "Loading..."

	getAttrConf:(attr)->
		configStage[@stage].action[@action][attr]

	getLengthConf:(key)->
		switch key
			when "stage" then result = configStage.length
			when "action" then result = configStage[@stage].action.length
		return result

	increaseStage:->
		@stage++
		@action = 0
		@interaction = 0

	increaseAction:->
		@interaction = 0
		@action++

	increaseInteraction:->
		@interaction++
