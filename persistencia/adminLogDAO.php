<?php 

class AdminLogDAO
{
    private $idU;
    private $udA;
 
    public function AdminLogDAO($idU = "", $udA = "")
    {
        $this -> idU = $idU;
        $this -> udA = $udA;
    }

    /* Insertar */

    public function insertar(){
        return "Insert into logadministrador (idAdministrador,idLog) 
                values (". $this -> idU .",". $this -> udA .")";      
    }

    public function consultar(){
        return "select *
                from log
                where idAdministrador = '" . $this -> idU .  "'";
    }
}
