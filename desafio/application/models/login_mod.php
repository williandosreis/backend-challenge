<?php 

class Login_mod extends CI_Model{

	public function getUser($usuario)
	{
		$this->db->where('usuario', $usuario->usuario);
		$this->db->where('senha',   $usuario->senha);

		$query = $this->db->get('usuario');

		if($query->num_rows() != 0)
        {
           return $query->result();
        }
        else
        {
           return false;
        }
	}

}