<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/rest_controller.php';


class Login extends REST_Controller{

	public function __construct()
	{
        parent::__construct();
        $this->load->model('Login_mod');
        
    }

		 
	public function index_get()
	{
		$this->load->view('login');
	}

	public function logar_post()
	{
		$postdata = file_get_contents("php://input");
		$usuario  = json_decode($postdata);

		$res = $this->Login_mod->getUser($usuario);

		if ($res)
		{
			session_start();

			// guarda o usuário logado na sessão, caso tenha encontrado
			// um usuário correspondente ao login e senha digitado no form
			$_SESSION["usuario"] = $res;
		}
		
				
		print(json_encode($res));
	}	
}
