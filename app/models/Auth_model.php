<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends MY_Model {

	function __construct()
	{
		parent::__construct();
	}

	//TODO Criar os métodos da biblioteca Auth() aqui.

	// Cria uma nova conta.
	public function insert_account($data)
	{
		$this->db->insert('accounts', $data);
		return $this->db->insert_id();
	}

	// Atualiza uma conta
	public function update_account($data)
	{
		$id = $data['id']; // Recupera o ID.
		unset($data['id']); // Remove o ID do array de atualização.
		$this->db->where('id', $id);
		$this->db->update('accounts', $data);
		return $this->db->affected_rows();
	}

	// Ferifica o login de uma conta
	public function login_account($data)
	{
		$this->db->where('email', $data['email']);
		$this->db->where('password', $data['password']);
		$this->db->where('status', 1);
		$query = $this->db->get('accounts');
		if ($query->num_rows() > 0)
			return $query->row();
		else
			return FALSE;
	}

	// Verifica se o email já existe.
	public function email_exists($email)
	{
		$this->db->select('id');
		$this->db->where('email', $email);
		$num = $this->db->get('accounts')->num_rows();
		return ($num > 0);
	}

	// Verifica se existe alguma conta.
	public function accounts_empty()
	{
		$this->db->select('id');
		$this->db->where('role', 'admin');
		$account = $this->db->get('accounts')->num_rows();
		if($account > 0)
			return FALSE;
		else
			return TRUE;
	}

}