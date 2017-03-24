<?php
$mode	= $this->uri->segment(3);

if ($mode == "edt" || $mode == "act_edt") {
	$act		= "act_edt";
	$idp		= $datpil->id;
	$id_kelas	= $datpil->id_kelas;
	$id_jenis	= $datpil->id_jenis;
	$judul		= $datpil->judul;
	$pengarang	= $datpil->pengarang;
	$penerbit	= $datpil->penerbit;
	$th_terbit	= $datpil->th_terbit;
	$isbn		= $datpil->isbn;
	$jml_hal	= $datpil->jml_hal;
	$asal_perolehan	= $datpil->asal_perolehan;
	$harga		= $datpil->harga;
	$id_lokasi	= $datpil->id_lokasi;
	$stat		= $datpil->stat;
	$deskripsi	= $datpil->deskripsi;
} else {
	$act		= "act_add";
	$idp		= "";
	$id_kelas	= "";
	$id_jenis	= "";
	$judul		= "";
	$pengarang	= "";
	$penerbit	= "";
	$th_terbit	= "";
	$isbn		= "";
	$jml_hal	= "";
	$asal_perolehan	= "";
	$harga		= "";
	$id_lokasi	= "";
	$stat		= "";
	$deskripsi	= "";
}
?>
<form action="<?=base_URL()?>apps/buku/<?=$act?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">	
<input type="hidden" name="idp" value="<?=$idp?>">

	<fieldset><legend>Form</legend>
	<?php echo $this->session->flashdata("k");?>
	<label style="width: 150px; float: left">Kelas</label>
	<select name="id_kelas"><option value="">[Pilih Kelas]</option>
	<?php 
	$q_kelas	= $this->db->query("SELECT * FROM r_kelas ORDER BY id ASC")->result();
	if (!empty($q_kelas)) {
		foreach($q_kelas as $qk) {
			if ($id_kelas == $qk->id) {
				echo "<option value='".$qk->id."' selected>(".$qk->id.") ".$qk->nama."</option>";
			} else {
				echo "<option value='".$qk->id."'>(".$qk->id.") ".$qk->nama."</option>";
			}
		}
	}
	?>
	</select>
	<br>
	<label style="width: 150px; float: left">Jenis</label>
	<select name="id_jenis"><option value="">[Pilih Jenis]</option>
	<?php 
	$q_jenis	= $this->db->query("SELECT * FROM r_jenis ORDER BY id ASC")->result();
	if (!empty($q_jenis)) {
		foreach($q_jenis as $qj) {
			if ($id_jenis == $qj->id) {
				echo "<option value='".$qj->id."' selected>(".$qj->id.") ".$qj->nama."</option>";
			} else {
				echo "<option value='".$qj->id."'>(".$qj->id.") ".$qj->nama."</option>";
			}
		}
	}
	?>
	</select>
	<br>
	
	<label style="width: 150px; float: left">Judul Buku</label><input class="span8" type="text" name="judul" placeholder="Judul" value="<?=$judul?>" required><br>
	<?php 
	if ($mode == "add") {
	?>
	<label style="width: 150px; float: left">Jumlah Buku Sama</label><input class="span6" type="text" name="buku_sama" placeholder="Jumlah buku dengan judul, pengarang, penerbit, dan spesifikasi sama" required><br>
	<?php } ?>
	
	<label style="width: 150px; float: left">Pengarang</label><input class="span8" type="text" name="pengarang" placeholder="Pengarang" value="<?=$pengarang?>" required><br>
	<label style="width: 150px; float: left">Penerbit</label><input class="span8" type="text" name="penerbit" placeholder="Penerbit" value="<?=$penerbit?>" required><br>
	<label style="width: 150px; float: left">Tahun Terbit</label><input class="span4" type="text" name="th_terbit" placeholder="Tahun Terbit" value="<?=$th_terbit?>" required><br>
	<label style="width: 150px; float: left">I S B N</label><input class="span6" type="text" name="isbn" placeholder="I S B N" value="<?=$isbn?>" required><br>
	<label style="width: 150px; float: left">Jumlah Halaman</label><input class="span3" type="text" name="jml_hal" placeholder="Jumlah Hal" value="<?=$jml_hal?>" required><br>
	<label style="width: 150px; float: left">Asal Perolehan</label><input class="span6" type="text" name="asal_perolehan" placeholder="Asal Perolehan" value="<?=$asal_perolehan?>" required><br>
	<label style="width: 150px; float: left">Harga</label><input class="span4" type="text" name="harga" placeholder="Harga" value="<?=$harga?>" required><br>
	<label style="width: 150px; float: left">Lokasi Buku</label>
	<select name="id_lokasi"><option value="">[Pilih Lokasi]</option>
	<?php 
	$q_lokasi	= $this->db->query("SELECT * FROM r_lokasi ORDER BY id ASC")->result();
	if (!empty($q_lokasi)) {
		foreach($q_lokasi as $ql) {
			if ($id_lokasi == $ql->id) {
				echo "<option value='".$ql->id."' selected>(".$ql->id.") ".$ql->nama."</option>";
			} else {
				echo "<option value='".$ql->id."'>(".$ql->id.") ".$ql->nama."</option>";
			}
		}
	}
	?>
	</select>
	<br>
	<label style="width: 150px; float: left">Kondisi Buku</label>
	<select name="stat"><option value="">[Pilih Kondisi]</option>
	<?php 
	$kondisi_v	= array('B', 'RR', 'RB', 'H');
	$kondisi_p	= array('Baik', 'Rusak Ringan', 'Rusak Berat', 'Hilang');
	
	for ($z = 0; $z < sizeof($kondisi_p); $z++) {
		if ($kondisi_v[$z] == $stat) {
			echo "<option value='".$kondisi_v[$z]."' selected>".$kondisi_p[$z]."</option>";
		} else {
			echo "<option value='".$kondisi_v[$z]."'>".$kondisi_p[$z]."</option>";
		}
	}
	?>
	</select>
	<br>
	<label style="width: 150px; height: 10px;">Deskripsi</label><br><textarea rows="3" class="span10" name="deskripsi" id="textarea"><?=$deskripsi?></textarea><br>
	
	
	
	<button type="submit" class="btn btn-primary">Submit</button>
	</fieldset>
</form>