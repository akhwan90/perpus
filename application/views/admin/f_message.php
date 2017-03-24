<?php
$mode	= $this->uri->segment(3);

if ($mode == "edt" || $mode == "act_edt") {
	$act		= "act_edt";
	$idp		= $datpil->id;
	$nama		= $datpil->nama;
	$email		= $datpil->email;
	$phone		= $datpil->phone;
	$hp			= $datpil->hp;
	$chat		= $datpil->chat;
	$message	= $datpil->message;

} else {
	$act		= "act_add";
	$idp		= "";
	$nama		= "";
	$email		= "";
	$phone		= "";
	$hp			= "";
	$chat		= "";
	$message	= "";

}
?>
<form action="<?=base_URL()?>admin/message/<?=$act?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">	
<input type="hidden" name="idp" value="<?=$idp?>">

	<fieldset><legend>Form</legend>
	<?php echo $this->session->flashdata("k");?>

	<label style="width: 150px; float: left">Name</label><input class="span8" type="text" name="nama" placeholder="Name" value="<?=$nama?>" required><br>
	<label style="width: 150px; float: left">Email</label><input class="span8" type="text" name="email" placeholder="Addres" value="<?=$email?>" required><br>
	<label style="width: 150px; float: left">Telephone</label><input class="span8" type="text" name="tel" placeholder="Contact" value="<?=$phone?>" required><br>
	<label style="width: 150px; float: left">Mobile Phone</label><input class="span8" type="text" name="mphone" placeholder="Prices" value="<?=$hp?>" required><br>
	<label style="width: 150px; float: left">Chat Account</label><input class="span8" type="text" name="chat" placeholder="Bedroom" value="<?=$chat?>" required><br>
	<label style="width: 150px; height: 10px;">Message</label><br><textarea rows="3" class="span10" name="pesan" id="textarea" style="font-family: courier"><?=$message?></textarea><br>
	
	
	
	<button type="submit" class="btn btn-primary">Submit</button>
	</fieldset>
</form>