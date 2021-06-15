<?php 
require_once "persistencia/Conexion.php";
require_once "persistencia/adminLogDAO.php";
class AdminLog
{
    private $idU;
    private $idA;
    private $conexion;
    private $ulogDAO;

    public function getIdU(){
        return $this -> idU;
    }

    public function getIdA(){
        return $this -> idA;
    }
 
    public function AdminLog($idU = "", $idA = "")
    {
        $this -> idU = $idU;
        $this -> idA = $idA;
        $this -> conexion = new Conexion();
        $this -> ulogDAO = new AdminLogDAO($this -> idU, $this -> idA);
    }

    /* Insertar */

    public function insertar(){
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> ulogDAO -> insertar());        
        $this -> conexion -> cerrar();     
    }

    public function consultar(){
        return "select *
                from log
                where idUsuario = '" . $this -> idUsuario .  "'";
    }
}
