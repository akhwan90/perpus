<?php
$mode	= $this->uri->segment(3);

if ($mode == "edt" || $mode == "act_edt") {
	$act		= "act_edt";
	$idp		= $datpil->id;
	$nama		= $datpil->nama;
	$alamat		= $datpil->alamat;
	$jk			= $datpil->jk;
	$agama		= $datpil->agama;
	$tmp_lahir	= $datpil->tmp_lahir;
	$tgl_lahir	= $datpil->tgl_lahir;
	
	$tg			= substr($tgl_lahir, 8, 2);
	$bl			= substr($tgl_lahir, 5, 2);
	$th			= substr($tgl_lahir, 0, 4);
	
	$jenis		= $datpil->jenis;
	$status		= $datpil->stat;
	
} else {
	$act		= "act_add";
	$idp		= "";
	$nama		= "";
	$alamat		= "";
	$jk			= "";
	$agama		= "";
	$tmp_lahir	= "";
	$tgl_lahir	= "";
	$jenis		= "";
	$status		= "";
}
?>
<form action="<?=base_URL()?>apps/anggota/<?=$act?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">	
<input type="hidden" name="idp" value="<?=$idp?>">

	<fieldset><legend>Form</legend>
	<?php echo $this->session->flashdata("k");?>
	
	<label style="width: 150px; float: left">Nama</label><input class="span8" type="text" name="nama" placeholder="Nama" value="<?=$nama?>" required><br>
	<label style="width: 150px; float: left">Alamat</label><input class="span8" type="text" name="alamat" placeholder="Alamat" value="<?=$alamat?>" required><br>
	<label style="width: 150px; float: left">Jenis Kelamin</label>
	<select name="jk"><option value="">[Jns Kel]</option>
	<?php 
	$jk_p		= array("L", "P");
	$agama_p	= array("Islam", "Kristen", "Katolik", "Hindu", "Budha");
	$jenis_p	= array("Mahasiswa", "Dosen");
	
	for($a = 0; $a < sizeof($jk_p); $a++) {
		if ($jk == $jk_p[$a]) {
			echo "<option value='".$jk_p[$a]."' selected>".$jk_p[$a]."</option>";
		} else {
			echo "<option value='".$jk_p[$a]."'>".$jk_p[$a]."</option>";
		}		
	}
	?>
	</select>
	<br>
	<label style="width: 150px; float: left">Agama</label>
	<select name="agama"><option value="">[Agama]</option>
	<?php 
	for($b = 0; $b < sizeof($agama_p); $b++) {
		if ($agama == $agama_p[$b]) {
			echo "<option value='".$agama_p[$b]."' selected>".$agama_p[$b]."</option>";
		} else {
			echo "<option value='".$agama_p[$b]."'>".$agama_p[$b]."</option>";
		}		
	}
	?>
	</select>
	<br>
	<label style="width: 150px; float: left">Tempat Tanggal Lahir</label><input class="span3" type="text" name="tmp_lahir" placeholder="Tempat Lahir" value="<?=$tmp_lahir?>" required>, 
	<select name="tg" style="width: 70px"><option value="">[Tgl]</option>
	<?php 
		for ($tgl = 1; $tgl < 32; $tgl++) {
			if ($tgl == $tg) {
				echo "<option value='$tgl' selected>$tgl</option>";
			} else {
				echo "<option value='$tgl'>$tgl</option>";
			}
		}
	?>
	</select>
	<select name="bl" style="width: 70px"><option value="">[Bln]</option>
	<?php 
		for ($bln = 1; $bln < 13; $bln++) {
			if ($bln == $bl) {
				echo "<option value='$bln' selected>$bln</option>";
			} else {
				echo "<option value='$bln'>$bln</option>";
			}
		}
	?>
	</select>
	<select name="th" style="width: 70px"><option value="">[Thn]</option>
	<?php 
		for ($thn = 1960; $thn < date('Y'); $thn++) {
			if ($thn == $th) {
				echo "<option value='$thn' selected>$thn</option>";
			} else {
				echo "<option value='$thn'>$thn</option>";
			}
		}
	?>
	</select>
	<br>
	<label style="width: 150px; float: left">Jenis Anggota</label>
	<select name="jenis"><option value="">[Jenis]</option>
	<?php 
	for($c = 0; $c < sizeof($jenis_p); $c++) {
		if ($jenis == $jenis_p[$c]) {
			echo "<option value='".$jenis_p[$c]."' selected>".$jenis_p[$c]."</option>";
		} else {
			echo "<option value='".$jenis_p[$c]."'>".$jenis_p[$c]."</option>";
		}		
	}
	?>
	</select>
	<br>
	<label style="width: 150px; float: left">Status</label>
	<select name="status"><option value="">[Status]</option>
	<?php 
	$status_p	= array("Non Aktif", "Aktif");
	for($d = 0; $d < sizeof($status_p); $d++) {
		if ($status == $d) {
			echo "<option value='$d' selected>".$status_p[$d]."</option>";
		} else {
			echo "<option value='$d'>".$status_p[$d]."</option>";
		}		
	}
	?>
	</select>
	<br>	
	<button type="submit" class="btn btn-primary">Submit</button>
	</fieldset>
</form>