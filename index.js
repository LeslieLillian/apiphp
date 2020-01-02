$(document).ready(function(){
    $("#btn_todos").click(function(){
        $.ajax({
            type: "GET",
            datatype: "JSON",
     //Se pone la ruta tal cual.
            url: "php/consultar_lanzamientos.php"
        }).done(function(respuesta){
            var json_respuesta = JSON.parse(respuesta);
            for (var index = 0; index < json_respuesta["lanzamiento"].length; index++) {
                console.log("ID: "+json_respuesta["lanzamiento"][index]["Id"] + ". Fecha: "+json_respuesta["lanzamiento"][index]["Fecha"]);

            }
         
        })
    })

    $("#btn_fechas").click(function(){
        var fecha_ini = $("#fecha_ini").val();
        var fecha_fin = $(".fecha_final").val();
        $.ajax({
            type: "POST",
            datatype: "JSON",
            url: "php/consultar_x_fechas.php",
            data: {fecha_inicio:fecha_ini,fecha_final:fecha_fin}
        }).done(function(respuesta){
            console.log(respuesta);
            var json_respuesta = JSON.parse(respuesta);
            for (var index = 0; index < json_respuesta["lanzamiento"].length; index++) {
                console.log("ID: "+json_respuesta["lanzamiento"][index]["Id"] + ". Fecha: "+json_respuesta["lanzamiento"][index]["Fecha"]);
            }
            $.ajax({
                type: "POST",
                datatype: "JSON",
                url: "php/insertar_lanzamientos.php",
                data: {arreglo:respuesta}
            }).done(function(resp2){
                console.log(resp2);
                var json_respuesta2 = JSON.parse(resp2);
                if (json_respuesta2["lanzamiento"] == true) {
                    alert("Registros insertados correctamente.");
                } else {
                    alert("Ocurrio un error: " +json_respuesta2["mensaje"]);
                }
            })
        })
    })
})