<legend>Laporan Data Anggota</legend>

<button class="btn btn-primary" type="button" onclick="window.open('<?php echo base_URL(); ?>cetak/data_anggota', '_blank')">Cetak</button> 
<br>
	<h5>Total anggota yang terdaftar aktif : <?=$jml?></h5>
	<table style="width: 100%; font-size: 10px"  class="table table-condensed">
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