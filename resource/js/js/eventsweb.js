(function() {
  var interval;

  this.ClientWeb = new this.ClientWeb;


  /* 
  	Events Receive
   */

  ClientWeb.socket.on('connect', function() {
    return ClientWeb.connectSocket();
  });

  ClientWeb.socket.on('disconnect', function() {
    return ClientWeb.disconnect();
  });

  ClientWeb.socket.on('saveCode', function(codigo) {
    return ClientWeb.saveCode(codigo);
  });

  ClientWeb.socket.on('synchronize', function(data) {
    ClientWeb.loaderSynchronize();
    return ClientWeb.initializeAction();
  });

  ClientWeb.socket.on('runAction', function(data) {
    return ClientWeb.runAction(data);
  });


  /*
  	Events Send
   */

  interval = setInterval(function() {
    if (ClientWeb.codeSynch > 0) {
      return clearInterval(interval);
    } else {
      animate(".img-sync-cel", "wobble");
      return animate(".cont-codigo-sync", "wobble");
    }
  }, 200);

  $(window).on("load", function() {
    var stop;
    stop = 10;
    return interval = setInterval(function() {
      if (ClientWeb.codeSynch > 0) {
        return clearInterval(interval);
      } else if (stop === 0) {
        clearInterval(interval);
        return message("Refresca la página para obtener tu código", 3000);
      } else {
        stop--;
        return ClientWeb.codeRequest();
      }
    }, 700);
  });

}).call(this);
