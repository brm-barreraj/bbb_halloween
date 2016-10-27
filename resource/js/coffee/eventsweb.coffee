@ClientWeb = new @ClientWeb

### 
	Events Receive
###

# Connect client
ClientWeb.socket.on 'connect', ->
	ClientWeb.connectSocket()

# Disconnect client
ClientWeb.socket.on 'disconnect', ->
	ClientWeb.disconnect()

# Receive code
ClientWeb.socket.on 'saveCode',(codigo)->
	ClientWeb.saveCode codigo

# Synchronize mobile - desktop
ClientWeb.socket.on 'synchronize',(data)->
	ClientWeb.loaderSynchronize()
	ClientWeb.initializeAction()

# Receive percentage and action start
ClientWeb.socket.on 'runAction',(data)->
	ClientWeb.runAction data

###
	Events Send
###

# Request code

interval = setInterval ->
	if ClientWeb.codeSynch > 0
		clearInterval(interval)
	else
		animate ".sync-celular","wobble"
,200

$(window).on "load", ->
	stop = 10
	interval = setInterval ->
		if ClientWeb.codeSynch > 0
			clearInterval(interval)
		else if stop == 0
			clearInterval(interval)
			message "Refresca la página para obtener tu código",3000
		else
			stop--
			ClientWeb.codeRequest()
	,700