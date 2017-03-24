<?php
$mode	= $this->uri->segment(3);

if ($mode == "edt" || $mode == "act_edt") {
	$act		= "act_edt";
	$idp		= $datpil->id;
	$judul		= $datpil->name;
	$isi		= $datpil->content;
} else {
	$act		= "act_add";
	$idp		= "";
	$judul		= "";
	$isi		= "";
}
?>
<form action="<?=base_URL()?>admin/page/<?=$act?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">	
<input type="hidden" name="idp" value="<?=$idp?>">

	<fieldset><legend>Form</legend>
	<?php echo $this->session->flashdata("k");?>

	<label style="width: 150px; float: left">Page Name</label><input class="span11" type="text" name="judul" placeholder="Page Name" value="<?=$judul?>" required><br>
	<label style="width: 150px; height: 10px; float: left; display: block">Content</label><br><textarea rows="10" class="span11" name="isi" id="textarea" style="font-family: courier"><?=$isi?></textarea><br>
	
	<button type="submit" class="btn btn-primary">Save</button>
	</fieldset>
</form>