(function() {
  this.recreateNode = function(el, withChildren) {
    var newEl;
    if (withChildren) {
      el.parentNode.replaceChild(el.cloneNode(true), el);
    } else {
      newEl = el.cloneNode(false);
      while (el.hasChildNodes()) {
        newEl.appendChild(el.firstChild);
      }
      el.parentNode.replaceChild(newEl, el);
    }
  };

  this.sendAjax = function(url, action, data) {
    var result;
    if (typeof data === 'string') {
      data += "&action=" + action;
    } else {
      data.action = action;
    }
    result = null;
    $.ajaxSetup({
      async: false
    });
    $.ajax({
      "url": url,
      "dataType": 'json',
      "type": 'POST',
      "data": data,
      "success": function(dataResult) {
        return result = dataResult;
      },
      "error": function(result) {
        return console.log(result, 'error');
      }
    });
    return result;
  };

  this.animate = function(ele, x) {
    $(ele).removeClass(x + ' animated').addClass(x + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
      $(this).removeClass(x + ' animated');
    });
  };

  this.message = function(message, time) {
    $(".cont-alerts-HB").fadeIn(1000);
    $(".cont-alerts-HB p").text(message);
    if (time !== void 0 && time !== null && time > 0) {
      return setTimeout(function() {
        return $(".cont-alerts-HB").fadeOut(1000, function() {
          return $(".cont-alerts-HB p").text("");
        });
      }, time);
    }
  };

  this.hideMessage = function() {
    return $(".cont-alerts-HB").fadeOut(1000, function() {
      return $(".cont-alerts-HB p").text("");
    });
  };

  this.setCookie = function(cname, cvalue, exhours) {
    var d, expires;
    d = new Date;
    d.setTime(d.getTime() + exhours * 60 * 60 * 1000);
    expires = 'expires=' + d.toUTCString();
    return document.cookie = cname + '=' + cvalue + ';' + expires + ';path=/';
  };

  this.getCookie = function(cname) {
    var c, ca, i, name;
    name = cname + '=';
    ca = document.cookie.split(';');
    i = 0;
    while (i < ca.length) {
      c = ca[i];
      while (c.charAt(0) === ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) === 0) {
        return c.substring(name.length, c.length);
      }
      i++;
    }
  };

  this.deleteCookie = function(name) {
    document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
  };

  this.getUser = function(data) {
    var user;
    user = getCookie("bbb%h_da/t4") ? getCookie("bbb%h_da/t4") : localStorage.getItem("bbb%h_da/t4");
    user = JSON.parse(user);
    return user[data];
  };

  this.statusUser = function() {
    var user;
    user = getCookie("bbb%h_da/t4") ? getCookie("bbb%h_da/t4") : localStorage.getItem("bbb%h_da/t4");
    user = JSON.parse(user);
    console.log(user, "user");
    if (user && user !== void 0 && user !== null) {
      if (user.id !== void 0 && user.id !== "" && user.correo !== "") {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  };

}).call(this);
