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
        return "select correo
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
        return "select nombre, correo, foto
                from usuario
                where idUsuario = '" . $this -> id .  "'";
    }

}

?>