(function() {
  $(document).ready(function() {
    if (statusUser("bbb%h_da/t4")) {
      $("#position").show();
      animate("#position", "bounceIn");
      return $('.posiciones-juegoH tr').each(function() {
        var apodoGet, posGet;
        apodoGet = $(this).data("apodo");
        if (apodoGet === getUser("apodo")) {
          posGet = $(this).data("pos");
          return $("#position p").text(posGet);
        }
      });
    }
  });

}).call(this);
