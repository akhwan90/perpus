<legend>Data Management</legend>

<button class="btn btn-primary" type="button" onclick="window.open('<?php echo base_URL(); ?>apps/buku/add/', '_self')">Data Baru</button>
<div class="pull-right">
<form action="<?=base_URL()?>apps/buku/cari" method="post">
	<input type="text" name="q" style="width: 200px" placeholder="Masukkan kata kunci" required>
	<input type="submit" value="Cari" class="btn btn-primary" style="margin-top: -10px">
</form>
</div>
<br><br>
			
	<?php echo $this->session->flashdata("k");?>
	
	<table width="100%"  class="table table-condensed">
		<tr>
			<th width="5%">No</th>
			<th width="35%">Judul, Pengarang, Penerbit</th>
			<th width="8%">Th. Terbit<br>Jml. Hal</th>
			<th width="15%">Lokasi</th>
			<th width="30%">Deskripsi</th>
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
			<td><?=$b->judul?><br><b><?=$b->pengarang?></b><br><i><?=$b->penerbit?></i></td>
			<td><?=$b->th_terbit?><br><?=$b->jml_hal?> hlmn</td>
			<td style="text-align: center"><?=getLokasi($b->id_lokasi)?></td>
			<td><?=$b->deskripsi?></td>
			
			<td style="text-align: center">
			<a href="<?=base_URL()?>apps/buku/edt/<?=$b->id?>"><span class="icon-pencil">&nbsp;&nbsp;</span></a>  
			<a href="<?=base_URL()?>apps/buku/del/<?=$b->id?>" onclick="return confirm('Anda YAKIN menghapus data \n <?=$b->judul?>..?');"><span class="icon-remove">&nbsp;&nbsp;</span></a>
			</td>
		</tr>	
		<?php 
			}
		}
		?>
	</table>
	
	<center><div class="pagination pagination-small"><ul><?=$pagi?></ul></div></center>
