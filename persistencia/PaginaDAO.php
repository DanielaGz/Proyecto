<?php
class PaginaDAO{
    private $id;
    private $nombre;
    private $ruta;
    private $fecha;
    private $idUsuario;
 
    public function PaginaDAO($id = "", $nombre = "", $ruta = "", $fecha = "", $idUsuario = ""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> ruta = $ruta;
        $this -> fecha = $fecha;
        $this -> idUsuario = $idUsuario;
    }

    /* Insertar */

    public function insertar(){
        return "Insert into pagina (Nombre,Ruta,idUsuario,Fecha) 
                values ('". $this -> nombre ."','". $this -> ruta ."','". $this -> idUsuario ."',NOW())";      
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

}

?>