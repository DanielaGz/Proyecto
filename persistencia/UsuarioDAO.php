<?php
class UsuarioDAO{
    private $id;
    private $nombre;
    private $correo;
    private $clave;
    private $foto;
    private $estado;

    public function UsuarioDAO($id = "", $nombre = "", $correo = "", $clave = "", $foto = "",$estado =""){
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
                from cliente 
                where correo = '" . $this -> correo .  "'";
    }

    public function insertar(){
        return "insert into cliente (nombre, correo, clave, estado)
                values ('" . $this -> nombre . "', '" . $this -> correo . "', '" . md5($this -> clave) . "',1)";
    }

    public function autenticar(){
        return "select idcliente, estado
                from cliente 
                where correo = '" . $this -> correo .  "' and clave = '" . md5($this -> clave) . "'";
    }

    public function consultar(){
        return "select idcliente,nombre, correo, foto, estado
                from cliente
                where idcliente = '" . $this -> id .  "'";
    }

    public function consultarUlt(){
        return "select idcliente,nombre, correo, foto, estado
                from cliente order by idcliente desc limit 3";
    }

    public function Editar(){
        return "update cliente
                set nombre='".$this -> nombre."',
                foto ='".$this ->foto."'
                where idcliente = '" . $this -> id .  "'";
    }

    public function VerificarPass(){
        return "select idcliente
                from cliente 
                where idcliente = '" . $this -> id .  "' and clave = '" . md5($this -> clave) . "'";
    }

    public function EditarPass(){
        return "update cliente
                set clave='".md5($this -> clave)."'
                where idcliente = '" . $this -> id .  "'";
    }

    public function consultarTodos(){
        return "select idcliente,nombre, correo, foto, estado
                from cliente";
    }

    public function Estado(){
        return "update cliente
                set estado='".$this -> estado."'
                where idcliente = '" . $this -> id .  "'";
    }

    public function consultarFiltro($filtro)
    {
        return "SELECT * FROM cliente 
        where (nombre like '%" . $filtro . "%' or correo like '%" . $filtro . "%' or estado like '%" . $filtro . "%' or idcliente like '%" . $filtro . "%') ";
    }

}
