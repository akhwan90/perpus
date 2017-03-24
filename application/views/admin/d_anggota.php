<legend>Data Management</legend>

<button class="btn btn-primary" type="button" onclick="window.open('<?php echo base_URL(); ?>apps/anggota/add/', '_self')">Data Baru</button>
<button class="btn btn-primary" type="button" onclick="window.open('<?php echo base_URL(); ?>cetak/anggota', '_blank')">Cetak Kartu Anggota</button>
<div class="pull-right">
<form action="<?=base_URL()?>apps/anggota/cari" method="post">
	<input type="text" name="q" style="width: 200px" placeholder="Masukkan kata kunci" required>
	<input type="submit" value="Cari" class="btn btn-primary" style="margin-top: -10px">
</form>
</div>
<br><br>
			
	<?php echo $this->session->flashdata("k");?>
	
	<table width="100%"  class="table table-condensed">
		<tr>
			<th width="5%">No</th>
			<th width="23%">[ID] Nama</th>
			<th width="20%">T T L</th>
			<th width="25%">Alamat</th>
			<th width="20%">Jenis, Status</th>
			<th width="7%">Control</th>
		</tr>
		
		<?php 
		if (empty($data)) {
			echo "<tr><td colspan='6'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
		} else {
			$no	= $this->uri->segment(4);
			if ($no == "") {
				$i 	= 0;
			} else {
				$i = $no;
			}
			
			foreach ($data as $b) {
			$i++;
		?>
		<tr>
			<td style="text-align: center"><?=$i; ?></td>
			<td>(<?=str_pad($b->id, 3, '0', STR_PAD_LEFT)?>) - <?=$b->nama?><br><b><?=$b->jk?></b></td>
			<td><?=$b->tmp_lahir?>, <?=tgl_panjang($b->tgl_lahir, "sm")?></td>
			<td><?=$b->alamat?></td>
			<td><?=$b->jenis?>, <?php if ($b->stat == "1") { echo "Aktif"; } else { echo "Non Aktif"; }?>, <a href="<?=base_URL()?>apps/anggota/list_pinjam/<?=$b->id?>">Riwayat Pinjam</a></td>
			
			<td style="text-align: center">
			<a href="<?=base_URL()?>apps/anggota/edt/<?=$b->id?>"><span class="icon-pencil">&nbsp;&nbsp;</span></a>  
			<a href="<?=base_URL()?>apps/anggota/del/<?=$b->id?>" onclick="return confirm('Anda YAKIN menghapus data \n <?=$b->nama?>..?');"><span class="icon-remove">&nbsp;&nbsp;</span></a>
			</td>
		</tr>	
		<?php 
			}
		}
		?>
	</table>
	<center><div class="pagination pagination-small"><ul><?=$pagi?></ul></div></center>