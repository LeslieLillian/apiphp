<?php
    require "lanzamientos.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $lanzamientos = Lanzamientos::insertar($_POST["arreglo"]);

        if ($lanzamientos[0] == true) {
            $datos["estado"] = 1;
            $datos["lanzamiento"] = true;
            print json_encode($datos);
        } else {
            print json_encode(array(
                "estado" => 2,
                "mensaje" => "Ha ocurrido un error: ".$lanzamientos[1]
            ));
        }
    }
?>