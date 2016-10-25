$("body").addClass "bg-ranking"

$(document).ready ->
    if statusUser("bbb%h_da/t4")
        $("#position").show()
        animate "#position","bounceIn"
        $('.posiciones-juegoH tr').each ->
            apodoGet = $(this).data("apodo")
            if apodoGet == getUser("apodo")
                posGet = $(this).data("pos")
                $("#position p").text posGet