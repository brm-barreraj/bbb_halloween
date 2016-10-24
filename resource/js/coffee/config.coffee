@configStage =
	[
		{
			"action":
				[
					#Evento caminar
					{
						"nameactionmobile":"walk"
						"nameactionweb":"canvas"
						"percentageaction":25
						"interactions":1
						"titleAction": "Vas por tu barrio, utiliza tu celular para poder avanzar."
						"from":0
						#"to":30
						"to":209
						"intervalWeb":5
						"folder":"_data/stage-1/action-1"
						"basename":"walking-"
						"ext":"jpg"
						"direction":"x"
						"playmode":"mouse"
						"text":
							"mobile":"Desliza tu dedo izquierda a derecha"
							"desktop":"Mover mouse izquierda a derecha"
						"sprite":
							"mobiledesktop":"swipe-x-red"
							"mobile":"swipe-x-white"
							"desktop":"move-mouse-x"	
					}
					#Evento golpear en la puerta
					{
						"nameactionmobile":"door"
						"nameactionweb":"door"
						"percentageaction":25
						"interactions":1
						"titleAction":"Llegaste a la primera puerta, ábrela usando tu móvil"
					}
					#Iniciar La siguiente acción Drácula
					{
						"nameactionmobile":"playAction"
						"nameactionweb":"playAction"
						"percentageaction":100
						"interactions":1
					}
					#Evento lanzamiento de objetos
					{
						"nameactionmobile":"throw"
						"nameactionweb":"moveThrow"
						"percentageaction":25
						"interactions":1
					}
					#Registro
					{
						"nameactionmobile":"register"
						"nameactionweb":"register"
						"percentageaction":25
						"interactions":1
					}
					#Evento caminar
					{
						"nameactionmobile":"walk"
						"nameactionweb":"canvas"
						"percentageaction":25
						"interactions":1
						"titleAction": "Bien, saliste de esta ileso y aumentaste tu botín, ahora sigue por el barrio"
						"from":0
						#"to":30
						"to":209
						"intervalWeb":5
						"folder":"_data/stage-1/action-1"
						"basename":"walking-"
						"ext":"jpg"
						"direction":"x"
						"playmode":"mouse"
						"text":
							"mobile":"Desliza tu dedo izquierda a derecha"
							"desktop":"Mover mouse izquierda a derecha"
						"sprite":
							"mobiledesktop":"swipe-x-red"
							"mobile":"swipe-x-white"
							"desktop":"move-mouse-x"	
					}
					#Evento golpear en la puerta
					{
						"nameactionmobile":"door"
						"nameactionweb":"door"
						"percentageaction":25
						"interactions":1
						"titleAction":"Llegaste a la segunda puerta, ábrela usando tu móvil"
					}
					#Iniciar La siguiente acción
					{
						"nameactionmobile":"playAction"
						"nameactionweb":"playAction"
						"percentageaction":100
						"interactions":1
					}
					#Evento movimiento izquierda - derecha
					{
						"nameactionmobile":"broom"
						"nameactionweb":"moveHit"
						"percentageaction":25
						"interactions":1
					}
					#Evento caminar
					{
						"nameactionmobile":"walk"
						"nameactionweb":"canvas"
						"percentageaction":25
						"interactions":1
						"titleAction": "Derrotaste a la bruja y ahora tienes más Bon Bon Bum. Sólo debes caminar un poco más para llegar a casa."
						"from":0
						#"to":30
						"to":209
						"intervalWeb":5
						"folder":"_data/stage-1/action-1"
						"basename":"walking-"
						"ext":"jpg"
						"direction":"x"
						"playmode":"mouse"
						"text":
							"mobile":"Desliza tu dedo izquierda a derecha"
							"desktop":"Mover mouse izquierda a derecha"
						"sprite":
							"mobiledesktop":"swipe-x-red"
							"mobile":"swipe-x-white"
							"desktop":"move-mouse-x"	
					}
					#Evento golpear en la puerta
					{
						"nameactionmobile":"door"
						"nameactionweb":"door"
						"percentageaction":25
						"interactions":1
						"titleAction":"Llegaste a la tercera puerta, ábrela usando tu móvil"
					}
					#Iniciar La siguiente acción
					{
						"nameactionmobile":"playAction"
						"nameactionweb":"playAction"
						"percentageaction":100
						"interactions":1
					}
					#Evento agitar celular
					{
						"nameactionmobile":"shake"
						"nameactionweb":"opacity"
						"percentageaction":20
						"interactions":1
					}
				]
		}
	]