<?php
    require "lanzamientos.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $lanzamientos = Lanzamientos::ver_x_fechas($_POST["fecha_inicio"],$_POST["fecha_final"]);

        if ($lanzamientos) {
            $datos["estado"] = 1;
            $datos["lanzamiento"] = $lanzamientos;
            print json_encode($datos);
        } else {
            print json_encode(array(
                "estado" => 2,
                "mensaje" => "Ha ocurrido un error"
            ));
        }
    }
?>