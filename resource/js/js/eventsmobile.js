(function() {
  this.ClientMobile = new ClientMobile;


  /* 
  	Events Receive
   */

  ClientMobile.socket.on('connect', function() {
    return ClientMobile.connectSocket();
  });

  ClientMobile.socket.on('disconnect', function() {
    return ClientMobile.disconnect();
  });

  ClientMobile.socket.on('synchronize', function(data) {
    return ClientMobile.synchronize(data);
  });

  ClientMobile.socket.on('nextInteraction', function() {
    return ClientMobile.nextInteraction();
  });

  ClientMobile.socket.on('endLoaderCanvas', function() {
    console.log("endLoaderCanvas 1");
    return ClientMobile.endLoaderCanvas();
  });


  /*
  	Events Send
   */

  animate(".cont-Sync", "bounceIn");

  $('#codeMobile').on("input", function() {
    if ($(this).val().length === 5) {
      return ClientMobile.requestCode();
    }
  });

}).call(this);
