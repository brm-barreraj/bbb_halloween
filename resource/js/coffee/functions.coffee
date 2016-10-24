@recreateNode = (el, withChildren) ->
  if withChildren
    el.parentNode.replaceChild el.cloneNode(true), el
  else
    newEl = el.cloneNode(false)
    while el.hasChildNodes()
      newEl.appendChild el.firstChild
    el.parentNode.replaceChild newEl, el
  return

@sendAjax=(url,action,data)->
  if typeof data is 'string'
    data +="&action="+action
  else
    data.action = action
  result=null
  $.ajaxSetup async: false
  $.ajax
    "url": url
    "dataType": 'json'
    "type": 'POST'
    "data": data
    "success": (dataResult)->
        result = dataResult
    "error": (result)-> 
        console.log result,'error'
  return result
	
@animate = (ele,x) ->
  $(ele).removeClass(x + ' animated').addClass(x + ' animated').one 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', ->
    $(this).removeClass(x + ' animated')
    return
  return

@message = (message,time) ->
  $(".cont-alerts-HB").fadeIn 1000
  $(".cont-alerts-HB p").text message
  if time != undefined && time != null && time > 0
  	setTimeout ->
      $(".cont-alerts-HB").fadeOut 1000, ->
        $(".cont-alerts-HB p").text ""
    ,time
    
@hideMessage = () ->
  $(".cont-alerts-HB").fadeOut 1000, ->
    $(".cont-alerts-HB p").text ""

@setCookie = (cname, cvalue, exhours) ->
  d = new Date
  d.setTime d.getTime() + exhours * 60 * 60 * 1000
  expires = 'expires=' + d.toUTCString()
  document.cookie = cname + '=' + cvalue + ';' + expires + ';path=/'
  
@getCookie = (cname) ->
  name = cname + '='
  ca = document.cookie.split(';')
  i = 0
  while i < ca.length
    c = ca[i]
    while c.charAt(0) == ' '
      c = c.substring(1)
    if c.indexOf(name) == 0
      return c.substring(name.length, c.length)
    i++

@deleteCookie = (name) ->
  document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;'
  return
  
@getUser = (data) ->
  user = if getCookie("bbb%h_da/t4") then getCookie("bbb%h_da/t4") else localStorage.getItem("bbb%h_da/t4")
  user = JSON.parse(user)
  user[data]
  
@statusUser = ->
  user = if getCookie("bbb%h_da/t4") then getCookie("bbb%h_da/t4") else localStorage.getItem("bbb%h_da/t4")
  user = JSON.parse(user)
  console.log user,"user"
  if  user && user != undefined && user != null
    if user.id != undefined && user.id != "" && user.correo != ""
      return true
    else
      return false
  else  
    return false
  return