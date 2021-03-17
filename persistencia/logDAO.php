<?php 

class LogDAO
{
    private $id;
    private $accion;
    private $fecha;
    private $idu;
 
    public function LogDAO($id = "", $accion = "", $fecha = "", $idu ="")
    {
        $this -> id = $id;
        $this -> accion = $accion;
        $this -> fecha = $fecha;
        $this -> idu = $idu;
    }

    /* Insertar */

    public function insertar(){
        return "Insert into log (id,accion,fecha) 
                values ('". $this -> id ."','". $this -> accion ."',NOW())";      
    }

    public function consultar(){
        return "SELECT * FROM log 
        INNER JOIN usuariolog on log.id = usuariolog.idLog";
    }

    public function consultarFiltro($filtro)
    {
        return "SELECT * FROM log 
        INNER JOIN usuariolog on log.id = usuariolog.idLog
        INNER JOIN usuario ON usuario.idUsuario = usuariolog.idUsuario
        where (nombre like '%" . $filtro . "%' or accion like '%" . $filtro . "%' or usuario.idUsuario like '" . $filtro . "%') ";
    }
}
