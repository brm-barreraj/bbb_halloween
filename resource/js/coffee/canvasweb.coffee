class @CanvasWeb 
  constructor:->
    @Preloader = new Preloader
    @ClientWeb = @ClientWeb
  statusAction = 1
  current = -1
  images = []
  playInterval = undefined
  playDir = 1
  lastLoaded = -1
  contFrameInterval = 0
  stopFrameInterval = undefined
  nInteraction = 0
  frameInterval = undefined
  canvas = null
  context = null
  # configuration defaults
  config = 
    folder: ''
    baseName: ''
    from: 1
    to: 10
    leadingZeroes: 0
    ext: 'jpg'
    step: 1
    bgColor: '#FFFFFF'
    scaleMode: 'cover'
    direction: 'y'
    playMode: ''
    playInterval: 20
    progressDiam: '110'
    progressFontFamily: 'stick'
    progressFontSize: '38px'
    progressBgColor: '#e53027'
    progressFgColor: '#FFFFFF'
    progressMode: 'circle'
    progressHeight: '5px'
    progressShowImages: true
    simultaneousLoads: 4

  init : (customConfig) ->
    # config override
    for prop of customConfig
      `prop = prop`
      config[prop] = customConfig[prop]
    images = []
    configureBody()
    @Preloader.init config, images, onImageLoaded, onPreloadComplete
    window.addEventListener 'resize', onWindowResize, false
    return

  onImageLoaded = (e) ->
    if e.id > lastLoaded and config.progressShowImages
      # to not have a back and forward hickup… but some images will be skipped
      showImage e.id
      lastLoaded = e.id
    showImage 0
    return

  onPreloadComplete = (e) ->
    setPlayMode config.playMode
    play()
    return

  setPlayMode = (mode) ->
    stop()
    config.playMode = mode
    return

  setCurrent : (frame) ->
    current = frame
    return

  play = ->
    stop()
    if config.playMode == 'mouse'
      disVideo = document.getElementById('box-action')
      disVideo.addEventListener 'mousemove', onMouseMove, false

      disVideo.ontouchmove = (e) ->
        onMouseMove e.touches[0]
        false

    else if config.playMode == 'loop' or config.playMode == 'pong'
      playInterval = setInterval(nextImage, config.playInterval)
    return

  stop : ->
    document.removeEventListener 'mousemove', onMouseMove
    if playInterval
      clearInterval playInterval
      playInterval = null
    return

  nextImage = (interval) ->
    nextId = if current >= images.length - 1 then 0 else ++current
    #loop
    showImage nextId + interval
    return

  previousImage : (interval) ->
    previousId = if current <= 0 then images.length - 1 else --current
    #loop
    showImage previousId - interval
    return

  toFrame : (to, direction, interval) ->
    if statusAction == 1
      statusAction = 0
      stopFrameInterval = if current <= to then to - current else current - to
      frameInterval = setInterval((->
        contFrameInterval++
        switch direction
          when 'right'
            nextImage interval
          when 'left'
            previousImage interval

        # stop hasta el tope del movimiento
        if contFrameInterval == stopFrameInterval
          statusAction = 1
          clearInterval frameInterval
          contFrameInterval = 0
        # Suma el número de interacciones
        if current >= @ClientWeb.getAttrConf("to")
          nInteraction++
          # si el número de interacciones es igual al total de interacciones, reinicia las variables
          if nInteraction >= @ClientWeb.getAttrConf("interactions")
            nInteraction = 0
            clearInterval frameInterval
            contFrameInterval = 0
            statusAction = 1
          @ClientWeb.nextInteraction()



        return
      ), 100)
    return

  clearIntervalFrames : ->
    clearInterval frameInterval
    return

  getCurrent : ->
    current

  onMouseMove : (e) ->
    onActionMouseMove e, config, images, current
    return

  onWindowResize = ->
    canvas.height = document.getElementById('box-action').offsetHeight
    canvas.width = document.getElementById('box-action').offsetWidth
    showImage current
    return

  configureBody = ->
    if !document.getElementById("canvas")
      canvas = document.createElement('canvas')
      canvas.setAttribute("id", "canvas");
      canvas.height = $(window).height()
      canvas.width = $(window).width()
      canvas.style.display = 'block'
      context = canvas.getContext('2d')
      document.getElementById('box-action').appendChild canvas

  showImage = (id) ->
    if id >= 0 and id < images.length
      img = images[id]
      ca = canvas.width / canvas.height
      ia = img.width / img.height
      iw = undefined
      ih = undefined
      if config.scaleMode == 'cover'
        if ca > ia
          iw = canvas.width
          ih = iw / ia
        else
          ih = canvas.height
          iw = ih * ia
      else if config.scaleMode == 'contain'
        if ca < ia
          iw = canvas.width
          ih = iw / ia
        else
          ih = canvas.height
          iw = ih * ia
      else if config.scaleMode == 'auto'
        iw = img.width
        ih = img.height
      ox = canvas.width / 2 - (iw / 2)
      oy = canvas.height / 2 - (ih / 2)
      context.drawImage img, 0, 0, img.width, img.height, Math.round(ox), Math.round(oy), Math.round(iw), Math.round(ih)
      current = id
    return

  runAction:(percentage)->
    if percentage != 0
      to = ClientWeb.getAttrConf("to")
      interval = ClientWeb.getAttrConf("intervalWeb")
      framesmove = Math.round(((to / interval) * percentage) / 100)
      if framesmove > 0
        toframeVal = @getCurrent() + framesmove
        direction = 'right'
      else if framesmove < 0
        toframeVal = @getCurrent() - (framesmove * -1)
        direction = 'left'
      if parseInt(framesmove) != 0
        @toFrame toframeVal, direction, (interval-1)

