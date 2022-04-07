<?php 

namespace App\Controllers;
use App\Models\Order;
use App\Authentication\Validator;
use Symfony\Component\Routing\RouteCollection;

class OrdiniController
{
    // Homepage action
	public function indexAction(string $codice)
	{
		$this->validator=new Validator();
		if($this->validator->VerifyLogin()){
			$ordini=new Order();
            if($ordini->read_open_order($codice)==200){
				$righe=$ordini->get_righe($ordini->getCodice());
			}
        	require_once APP_ROOT . '/views/ordini.php';
		}else{
			http_response_code(401);
			header("Location: /corso/login/");exit();
		}
		
	}

	public function createOrder()
	{
		$codice=$_POST["codice"];
		$giorno_pub=$_POST['giorno_pub'];
		$mese_pub=$_POST['mese_pub'];
		$anno_pub=$_POST['anno_pub'];
		$cod_fornitore=$_POST['cod_fornitore'];

		$this->validator=new Validator();
		if($this->validator->VerifyLogin()){
			$ordini=new Order();
			//$u_name_pubblicato=(json_decode($_SESSION['user'])->u_name);

			echo ($ordini->create_order($codice,$giorno_pub,$mese_pub,$anno_pub,"MattiaB",$cod_fornitore));
		}else{
			http_response_code(401);
			header("Location: /corso/login/");exit();
		}
	}

	public function closeOrder()
	{

	}

	public function InsertRiga()
	{
		$this->validator=new Validator();
		if($this->validator->VerifyLogin()){
			$ordini=new Order();
            return($ordini->insert_riga($_POST['cod_prodotto'],$_POST['cod_prodotto_int'],$_POST['descrizione'],$_POST['quantita'],$_POST['codice_ordine']));
		}else{
			http_response_code(401);
			header("Location: /corso/login/");exit();
		}
		
	}

	public function DeleteRiga(string $codice)
	{
		$this->validator=new Validator();
		if($this->validator->VerifyLogin()){
			$ordini=new Order();
            return($ordini->delete_riga($codice));
		}else{
			http_response_code(401);
			header("Location: /corso/login/");exit();
		}
		
	}

	public function CheckCode()
	{
		$this->validator=new Validator();
		if($this->validator->VerifyLogin()){
			$ordini=new Order();
            echo $ordini->get_order($_POST['codice_ordine']);
		}else{
			http_response_code(401);
			header("Location: /corso/login/");exit();
		}
	}

	public function GetPreviousOrders(int $cod_fornitore){
		$this->validator=new Validator();
		$ordini_completi=array();
		$codice_ordine=[
			'codice'=>'',
			'riga'=>NULL
		];


		if($this->validator->VerifyLogin()){
			$ordini=new Order();
			$ordini_chiusi=$ordini->get_closed_orders($cod_fornitore);
			foreach($ordini_chiusi as &$ordine){
				$codice_ordine['riga']=$ordini->get_righe($ordine);
				$codice_ordine['codice']=$ordine;
				array_push($ordini_completi,$codice_ordine);
			}
			echo json_encode($ordini_completi);
		}else{
			http_response_code(401);
			header("Location: /corso/login/");exit();
		}
	}
}