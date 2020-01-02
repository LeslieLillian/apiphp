<?php
    require "conexion.php";
    
    class Lanzamientos
    {
        
        function __construct()
        {
        }
        public static function ver_todos()
        {
            $consulta = "SELECT * FROM lanzamientos2";
            try {
                $comando = ConexionMySQL::conectaDb()->prepare($consulta);
                $comando->execute();
                return $comando->fetchAll(PDO::FETCH_ASSOC);
                #$sth = $mbd->query('SELECT * FROM foo');
            } catch (PDOException $e) {
                return false;
            }
        }

        public static function ver_x_fechas($fecha_inicio, $fecha_final)
        {
            $consulta = "SELECT * FROM lanzamientos2 WHERE fecha BETWEEN ? and ?";
        try {
            $comando = ConexionMySQL::conectaDb()->prepare($consulta);
            $comando->execute(array(
                $fecha_inicio,
                $fecha_final
            ));
            return $comando->fetchAll(PDO::FETCH_ASSOC);
            #$sth = $mbd->query('SELECT * FROM foo');
        } catch (PDOException $e) {
            return false;
        }
    }


    public static function insertar($arreglo)
        {
            $consulta = "INSERT INTO lanzamientos (Descripcion, Fecha, Direccion) VALUES (?, ?, ?)";
        try {
            $Array = json_decode($arreglo);
            foreach ($Array->lanzamiento as $key => $value) {
                $comando = ConexionMySQL::conectaDb()->prepare($consulta);
                $comando->execute(array(
                    $value->Descripcion,
                    $value->Fecha,
                    $value->Direccion
                ));
            }
            return [true];
            #$sth = $mbd->query('SELECT * FROM foo');
        } catch (PDOException $e) {
            return [false, $e];
        }
    }
    }
    
?>