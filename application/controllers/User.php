<?php
class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		// cek keberadaan session 'username'	
		if (!isset($_SESSION['username'])){
			// jika session 'username' blm ada, maka arahkan ke kontroller 'login'
			redirect('login');
		}
	}


	public function delete($id){
		$this->user_model->delUser($id);
		redirect('dashboard/user');
	}

	// method untuk tambah data buku
	public function insertUser(){

		// baca data dari form insert buku
		$uname = $_POST['uname'];
		$pass = $_POST['pass'];
		$fullname = $_POST['fullname'];
		$role = $_POST['role'];
		

		// panggil method insertBook() di model 'book_model' untuk menjalankan query insert
		$this->user_model->insertUser($uname, $pass, $fullname, $role);

		// arahkan ke method 'books' di kontroller 'dashboard'
		redirect('dashboard/user');
	}

	public function edit($username){
		$data['view_user'] = $this->user_model->showUser($username);

		$data['role'] = $this->user_model->getRole();

		// ambil session fullname untuk ditampilkan ke header
		$data['fullname'] = $_SESSION['fullname'];

		if (empty($data['view_user'])){
			show_404();
				}

				$data['username'] = $data['view_user']['username'];
				$data['password'] = $data['view_user']['password'];
        		$data['fullname'] = $data['view_user']['fullname'];
        		$data['role'] = $data['view_user']['role'];
        		

		// tampilkan hasil pencarian di view 'dashboard/books'
		$this->load->view('dashboard/header', $data);
        $this->load->view('dashboard/edituser', $data);
        $this->load->view('dashboard/footer');
	}

	

	// method untuk update data buku berdasarkan id
	function update(){
		
		// baca data dari form insert buku
		$username = $_POST['username'];
		$password = $_POST['password'];
		$fullname = $_POST['fullname'];
		$role = $_POST['role'];

		// panggil method insertBook() di model 'book_model' untuk menjalankan query insert
		
		$this->user_model->updateUser($username, $password, $fullname, $role);

		// arahkan ke method 'books' di kontroller 'dashboard'
		redirect('dashboard/user');
	}



}
?>