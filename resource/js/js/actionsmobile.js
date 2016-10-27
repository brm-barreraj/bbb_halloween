(function() {
  this.ActionsMobile = (function() {
    function ActionsMobile() {}

    ActionsMobile.prototype.exec = function(event, type) {
      switch (event) {
        case "playAction":
          if (type === "init") {
            return this.playAction.init();
          } else if (type === "finalize") {
            return this.playAction.finalize();
          }
          break;
        case "swipeLeft":
          if (type === "init") {
            return this.hamm.init(event, "swipeleft");
          } else if (type === "finalize") {
            return this.hamm.finalize();
          }
          break;
        case "swipeRight":
          if (type === "init") {
            return this.hamm.init(event, "swiperight");
          } else if (type === "finalize") {
            return this.hamm.finalize();
          }
          break;
        case "broom":
          if (type === "init") {
            return this.broom.init();
          } else if (type === "finalize") {
            return this.broom.finalize();
          }
          break;
        case "throw":
          if (type === "init") {
            return this["throw"].init();
          } else if (type === "finalize") {
            return this["throw"].finalize();
          }
          break;
        case "shake":
          if (type === "init") {
            return this.shake.init(event, "shake");
          } else if (type === "finalize") {
            return this.shake.finalize();
          }
          break;
        case "swipeUp":
          if (type === "init") {
            return this.hamm.init(event, "swipeup");
          } else if (type === "finalize") {
            return this.hamm.finalize();
          }
          break;
        case "swipeDown":
          if (type === "init") {
            return this.hamm.init(event, "swipedown");
          } else if (type === "finalize") {
            return this.hamm.finalize();
          }
          break;
        case "door":
          if (type === "init") {
            return this.door.init(event, "tap");
          } else if (type === "finalize") {
            return this.door.finalize();
          }
          break;
        case "press":
          if (type === "init") {
            return this.hamm.init(event, "press");
          } else if (type === "finalize") {
            return this.hamm.finalize();
          }
          break;
        case "walk":
          if (type === "init") {
            return this.walk.init();
          } else if (type === "finalize") {
            return this.walk.finalize();
          }
          break;
        case "register":
          if (type === "init") {
            return this.register.init();
          } else if (type === "finalize") {
            return this.register.finalize();
          }
      }
    };

    ActionsMobile.hamm = function(element, event, typeEvent) {
      var mc, myElement;
      console.log("hamm");
      if (event === "finalize") {
        return recreateNode(document.getElementById(element), true);
      } else {
        recreateNode(document.getElementById(element), true);
        myElement = document.getElementById(element);
        mc = new Hammer(myElement);
        mc.get('swipe').set({
          direction: Hammer.DIRECTION_ALL
        });
        return mc.on(typeEvent, function(ev) {
          var angle, data;
          switch (event) {
            case "swipeHorizontal":
              data = ev.type.replace("swipe", "");
              console.log(data, "swipeHorizontal");
              data = data + "&bruja";
              break;
            case "swipeThrow":
              console.log(ev.angle, "swipeThrow");
              if (ev.angle > -180 && ev.angle < 0) {
                angle = ev.angle * (-1);
                if (angle >= 0 && angle < 60) {
                  data = "right";
                } else if (angle >= 60 && angle < 120) {
                  data = "center";
                } else if (angle >= 120 && angle < 180) {
                  data = "left";
                }
                data = data + "&dracula";
              }
              break;
            case "tap":
              data = ClientMobile.getAttrConf("percentageaction");
              data = data + "&puerta";
          }
          return ClientMobile.runAction(data);
        });
      }
    };

    ActionsMobile.prototype.register = {
      init: function() {
        $('.con-play-action').show();
        message("Ingresa tus datos para seguir jugando", null);
        return console.log("init register");
      },
      finalize: function() {
        hideMessage();
        $('.con-play-action').hide();
        return console.log("finalize register");
      }
    };

    ActionsMobile.prototype.door = {
      init: function() {
        $('.con-puerta').show();
        return ActionsMobile.hamm("door-tap", "tap", "tap");
      },
      finalize: function() {
        ActionsMobile.hamm("door-tap", "finalize");
        return $('.con-puerta').hide();
      }
    };

    ActionsMobile.prototype.broom = {
      init: function() {
        $('.con-bruja').show();
        return ActionsMobile.hamm("broom-swipe", "swipeHorizontal", "swipeleft swiperight");
      },
      finalize: function() {
        ActionsMobile.hamm("broom-swipe", "finalize");
        return $('.con-bruja').hide();
      }
    };

    ActionsMobile.prototype["throw"] = {
      init: function() {
        $('.con-dracula').show();
        console.log("throw init");
        return ActionsMobile.hamm("throw-swipe", "swipeThrow", "swipe");
      },
      finalize: function() {
        ActionsMobile.hamm("throw-swipe", "finalize");
        return $('.con-dracula').hide();
      }
    };

    ActionsMobile.prototype.playAction = {
      init: function() {
        var mc, myElement;
        console.log("ini");
        $('.con-play-action').show();
        recreateNode(document.getElementById('btn-init-throw'), true);
        myElement = document.getElementById('btn-init-throw');
        mc = new Hammer(myElement);
        return mc.on("tap", function(ev) {
          var percentage;
          percentage = ClientMobile.getAttrConf("percentageaction");
          percentage = percentage + "&play";
          return ClientMobile.runAction(percentage);
        });
      },
      finalize: function() {
        $('.con-play-action').hide();
        return recreateNode(document.getElementById('btn-init-throw'), true);
      }
    };

    ActionsMobile.prototype.walk = {
      init: function() {
        var mc1, mc2, myElement1, myElement2;
        this.status = 0;
        message("Estamos cargando tu experiencia", null);
        $('.con-caminar').show();
        recreateNode(document.getElementById('foot1'), true);
        recreateNode(document.getElementById('foot2'), true);
        myElement1 = document.getElementById('foot1');
        myElement2 = document.getElementById('foot2');
        mc1 = new Hammer(myElement1);
        mc2 = new Hammer(myElement2);
        mc1.on("tap", (function(_this) {
          return function(ev) {
            var percentage;
            if (_this.status === 0) {
              _this.status = 1;
              percentage = ClientMobile.getAttrConf("percentageaction");
              percentage = percentage + "&caminar";
              return ClientMobile.runAction(percentage);
            }
          };
        })(this));
        return mc2.on("tap", (function(_this) {
          return function(ev) {
            var percentage;
            if (_this.status === 1) {
              _this.status = 0;
              percentage = ClientMobile.getAttrConf("percentageaction");
              percentage = percentage + "&caminar";
              return ClientMobile.runAction(percentage);
            }
          };
        })(this));
      },
      finalize: function() {
        recreateNode(document.getElementById('foot1'), true);
        recreateNode(document.getElementById('foot2'), true);
        return $('.con-caminar').hide();
      }
    };

    ActionsMobile.prototype.shake = {
      init: function() {
        var myShakeEvent;
        $(".con-play-action").addClass("hidden");
        $('.con-fantasma').show();
        myShakeEvent = new Shake({
          threshold: 15,
          timeout: 1000
        });
        myShakeEvent.start();
        return window.addEventListener('shake', function() {
          var data, percentage;
          percentage = ClientMobile.getAttrConf("percentageaction");
          data = percentage + "&fantasma";
          return ClientMobile.runAction(data);
        }, false);
      },
      finalize: function() {
        window.removeEventListener('shake', null, false);
        return $('.con-fantasma').hide();
      }
    };

    return ActionsMobile;

  })();

}).call(this);
