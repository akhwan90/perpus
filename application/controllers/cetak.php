<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cetak extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
	
	public function index() {
		if($this->session->userdata('validated') == FALSE){
            redirect('apps/login');
        }
		
		echo "Halaman Cetak";
	}
	
	public function anggota() {
		if(! $this->session->userdata('validated')){
            redirect('apps/login');
        }
		
		//view tampilan website\
		$a['data']		= $this->db->query("SELECT * FROM t_anggota ORDER BY id ASC")->result();
		$this->load->view('cetak/kartu_anggota', $a);
	}
	
	public function kunjung_bulan() {
		if(! $this->session->userdata('validated')){
            redirect('apps/login');
        }
		
		//view tampilan website\
		$a['bulan']		= str_pad($this->uri->segment(3), 2, '0', STR_PAD_LEFT);
		
		$this->load->view('cetak/kunjung_bulan', $a);
	}
	
	public function kunjung_hari_ini() {
		if(! $this->session->userdata('validated')){
            redirect('apps/login');
        }
		
		//view tampilan website\
		//$a['bulan']		= str_pad($this->uri->segment(3), 2, '0', STR_PAD_LEFT);
		
		$this->load->view('cetak/kunjung_hari_ini');
	}
	
	
	public function l_peminjam() {
		if(! $this->session->userdata('validated')){
            redirect('apps/login');
        }
		
		$tipe			= $this->uri->segment(3);
		
		$m['page']		= "peminjaman";
		
		if ($tipe == "hariini") {
			$m['data']	= $this->db->query("SELECT * FROM t_trans WHERE tgl_pinjam = LEFT(NOW(), 10)")->result();
			$m['judul']	= "Hari Ini (".date('d F Y').")";
		} else if ($tipe == "bulnini") {
			$m['data']	= $this->db->query("SELECT * FROM t_trans WHERE MID(tgl_pinjam, 6, 2) = MONTH(NOW())")->result();
			$m['judul']	= "Bulan Ini (".date('F Y').")";
		}
		
		$this->load->view('cetak/peminjaman', $m);
	}
	
	public function data_buku() {
		if(! $this->session->userdata('validated')){
            redirect('apps/login');
        }
		
		$m['data']	= $this->db->query("SELECT * FROM t_buku")->result();
		$this->load->view('cetak/buku', $m);
	}
	
	public function data_anggota() {
		if(! $this->session->userdata('validated')){
            redirect('apps/login');
        }
		
		$m['data']	= $this->db->query("SELECT * FROM t_anggota WHERE stat = '1'")->result();
		$this->load->view('cetak/anggota', $m);
	}
}