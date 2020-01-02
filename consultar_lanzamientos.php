<?php
    require "lanzamientos.php";

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $lanzamientos = Lanzamientos::ver_todos();

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