$(document).ready ->
    
    $("#btn-jugar").click ->
        $(".cont-bienvenida-H").fadeOut 1000,->
            $(".cont-tipo-registro").fadeIn 700
            animate ".cont-tipo-registro","bounceIn"
            
    
    $("#btn-no-register").click ->
        localStorage.clear()
        deleteCookie "bbb%h_da/t4"
        window.location.href = "game"
    
    $("#btn-login").click ->
        if $("#user").val() != "" && $("#password").val() != ""
            data =
                user: $("#user").val()
                password: $("#password").val()
            result = sendAjax "actions","getLogin",data
            if result.error == 1
                localStorage.clear()
                deleteCookie "bbb%h_da/t4"
                stringifyData = JSON.stringify(result.data)
                localStorage.setItem 'bbb%h_da/t4',stringifyData
                setCookie "bbb%h_da/t4",stringifyData,"1"
                window.location.href = "game"
            else
                message "El usuario es incorrecto",2000
        else
            message "Datos incorrectos",2000
