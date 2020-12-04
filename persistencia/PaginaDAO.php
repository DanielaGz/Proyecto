<?php
class PaginaDAO{
    private $id;
    private $nombre;
    private $ruta;
    private $fecha;
    private $fechaEd;
    private $idUsuario;
 
    public function PaginaDAO($id = "", $nombre = "", $ruta = "", $fecha = "", $idUsuario = "",$fechaEd = ""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> ruta = $ruta;
        $this -> fecha = $fecha;
        $this -> fechaEd = $fechaEd;
        $this -> idUsuario = $idUsuario;
    }

    /* Insertar */

    public function insertar(){
        return "Insert into pagina (Nombre,Ruta,idUsuario,Fecha,FechaEd) 
                values ('". $this -> nombre ."','". $this -> ruta ."','". $this -> idUsuario ."',NOW(),NOW())";      
    }

    /* Eliminar */

    public function eliminar(){
        return "Delete from pagina where Ruta= '".$this -> ruta."'";      
    }
    
    public function consultar(){
        return "select idPagina, Nombre, Ruta, Fecha, idUsuario
                from Pagina
                where idUsuario = '" . $this -> idUsuario .  "'";
    }

    public function consultarMod(){
        return "select idPagina, Nombre, Ruta, Fecha, idUsuario
                from Pagina
                where idUsuario = '" . $this -> idUsuario .  "'
                order by FechaEd desc";
    }

    public function consultarMod2(){
        return "select idPagina, Nombre, Ruta, Fecha, idUsuario
                from Pagina
                where idUsuario = '" . $this -> idUsuario .  "'
                order by FechaEd asc limit 3";
    }

    public function consultarCre(){
        return "select idPagina, Nombre, Ruta, Fecha, idUsuario
                from Pagina
                where idUsuario = '" . $this -> idUsuario .  "'
                order by Fecha asc";
    }

    public function consultarN(){
        return "select idPagina, Nombre, Ruta, Fecha, idUsuario
                from Pagina
                where idUsuario = '" . $this -> idUsuario .  "'
                order by Nombre";
    }

    public function consultarPag(){
        return "select idPagina, Nombre, Ruta, idUsuario, Fecha
                from pagina
                where Ruta = '" . $this -> ruta .  "'";
    }

    public function editar($param,$valor){
        return "update pagina set ".$param." = ".$valor."
                where idPagina = '" . $this -> id .  "'";  
    }

    public function consultarFiltro($filtro)
    {
        return "select idPagina, Nombre, Ruta, Fecha, idUsuario
        FROM pagina
        where (idPagina like '%" . $filtro . "%' or Nombre like '" . $filtro . "%' or Fecha like '" . $filtro . "%') ";
    }

}
