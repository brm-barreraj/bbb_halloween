(function() {
  this.CanvasWeb = (function() {
    var canvas, config, configureBody, contFrameInterval, context, current, frameInterval, images, lastLoaded, nInteraction, nextImage, onImageLoaded, onPreloadComplete, onWindowResize, play, playDir, playInterval, setPlayMode, showImage, statusAction, stopFrameInterval;

    function CanvasWeb() {
      this.Preloader = new Preloader;
      this.ClientWeb = this.ClientWeb;
    }

    statusAction = 1;

    current = -1;

    images = [];

    playInterval = void 0;

    playDir = 1;

    lastLoaded = -1;

    contFrameInterval = 0;

    stopFrameInterval = void 0;

    nInteraction = 0;

    frameInterval = void 0;

    canvas = null;

    context = null;

    config = {
      folder: '',
      baseName: '',
      from: 1,
      to: 10,
      leadingZeroes: 0,
      ext: 'jpg',
      step: 1,
      bgColor: '#FFFFFF',
      scaleMode: 'cover',
      direction: 'y',
      playMode: '',
      playInterval: 20,
      progressDiam: '110',
      progressFontFamily: 'stick',
      progressFontSize: '38px',
      progressBgColor: '#e53027',
      progressFgColor: '#FFFFFF',
      progressMode: 'circle',
      progressHeight: '5px',
      progressShowImages: true,
      simultaneousLoads: 4
    };

    CanvasWeb.prototype.init = function(customConfig) {
      var prop;
      for (prop in customConfig) {
        prop = prop;
        config[prop] = customConfig[prop];
      }
      images = [];
      configureBody();
      this.Preloader.init(config, images, onImageLoaded, onPreloadComplete);
      window.addEventListener('resize', onWindowResize, false);
    };

    onImageLoaded = function(e) {
      if (e.id > lastLoaded && config.progressShowImages) {
        showImage(e.id);
        lastLoaded = e.id;
      }
      showImage(0);
    };

    onPreloadComplete = function(e) {
      setPlayMode(config.playMode);
      play();
    };

    setPlayMode = function(mode) {
      stop();
      config.playMode = mode;
    };

    CanvasWeb.prototype.setCurrent = function(frame) {
      current = frame;
    };

    play = function() {
      var disVideo;
      stop();
      if (config.playMode === 'mouse') {
        disVideo = document.getElementById('box-action');
        disVideo.addEventListener('mousemove', onMouseMove, false);
        disVideo.ontouchmove = function(e) {
          onMouseMove(e.touches[0]);
          return false;
        };
      } else if (config.playMode === 'loop' || config.playMode === 'pong') {
        playInterval = setInterval(nextImage, config.playInterval);
      }
    };

    CanvasWeb.prototype.stop = function() {
      document.removeEventListener('mousemove', onMouseMove);
      if (playInterval) {
        clearInterval(playInterval);
        playInterval = null;
      }
    };

    nextImage = function(interval) {
      var nextId;
      nextId = current >= images.length - 1 ? 0 : ++current;
      showImage(nextId + interval);
    };

    CanvasWeb.prototype.previousImage = function(interval) {
      var previousId;
      previousId = current <= 0 ? images.length - 1 : --current;
      showImage(previousId - interval);
    };

    CanvasWeb.prototype.toFrame = function(to, direction, interval) {
      if (statusAction === 1) {
        statusAction = 0;
        stopFrameInterval = current <= to ? to - current : current - to;
        frameInterval = setInterval((function() {
          contFrameInterval++;
          switch (direction) {
            case 'right':
              nextImage(interval);
              break;
            case 'left':
              previousImage(interval);
          }
          if (contFrameInterval === stopFrameInterval) {
            statusAction = 1;
            clearInterval(frameInterval);
            contFrameInterval = 0;
          }
          if (current >= this.ClientWeb.getAttrConf("to")) {
            nInteraction++;
            if (nInteraction >= this.ClientWeb.getAttrConf("interactions")) {
              nInteraction = 0;
              clearInterval(frameInterval);
              contFrameInterval = 0;
              statusAction = 1;
            }
            this.ClientWeb.nextInteraction();
          }
        }), 100);
      }
    };

    CanvasWeb.prototype.clearIntervalFrames = function() {
      clearInterval(frameInterval);
    };

    CanvasWeb.prototype.getCurrent = function() {
      return current;
    };

    CanvasWeb.prototype.onMouseMove = function(e) {
      onActionMouseMove(e, config, images, current);
    };

    onWindowResize = function() {
      canvas.height = document.getElementById('box-action').offsetHeight;
      canvas.width = document.getElementById('box-action').offsetWidth;
      showImage(current);
    };

    configureBody = function() {
      if (!document.getElementById("canvas")) {
        canvas = document.createElement('canvas');
        canvas.setAttribute("id", "canvas");
        canvas.height = $(window).height();
        canvas.width = $(window).width();
        canvas.style.display = 'block';
        context = canvas.getContext('2d');
        return document.getElementById('box-action').appendChild(canvas);
      }
    };

    showImage = function(id) {
      var ca, ia, ih, img, iw, ox, oy;
      if (id >= 0 && id < images.length) {
        img = images[id];
        ca = canvas.width / canvas.height;
        ia = img.width / img.height;
        iw = void 0;
        ih = void 0;
        if (config.scaleMode === 'cover') {
          if (ca > ia) {
            iw = canvas.width;
            ih = iw / ia;
          } else {
            ih = canvas.height;
            iw = ih * ia;
          }
        } else if (config.scaleMode === 'contain') {
          if (ca < ia) {
            iw = canvas.width;
            ih = iw / ia;
          } else {
            ih = canvas.height;
            iw = ih * ia;
          }
        } else if (config.scaleMode === 'auto') {
          iw = img.width;
          ih = img.height;
        }
        ox = canvas.width / 2 - (iw / 2);
        oy = canvas.height / 2 - (ih / 2);
        context.drawImage(img, 0, 0, img.width, img.height, Math.round(ox), Math.round(oy), Math.round(iw), Math.round(ih));
        current = id;
      }
    };

    CanvasWeb.prototype.runAction = function(percentage) {
      var direction, framesmove, interval, to, toframeVal;
      if (percentage !== 0) {
        to = ClientWeb.getAttrConf("to");
        interval = ClientWeb.getAttrConf("intervalWeb");
        framesmove = Math.round(((to / interval) * percentage) / 100);
        if (framesmove > 0) {
          toframeVal = this.getCurrent() + framesmove;
          direction = 'right';
        } else if (framesmove < 0) {
          toframeVal = this.getCurrent() - (framesmove * -1);
          direction = 'left';
        }
        if (parseInt(framesmove) !== 0) {
          return this.toFrame(toframeVal, direction, interval - 1);
        }
      }
    };

    return CanvasWeb;

  })();

  this.Preloader = (function() {
    var bgbox, buildProgress, images, loadNext, loaded, onImageLoaded, onImageLoadedCallback, onPreloadComplete, onPreloadCompleteCallback, progress, queue, removeProgress, resetVarPreloader;

    progress = null;

    bgbox = null;

    queue = null;

    images = null;

    loaded = 0;

    onImageLoadedCallback = void 0;

    onPreloadCompleteCallback = void 0;

    function Preloader() {
      this.ClientWeb = this.ClientWeb;
    }

    Preloader.prototype.init = function(config, arrayToPopulate, onImageLoaded, onPreloadComplete) {
      var i, num, src, tot;
      resetVarPreloader();
      images = arrayToPopulate;
      onImageLoadedCallback = onImageLoaded;
      onPreloadCompleteCallback = onPreloadComplete;
      tot = Math.floor((config.to - config.from + 1) / config.step);
      queue = new Array(tot);
      buildProgress(config);
      i = 0;
      while (i < tot) {
        num = config.from + i * config.step;
        if (config.leadingZeroes > 0) {
          num = (1e15 + num + '').slice(-config.leadingZeroes);
        }

        /*
        if num < 10
          num = '00' + num
        else if num >= 10 and num <= 99
          num = '0' + num
         */
        src = config.folder + '/' + config.baseName + num + '.' + config.ext;
        queue[i] = {
          src: src,
          id: i
        };
        images[i] = new Image;
        i++;
      }
      setTimeout((function() {
        var num;
        var i;
        num = Math.max(1, config.simultaneousLoads);
        i = 0;
        while (i < num) {
          loadNext();
          i++;
        }
      }), 300);
    };

    resetVarPreloader = function() {
      progress = null;
      bgbox = null;
      queue = null;
      images = null;
      loaded = 0;
      onImageLoadedCallback;
      onPreloadCompleteCallback;
    };

    onPreloadComplete = function(e) {
      if (typeof onPreloadCompleteCallback === 'function') {
        onPreloadCompleteCallback(e);
      }
    };

    onImageLoaded = function(e) {
      if (typeof onImageLoadedCallback === 'function') {
        onImageLoadedCallback(e);
      }
    };

    loadNext = function() {
      var o;
      if (queue.length > 0) {
        o = queue.shift();
        images[o.id].src = o.src;
        images[o.id].onload = function() {
          var id;
          id = images.indexOf(this);
          onImageLoaded({
            img: this,
            id: id
          });
          if (progress) {
            progress.update(loaded);
          }
          loaded++;
          if (loaded === images.length) {
            removeProgress();
            onPreloadComplete({
              images: images,
              length: images.length
            });
          } else {
            loadNext();
          }
        };
      }
    };

    buildProgress = function(config) {
      $("canvas").hide();
      $(".cont-cargador").show();
      progress = document.createElement('div');
      progress.update = function(num) {
        var p, t;
        t = Math.floor((config.to - config.from + 1) / config.step);
        p = Math.round(num / (config.to - config.from) * 100);
        $(".cont-porcentaje-carga h3").text(p + '%');
      };

      /*
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
       */
    };

    removeProgress = function() {
      if (progress) {
        ClientWeb.endLoaderCanvas();
        progress = null;
        $(".cont-cargador").hide();
        $("canvas").show();
        $(".cont-info-camino").show();

        /*
        $('.action-helpers').show()
        document.body.removeChild progress
        document.getElementById('box-action').removeChild bgbox
        progress = null
         */
      }
    };

    return Preloader;

  })();

}).call(this);
