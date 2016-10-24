@ClientMobile = new ClientMobile

### 
	Events Receive
###

# Connect client
ClientMobile.socket.on 'connect', ->
	ClientMobile.connectSocket()

# Disconnect client
ClientMobile.socket.on 'disconnect', ->
	ClientMobile.disconnect()

# Synchronize mobile - desktop
ClientMobile.socket.on 'synchronize',(data)->
	ClientMobile.synchronize(data)

# Synchronize mobile - desktop
ClientMobile.socket.on 'nextInteraction',->
	ClientMobile.nextInteraction()
	
# End Loader Canvas - desktop
ClientMobile.socket.on 'endLoaderCanvas',->
	console.log "endLoaderCanvas 1"
	ClientMobile.endLoaderCanvas()

###
	Events Send
###

animate ".cont-Sync","bounceIn"

# Request code
$('#codeMobile').on "input",->
	if $(this).val().length == 5
		ClientMobile.requestCode()