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
        return "insert into logcliente (idcliente,idlog) 
                values (". $this -> idU .",". $this -> udA .")";      
    }

    public function consultar(){
        return "select *
                from log
                where idcliente = '" . $this -> idU .  "'";
    }
}
