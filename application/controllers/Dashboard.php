<?php
class Dashboard extends CI_Controller {

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
        	$this->load->view('dashboard/header', $data);
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
        	$data['countSkripsi'] =  0;
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

        public function addKategori(){
            // panggil method getKategori() di model_book untuk membaca data list kategori dari tabel kategori untuk ditampilkan ke view
            $data['kategori'] = $this->book_model->getKategori();

            // baca data session 'fullname' untuk ditampilkan di view
            $data['fullname'] = $_SESSION['fullname'];

            // tampilkan view 'dashboard/add'
            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/addKategori', $data);
            $this->load->view('dashboard/footer', $data);
        }


        // method untuk menampilkan seluruh data buku
        public function books(){
            $data['totalBuku'] = $this->book_model->tampilData()->num_rows();
        	// panggil method showBook() dari book_model untuk membaca seluruh data buku
        	$data['book'] = $this->book_model->showBook();
            $data['kategori'] = $this->book_model->showKategori();
            $data['jum'] = $this->book_model->countByBook();

      		$data['countBukuTeks'] = 0;
        	$data['countMajalah'] = 0;
        	$data['countSkripsi'] = 0;
        	$data['countThesis'] = 0;
        	$data['countDisertasi'] = 0;
        	$data['countNovel'] = 0;


            //konfigurasi pagination
        $config['base_url'] = base_url('index.php/dashboard/books'); //site url
        $config['total_rows'] = $this->book_model->jumlahData(); //total row
        $config['per_page'] = 5;  //show record per halaman
       
 
        // Membuat Style pagination untuk BootStrap v4
      $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $from =  $this->uri->segment(3);
        $data['book'] = $this->book_model->showBook($id = false, $config["per_page"], $from);           
        



        	// baca data session 'fullname' untuk ditampilkan di view
        	$data['fullname'] = $_SESSION['fullname'];

        	// tampilkan view 'dashboard/books'
        	$this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/books', $data);
            $this->load->view('dashboard/footer', $data);
        }     

        
        public function user(){

            // baca data session 'fullname' untuk ditampilkan di view
            $data['fullname'] = $_SESSION['fullname'];

            // panggil method getKategori() di model_book untuk membaca data list kategori dari tabel kategori untuk ditampilkan ke view
            $data['users'] = $this->user_model->getRole();
            $data['role'] = $this->user_model->getRoles();

            // tampilkan view 'dashboard/add'
            $this->load->view('dashboard/header', $data);
            $this->load->view('dashboard/user', $data);
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