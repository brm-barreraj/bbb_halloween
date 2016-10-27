class @ActionsMobile
	constructor:->

	exec:(event,type)->
		switch event
			when "playAction"
				if type=="init" then @playAction.init() else if type=="finalize" then @playAction.finalize()
			when "swipeLeft"
				if type=="init" then @hamm.init(event,"swipeleft") else if type=="finalize" then @hamm.finalize()
			when "swipeRight"
				if type=="init" then @hamm.init(event,"swiperight") else if type=="finalize" then @hamm.finalize()
			when "broom"
				if type=="init" then @broom.init() else if type=="finalize" then @broom.finalize()
			when "throw"
				if type=="init" then @throw.init() else if type=="finalize" then @throw.finalize()
			when "shake"
				if type=="init" then @shake.init(event,"shake") else if type=="finalize" then @shake.finalize()
			when "swipeUp"
				if type=="init" then @hamm.init(event,"swipeup") else if type=="finalize" then @hamm.finalize()
			when "swipeDown"
				if type=="init" then @hamm.init(event,"swipedown") else if type=="finalize" then @hamm.finalize()
			when "door"
				if type=="init" then @door.init(event,"tap") else if type=="finalize" then @door.finalize()
			when "press"
				if type=="init" then @hamm.init(event,"press") else if type=="finalize" then @hamm.finalize()
			when "walk"
				if type=="init" then @walk.init() else if type=="finalize" then @walk.finalize()
			when "register"
				if type=="init" then @register.init() else if type=="finalize" then @register.finalize()

	@hamm:(element,event,typeEvent)->
		console.log "hamm"
		if event == "finalize"
			recreateNode document.getElementById(element), true
		else
			recreateNode document.getElementById(element), true
			myElement = document.getElementById(element)
			mc = new Hammer myElement
			mc.get('swipe').set direction: Hammer.DIRECTION_ALL
			# typeEvent : panleft panright panup pandown tap press
			mc.on typeEvent, (ev) ->
				switch event
					when "swipeHorizontal"
						data = ev.type.replace "swipe",""
						console.log data,"swipeHorizontal"
						data = data + "&bruja"
					when "swipeThrow"
						console.log ev.angle,"swipeThrow"
						if ev.angle > -180 && ev.angle < 0
							angle = (ev.angle*(-1))
							if angle >= 0 && angle < 60
								data = "right"
							else if angle >= 60 && angle < 120
								data = "center"
							else if angle >= 120 && angle < 180
								data = "left"
							data = data + "&dracula"
					when "tap"
						data = ClientMobile.getAttrConf "percentageaction"	
						data = data + "&puerta"
				ClientMobile.runAction(data)

	register:
		init:->
			$('.con-play-action').show()
			message "Ingresa tus datos para seguir jugando",null
			console.log "init register"
		finalize:->
			hideMessage()
			$('.con-play-action').hide()
			console.log "finalize register"

	door:
		init:=>
			$('.con-puerta').show()
			@hamm "door-tap","tap","tap"
		finalize:=>
			@hamm "door-tap","finalize"
			$('.con-puerta').hide()
			
	broom:
		init:=>
			$('.con-bruja').show()
			@hamm "broom-swipe","swipeHorizontal","swipeleft swiperight"
		finalize:=>
			@hamm "broom-swipe","finalize"
			$('.con-bruja').hide()

	throw:
		init:=>
			$('.con-dracula').show()
			console.log "throw init"
			@hamm "throw-swipe","swipeThrow","swipe"
		finalize:=>
			@hamm "throw-swipe","finalize"
			$('.con-dracula').hide()

	playAction:
		init:=>
			console.log "ini"
			$('.con-play-action').show()
			recreateNode document.getElementById('btn-init-throw'), true
			myElement = document.getElementById('btn-init-throw')
			mc = new Hammer myElement
			mc.on "tap", (ev) =>
				percentage = ClientMobile.getAttrConf "percentageaction"
				percentage = percentage + "&play"
				ClientMobile.runAction(percentage)
		finalize:=>
			$('.con-play-action').hide()
			recreateNode document.getElementById('btn-init-throw'), true
			
	walk:
		init:->
			@status = 0
			message "Estamos cargando tu experiencia",null
			$('.con-caminar').show()
			recreateNode document.getElementById('foot1'), true
			recreateNode document.getElementById('foot2'), true
			myElement1 = document.getElementById('foot1')
			myElement2 = document.getElementById('foot2')
			mc1 = new Hammer myElement1
			mc2 = new Hammer myElement2
			mc1.on "tap", (ev) =>
				if @status==0
					@status=1
					percentage = ClientMobile.getAttrConf "percentageaction"
					percentage = percentage + "&caminar"
					ClientMobile.runAction(percentage)
			mc2.on "tap", (ev) =>
				if @status==1
					@status=0
					percentage = ClientMobile.getAttrConf "percentageaction"
					percentage = percentage + "&caminar"
					ClientMobile.runAction(percentage)
		finalize:->
			recreateNode document.getElementById('foot1'), true
			recreateNode document.getElementById('foot2'), true
			$('.con-caminar').hide()

	shake:
		init:->
			$(".con-play-action").addClass("hidden");
			$('.con-fantasma').show()
			myShakeEvent = new Shake
			    threshold: 15
			    timeout: 1000
			myShakeEvent.start()
			window.addEventListener 'shake', ->
				percentage = ClientMobile.getAttrConf "percentageaction"
				data = percentage + "&fantasma"
				ClientMobile.runAction(data)
			, false
			
		finalize:->
			window.removeEventListener('shake', null, false);
			$('.con-fantasma').hide()