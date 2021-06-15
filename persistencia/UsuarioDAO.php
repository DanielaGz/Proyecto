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
                from Cliente 
                where correo = '" . $this -> correo .  "'";
    }

    public function insertar(){
        return "insert into Cliente (nombre, correo, clave, estado)
                values ('" . $this -> nombre . "', '" . $this -> correo . "', '" . md5($this -> clave) . "',1)";
    }

    public function autenticar(){
        return "select idCliente, estado
                from Cliente 
                where correo = '" . $this -> correo .  "' and clave = '" . md5($this -> clave) . "'";
    }

    public function consultar(){
        return "select idCliente,nombre, correo, foto, estado
                from Cliente
                where idCliente = '" . $this -> id .  "'";
    }

    public function consultarUlt(){
        return "select idCliente,nombre, correo, foto, estado
                from Cliente order by idCliente DESC limit 3";
    }

    public function Editar(){
        return "update Cliente
                set nombre='".$this -> nombre."',
                foto ='".$this ->foto."'
                where idCliente = '" . $this -> id .  "'";
    }

    public function VerificarPass(){
        return "select idCliente
                from Cliente 
                where idCliente = '" . $this -> id .  "' and clave = '" . md5($this -> clave) . "'";
    }

    public function EditarPass(){
        return "update Cliente
                set clave='".md5($this -> clave)."'
                where idCliente = '" . $this -> id .  "'";
    }

    public function consultarTodos(){
        return "select idCliente,nombre, correo, foto, estado
                from Cliente";
    }

    public function Estado(){
        return "update Cliente
                set estado='".$this -> estado."'
                where idCliente = '" . $this -> id .  "'";
    }

    public function consultarFiltro($filtro)
    {
        return "SELECT * FROM Cliente 
        where (nombre like '%" . $filtro . "%' or correo like '%" . $filtro . "%' or estado like '%" . $filtro . "%' or idCliente like '%" . $filtro . "%') ";
    }

}
