<?php 

namespace App\Controllers;

use App\Models\Fornitore;
use App\Authentication\Validator;
use Symfony\Component\Routing\RouteCollection;

class FornitoriController
{
	protected $validator;
    // Homepage action
	public function indexAction(RouteCollection $routes)
	{
		$this->validator=new Validator();
		if($this->validator->VerifyLogin()){
			$fornitore=new Fornitore();
			$fornitori=$fornitore->read_all();
			http_response_code(200);
        	require_once APP_ROOT . '/views/fornitori.php';
			
		}else{
			http_response_code(401);
			header("Location: /corso/login/");exit();
		}
	}

	public function deleteFornitore(RouteCollection $routes)
	{
		$this->validator=new Validator();
		if($this->validator->VerifyLogin()){
			if($this->validator->VerifyPrivileges("admin")){
				$codice=$_POST['codFornitore'];
				$fornitore=new Fornitore();
				http_response_code(200);
				return $fornitore->delete($codice);
			}else{
				http_response_code(401);
				require_once APP_ROOT . '/views/401.php';
			}
		}else{
			http_response_code(401);
			header("Location: /corso/login/");exit();
		}	
	}

	public function addFornitore(RouteCollection $routes){
		$this->validator=new Validator();
		if($this->validator->VerifyLogin()){
			if($this->validator->VerifyPrivileges("admin")){
				$fornitore=new Fornitore();
				return $fornitore->insert($_POST["descrizione"],$_POST["note"],$_POST["mail"]);
			}else{
				http_response_code(401);
				require_once APP_ROOT . '/views/401.php';
			}
		}else{
			http_response_code(401);
			header("Location: /corso/login/");exit();
		}
	}
}