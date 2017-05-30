<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/rest_controller.php';


class Usuario extends REST_Controller{

	public function __construct()
	{
        parent::__construct();
        $this->load->model('Usuario_mod');
       
    }
		 
	
	public function cadastrarUsuario_post()
	{
		$postdata = file_get_contents("php://input");
		$usuario  = json_decode($postdata);

		$data = array(
			'nome'     => $usuario->nome,
			'usuario'  => $usuario->user,
			'senha'    => $usuario->password,
			'telefone' => $usuario->telefone,
			'email'    => $usuario->email
		);
		
		$this->Usuario_mod->cadastrarUsuario($data);
			
	}	
}