class @Preloader
  progress = null
  bgbox = null
  queue = null
  images = null
  loaded = 0
  onImageLoadedCallback = undefined
  onPreloadCompleteCallback = undefined
  #needs a better way. Override?
  
  constructor:->
    @ClientWeb = @ClientWeb

  init: (config, arrayToPopulate, onImageLoaded, onPreloadComplete) ->
    resetVarPreloader()
    images = arrayToPopulate
    #the array that will be populated with the loaded images
    onImageLoadedCallback = onImageLoaded
    #event functions… crappy way.
    onPreloadCompleteCallback = onPreloadComplete
    tot = Math.floor((config.to - (config.from) + 1) / config.step)
    queue = new Array(tot)
    #images = new Array(tot);
    buildProgress config
    i = 0
    while i < tot
      num = config.from + i * config.step
      if config.leadingZeroes > 0
        num = (1e15 + num + '').slice(-config.leadingZeroes)
      ###
      if num < 10
        num = '00' + num
      else if num >= 10 and num <= 99
        num = '0' + num
      ###
      src = config.folder + '/' + config.baseName + num + '.' + config.ext
      queue[i] =
        src: src
        id: i
      #two distinct arrays just to keep a "clean" image list instead of a custom loaderObject list, maybe this approach is overcomplicated
      images[i] = new Image
      i++
    setTimeout (->
      `var num`
      `var i`
      #give it a bit of breath… safari needs to need that.
      num = Math.max(1, config.simultaneousLoads)
      i = 0
      while i < num
        loadNext()
        i++
      return
    ), 300
    return

  resetVarPreloader = ->
    progress = null
    bgbox = null
    queue = null
    images = null
    loaded = 0
    onImageLoadedCallback
    onPreloadCompleteCallback
    #needs a better way. Override?
    return

  onPreloadComplete = (e) ->
    if typeof onPreloadCompleteCallback == 'function'
      onPreloadCompleteCallback e
    #needs absolutely a better way
    return

  onImageLoaded = (e) ->
    if typeof onImageLoadedCallback == 'function'
      onImageLoadedCallback e
    #needs absolutely a better way
    return

  loadNext = ->
    if queue.length > 0
      o = queue.shift()
      images[o.id].src = o.src
      #images[o.id].id = o.id; // UGLY HACK!

      images[o.id].onload = ->
        id = images.indexOf(this)
        #not the fastest way to get an id. should be stored in a property somewhere. loaderObject?
        onImageLoaded
          img: this
          id: id
        if progress
          progress.update loaded
        loaded++
        if loaded == images.length
          removeProgress()
          onPreloadComplete
            images: images
            length: images.length
        else
          loadNext()
        return

    return

  buildProgress = (config) =>
    
    $("canvas").hide()
    $(".cont-cargador").show()
    progress = document.createElement('div')
    progress.update = (num) ->
        t = Math.floor((config.to - (config.from) + 1) / config.step)
        p = Math.round(num / (config.to - (config.from)) * 100)

        #progress.innerHTML = p + '%'
        $(".cont-porcentaje-carga h3").text p+'%'
        return
        
    ###
    bgbox = document.createElement('div')
    bgbox.style.width = '100%'
    bgbox.style.height = '100%'
    bgbox.style.backgroundColor = 'black'
    bgbox.style.position = 'absolute'
    bgbox.style.top = '0'
    bgbox.style.left = '0'
    bgbox.id = 'bgbox'
    bgbox.style.zIndex = 40
    document.getElementById('box-action').appendChild bgbox
    if config.progressMode == 'circle'
      progress = document.createElement('div')
      progress.id = 'progress'
      progress.style.width = config.progressDiam + 'px'
      progress.style.height = config.progressDiam + 'px'
      progress.style.lineHeight = config.progressDiam + 'px'
      progress.style.textAlign = 'center'
      progress.style.color = config.progressFgColor
      progress.style.backgroundColor = config.progressBgColor
      progress.style.borderRadius = config.progressDiam / 2 + 'px'
      progress.style.position = 'fixed'
      progress.style.left = '50%'
      progress.style.top = '50%'
      progress.style.marginTop = -config.progressDiam / 2 + 'px'
      progress.style.marginLeft = -config.progressDiam / 2 + 'px'
      progress.style.fontFamily = config.progressFontFamily
      progress.style.fontSize = config.progressFontSize
      progress.style.zIndex = 1000
      progress.innerHTML = 'loading'

      progress.update = (num) ->
        t = Math.floor((config.to - (config.from) + 1) / config.step)
        p = Math.round(num / (config.to - (config.from)) * 100)

        #progress.innerHTML = p + '%'
        $(".cont-porcentaje-carga h3").text p+'%'
        return

      document.body.appendChild progress
    else if config.progressMode == 'bar'
      progress = document.createElement('div')
      progress.id = 'progress'
      progress.style.width = '0%'
      progress.style.height = config.progressHeight + 'px'
      progress.style.backgroundColor = config.progressBgColor
      progress.style.position = 'fixed'
      progress.style.left = '0'
      progress.style.height = config.progressHeight
      progress.style.bottom = '0'
      progress.style.zIndex = 42

      progress.update = (num) ->
        p = Math.round(num / (config.to - (config.from)) * 100)
        progress.style.width = p + '%'
        return

      document.body.appendChild progress
    ###
    return

  removeProgress = ->
    if progress
      ClientWeb.endLoaderCanvas()
      progress = null
      $(".cont-cargador").hide()
      $("canvas").show()
      $(".cont-info-camino").show()
      ###
      $('.action-helpers').show()
      document.body.removeChild progress
      document.getElementById('box-action').removeChild bgbox
      progress = null
      ###
    return