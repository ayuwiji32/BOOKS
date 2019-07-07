<?php

class User_model extends CI_Model {

	// method untuk membaca data profile user berdasar username
	public function getUserProfile($username){
		$query = $this->db->get_where('users', array('username' => $username));
		return $query->row_array();
	}

	// method hapus data buku berdasarkan id
	public function delUser($id){
		$this->db->delete('users', array("username" => $id));
		// arahkan ke method 'books' di kontroller 'dashboard'
		//redirect('dashboard/books');
	}

	// method untuk tambah data buku
	public function insertUser($uname, $pass, $fullname, $role){
		$data = array(
			"username" =>$uname,
			"password" => $pass,
			"fullname" => $fullname,
			"role" => $role
	);
		$query = $this->db->insert('users', $data);
	}

	public function updateUser($uname, $pass, $fullname, $role){
		$data = array (
			"username" => $uname,
			"password" => $pass,
			"fullname" => $fullname,
			"role" => $role

			);

		$this->db->where('username', $uname);
		$query =$this->db->update('users', $data);
 		
	}

	public function showUser($id = false){
		// membaca semua data kategori buku dari tabel 'kategori'
		if ($id == false){
			$query = $this->db->get('users');
			return $query->result_array();
		} else {
			// membaca data kategori buku berdasarkan id
			$query = $this->db->get_where('users', array("username" => $id));
			return $query->row_array();
		}
	}

	public function getRole(){

		$query = $this->db->get('users');
		return $query->result_array();
	}

	public function getRoles(){

		$query = $this->db->get('role');
		return $query->result_array();
	}
	
}

?>