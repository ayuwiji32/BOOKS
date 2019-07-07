 <?php
class Login extends CI_Controller {

		// halaman index untuk kontroller login -> menampilkan view 'login/index'
        public function index()
        {
            $this->load->view('login/index');
        }

        // method untuk proses submit login
        public function submit(){
        	// baca data username dan password dari form login
        	$username = $_POST['username'];
        	$password = $_POST['password'];

        	// panggil method getUserProfile() dari user_model untuk membaca data profile user
        	$data['user'] = $this->user_model->getUserProfile($username);

        	// bandingkan password user dari database dengan yang disubmit via form
        	if ($data['user']['password'] == $password){
        		// jika password sama, maka simpan username dan fullname user ke session
        		$_SESSION['username'] = $username;
        		$_SESSION['fullname'] = $data['user']['fullname'];
                if ($data['user']['role'] == 'admin'){
                    redirect('dashboard');
                } else {
                    redirect('dashboardUser');
                }
        		
        	} else {
        		// jika password tidak sama, arahkan ke kontroler 'login/index' lagi
        		redirect('login/index');
        	}
        }
}