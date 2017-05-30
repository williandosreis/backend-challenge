<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/rest_controller.php';


class Contatos extends REST_Controller{

	public function __construct()
	{
        parent::__construct();
        $this->load->model('Contato_mod');
        session_start();
        
    }

		 
	public function index_get()
	{
		$this->load->view('contatos');
	}

	
	public function cadastrarContato_post()
	{
		$postdata = file_get_contents("php://input");
		$contato  = json_decode($postdata);

		$data = array(
			'nome'      => $contato->nome,
			'telefone'  => $contato->telefone,
			'email'     => $contato->email,
			'idusuario' => $_SESSION["usuario"][0]->idusuario
		);
		
		// verifica se vai cadastrar ou alterar
		if ($contato->idcontato)
		{
			$this->Contato_mod->updateContato($contato->idcontato, $data);
		}
		else
		{
			$this->Contato_mod->cadastrarContato($data);
		}	
		
			
	}

	public function getContatos_get()
	{
		$contatos = $this->Contato_mod->getContatos();

		print(json_encode($contatos));
	}	

	public function deleteContato_post()
	{
		$postdata  = file_get_contents("php://input");
		$idcontato = json_decode($postdata);

		$this->Contato_mod->deleteContato($idcontato);
	}

	public function buscarContato_post()
	{

		$postdata   = file_get_contents("php://input");
		$idcontato  = json_decode($postdata);
		
		$res = $this->Contato_mod->buscarContato($idcontato);
			
		$this->response($res); 
		
	}

	public function autoContato_post()
	{
			
		$postdata      = file_get_contents("php://input");
		$request       = json_decode($postdata);
		
		$buscarContato  = $request->buscarContato;
		$res = $this->Contato_mod->autoContato($buscarContato);

		print(json_encode($res));
	}	

	// destroi a sessão
	public function sair_get()
	{
		session_destroy();
	}

}	