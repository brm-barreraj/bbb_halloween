(function() {
  $(document).ready(function() {
    $("#btn-jugar").click(function() {
      return $(".cont-bienvenida-H").fadeOut(1000, function() {
        $(".cont-tipo-registro").fadeIn(700);
        return animate(".cont-tipo-registro", "bounceIn");
      });
    });
    $("#btn-no-register").click(function() {
      localStorage.clear();
      deleteCookie("bbb%h_da/t4");
      return window.location.href = "game";
    });
    return $("#btn-login").click(function() {
      var data, result, stringifyData;
      if ($("#user").val() !== "" && $("#password").val() !== "") {
        data = {
          user: $("#user").val(),
          password: $("#password").val()
        };
        result = sendAjax("actions", "getLogin", data);
        if (result.error === 1) {
          localStorage.clear();
          deleteCookie("bbb%h_da/t4");
          stringifyData = JSON.stringify(result.data);
          localStorage.setItem('bbb%h_da/t4', stringifyData);
          setCookie("bbb%h_da/t4", stringifyData, "1");
          return window.location.href = "game";
        } else {
          return message("El usuario es incorrecto", 2000);
        }
      } else {
        return message("Datos incorrectos", 2000);
      }
    });
  });

}).call(this);
