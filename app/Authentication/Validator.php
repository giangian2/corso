<?php
namespace App\Authentication;
use App\Models\User;

class Validator
{
    function __constructor(){
        
    }

    public function VerifyLogin(){
        if(isset($_SESSION['loggedin']))
            return true;
        else
            return false;
			
    }

    /*GRAZIE A QUESTA FUNZIONE E' POSSIBILE ,UTILIZZANDOLA  ALL' INTERNO DEI CONTROLLER,
    SCEGLIERE IL TIPO DI RUOLO RICHIESTO (RIFERITO ALL'UTENTE) PER POTER ESEGUIRE UNA DETERMINATA FUNZIONE */
    public function VerifyPrivileges(string $role){
        if($this->VerifyLogin()){
            $obj=json_decode($_SESSION['user']);
            if($obj->ruolo==$role)
                return true;
            else
                return false;
        }else{
            return false;
        }
    }
}
?>