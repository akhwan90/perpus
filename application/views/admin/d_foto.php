<form action="<?=base_URL()?>admin/data_foto/upload" method="post" accept-charset="utf-8" enctype="multipart/form-data">	
<input type="hidden" name="idp" value="<?=$this->uri->segment(4)?>">

	<fieldset><legend>Foto for ID <?=$this->uri->segment(4)?></legend>
	<?php echo $this->session->flashdata("k");?>
	<div>
	<?php
	foreach($data as $d) {
		echo "<div style='display: inline; float: left; margin-right: 10px; margin-bottom: 20px'><img src='".base_URL()."upload/data/".$d->file."' class='img-polaroid' style='width: 100px; height: 100px;  margin-bottom: 10px'><br><center style='font-size: 12px; margin-top: -10px'><a href='".base_URL()."admin/data_foto/del_foto/".$this->uri->segment(4)."/".$d->id."' onclick=\"return confirm('Are your sure..?');\">Delete Photo</a></center></div>";
	}
	?>
	</div>
	
	<legend>Upload Form</legend>
	
	<label style="width: 150px; float: left">File</label><input class="span6" type="file" name="foto"><br>
	
	<label style="width: 150px; float: left"></label><button type="submit" class="btn btn-primary">Submit</button>
	</fieldset>
</form>