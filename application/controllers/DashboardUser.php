<?php
class DashboardUser extends CI_Controller {

		public function __construct(){
			parent::__construct();

			// cek keberadaan session 'username'	
			if (!isset($_SESSION['username'])){
				// jika session 'username' blm ada, maka arahkan ke kontroller 'login'
				redirect('login');
			}
		}

		// halaman index dari dashboard -> menampilkan grafik statistik jumlah data buku berdasarkan kategori

        public function index(){

        	// panggil method countByCat() di model book_model untuk menghitung jumlah data buku per kategori untuk ditampilkan di view
        	$data['countBukuTeks'] = $this->book_model->countByCat(1);
        	$data['countMajalah'] = $this->book_model->countByCat('2');
        	$data['countSkripsi'] = $this->book_model->countByCat('3');
        	$data['countThesis'] = $this->book_model->countByCat('4');
        	$data['countDisertasi'] = $this->book_model->countByCat('5');
        	$data['countNovel'] = $this->book_model->countByCat('6');

        	// baca data session 'fullname' untuk ditampilkan di view
        	$data['fullname'] = $_SESSION['fullname'];

        	// tampilkan view 'dashboard/index'
        	$this->load->view('dashboard/headerUser', $data);
            $this->load->view('dashboard/index');
            $this->load->view('dashboard/footer', $data);
        }

        // method untuk menambah data buku
		public function add(){
			// panggil method getKategori() di model_book untuk membaca data list kategori dari tabel kategori untuk ditampilkan ke view
			$data['kategori'] = $this->book_model->getKategori();

			// menghitung jumlah data buku per kategori untuk ditampilkan di view
			$data['countBukuTeks'] = 0;
        	$data['countMajalah'] = 0;
        	$data['countSkripsi'] = 0;
        	$data['countThesis'] = 0;
        	$data['countDisertasi'] = 0;
        	$data['countNovel'] = 0;

        	// baca data session 'fullname' untuk ditampilkan di view
        	$data['fullname'] = $_SESSION['fullname'];

        	// tampilkan view 'dashboard/add'
        	$this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/add', $data);
            $this->load->view('dashboard/footer', $data);
        }

        // method untuk melihat dan menambah data kategori buku
        public function addCat(){
            // panggil method showCat() di category_model untuk membaca data list kategori dari tabel kategori untuk ditampilkan ke view
            $data['kategori'] = $this->category_model->showCat();

            // menghitung jumlah data buku per kategori untuk ditampilkan di view
            $data['countBukuTeks'] = 0;
            $data['countMajalah'] = 0;
            $data['countSkripsi'] = 0;
            $data['countThesis'] = 0;
            $data['countDisertasi'] = 0;
            $data['countNovel'] = 0;

            // baca data session 'fullname' untuk ditampilkan di view
            $data['fullname'] = $_SESSION['fullname'];

            // tampilkan view 'dashboard/category'
            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/addKategori', $data);
            $this->load->view('dashboard/footer', $data);
        }

        // method untuk menampilkan seluruh data buku
        public function books(){

        	// panggil method showBook() dari book_model untuk membaca seluruh data buku
        	$data['book'] = $this->book_model->showBook();
            $data['totalBuku'] = $this->book_model->tampilData()->num_rows();
      		$data['countBukuTeks'] = 0;
        	$data['countMajalah'] = 0;
        	$data['countSkripsi'] = 0;
        	$data['countThesis'] = 0;
        	$data['countDisertasi'] = 0;
        	$data['countNovel'] = 0;

        	// baca data session 'fullname' untuk ditampilkan di view
        	$data['fullname'] = $_SESSION['fullname'];

        	// tampilkan view 'dashboard/books'
        	$this->load->view('dashboard/headerUser', $data);
            $this->load->view('dashboard/booksUser', $data);
            $this->load->view('dashboard/footer', $data);
        }        

        // method untuk melihat dan menambah data kategori buku
        public function addUser(){
            // panggil method showCat() di category_model untuk membaca data list kategori dari tabel kategori untuk ditampilkan ke view
            $data['user'] = $this->user_model->showUser();
            // panggil method getKategori() di model_book untuk membaca data list kategori dari tabel kategori untuk ditampilkan ke view
            $data['role'] = $this->user_model->getRole();

            // menghitung jumlah data buku per kategori untuk ditampilkan di view
            $data['countBukuTeks'] = 0;
            $data['countMajalah'] = 0;
            $data['countSkripsi'] = 0;
            $data['countThesis'] = 0;
            $data['countDisertasi'] = 0;
            $data['countNovel'] = 0;

            // baca data session 'fullname' untuk ditampilkan di view
            $data['fullname'] = $_SESSION['fullname'];

            // tampilkan view 'dashboard/category'
            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/users', $data);
            $this->load->view('dashboard/footer', $data);
        }

        // method untuk proses logout
        public function logout(){
        	// hapus seluruh data session
        	session_destroy();
        	// redirect ke kontroller 'login'
        	redirect('login');
        }
}