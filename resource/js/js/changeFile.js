(function() {
  $(document).ready(function() {
    return $.getScript('http://104.36.19.174/socket.io/socket.io.js', function(data, textStatus) {
      $.getScript('js/canvasweb.min.js');
      $.getScript('js/actionsweb.min.js');
      $.getScript('js/clientweb.min.js');
      return $.getScript('js/eventsweb.min.js');
    });
  });

}).call(this);
