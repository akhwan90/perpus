<?php
	$act			= "simpan";
	$idp			= $data->id;
	$denda			= $data->denda;
	$maks_buku		= $data->maks_buku;
	$maks_hari		= $data->maks_hari;
	
?>
<form action="<?=base_URL()?>apps/c_pinjam/<?=$act?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">	
	<input type="hidden" name="idp" value="<?=$idp?>">
		
	<fieldset><legend>Peminjaman</legend>
	<?php echo $this->session->flashdata("k");?>
	<label style="width: 250px; float: left">Denda Per Hari</label><input class="span1" type="text" name="denda" placeholder="Denda keterlambatan per hari" value="<?=$denda?>" required><br>
	<label style="width: 250px; float: left">Maks. Peminjaman Buku</label><input class="span1" type="text" name="maks_buku" placeholder="Maksimal peminjaman buku" value="<?=$maks_buku?>" required><br>
	<label style="width: 250px; float: left">Maks. Hari Peminjaman</label><input class="span1" type="text" name="maks_hari" placeholder="Maksimal hari peminjaman buku" value="<?=$maks_hari?>" required><br>
	
	
	<button type="submit" class="btn btn-primary">Submit</button>
	</fieldset>
</form>