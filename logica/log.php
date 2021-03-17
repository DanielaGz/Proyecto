<?php 
require_once "persistencia/Conexion.php";
require_once "persistencia/logDAO.php";
class Log
{
    private $id;
    private $accion;
    private $fecha;
    private $idu;
    private $conexion;
    private $logDAO;

    public function getId(){
        return $this -> id;
    }

    public function getAccion(){
        return $this -> accion;
    }

    public function getFecha(){
        return $this -> fecha;
    }

    public function getIdU(){
        return $this -> idu;
    }
 
    public function Log($id = "", $accion = "", $fecha = "", $idu = "")
    {
        $this -> id = $id;
        $this -> accion = $accion;
        $this -> fecha = $fecha;
        $this -> idu = $idu;
        $this -> conexion = new Conexion();
        $this -> logDAO = new LogDAO($this -> id, $this -> accion, $this -> fecha, $this -> idu);
    }

    public function insertar(){
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> logDAO -> insertar());        
        $this -> conexion -> cerrar();     
    }

    public function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> logDAO -> consultar());
        $pag = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            $c = new Log($resultado[0], $resultado[1], $resultado[2],$resultado[3]);
            array_push($pag, $c);
        }
        $this -> conexion -> cerrar();
        return $pag;
    }

    public function consultarFiltro($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> logDAO -> consultarFiltro($filtro));
        $pag = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            $c = new Log($resultado[0], $resultado[1], $resultado[2],$resultado[3]);
            array_push($pag, $c);
        }
        $this -> conexion -> cerrar();
        return $pag;
    }

}

?>