<link href="<?=base_URL()?>aset/css/bootstrap.css" rel="stylesheet">

<table width="90%"  class="table table-condensed">
	<tr><th>No</th><th>ID</th><th>Judul Buku</th><th>Pilih</th></tr>
	
	<?php
	if (empty($data)) {
		echo "<tr><td colspan='4' style='text-align: center; font-weight: bold; color: red'>-- Data tidak ada / Tidak ada buku yang tersedia --</td></tr>";
	} else {
		$no = 1;
		foreach($data as $d) {
	?>
	<tr><td><?=$no?></td><td><?=$d->id?></td><td><?=$d->judul?></td><td><a href="#" onclick="retval('<?=$d->id?>#<?=$d->judul?>')">Pilih</a></td></tr>
	<?php 
		}
	}
	?>
	
</table>

<script>
function retval(a,b) {
	window.returnValue = a + "#" + b ;
	window.close();
}

</script>