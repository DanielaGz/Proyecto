<?php
class PaginaDAO{
    private $id;
    private $nombre;
    private $ruta;
    private $fecha;
    private $fechaEd;
    private $idCliente;
 
    public function PaginaDAO($id = "", $nombre = "", $ruta = "", $fecha = "", $idCliente = "",$fechaEd = ""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> ruta = $ruta;
        $this -> fecha = $fecha;
        $this -> fechaEd = $fechaEd;
        $this -> idCliente = $idCliente;
    }

    /* Insertar */

    public function insertar(){
        return "Insert into pagina (nombre,ruta,idcliente,fecha,fechaed) 
                values ('". $this -> nombre ."','". $this -> ruta ."','". $this -> idCliente ."',NOW(),NOW())";      
    }

    /* Eliminar */

    public function eliminar(){
        return "delete from pagina where ruta= '".$this -> ruta."'";      
    }
    
    public function consultar(){
        return "select idpagina, nombre, ruta, fecha, idcliente
                from pagina
                where idcliente = '" . $this -> idCliente .  "'";
    }

    public function consultarMod(){
        return "select idpagina, nombre, ruta, fecha, idcliente
                from pagina
                where idcliente = '" . $this -> idCliente .  "'
                order by fechaed desc";
    }

    public function consultarMod2(){
        return "select idpagina, nombre, ruta, fecha, idcliente
                from pagina
                where idcliente = '" . $this -> idCliente .  "'
                order by fechaed asc limit 3";
    }

    public function consultarCre(){
        return "select idpagina, nombre, ruta, fecha, idcliente
                from pagina
                where idcliente = '" . $this -> idCliente .  "'
                order by fecha asc";
    }

    public function consultarN(){
        return "select idpagina, nombre, ruta, fecha, idcliente
                from pagina
                where idcliente = '" . $this -> idCliente .  "'
                order by nombre";
    }

    public function consultarPag(){
        return "select idpagina, nombre, ruta, idcliente, fecha
                from pagina
                where ruta = '" . $this -> ruta .  "'";
    }

    public function editar($param,$valor){
        return "update pagina set ".$param." = ".$valor."
                where idpagina = '" . $this -> id .  "'";  
    }

    public function consultarFiltro($filtro)
    {
        return "select idpagina, nombre, ruta, fecha, idcliente
        FROM pagina
        where idcliente = '".$this -> idCliente."'
        and (idpagina like '%" . $filtro . "%' or nombre like '" . $filtro . "%' or fecha like '" . $filtro . "%') ";
    }

}
