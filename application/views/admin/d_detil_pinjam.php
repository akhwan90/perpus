<legend>Detil Peminjaman : <?=$nama_anggota?></legend>		
	<?php echo $this->session->flashdata("k");?>
	
	<table width="100%"  class="table table-condensed">
		<tr>
			<th width="5%">No</th>
			<th width="40%">Judul Buku</th>
			<th width="10%">Tgl. Pinjam <br> Tgl. Kembali</th>
			<th width="20%">Keterangan</th>
			<th width="17%">Control</th>
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
			<td><b><?=getJudul($b->id_buku)?></b></td>
			<td style="text-align: center"><?=tgl_panjang($b->tgl_pinjam, "sm")?><br><?=tgl_panjang($b->tgl_kembali, "sm")?></td>
			<td style="text-align: center">
			<?php 
			if ($b->terlambat > 0) {
				echo "<span style='color: red; font-weight: bold'>Terlambat ".$b->terlambat." hari<br>Denda : Rp ".number_format(($b->terlambat * $denda))."";
				$telat1 = $b->terlambat;
				$denda1 = $b->terlambat * $denda;
			} else {
				echo "-";
				$telat1 = 0;
				$denda1 = 0;
			}
			?>
			
			</td>
			
			<td style="text-align: center">
			<a href="<?=base_URL()?>apps/trans/kembali/<?=$b->id_anggota?>/<?=$b->id_buku?>/<?=$b->id?>/<?=$telat1?>/<?=$denda1?>"><span class="icon-check">&nbsp;&nbsp;</span> Kembali</a>  
			<a href="<?=base_URL()?>apps/trans/perpanjang/<?=$b->id?>/<?=$b->id_anggota?>"><span class="icon-plane">&nbsp;&nbsp;</span> Perpanjang</a>  
			</td>
		</tr>	
		<?php 
			}
		}
		?>
	</table>
