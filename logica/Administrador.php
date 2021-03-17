<?php
require_once "persistencia/Conexion.php";
require_once "persistencia/AdministradorDAO.php";
class Administrador{
    private $id;
    private $nombre;
    private $correo;
    private $clave;
    private $foto;
    private $conexion;
    private $adminDAO;
 
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
    public function Administrador($id = "", $nombre = "", $correo = "", $clave = "", $foto = ""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> foto = $foto;
        $this -> conexion = new Conexion();
        $this -> adminDAO = new AdministradorDAO($this -> id, $this -> nombre, $this -> correo, $this -> clave, $this -> foto);
    }

    /* Registro */
    
    public function existeCorreo(){
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> adminDAO -> existeCorreo());        
        $this -> conexion -> cerrar();        
        return $this -> conexion -> numFilas();
    }

    public function insertar(){
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> adminDAO -> insertar());        
        $this -> conexion -> cerrar();        
    }

    public function autenticar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> adminDAO -> autenticar());
        $this -> conexion -> cerrar();       
        if ($this -> conexion -> numFilas() == 1){            
            $resultado = $this -> conexion -> extraer();
            $this -> id = $resultado[0];          
            return true;        
        }else {
            return false;
        }
    }
    
    public function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> adminDAO -> consultar());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        $this -> id = $resultado[0];
        $this -> nombre = $resultado[1];
        $this -> correo = $resultado[2];
        $this -> foto = $resultado[3];
    }

    public function Editar(){
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> adminDAO -> Editar());        
        $this -> conexion -> cerrar(); 
    }

    public function VerificarPass(){
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> adminDAO -> VerificarPass());        
        $this -> conexion -> cerrar(); 
        if ($this -> conexion -> numFilas() == 1){            
            $resultado = $this -> conexion -> extraer();
            $this -> id = $resultado[0];          
            return true;        
        }else {
            return false;
        }
    }

    public function EditarPass(){
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> adminDAO -> EditarPass());        
        $this -> conexion -> cerrar(); 
    }
    

}

?>