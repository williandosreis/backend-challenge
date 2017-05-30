<?php 

class Usuario_mod extends CI_Model{

	public function cadastrarUsuario($data)
	{
		$this->db->insert("usuario", $data);
	}

}