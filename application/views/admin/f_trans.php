<form action="<?=base_URL()?>apps/trans/act_add" method="post" accept-charset="utf-8" enctype="multipart/form-data" name="f_trans" onsubmit="return cek()">	
	<fieldset><legend>Detil Pinjam</legend>
	<?php echo $this->session->flashdata("k");?>
	<input type="hidden" name="jml_buku" value="<?=$jml_buku?>">
	
	<div class="well">
	<label style="width: 150px; float: left">ID Anggota</label><input class="span2" type="text" name="id_anggota" value="<?=$det_anggota->id?>"required readonly> &nbsp;<input class="span4" type="text" name="nama" value="<?=$det_anggota->nama?>" readonly><br>
	<label style="width: 150px; float: left">Tanggal Pinjam</label><input class="span2" type="text" name="tgl_pinjam" value="<?=date('Y-m-d')?>"readonly><br>
	<label style="width: 150px; float: left">Tanggal Kembali</label><input class="span2" type="text" name="tgl_kembali" value="<?=adddate(7)?>" readonly><br>
	<label style="width: 150px; float: left">Keterangan/Catatan</label><textarea class="span6" name="ket"></textarea><br>
	</div>
	
	<legend>Masukkan Data Buku</legend>
	<div class="well">
	
	<?php 
	for ($i = 1; $i <= $jml_buku; $i++) {
	?>
	<label style="width: 150px; float: left">Buku Ke-<?=$i?></label>
		<input class="span1" type="text" name="id_buku_<?=$i?>" id="id_buku_<?=$i?>"placeholder="ID Buku" required readonly> &nbsp;
		<input class="span6" type="text" name="judul_buku_<?=$i?>" id="judul_buku_<?=$i?>" placeholder="Judul Buku" readonly> &nbsp; 

		<input type="button" class="btn btn-warning" style="margin-top: -10px" onclick="openbuku(<?=$i?>)" value="Cari"><br>
	<?php 
	}
	?>
	<input type="submit" value="Simpan" class="btn btn-success"><br>
	</div>
	
	</fieldset>
</form>


<div class="modal hide fade" id="myModal">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3>Cari Buku</h3>
	</div>

	<div class="modal-body">
		<form class="form" method="post" id="cari_kode">
			<input type="hidden" name="id_data" id="id_data" value="0">
			<input type="text" id="kata_kunci" class="span10" name="kata_kunci" autofocus placeholder="kata kunci : judul buku" required style="width: 80%">
			<button type="submit" class="btn btn-success" style="margin-top: -10px;">Cari</button>
		</form>
		<div id="hasil_cari"></div>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" id="" class="close" data-dismiss="modal" aria-hidden="true">Close</a>
	</div>
</div>


<script type="text/javascript">
$(document).on("ready", function() {
	$("#cari_kode").submit(function(event) {
		event.preventDefault();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>apps/trans/caribuku",
			data: $("#cari_kode").serialize(),
			success: function(response) {
				$("#hasil_cari").html(response);
			}
		});
		return false;
    });
});

function openbuku(y) {
	$("#id_data").val(y);
	$("#kata_kunci").val('');
	$("#hasil_cari").html('');
	$('#myModal').modal("show");
}

function tutup() {
	$('#myModal').modal("hide");
}

function isikan_kode(id_data, id_buku, nama) {
	$("#id_buku_"+id_data).val(id_buku);
	$("#judul_buku_"+id_data).val(nama);
	$('#myModal').modal('hide');
	return false;
}

function cek() {
	<?php 
	for ($i = 1; $i <= $jml_buku; $i++) {
	?>
	var x_<?=$i?> = document.forms["f_trans"]["id_buku_<?=$i?>"].value;
	<?php 
	}
	?>
	
	<?php 
	for ($j = 1; $j <= $jml_buku; $j++) {
	?>
	
	if ( x_<?=$j?> == "") {
	  alert("Pilihlah buku isian buku ke - <?=$j?>");
	  openbuku(<?=$j?>)
	  return false;
	} 
	<?php 
	}

	for ($k = 1; $k < $jml_buku; $k++) {
	?>
	
	if ( x_<?=$k+1?> == x_<?=$k?>) {
	  alert("Pilihan buku ke - <?=$k+1?> tidak boleh sama dengan sebelumnya");
	  openbuku(<?=$k+1?>)
	  return false;
	} 
	<?php 
	}
	?> 
	
}

</script>
