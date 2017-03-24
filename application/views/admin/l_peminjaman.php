<legend>Laporan Pengunjung</legend>

<button class="btn btn-primary" type="button" onclick="window.open('<?php echo base_URL(); ?>cetak/l_peminjam/hariini', '_blank')">Cetak Hari Ini</button> 
<button class="btn btn-primary" type="button" onclick="window.open('<?php echo base_URL(); ?>cetak/l_peminjam/bulnini', '_blank')">Cetak Bulan Ini</button> 
<br>
	
	<h5>Peminjaman Hari ini</h5>
	<table style="width: 100%; font-size: 10px"  class="table table-condensed">
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
		if (empty($p_hariini)) {
			echo "<tr><td colspan='7' style='text-align: center'> - Tidak ada data - </td></tr>";
		} else {
			$no = 1;
			foreach($p_hariini as $phi) {
		?>
		<tr>
			<td style="text-align: center"><?=$no?></td>
			<td style="text-align: left"><?=$phi->nmanggota?></td>
			<td style="text-align: left"><?=$phi->judul?></td>
			<td style="text-align: center"><?=$phi->tgl_pinjam?></td>
			<td style="text-align: center"><?=$phi->tgl_kembali?></td>
			<td style="text-align: center"><?=$phi->denda?></td>
			<td style="text-align: center"><?=$phi->stat?></td>
		</tr>	
		<?php
			$no++;
			}
		}
		?>
	</table>
	
	<h5>Peminjaman Bulan Ini</h5>
	<table style="width: 100%; font-size: 10px"  class="table table-condensed">
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
		if (empty($p_bulnini)) {
			echo "<tr><td colspan='7' style='text-align: center'> - Tidak ada data - </td></tr>";
		} else {
			$no2 = 1;
			foreach($p_bulnini as $pbi) {
		?>
		<tr>
			<td style="text-align: center"><?=$no2?></td>
			<td style="text-align: left"><?=$pbi->nmanggota?></td>
			<td style="text-align: left"><?=$pbi->judul?></td>
			<td style="text-align: center"><?=$pbi->tgl_pinjam?></td>
			<td style="text-align: center"><?=$pbi->tgl_kembali?></td>
			<td style="text-align: center"><?=$pbi->denda?></td>
			<td style="text-align: center"><?=$pbi->stat?></td>
		</tr>	
		<?php
			$no2++;
			}
		}
		?>
	</table>