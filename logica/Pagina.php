<?php
require_once "persistencia/Conexion.php";
require_once "persistencia/PaginaDAO.php";
class Pagina{
    private $id;
    private $nombre;
    private $ruta;
    private $fecha;
    private $idUsuario;
    private $conexion;
    private $paginaDAO;
 
    public function getId(){
        return $this -> id;
    }

    public function getNombre(){
        return $this -> nombre;
    }

    public function getRuta(){
        return $this -> ruta;
    }

    public function getFecha(){
        return $this -> fecha;
    }

    public function getIdUsuario(){
        return $this -> idUsuario;
    }
    public function Pagina($id = "", $nombre = "", $ruta = "", $fecha = "", $idUsuario = ""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> ruta = $ruta;
        $this -> fecha = $fecha;
        $this -> idUsuario = $idUsuario;
        $this -> conexion = new Conexion();
        $this -> paginaDAO = new PaginaDAO($this -> id, $this -> nombre, $this -> ruta, $this -> fecha, $this -> idUsuario);
    }

    /* Insertar */

    public function insertar(){
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> paginaDAO -> insertar());        
        $this -> conexion -> cerrar();        
    }
    
    /* Eliminar */

    public function eliminar(){
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> paginaDAO -> eliminar());        
        $this -> conexion -> cerrar();        
    }

    public function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> paginaDAO -> consultar());
        $pag = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            $c = new Pagina($resultado[0], $resultado[1], $resultado[2],$resultado[3],$resultado[4]);
            array_push($pag, $c);
        }
        $this -> conexion -> cerrar();
        return $pag;
    }

}

?>