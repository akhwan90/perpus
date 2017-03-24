 <div class="span9">
		<ul class="breadcrumb wellwhite">
			<li><a href="<?=base_URL()?>">Beranda</a> <span class="divider">/</span></li>
			<li>Hasil Pencarian </li>
		</ul>
		
		<div class="span12 wellwhite" style="margin-left: 0px">
		<legend style="margin-bottom: 10px; font-size: 15px; font-weight: bold">Hasil Pencarian</legend>
		<div class="row-fluid">
		
		
<div class="pull-right">
<form action="<?=base_URL()?>depan/cari_buku/cari" method="post">
	<center>
	<input type="text" name="q" style="width: 400px" placeholder="Masukkan judul ATAU pengarang ATAU  buku" required>
	<input type="submit" value="Cari" class="btn btn-primary" style="margin-top: -10px">
	</center>
</form>
</div>
<br><br>
			
	<?php echo $this->session->flashdata("k");?>
	
	<table width="100%"  class="table table-condensed">
		<tr>
			<th width="5%">No</th>
			<th width="42%">Judul, Pengarang, Penerbit</th>
			<th width="8%">Th. Terbit<br>Jml. Hal</th>
			<th width="15%">Lokasi</th>
			<th width="30%">Deskripsi</th>
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
		</tr>	
		<?php 
			}
		}
		?>
	</table>
	
		</div>
		</div>        
</div><!--/span-->