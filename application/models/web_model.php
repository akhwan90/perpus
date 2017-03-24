<?php
class Web_model extends CI_Model {

	function getAll($tabel) {
		$q = $this->db->query("SELECT * FROM $tabel");
		return $q->result();
	}
	
	function getSpesific($tabel, $where) {
		$q = $this->db->query("SELECT * FROM $tabel $where");
		return $q->result();	
	}
	
	function getDataByID($tabel, $kunci, $data) {
		$q = $this->db->query("SELECT * FROM $tabel WHERE $kunci='$data'");
		return $q->row();	
	}
	
	function delData($tabel, $field_mana, $id) {
		$q = $this->db->query("DELETE FROM $tabel WHERE $field_mana = '$id'");
		return $q;
	}
	
	function getValueOneField($field, $tabel, $kunci, $data) {
		$q = $this->db->query("SELECT $field FROM $tabel WHERE $kunci='$data'");
		return $q->row();	
	}
	
	function EDIT($q, $id, $tabel, $data) {
		$this->db->where($q, $id);
		$q = $this->db->update($tabel, $data);
		return $q;
	}
	function ADD($tabel, $data) {
		$q = $this->db->insert($tabel, $data);
		return $q;
	}
	
	//qhususon...
	
	//berita
	function getBeritaAll() {
		$q = $this->db->query("SELECT * FROM berita WHERE kategori = '1'");
		return $q->result();
	}
	function getBerita($id) {
		$q = $this->db->query("SELECT * FROM berita WHERE kategori = '1' AND idBerita = '$id'");
		return $q->row();
	}
	function addBerita($data) {
		$q = $this->db->insert('berita', $data);
		return $q;
	}
	function editBerita($id, $data) {
		$this->db->where('idBerita', $id);
		$q = $this->db->update('berita', $data);
		return $q;
	}
	function delBerita($id) {
		$q = $this->db->query("DELETE FROM berita WHERE idBerita = '$id'");
		return $q;
	}
	function pubBerita($id) {
		$q = $this->db->query("UPDATE berita SET publish = '1' WHERE idBerita = '$id'");
		return $q;
	}
	function unPubBerita($id) {
		$q = $this->db->query("UPDATE berita SET publish = '0' WHERE idBerita = '$id'");
		return $q;
	}	
	
	//pengumuman	

	function getPengumumanAll() {
		$q = $this->db->query("SELECT * FROM berita WHERE kategori = '2'");
		return $q->result();
	}
	function getPengumuman($id) {
		$q = $this->db->query("SELECT * FROM berita WHERE kategori = '2' AND idBerita = '$id'");
		return $q->row();
	}
	function addPengumuman($data) {
		$q = $this->db->insert('berita', $data);
		return $q;
	}
	function editPengumuman($id, $data) {
		$this->db->where('idBerita', $id);
		$q = $this->db->update('berita', $data);
		return $q;
	}
	
	
	
	function getFieldTable($tabel, $field, $id, $id_value) {
		$q = $this->db->query("SELECT $field FROM $tabel WHERE $id = $id_value");
		return $q->row();
	}
	
	
	//Profil
	function addProfil($data) {
		$q = $this->db->insert('halaman', $data);
		return $q;
	}
	function editProfil($id, $data) {
		$this->db->where('id', $id);
		$q = $this->db->update('halaman', $data);
		return $q;
	}
	
	//Galeri 
	function getKategoriGaleri() {
		$q 	= $this->db->query("select * from galeriKategori");
		return $q->result();
	}
	function addAlbum($data) {
		$q = $this->db->insert('galerikategori', $data);
		return $q;
	}
	function getFileFoto($idAlbum) {
		$q 	= $this->db->query("select file from galeri where kategori = '".$idAlbum."' ");
		return $q->result();
	}
	function editNamaAlbum($id, $data) {
		$this->db->where('idKategori', $id);
		$q = $this->db->update('galerikategori', $data);
		return $q;
	}
	function uploadFoto($data) {
		$q = $this->db->insert('galeri', $data);
		return $q;
	}
	
		//qhususon...
	
	public function validate(){
        // grab user input
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
         
        // Prep the query
        $this->db->where('u', $username);
        $this->db->where('p', $password);
         
        // Run the query
        $query = $this->db->get('user');
        // Let's check if there are any results
        if($query->num_rows == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();
            $data = array(
                    'user' => $row->u,
                    'pass' => $row->p,
                    'name' => $row->nama,
                    'level' => $row->hakAkses,
					'validated' => true
                    );
            $this->session->set_userdata($data);
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }

	
}
?>
