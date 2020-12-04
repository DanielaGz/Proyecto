<?php
require_once "persistencia/Conexion.php";
require_once "persistencia/UsuarioDAO.php";
class Usuario{
    private $id;
    private $nombre;
    private $correo;
    private $clave;
    private $foto;
    private $conexion;
    private $usuarioDAO;
 
    public function getId(){
        return $this -> id;
    }

    public function getNombre(){
        return $this -> nombre;
    }

    public function getCorreo(){
        return $this -> correo;
    }

    public function getClave(){
        return $this -> clave;
    }

    public function getFoto(){
        return $this -> foto;
    }
    public function Usuario($id = "", $nombre = "", $correo = "", $clave = "", $foto = ""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> foto = $foto;
        $this -> conexion = new Conexion();
        $this -> usuarioDAO = new UsuarioDAO($this -> id, $this -> nombre, $this -> correo, $this -> clave, $this -> foto);
    }

    /* Registro */
    
    public function existeCorreo(){
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> usuarioDAO -> existeCorreo());        
        $this -> conexion -> cerrar();        
        return $this -> conexion -> numFilas();
    }

    public function insertar(){
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> usuarioDAO -> insertar());        
        $this -> conexion -> cerrar();        
    }

    public function autenticar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> autenticar());
        $this -> conexion -> cerrar();       
        if ($this -> conexion -> numFilas() == 1){            
            $resultado = $this -> conexion -> extraer();
            $this -> id = $resultado[0];
            $this -> estado = $resultado[1];             
            return true;        
        }else {
            return false;
        }
    }
    
    public function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> consultar());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        $this -> id = $resultado[0];
        $this -> nombre = $resultado[1];
        $this -> correo = $resultado[1];
        $this -> foto = $resultado[2];
    }

    

}

?>