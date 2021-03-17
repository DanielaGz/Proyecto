<?php
class AdministradorDAO{
    private $id;
    private $nombre;
    private $correo;
    private $clave;
    private $foto;

    public function AdministradorDAO($id = "", $nombre = "", $correo = "", $clave = "", $foto = ""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> foto = $foto;
    }

    /* Registro */

    public function existeCorreo(){
        return "select correo
                from administrador 
                where correo = '" . $this -> correo .  "'";
    }

    public function insertar(){
        return "insert into usuario (nombre, correo, clave)
                values ('" . $this -> nombre . "', '" . $this -> correo . "', '" . md5($this -> clave) . "')";
    }

    public function autenticar(){
        return "select idAdministrador
                from administrador 
                where correo = '" . $this -> correo .  "' and clave = '" . md5($this -> clave) . "'";
    }

    public function consultar(){
        return "select idAdministrador,nombre, correo, foto
                from administrador
                where idAdministrador = '" . $this -> id .  "'";
    }

    public function Editar(){
        return "update administrador
                set nombre='".$this -> nombre."',
                foto ='".$this ->foto."'
                where idAdministrador = '" . $this -> id .  "'";
    }

    public function VerificarPass(){
        return "select idAdministrador
                from administrador 
                where idAdministrador = '" . $this -> id .  "' and clave = '" . md5($this -> clave) . "'";
    }

    public function EditarPass(){
        return "update administrador
                set clave='".md5($this -> clave)."'
                where idAdministrador = '" . $this -> id .  "'";
    }

}
