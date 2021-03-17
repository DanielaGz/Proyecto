<?php 
require_once "persistencia/Conexion.php";
require_once "persistencia/usuarioLogDAO.php";
class UsuarioLog
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
 
    public function UsuarioLog($idU = "", $idA = "")
    {
        $this -> idU = $idU;
        $this -> idA = $idA;
        $this -> conexion = new Conexion();
        $this -> ulogDAO = new UsuarioLogDAO($this -> idU, $this -> idA);
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
