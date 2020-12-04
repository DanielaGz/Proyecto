<?php
require_once "persistencia/Conexion.php";
require_once "persistencia/PaginaDAO.php";
class Pagina{
    private $id;
    private $nombre;
    private $ruta;
    private $fecha;
    private $fechaEd;
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

    public function getFechaEd(){
        return $this -> fechaEd;
    }

    public function getIdUsuario(){
        return $this -> idUsuario;
    }
    public function Pagina($id = "", $nombre = "", $ruta = "", $fecha = "", $idUsuario = "", $fechaEd = ""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> ruta = $ruta;
        $this -> fecha = $fecha;
        $this -> fechaEd = $fechaEd;
        $this -> idUsuario = $idUsuario;
        $this -> conexion = new Conexion();
        $this -> paginaDAO = new PaginaDAO($this -> id, $this -> nombre, $this -> ruta, $this -> fecha, $this -> idUsuario, $this -> fechaEd);
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

    public function consultarMod(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> paginaDAO -> consultarMod());
        $pag = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            $c = new Pagina($resultado[0], $resultado[1], $resultado[2],$resultado[3],$resultado[4]);
            array_push($pag, $c);
        }
        $this -> conexion -> cerrar();
        return $pag;
    }

    public function consultarMod2(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> paginaDAO -> consultarMod2());
        $pag = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            $c = new Pagina($resultado[0], $resultado[1], $resultado[2],$resultado[3],$resultado[4]);
            array_push($pag, $c);
        }
        $this -> conexion -> cerrar();
        return $pag;
    }

    public function consultarCre(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> paginaDAO -> consultarCre());
        $pag = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            $c = new Pagina($resultado[0], $resultado[1], $resultado[2],$resultado[3],$resultado[4]);
            array_push($pag, $c);
        }
        $this -> conexion -> cerrar();
        return $pag;
    }

    public function consultarN(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> paginaDAO -> consultarN());
        $pag = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            $c = new Pagina($resultado[0], $resultado[1], $resultado[2],$resultado[3],$resultado[4]);
            array_push($pag, $c);
        }
        $this -> conexion -> cerrar();
        return $pag;
    }

    public function consultarFiltro($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> paginaDAO -> consultarFiltro($filtro));
        $pag = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            $c = new Pagina($resultado[0], $resultado[1], $resultado[2],$resultado[3],$resultado[4]);
            array_push($pag, $c);
        }
        $this -> conexion -> cerrar();
        return $pag;
    }

    public function consultarPag(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> paginaDAO -> consultarPag());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        $this -> id = $resultado[0];
        $this -> nombre = $resultado[1];
        $this -> ruta = $resultado[2];
        $this -> idUsuario = $resultado[3];
        $this -> fecha = $resultado[4];
    }

    public function editar($param,$valor){
        $this -> paginaDAO = new PaginaDAO($this -> id, $this -> nombre, $this -> ruta, $this -> fecha, $this -> idUsuario, $this -> fechaEd);
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> paginaDAO -> editar($param,$valor));        
        $this -> conexion -> cerrar();        
    }
}

?>