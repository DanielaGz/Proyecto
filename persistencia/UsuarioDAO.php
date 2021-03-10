<?php
class UsuarioDAO{
    private $id;
    private $nombre;
    private $correo;
    private $clave;
    private $foto;

    public function UsuarioDAO($id = "", $nombre = "", $correo = "", $clave = "", $foto = ""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> foto = $foto;
    }

    /* Registro */

    public function existeCorreo(){
        echo "select correo
                from usuario 
                where correo = '" . $this -> correo .  "'";
    }

    public function insertar(){
        return "insert into usuario (nombre, correo, clave)
                values ('" . $this -> nombre . "', '" . $this -> correo . "', '" . md5($this -> clave) . "')";
    }

    public function autenticar(){
        return "select idUsuario
                from Usuario 
                where correo = '" . $this -> correo .  "' and clave = '" . md5($this -> clave) . "'";
    }

    public function consultar(){
        return "select idUsuario,nombre, correo, foto
                from usuario
                where idUsuario = '" . $this -> id .  "'";
    }

    public function Editar(){
        return "update usuario
                set nombre='".$this -> nombre."',
                foto ='".$this ->foto."'
                where idUsuario = '" . $this -> id .  "'";
    }

    public function VerificarPass(){
        return "select idUsuario
                from Usuario 
                where idUsuario = '" . $this -> id .  "' and clave = '" . md5($this -> clave) . "'";
    }

    public function EditarPass(){
        return "update usuario
                set clave='".md5($this -> clave)."'
                where idUsuario = '" . $this -> id .  "'";
    }

}
