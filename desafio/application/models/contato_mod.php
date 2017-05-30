<?php 

class Contato_mod extends CI_Model{

	public function cadastrarContato($data)
	{
		$this->db->insert("contatos", $data);
	}

	public function updateContato($idcontato, $data)
	{
		$this->db->where('idcontato', $idcontato);
		$this->db->update('contatos', $data);
	}

	public function getContatos()
	{
		$this->db->where('idusuario', $_SESSION["usuario"][0]->idusuario);
		
		$query = $this->db->get('contatos');

		if($query->num_rows() != 0)
        {
           return $query->result();
        }
        else
        {
           return false;
        }
	}

	public function deleteContato($idcontato)
	{
		$this->db->where('idcontato', $idcontato);
		$this->db->delete('contatos');
	}

	public function buscarContato($idcontato)
	{
		if ($idcontato)
		{
			$this->db->where('idcontato', $idcontato);
		}

		$this->db->where('idusuario', $_SESSION["usuario"][0]->idusuario);

		$query = $this->db->get('contatos');
		
				
		if($query->num_rows() != 0)
        {
           return $query->result();
        }
        else
        {
           return false;
        }
	}

	public function autoContato($buscarContato)
	{
		$this->db->where('idusuario', $_SESSION["usuario"][0]->idusuario);
		
		$this->db->like('nome', $buscarContato);
		$query = $this->db->get('contatos');
		
		return $query->result();
	}

}