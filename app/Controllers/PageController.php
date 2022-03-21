<?php 

namespace App\Controllers;
use App\Authentication\Validator;
use Symfony\Component\Routing\RouteCollection;

class PageController
{
    // Homepage action
	public function indexAction(RouteCollection $routes)
	{
		$this->validator=new Validator();
		if($this->validator->VerifyLogin()){
			require_once APP_ROOT . '/views/home.php';
		}else{
			http_response_code(401);
			header("Location: /corso/login/");exit();
		}
	}
}