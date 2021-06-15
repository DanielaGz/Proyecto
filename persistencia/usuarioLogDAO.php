<?php 

class UsuarioLogDAO
{
    private $idU;
    private $udA;
 
    public function UsuarioLogDAO($idU = "", $udA = "")
    {
        $this -> idU = $idU;
        $this -> udA = $udA;
    }

    /* Insertar */

    public function insertar(){
        return "Insert into logcliente (idCliente,idLog) 
                values (". $this -> idU .",". $this -> udA .")";      
    }

    public function consultar(){
        return "select *
                from log
                where idCliente = '" . $this -> idU .  "'";
    }
}
