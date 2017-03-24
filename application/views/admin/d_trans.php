<legend>Management Sirkulasi</legend>

<button class="btn btn-success" type="button" onclick="window.open('<?php echo base_URL(); ?>apps/trans/pilih_anggota/', '_self')">Transaksi Baru</button>
<div class="pull-right">
<form action="<?=base_URL()?>apps/trans/cari" method="post">
	<input type="text" name="q" style="width: 230px" placeholder="Masukkan ID Anggota" required>
	<input type="submit" value="Cari" class="btn btn-inverse" style="margin-top: -10px">
</form>
</div>
<br><br>
			
	<?php echo $this->session->flashdata("k");?>
	
	<table width="100%"  class="table table-condensed">
		<tr>
			<th width="5%">No</th>
			<th width="50%">Nama Peminjam (Jumlah Buku)</th>
			<th width="15%">Tgl. Pinjam</th>
			<th width="15%">Tgl. Kembali</th>
			<th width="7%">Detil</th>
		</tr>
		
		<?php 
		if (empty($data)) {
			echo "<tr><td colspan='6'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
		} else {
			$i = 0;
			foreach ($data as $b) {
			$i++;
		?>
		<tr>
			<td style="text-align: center"><?=$i; ?></td>
			<td><?=getNama($b->id_anggota)?> <b>(<?=$b->jml_pinjam?> buku)</b></td>
			<td style="text-align: center"><?=tgl_panjang($b->tgl_pinjam, "sm")?></td>
			<td style="text-align: center"><?=tgl_panjang($b->tgl_kembali, "sm")?></td>
			
			<td style="text-align: center">
			<a href="<?=base_URL()?>apps/trans/det/<?=$b->id_anggota?>"><span class="icon-th-list">&nbsp;&nbsp;</span></a>  
			</td>
		</tr>	
		<?php 
			}
		}
		?>
	</table>
