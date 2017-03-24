	<?php 
	$q_instansi	= $this->db->query("SELECT * FROM r_config LIMIT 1")->row();
	echo '<img src="'.base_URL().'aset/'.$q_instansi->logo.'" style="width: 80px; height: 80px; margin-right: 20px; display: inline; float: left">';
	echo '<h2 style="font-size: 22px">Perpustakaan '.$q_instansi->nama.'</h2>';
	echo '<h5>'.$q_instansi->alamat.'</h5>';
	
	?>
	<body onload="this.print()">
	<hr id="bulanan" style="border-width: 2px; border-color: #000">
	
	<h5>Data Buku</h5>
	<table style="width: 100%; font-size: 10px; border-collapse: collapse" border="1" class="table table-condensed">
		<tr>
			<th width="5%">No</th>
			<th width="5%">Kelas</th>
			<th width="30%">Judul</th>
			<th width="20%">Pengarang</th>
			<th width="10%">Penerbit</th>
			<th width="5%">Tahun Terbit</th>
			<th width="5%">Jumlah Hal</th>
			<th width="10%">ISBN</th>
			<th width="10%">Lokasi</th>
			
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
			<td style="text-align: center"><?=$d->id_kelas?></td>
			<td style="text-align: left"><?=$d->judul?></td>
			<td style="text-align: left"><?=$d->pengarang?></td>
			<td style="text-align: center"><?=$d->penerbit?></td>
			<td style="text-align: center"><?=$d->th_terbit?></td>
			<td style="text-align: center"><?=$d->jml_hal?></td>
			<td style="text-align: center"><?=$d->isbn?></td>
			<td style="text-align: center"><?=getLokasi($d->id_lokasi)?></td>
			
		</tr>	
		<?php
			$no++;
			}
		}
		?>
	</table>