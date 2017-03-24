<fieldset><legend>Pilih Anggota</legend>

<?php echo $this->session->flashdata("k");?>


<form action="<?=base_URL()?>apps/trans/add" method="post" accept-charset="utf-8" enctype="multipart/form-data" name="f_pilih_anggota" onsubmit="return cek()" >	

<div class="well">
<label style="width: 150px; float: left">Nama Anggota</label>
<select name="id_anggota" required autofocus><option value="">[Pilih Anggota]</option>
<?php 
$q_anggota	= $this->db->query("SELECT id, nama FROM t_anggota")->result();

if (!empty($q_anggota)) {
	foreach($q_anggota as $qa) {
		echo "<option value='".$qa->id."'>".$qa->nama."</option>";
	}
}
?>
</select>

<!--<input class="span2" type="text" name="id_anggota" placeholder="ID Anggota" required readonly> &nbsp;<input class="span4" type="text" name="nama_anggota" placeholder="Nama Anggota"> &nbsp; <a href="" class="btn btn-warning" style="margin-top: -10px">Cari</a>--><br>
<?php 
$q_instansi	= $this->db->query("SELECT * FROM r_config LIMIT 1")->row();
?>

<label style="width: 150px; float: left">Jumlah Buku</label><input class="span1" type="text" name="jml_buku" required> &nbsp;&nbsp;*) Maksimal <?=$q_instansi->maks_buku?><br>

<label style="width: 150px; float: left"></label><button type="submit" class="btn btn-primary">Lanjutkan</button>
</div>

<script type="text/javascript">
function cek() {
	var x=document.forms["f_pilih_anggota"]["jml_buku"].value;

	if (x > <?=$q_instansi->maks_buku?>) {
	  alert("Maksimal jumlah peminjaman adalah <?=$q_instansi->maks_buku?> buku..!!");
	  return false;
	}
}
</script>