<?php
class Conexion{
    private $mysqli;
    private $resultado;
    
    function abrir(){
        $this -> mysqli = new mysqli("servername", "username", "password", "bdname");        
        $this -> mysqli -> set_charset("utf8");
    }

    function cerrar(){
        $this -> mysqli -> close();
    }
    
    function ejecutar($sentencia){
        $this -> resultado = $this -> mysqli -> query($sentencia);
    }
    
    function extraer(){
        return $this -> resultado -> fetch_row();
    }
}
?>