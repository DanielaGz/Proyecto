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
    private $estado;
 
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

    public function getEstado(){
        return $this -> estado;
    }

    public function Administrador($id = "", $nombre = "", $correo = "", $clave = "", $foto = "", $estado=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> foto = $foto;
        $this -> estado = $estado;
        $this -> conexion = new Conexion();
        $this -> adminDAO = new AdministradorDAO($this -> id, $this -> nombre, $this -> correo, $this -> clave, $this -> foto, $this -> estado);
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
            $this -> estado = $resultado[1];          
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
        $this -> estado = $resultado[4];
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

    public function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> adminDAO -> consultarTodos());
        $pag = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            $c = new Administrador($resultado[0], $resultado[1], $resultado[2],$resultado[3],$resultado[4]);
            array_push($pag, $c);
        }
        $this -> conexion -> cerrar();
        return $pag;
    }

    public function consultarFiltro($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> adminDAO -> consultarFiltro($filtro));
        $pag = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            $c = new Administrador($resultado[0], $resultado[1], $resultado[2],$resultado[3],$resultado[4]);
            array_push($pag, $c);
        }
        $this -> conexion -> cerrar();
        return $pag;
    }
    
    public function Estado(){
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> adminDAO -> Estado());        
        $this -> conexion -> cerrar(); 
    }

}

?>