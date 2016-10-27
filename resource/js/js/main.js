(function() {
  this.Main = (function() {
    function Main() {
      this.socket = io.connect('https://sbbb-julian10404.c9users.io');
      this.stage = 0;
      this.action = 0;
      this.interaction = 0;
      this.codeSynch = 0;
    }

    Main.prototype.connectSocket = function() {
      return this.idSocketUser = this.socket.socket.sessionid;
    };

    Main.prototype.loaderSynchronize = function() {
      return console.log("Loading...");
    };

    Main.prototype.getAttrConf = function(attr) {
      return configStage[this.stage].action[this.action][attr];
    };

    Main.prototype.getLengthConf = function(key) {
      var result;
      switch (key) {
        case "stage":
          result = configStage.length;
          break;
        case "action":
          result = configStage[this.stage].action.length;
      }
      return result;
    };

    Main.prototype.increaseStage = function() {
      this.stage++;
      this.action = 0;
      return this.interaction = 0;
    };

    Main.prototype.increaseAction = function() {
      this.interaction = 0;
      return this.action++;
    };

    Main.prototype.increaseInteraction = function() {
      return this.interaction++;
    };

    Main.prototype.emitClient = function(to, emitName, dataAction) {
      var data, data2;
      data = {
        idSocket: this.idSocketUser,
        to: to,
        emitName: emitName,
        data: JSON.stringify(dataAction)
      };
      data2 = "123";
      return this.socket.emit('send', data2);
    };

    return Main;

  })();

}).call(this);
