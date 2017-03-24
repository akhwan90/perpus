<?php
$mode	= $this->uri->segment(3);

if ($mode == "edt" || $mode == "act_edt") {
	$act		= "act_edt";
	$idp		= $datpil->id;
	$tanggal	= $datpil->tanggal;
	$nama		= $datpil->nama;
	
} else {
	$act		= "act_add";
	$idp		= "";
	$tanggal	= "";
	$nama		= "";
}
?>
<form action="<?=base_URL()?>apps/libur/<?=$act?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">	
<input type="hidden" name="idp" value="<?=$idp?>">

	<fieldset><legend>Form</legend>
	<?php echo $this->session->flashdata("k");?>
	
	<label style="width: 150px; float: left">Tanggal</label><input class="span2" type="text" name="tanggal" placeholder="YYYY-MM-DD" value="<?=$tanggal?>" required> *) Contoh : 2013-08-17<br>
	<label style="width: 150px; float: left">Nama</label><input class="span8" type="text" name="nama" placeholder="Nama" value="<?=$nama?>" required><br>
	<button type="submit" class="btn btn-primary">Submit</button>
	</fieldset>
</form>