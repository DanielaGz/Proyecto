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
        return "Insert into log (idLog,accion,fecha) 
                values ('". $this -> id ."','". $this -> accion ."',NOW())";      
    }

    public function consultar(){
        return "SELECT * FROM log 
        INNER JOIN logcliente on log.idlog = logcliente.idlog order by log.idlog DESC";
    }

    public function consultarAdmin(){
        return "SELECT * FROM log 
        INNER JOIN logadministrador on log.idlog = logadministrador.idLog order by log.idlog DESC";
    }

    public function consultarFiltro($filtro)
    {
        return "SELECT * FROM log 
        INNER JOIN logcliente on log.idLog = logcliente.idLog
        INNER JOIN cliente ON cliente.idCliente = logcliente.idcliente
        where (nombre like '%" . $filtro . "%' or accion like '%" . $filtro . "%' or cliente.idcliente like '" . $filtro . "%') 
        order by log.idLog desc";
    }

    public function consultarFiltroAdmin($filtro)
    {
        return "SELECT * FROM log 
        INNER JOIN logadministrador on log.idLog = logadministrador.idLog
        INNER JOIN administrador ON administrador.idadministrador = logadministrador.idadministrador
        where (nombre like '%" . $filtro . "%' or accion like '%" . $filtro . "%' or administrador.idadministrador like '" . $filtro . "%') 
        order by log.idLog desc";
    }
}
