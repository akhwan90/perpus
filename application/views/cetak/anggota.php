	<?php 
	$q_instansi	= $this->db->query("SELECT * FROM r_config LIMIT 1")->row();
	echo '<img src="'.base_URL().'aset/'.$q_instansi->logo.'" style="width: 80px; height: 80px; margin-right: 20px; display: inline; float: left">';
	echo '<h2 style="font-size: 22px">Perpustakaan '.$q_instansi->nama.'</h2>';
	echo '<h5>'.$q_instansi->alamat.'</h5>';
	
	?>
	<body onload="this.print()">
	<hr id="bulanan" style="border-width: 2px; border-color: #000">
	
	<h5>Data Anggota</h5>
	<table style="width: 100%; font-size: 10px; border-collapse: collapse" border="1" class="table table-condensed">
		<tr>
			<th width="5%">No</th>
			<th width="20%">Nama</th>
			<th width="30%">Alamat</th>
			<th width="5%">JK</th>
			<th width="7%">Agama</th>
			<th width="15%">TTL</th>
			<th width="10%">Status</th>
			<th width="7%">Jenis</th>
		</tr>
		<?php 
		if (empty($data)) {
			echo "<tr><td colspan='7' style='text-align: center'> - Tidak ada data - </td></tr>";
		} else {
			$no = 1;
			foreach($data as $d) {
		?>
		<tr>
			<td style="text-align: center"><?=$no?></td>
			<td style="text-align: left"><?=$d->nama?></td>
			<td style="text-align: left"><?=$d->alamat?></td>
			<td style="text-align: center"><?=$d->jk?></td>
			<td style="text-align: center"><?=$d->agama?></td>
			<td style="text-align: left"><?=$d->tmp_lahir.", ".tgl_panjang($d->tgl_lahir, "sm")?></td>
			<td style="text-align: center"><?=$d->jenis?></td>
			<td style="text-align: center"><?=getAktif($d->stat)?></td>
		</tr>	
		<?php
			$no++;
			}
		}
		?>
	</table>