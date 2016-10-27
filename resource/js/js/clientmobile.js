(function() {
  var extend = function(child, parent) { for (var key in parent) { if (hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; },
    hasProp = {}.hasOwnProperty;

  this.ClientMobile = (function(superClass) {
    extend(ClientMobile, superClass);

    function ClientMobile() {
      ClientMobile.__super__.constructor.apply(this, arguments);
      this.actionsMobile = new ActionsMobile;
    }

    ClientMobile.prototype.requestCode = function() {
      var code;
      code = $("#codeMobile").val();
      if (code !== null && code !== '') {
        return this.compareCode(code);
      } else {
        return message("Código inválido", 2000);
      }
    };

    ClientMobile.prototype.compareCode = function(code) {
      var data;
      data = {
        code: code,
        idSocket: this.idSocketUser
      };
      return this.socket.emit('validateCode', data);
    };

    ClientMobile.prototype.endLoaderCanvas = function() {
      console.log("endLoaderCanvas 2");
      return hideMessage();
    };

    ClientMobile.prototype.synchronize = function(data) {
      if (data.idStatus === 1) {
        this.loaderSynchronize();
        this.initializeAction();
        return $(".step-send-code").hide();
      } else if (data.idStatus === 2) {
        return message("El código esta en uso", 2000);
      } else {
        return message("El código es incorrecto", 2000);
      }
    };

    ClientMobile.prototype.initializeAction = function() {
      window.onbeforeunload = function() {
        return "Vas a cierras la página, perderas tus puntos, deseas salir?";
      };
      $(".cont-Sync").hide();
      return this.actionsMobile.exec(this.getAttrConf("nameactionmobile"), "init");
    };

    ClientMobile.prototype.runAction = function(percentage) {
      var data;
      data = {
        'percentage': percentage,
        'idSocket': this.idSocketUser
      };
      return this.socket.emit('runAction', data);
    };

    ClientMobile.prototype.nextInteraction = function() {
      this.increaseInteraction();
      console.log(this.interaction, "@Interaction");
      if (this.interaction === this.getAttrConf("interactions")) {
        this.endInteractions();
        return this.nextAction();
      }
    };

    ClientMobile.prototype.nextAction = function() {
      this.increaseAction();
      console.log(this.action, "@action");
      if (this.action < this.getLengthConf("action")) {
        return this.initializeAction();
      } else if (this.action === this.getLengthConf("action")) {
        this.endActions();
        return this.nextStage();
      }
    };

    ClientMobile.prototype.nextStage = function() {
      this.increaseStage();
      console.log(this.stage, "@Stage");
      if (this.stage >= this.getLengthConf("stage")) {
        return this.endStages();
      }
    };

    ClientMobile.prototype.endInteractions = function() {
      return this.actionsMobile.exec(this.getAttrConf("nameactionmobile"), "finalize");
    };

    ClientMobile.prototype.endActions = function() {
      window.onbeforeunload = null;
      window.location.href = "./sync";
      return console.log("endActions");
    };

    ClientMobile.prototype.endStages = function() {
      return console.log("endStages");
    };

    ClientMobile.prototype.disconnect = function() {
      window.onbeforeunload = null;
      message("Haz terminado el juego", 3000);
      return setTimeout(function() {
        return window.location.href = "./sync";
      }, 2500);
    };

    return ClientMobile;

  })(Main);

}).call(this);
