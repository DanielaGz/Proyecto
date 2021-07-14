<?php
class AdministradorDAO{
    private $id;
    private $nombre;
    private $correo;
    private $clave;
    private $foto;
    private $estado;

    public function AdministradorDAO($id = "", $nombre = "", $correo = "", $clave = "", $foto = "", $estado =""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> foto = $foto;
        $this -> estado = $estado;
    }

    /* Registro */

    public function existeCorreo(){
        return "select correo
                from administrador 
                where correo = '" . $this -> correo .  "'";
    }

    public function insertar(){
        return "insert into administrador (nombre, correo, clave,estado)
                values ('" . $this -> nombre . "', '" . $this -> correo . "', '" . md5($this -> clave) . "',1)";
    }

    public function autenticar(){
        return "select idadministrador, estado
                from administrador 
                where correo = '" . $this -> correo .  "' and clave = '" . md5($this -> clave) . "'";
    }

    public function consultar(){
        return "select idadministrador,nombre, correo, foto, estado
                from administrador
                where idadministrador = '" . $this -> id .  "'";
    }

    public function Editar(){
        return "update administrador
                set nombre='".$this -> nombre."',
                foto ='".$this ->foto."'
                where idadministrador = '" . $this -> id .  "'";
    }

    public function VerificarPass(){
        return "select idadministrador
                from administrador 
                where idadministrador = '" . $this -> id .  "' and clave = '" . md5($this -> clave) . "'";
    }

    public function EditarPass(){
        return "update administrador
                set clave='".md5($this -> clave)."'
                where idadministrador = '" . $this -> id .  "'";
    }

    public function consultarTodos(){
        return "select idadministrador,nombre, correo, foto, estado
                from administrador";
    }

    public function consultarFiltro($filtro)
    {
        return "SELECT * FROM administrador 
        where (nombre like '%" . $filtro . "%' or correo like '%" . $filtro . "%' or estado like '%" . $filtro . "%' or idadministrador like '%" . $filtro . "%') ";
    }

    public function Estado(){
        return "update administrador
                set estado='".$this -> estado."'
                where idadministrador = '" . $this -> id .  "'";
    }

}
