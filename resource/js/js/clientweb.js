(function() {
  var extend = function(child, parent) { for (var key in parent) { if (hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; },
    hasProp = {}.hasOwnProperty;

  this.ClientWeb = (function(superClass) {
    extend(ClientWeb, superClass);

    function ClientWeb() {
      ClientWeb.__super__.constructor.apply(this, arguments);
      this.actionsWeb = new ActionsWeb(this);
    }

    ClientWeb.prototype.codeRequest = function() {
      var data;
      data = {
        idSocket: this.idSocketUser
      };
      return this.socket.emit('generateCode', data);
    };

    ClientWeb.prototype.saveCode = function(code) {
      this.codeSynch = code;
      $("#btn-request-code").hide();
      return $("#codeWeb").val(code);
    };

    ClientWeb.prototype.endLoaderCanvas = function() {
      return this.socket.emit('send', this.idSocketUser, 'c2', 'endLoaderCanvas', null);
    };

    ClientWeb.prototype.initializeAction = function() {
      window.onbeforeunload = function() {
        return "Vas a cierras la página, perderas tus puntos, deseas salir?";
      };
      $(".cont-sync-actividad").hide();
      $(".cont-logo-BBB").hide();
      $(".cont-logoH-Pe").show();
      $(".cont-logoBBB-Pe").show();
      return this.actionsWeb.exec(this.getAttrConf("nameactionweb"), "init", null);
    };

    ClientWeb.prototype.runAction = function(data) {
      return this.actionsWeb.exec(this.getAttrConf("nameactionweb"), "run", data.percentage);
    };

    ClientWeb.prototype.nextInteraction = function() {
      this.socket.emit('send', this.idSocketUser, 'c2', 'nextInteraction', null);
      this.increaseInteraction();
      console.log(this.interaction, "@Interaction");
      if (this.interaction === this.getAttrConf("interactions")) {
        this.endInteractions();
        return this.nextAction();
      }
    };

    ClientWeb.prototype.nextAction = function() {
      this.increaseAction();
      console.log(this.action, "@action");
      if (this.action < this.getLengthConf("action")) {
        return this.initializeAction();
      } else if (this.action === this.getLengthConf("action")) {
        this.endActions();
        return this.nextStage();
      }
    };

    ClientWeb.prototype.nextStage = function() {
      this.increaseStage();
      console.log(this.stage, "@Stage");
      if (this.stage >= this.getLengthConf("stage")) {
        return this.endStages();
      }
    };

    ClientWeb.prototype.endInteractions = function() {
      var length, progressWidth;
      this.actionsWeb.exec(this.getAttrConf("nameactionweb"), "finalize");
      if (statusUser()) {
        length = this.getLengthConf("action") - 1;
      }
      progressWidth = parseInt((this.action * 100) / length);
      return $(".progress-bar").css({
        width: progressWidth + "%"
      });
    };

    ClientWeb.prototype.endActions = function() {
      window.onbeforeunload = null;
      window.location.href = "./ranking";
      return console.log("endActions");
    };

    ClientWeb.prototype.endStages = function() {
      return console.log("endStages");
    };

    ClientWeb.prototype.disconnect = function() {
      window.onbeforeunload = null;
      message("Haz terminado el juego", 3000);
      return setTimeout(function() {
        return window.location.href = "./";
      }, 2500);
    };

    return ClientWeb;

  })(Main);

}).call(this);
