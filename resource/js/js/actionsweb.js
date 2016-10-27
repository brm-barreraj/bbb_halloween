(function() {
  this.ActionsWeb = (function() {
    ActionsWeb.canvasWeb = new CanvasWeb;

    ActionsWeb.percAccumulated = 0;

    ActionsWeb.clientWeb = null;

    ActionsWeb.classMove = "init";

    ActionsWeb.points = 0;

    function ActionsWeb(ClientWeb, points) {
      ActionsWeb.clientWeb = ClientWeb;
      ActionsWeb.points = points > 0 ? points : 0;
    }

    ActionsWeb.addPoint = function() {
      ActionsWeb.points++;
      $(".cont-text-contador p").text(ActionsWeb.points);
      return animate(".contador-BBB-totales", "bounce");
    };

    ActionsWeb.prototype.exec = function(event, type, data) {
      switch (event) {
        case "register":
          if (type === "init") {
            return this.register.init();
          } else if (type === "run") {
            return this.register.run(data);
          } else if (type === "finalize") {
            return this.register.finalize();
          }
          break;
        case "canvas":
          if (type === "init") {
            return this.canvas.init();
          } else if (type === "run") {
            return this.canvas.run(data);
          } else if (type === "finalize") {
            return this.canvas.finalize();
          }
          break;
        case "playAction":
          if (type === "init") {
            return this.playAction.init();
          } else if (type === "run") {
            return this.playAction.run(data);
          } else if (type === "finalize") {
            return this.playAction.finalize();
          }
          break;
        case "door":
          if (type === "init") {
            return this.door.init();
          } else if (type === "run") {
            return this.door.run(data);
          } else if (type === "finalize") {
            return this.door.finalize();
          }
          break;
        case "moveHit":
          if (type === "init") {
            return this.moveHit.init();
          } else if (type === "run") {
            return this.moveHit.run(data);
          } else if (type === "finalize") {
            return this.moveHit.finalize();
          }
          break;
        case "moveThrow":
          if (type === "init") {
            return this.moveThrow.init();
          } else if (type === "run") {
            return this.moveThrow.run(data);
          } else if (type === "finalize") {
            return this.moveThrow.finalize();
          }
          break;
        case "opacity":
          if (type === "init") {
            return this.opacity.init();
          } else if (type === "run") {
            return this.opacity.run(data);
          } else if (type === "finalize") {
            return this.opacity.finalize();
          }
      }
    };

    ActionsWeb.prototype.register = {
      init: function() {
        if (statusUser()) {
          return ActionsWeb.clientWeb.nextInteraction();
        } else {
          $(".cont-formulario-registro").show();
          $("#btn-register").click(function() {
            var data, result, stringifyData;
            if ($("#form-regiter").valid()) {
              $(".cont-cajaG-Center").css({
                overflow: "visible"
              });
              if ($("#idCiudadAcudiente").val() === "") {
                message("Debes seleccionar la ciudad", 2000);
              } else if ($('#terms').prop('checked') === false) {
                message("Debes aceptar terminos y condiciones", 2000);
              } else {
                data = $("#form-regiter").serialize();
                result = sendAjax("actions.php", "setRegistry", data);
              }
              if (result.error === 1) {
                localStorage.clear();
                deleteCookie("bbb%h_da/t4");
                console.log(result, "result");
                stringifyData = JSON.stringify(result.data);
                localStorage.setItem('bbb%h_da/t4', stringifyData);
                setCookie("bbb%h_da/t4", stringifyData, "1");
                message("Te registraste correctamente, sigue jugando", 3000);
                return setTimeout(function() {
                  return ActionsWeb.clientWeb.nextInteraction();
                }, 2500);
              } else if (result.error === 2) {
                return message("El usuario ya existe, por favor intenta de nuevo", 2000);
              } else if (result.error === 0) {
                return message("Hay datos vacios, por favor ingresa todos los datos", 2000);
              } else {
                return message("Ocurrio un error al registar", 2000);
              }
            } else {
              return $(".cont-cajaG-Center").css({
                overflow: "scroll"
              });
            }
          });
          return $("#departamento").change(function() {
            var ciudades, ciudadesHtml, data, i, resCiudades;
            data = {
              idDepartamento: $(this).val()
            };
            resCiudades = sendAjax("actions.php", "getCity", data);
            ciudadesHtml = "<option value=''>Ciudad</option>";
            if (resCiudades.error === 1) {
              ciudades = resCiudades.data;
              i = 0;
              while (i < ciudades.length) {
                ciudadesHtml += '<option value="' + ciudades[i].id + '">' + ciudades[i].nombre + '</option>';
                i++;
              }
              return $('#idCiudadAcudiente').prop("disabled", false).html(ciudadesHtml);
            } else {
              return $('#idCiudadAcudiente').prop("disabled", true).html(ciudadesHtml);
            }
          });
        }
      },
      run: function() {
        return console.log("run register");
      },
      finalize: function() {
        return $(".cont-formulario-registro").hide();
      }
    };

    ActionsWeb.prototype.canvas = {
      init: function() {
        var data, msg;
        $("body").removeClass("bg-puerta").addClass("bg-bosque");
        msg = ActionsWeb.clientWeb.getAttrConf("titleAction");
        $("#title-walk").text(msg);
        data = {
          from: ActionsWeb.clientWeb.getAttrConf("from"),
          to: ActionsWeb.clientWeb.getAttrConf("to"),
          folder: ActionsWeb.clientWeb.getAttrConf("folder"),
          baseName: ActionsWeb.clientWeb.getAttrConf("basename"),
          ext: ActionsWeb.clientWeb.getAttrConf("ext")
        };
        return ActionsWeb.canvasWeb.init(data);
      },
      run: function(percentage) {
        var data, nameCond;
        data = percentage.split('&');
        percentage = parseInt(data[0]);
        nameCond = data[1];
        if (nameCond === "caminar") {
          return ActionsWeb.canvasWeb.runAction(percentage);
        }
      },
      finalize: function() {
        $(".cont-info-camino").hide();
        $("canvas").hide();
        return console.log("Finalize action canvas");
      }
    };

    ActionsWeb.prototype.playAction = {
      init: function() {
        $("body").removeClass("bg-puerta").addClass("bg-bosque");
        message("Dale iniciar en tu móvil para continuar jugando", null);
        return console.log("playAction");
      },
      run: function(percentage) {
        var data, nameCond;
        data = percentage.split('&');
        percentage = parseInt(data[0]);
        nameCond = data[1];
        if (nameCond === "play") {
          ActionsWeb.percAccumulated += percentage;
          if (ActionsWeb.percAccumulated >= 100) {
            ActionsWeb.percAccumulated = 0;
            return ActionsWeb.clientWeb.nextInteraction();
          }
        }
      },
      finalize: function() {
        hideMessage();
        return console.log("playAction");
      }
    };

    ActionsWeb.prototype.door = {
      init: function() {
        var msg;
        $("body").removeClass("bg-bosque").addClass("bg-puerta");
        $(".cont-info-puerta").show();
        msg = ActionsWeb.clientWeb.getAttrConf("titleAction");
        $("#title-door").text(msg);
        ActionsWeb.percAccumulated = 0;
        return ActionsWeb.tocAccumulated = 1;
      },
      run: function(percentage) {
        var data, nameCond;
        data = percentage.split('&');
        percentage = parseInt(data[0]);
        nameCond = data[1];
        if (nameCond === "puerta") {
          $(".Toc-TocS" + ActionsWeb.tocAccumulated).show().delay(400).fadeOut(400);
          animate(".Toc-TocS" + ActionsWeb.tocAccumulated, "zoomIn");
          ActionsWeb.tocAccumulated++;
          ActionsWeb.percAccumulated += percentage;
          if (ActionsWeb.percAccumulated === 100) {
            ActionsWeb.percAccumulated = 0;
            ActionsWeb.tocAccumulated = 1;
            return ActionsWeb.clientWeb.nextInteraction();
          }
        }
      },
      finalize: function() {
        console.log("finalize door");
        return $(".cont-info-puerta").hide();
      }
    };

    ActionsWeb.prototype.moveHit = {
      init: function() {
        var interval, intervalMove, moveCharacter, time;
        $("#info-time-bruja").fadeOut(4000);
        $("body").removeClass("bg-bosque").addClass("bg-puerta");
        time = 15;
        intervalMove = 2;
        moveCharacter = ['right', 'left'];
        $(".time").show();
        $(".cont-info-bruja").show();
        return interval = setInterval(function() {
          var move, random;
          if (time === 0) {
            $(".time span").css({
              color: '#fff'
            });
            clearInterval(interval);
            ActionsWeb.clientWeb.nextInteraction();
          } else {
            $(".time span").text(time);
            if (time <= 5) {
              $(".time span").css({
                color: '#c23720'
              });
              animate(".time", "bounce");
            }
            move = time % intervalMove;
            if (move === 0) {
              random = Math.round(Math.random());
              ActionsWeb.classMove = moveCharacter[random];
            } else {
              ActionsWeb.classMove = "";
            }
            $("#character-hit").removeClass("move-character-bruja-init move-character-bruja-right move-character-bruja-left");
            $("#character-hit").addClass("move-character-bruja-" + ActionsWeb.classMove);
          }
          return time -= 1;
        }, 1000);
      },
      run: function(direction) {
        var data, nameCond;
        data = direction.split('&');
        direction = data[0];
        nameCond = data[1];
        if (nameCond === "bruja") {
          $("#object-hit").addClass("move-object-" + direction);
          return setTimeout(function() {
            $("#object-hit").removeClass("move-object-" + direction);
            $("#object-hit").addClass("move-object-init");
            if (direction === ActionsWeb.classMove) {
              $("#bruja1").hide();
              $("#bruja2").show();
              setTimeout(function() {
                $("#bruja1").show();
                return $("#bruja2").hide();
              }, 400);
              return ActionsWeb.addPoint();
            }
          }, 1000);
        }
      },
      finalize: function() {
        $(".time").hide();
        return $(".cont-info-bruja").hide();
      }
    };

    ActionsWeb.prototype.moveThrow = {
      init: function() {
        var interval, intervalMove, moveCharacter, time;
        $("#info-time-dracula").fadeOut(4000);
        $("body").removeClass("bg-bosque").addClass("bg-puerta");
        time = 15;
        intervalMove = 2;
        moveCharacter = ['right', 'left', 'center'];
        $(".time").show();
        $(".cont-info-dracula").show();
        return interval = setInterval(function() {
          var move, random;
          if (time === 0) {
            $(".time span").css({
              color: '#fff'
            });
            clearInterval(interval);
            ActionsWeb.clientWeb.nextInteraction();
          } else {
            $(".time span").text(time);
            if (time <= 5) {
              $(".time span").css({
                color: '#c23720'
              });
              animate(".time", "bounce");
            }
            move = time % intervalMove;
            random = Math.floor(Math.random() * (moveCharacter.length - 0)) + 0;
            ActionsWeb.classMove = moveCharacter[random];
            $("#character-throw").removeClass("move-character-init move-character-center move-character-right move-character-left");
            $("#character-throw").addClass("move-character-" + ActionsWeb.classMove);
          }
          return time -= 1;
        }, 1000);
      },
      run: function(direction) {
        var data, nameCond;
        data = direction.split('&');
        direction = data[0];
        nameCond = data[1];
        if (nameCond === "dracula") {
          console.log(direction, "run init");
          $("#object-throw").addClass("throw-character-" + direction);
          return setTimeout(function() {
            $("#object-throw").removeClass("throw-character-" + direction);
            $("#object-throw").addClass("throw-character-init");
            if (direction === ActionsWeb.classMove) {
              $("#dracula1").hide();
              $("#dracula2").show();
              setTimeout(function() {
                $("#dracula1").show();
                return $("#dracula2").hide();
              }, 400);
              return ActionsWeb.addPoint();
            }
          }, 1000);
        }
      },
      finalize: function() {
        $(".time").hide();
        return $(".cont-info-dracula").hide();
      }
    };

    ActionsWeb.prototype.opacity = {
      init: function() {
        var interval, time;
        $("body").removeClass("bg-bosque").addClass("bg-puerta");
        time = 15;
        $(".time").show();
        $(".cont-info-fantasma").show();
        return interval = setInterval(function() {
          if (time === 0) {
            $(".time span").css({
              color: '#fff'
            });
            clearInterval(interval);
            ActionsWeb.clientWeb.nextInteraction();
          } else {
            $(".time span").text(time);
            if (time <= 5) {
              $(".time span").css({
                color: '#c23720'
              });
              animate(".time", "bounce");
            }
          }
          return time -= 1;
        }, 1000);
      },
      run: function(percentage) {
        var data, nameCond;
        data = percentage.split('&');
        percentage = parseInt(data[0]);
        nameCond = data[1];
        if (nameCond === "fantasma") {
          $("#info-time-fantasma").fadeOut(4000);
          $("#img-opacity").animate({
            opacity: "-=0." + percentage
          }, 2000);
          ActionsWeb.addPoint();
          ActionsWeb.percAccumulated += percentage;
          if (ActionsWeb.percAccumulated === 100) {
            return setTimeout(function() {
              this.percAccumulated = 0;
              return this.clientWeb.nextInteraction();
            }, 1500);
          }
        }
      },
      finalize: function() {
        var data;
        data = {
          idUser: getUser("id"),
          point: ActionsWeb.points
        };
        sendAjax("actions.php", "setGame", data);
        $(".time").hide();
        return $(".cont-info-fantasma").hide();
      }
    };

    return ActionsWeb;

  })();

}).call(this);
