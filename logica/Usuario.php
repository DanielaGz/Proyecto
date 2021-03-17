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

    public function Usuario($id = "", $nombre = "", $correo = "", $clave = "", $foto = "", $estado =""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> foto = $foto;
        $this -> estado = $estado;
        $this -> conexion = new Conexion();
        $this -> usuarioDAO = new UsuarioDAO($this -> id, $this -> nombre, $this -> correo, $this -> clave, $this -> foto, $this -> estado);
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
        $this -> correo = $resultado[2];
        $this -> foto = $resultado[3];
        $this -> estado = $resultado[4];
    }

    public function Editar(){
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> usuarioDAO -> Editar());        
        $this -> conexion -> cerrar(); 
    }

    public function VerificarPass(){
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> usuarioDAO -> VerificarPass());        
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
        $this -> conexion -> ejecutar($this -> usuarioDAO -> EditarPass());        
        $this -> conexion -> cerrar(); 
    }
    
    public function consultarUlt(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> consultarUlt());
        $pag = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            $c = new Usuario($resultado[0], $resultado[1], $resultado[2],$resultado[3],$resultado[4]);
            array_push($pag, $c);
        }
        $this -> conexion -> cerrar();
        return $pag;
    }

    public function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> consultarTodos());
        $pag = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            $c = new Usuario($resultado[0], $resultado[1], $resultado[2],$resultado[3],$resultado[4]);
            array_push($pag, $c);
        }
        $this -> conexion -> cerrar();
        return $pag;
    }

    public function Estado(){
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> usuarioDAO -> Estado());        
        $this -> conexion -> cerrar(); 
    }

    public function consultarFiltro($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> usuarioDAO -> consultarFiltro($filtro));
        $pag = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            $c = new Usuario($resultado[0], $resultado[1], $resultado[2],$resultado[3],$resultado[4]);
            array_push($pag, $c);
        }
        $this -> conexion -> cerrar();
        return $pag;
    }

}

?>