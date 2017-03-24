<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function getJenis($id) {
	$CI =& get_instance();
	$q_ambil	= $CI->db->query("SELECT nama FROM r_jenis WHERE id = '$id'")->row();
	return $q_ambil->nama;
}
function getLokasi($id) {
	$CI =& get_instance();
	$q_ambil	= $CI->db->query("SELECT nama FROM r_lokasi WHERE id = '$id'")->row();
	return $q_ambil->nama;
}
function getKelas($id) {
	$CI =& get_instance();
	$q_ambil	= $CI->db->query("SELECT nama FROM r_kelas WHERE id = '$id'")->row();
	return $q_ambil->nama;
}
function getNama($id) {
	$CI =& get_instance();
	$q_ambil	= $CI->db->query("SELECT nama FROM t_anggota WHERE id = '$id'")->row();
	return $q_ambil->nama;
}
function getJudul($id) {
	$CI =& get_instance();
	$q_ambil	= $CI->db->query("SELECT judul FROM t_buku WHERE id = '$id'")->row();
	return $q_ambil->judul;
}

function getAktif ($id) {
	if ($id == "1") {
		return "Aktif";
	} else {
		return "Non Aktif";
	}
}
function adddate($hari) {
	
	$waktu 		= $hari * 2;
	$CI 		=& get_instance();
	$q_ambil	= $CI->db->query("SELECT tanggal FROM r_libur ORDER BY id ASC")->result();
	$jum_libnas	= 0;
	$jum_hari	= 0;
	$jumlah_minggu	= 0;
	
	for ($i = 0; $i <= $waktu; $i++) {
		$tgl	= mktime(0, 0, 0, date("n"), date("j")+$i,  date("Y"));
		foreach($q_ambil as $q) {
			if ($q->tanggal == date('Y-m-d', $tgl)) {
				$jum_libnas++;
			}			
		}
	
	
	if (date("l", $tgl) == "Sunday") {
		$jumlah_minggu++;
	} else {
		if ($jum_hari == $hari) {
			break;
		} else {
			$jum_hari++;
		}
	}
	}
	
	$jumhari	= $jum_hari + $jum_libnas + $jumlah_minggu;
	$nextday	= mktime(0,0,0,date("n"),date("j")+$jumhari,date("Y"));
	
	return date("Y-m-d", $nextday);
}

function tgl_panjang($tgl, $tipe) {
	$tgl_pc 		= explode(" ", $tgl);
	$tgl_depan		= $tgl_pc[0];
	
	$tgl_depan_pc	= explode("-", $tgl_depan);
	$tgl			= $tgl_depan_pc[2];
	$bln			= $tgl_depan_pc[1];
	$thn			= $tgl_depan_pc[0];
	
	if ($tipe == "lm") {
		if ($bln == "01") { $bln_txt = "Januari"; }  
		else if ($bln == "02") { $bln_txt = "Februari"; }  
		else if ($bln == "03") { $bln_txt = "Maret"; }  
		else if ($bln == "04") { $bln_txt = "April"; }  
		else if ($bln == "05") { $bln_txt = "Mei"; }  
		else if ($bln == "06") { $bln_txt = "Juni"; }  
		else if ($bln == "07") { $bln_txt = "Juli"; }  
		else if ($bln == "08") { $bln_txt = "Agustus"; }  
		else if ($bln == "09") { $bln_txt = "September"; }  
		else if ($bln == "10") { $bln_txt = "Oktober"; }  
		else if ($bln == "11") { $bln_txt = "November"; }  
		else if ($bln == "12") { $bln_txt = "Desember"; }  
	} else if ($tipe == "sm") {
		if ($bln == "01") { $bln_txt = "Jan"; }  
		else if ($bln == "02") { $bln_txt = "Feb"; }  
		else if ($bln == "03") { $bln_txt = "Mar"; }  
		else if ($bln == "04") { $bln_txt = "Apr"; }  
		else if ($bln == "05") { $bln_txt = "Mei"; }  
		else if ($bln == "06") { $bln_txt = "Jun"; }  
		else if ($bln == "07") { $bln_txt = "Jul"; }  
		else if ($bln == "08") { $bln_txt = "Ags"; }  
		else if ($bln == "09") { $bln_txt = "Sep"; }  
		else if ($bln == "10") { $bln_txt = "Okt"; }  
		else if ($bln == "11") { $bln_txt = "Nov"; }  
		else if ($bln == "12") { $bln_txt = "Des"; }  	
	}
	return $tgl." ".$bln_txt." ".$thn;
}


function _null($isi) {
	if ($isi == "" || $isi == 0) {
		return "-";
	} else {
		return $isi;
	}
}
function gambarSmall($up_data, $jenis) {
	$CI =& get_instance();

	/* PATH */
	$source             = "./upload/".$jenis."/".$up_data['file_name'] ;
	$destination_thumb	= "./upload/".$jenis."/small" ;

	// Permission Configuration
	chmod($source, 0777) ;

	/* Resizing Processing */
	// Configuration Of Image Manipulation :: Static
	$CI->load->library('image_lib') ;
	$img['image_library'] = 'GD2';
	$img['create_thumb']  = TRUE;
	$img['maintain_ratio']= TRUE;

	/// Limit Width Resize
	$limit_medium   = 300 ;
	$limit_thumb    = 190;

	// Size Image Limit was using (LIMIT TOP)
	$limit_use  = $up_data['image_width'] > $up_data['image_height'] ? $up_data['image_width'] : $up_data['image_height'] ;

	// Percentase Resize
	if ($limit_use > $limit_medium || $limit_use > $limit_thumb) {
		$percent_medium = $limit_medium/$limit_use ;
		$percent_thumb  = $limit_thumb/$limit_use ;
	}

	//// Making THUMBNAIL ///////
	$img['width']  = $limit_use > $limit_thumb ?  $up_data['image_width'] * $percent_thumb : $up_data['image_width'] ;
	
	$img['height'] = $limit_use > $limit_thumb ?  $up_data['image_height'] * $percent_thumb : $up_data['image_height'] ;

	// Configuration Of Image Manipulation :: Dynamic
	$img['thumb_marker'] = 'S_' ;
	$img['quality']      = '100%' ;
	$img['source_image'] = $source ;
	$img['new_image']    = $destination_thumb ;

	// Do Resizing
	$CI->image_lib->initialize($img);
	$CI->image_lib->resize();
	$CI->image_lib->clear() ;

}
