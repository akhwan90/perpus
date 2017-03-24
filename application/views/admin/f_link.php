<?php
$mode	= $this->uri->segment(3);

if ($mode == "edt" || $mode == "act_edt") {
	$act		= "act_edt";
	$idp		= $datpil->id;
	$name		= $datpil->name;
	$href		= $datpil->href;
} else {
	$act		= "act_add";
	$idp		= "";
	$name		= "";
	$href		= "";
}
?>
<form action="<?=base_URL()?>admin/link/<?=$act?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">	
<input type="hidden" name="idp" value="<?=$idp?>">

	<fieldset><legend>Form</legend>
	<?php echo $this->session->flashdata("k");?>

	<label style="width: 150px; float: left">Link Name</label><input class="span11" type="text" name="name" placeholder="Link Name" value="<?=$name?>" required><br>
	<label style="width: 150px; height: 10px; float: left; display: block">Isi Postingan</label><br><input class="span11" type="text" name="href" placeholder="URL Targe. Ex : http://www.example.com/" value="<?=$href?>" required><br>
	
	<button type="submit" class="btn btn-primary">Save</button>
	</fieldset>
</form>