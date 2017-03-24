	<?php 
	$q_instansi	= $this->db->query("SELECT * FROM r_config LIMIT 1")->row();
	echo '<img src="'.base_URL().'aset/'.$q_instansi->logo.'" style="width: 80px; height: 80px; margin-right: 20px; display: inline; float: left">';
	echo '<h2 style="font-size: 22px">Perpustakaan '.$q_instansi->nama.'</h2>';
	echo '<h5>'.$q_instansi->alamat.'</h5>';
	
	?>
	<body onload="this.print()">
	<hr id="bulanan" style="border-width: 2px; border-color: #000">
	
	<h5>Peminjaman <?=$judul?></h5>
	
	<h5>Peminjaman Hari ini</h5>
	<table style="width: 100%; font-size: 10px; border-collapse: collapse" border="1" class="table table-condensed">
		<tr>
			<th width="5%">No</th>
			<th width="25%">Nama Peminjam</th>
			<th width="35%">Judul Buku</th>
			<th width="10%">Tanggal Pinjam</th>
			<th width="10%">Tanggal Kembali</th>
			<th width="10%">Denda</th>
			<th width="5%">Status</th>
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
			<td style="text-align: left"><?=getNama($d->id_anggota)?></td>
			<td style="text-align: left"><?=getJudul($d->id_buku)?></td>
			<td style="text-align: center"><?=$d->tgl_pinjam?></td>
			<td style="text-align: center"><?=$d->tgl_kembali?></td>
			<td style="text-align: center"><?=$d->denda?></td>
			<td style="text-align: center"><?=$d->stat?></td>
		</tr>	
		<?php
			$no++;
			}
		}
		?>
	</table>