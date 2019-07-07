<?php

class Book_model extends CI_Model {

	// method untuk menampilkan data buku
	public function showBook($id = false){
		// membaca semua data buku dari tabel 'books'
		if ($id == false){
			$query = $this->db->get('books');
			return $query->result_array();
		} else {
			// membaca data buku berdasarkan id
			$query = $this->db->get_where('books', array("idbuku" => $id));
			return $query->row_array();
		}
	}

	// method untuk hapus data buku berdasarkan id
	public function delBook($id){
		$this->db->delete('books', array("idbuku" => $id));
	}


	public function updateBook($idbuku, $judul, $pengarang, $penerbit, $thnterbit, $sinopsis, $idkategori, $filename){
		$data = array (
			"idbuku" => $idbuku,
			"judul" => $judul,
			"pengarang" => $pengarang,
			"penerbit" => $penerbit,
			"sinopsis" => $sinopsis,
			"idkategori" => $idkategori,
			"thnterbit" => $thnterbit,
			"imgfile" => $filename
			);

		$this->db->where('idbuku', $idbuku);
		$query =$this->db->update('books', $data);
 		
	}


	public function tampilData(){
		return $this->db->get('books');
	}

	public function jumlahData(){
		return $this->db->get('books')->num_rows();
	}

	public function updateKategori($idkategori, $kategori){
		$data = array (
			"idkategori" => $idkategori,
			"kategori" => $kategori
			
			);

		$this->db->where('idkategori', $idkategori);
		$this->db->update('kategori', $data);

 		
	}




	// method untuk hapus data buku berdasarkan id
	public function delKategori($idkategori){
		$this->db->delete('kategori', array("idkategori" => $idkategori));
	}
	// method untuk mencari data buku berdasarkan key
	public function findBook($key){

		$query = $this->db->query("SELECT * FROM books WHERE judul LIKE '%$key%' 
									OR pengarang LIKE '%$key%' 
									OR penerbit LIKE '%$key%'
									OR sinopsis LIKE '%$key%'
									OR thnterbit LIKE '%$key%'");
		return $query->result_array();
	}


	public function showKategori($id = false){
		// membaca semua data buku dari tabel 'books'
		if ($id == false){
			$query = $this->db->get('kategori');
			return $query->result_array();
		} else {
			// membaca data buku berdasarkan id
			$query = $this->db->get_where('kategori', array("idkategori" => $id));
			return $query->row_array();
		}
	}
	// method untuk insert data buku ke tabel 'books'
	public function insertBook($judul, $pengarang, $penerbit, $thnterbit, $sinopsis, $idkategori, $filename){
		$data = array(
					"judul" => $judul,
					"pengarang" => $pengarang,
					"penerbit" => $penerbit,
					"sinopsis" => $sinopsis,
					"idkategori" => $idkategori,
					"thnterbit" => $thnterbit,
					"imgfile" => $filename
		);
		$query = $this->db->insert('books', $data);
	}


	// method untuk membaca data kategori buku dari tabel 'kategori'
	public function getKategori(){
		$query = $this->db->get('kategori');
		return $query->result_array();
	}


	// method untuk membaca data kategori buku dari tabel 'kategori'
	public function insertKategori($kategori){
		$data = array("kategori" => $kategori);
		$query = $this->db->insert('kategori', $data);
	}
	// method untuk menghitung jumlah buku berdasarkan idkategori
	public function countByCat($idkategori){
		$query = $this->db->query("SELECT count(*) as jum FROM books WHERE idkategori = '$idkategori'");
		return $query->row()->jum;
	}

	// method untuk menghitung jumlah buku berdasarkan idkategori
	public function countByBook(){
		$query = $this->db->query("SELECT count(*) as jum FROM books");
		return $query->row()->jum;
	}

}
?>