	<?php 
	$q_instansi	= $this->db->query("SELECT * FROM r_config LIMIT 1")->row();
	echo '<img src="'.base_URL().'aset/'.$q_instansi->logo.'" style="width: 80px; height: 80px; margin-right: 20px; display: inline; float: left">';
	echo '<h2 style="font-size: 22px">Perpustakaan '.$q_instansi->nama.'</h2>';
	echo '<h5>'.$q_instansi->alamat.'</h5>';
	
	?>
	<body onload="this.print()">
	<hr id="bulanan" style="border-width: 2px; border-color: #000">
	
	<h5>Pengunjung Hari Ini (<?=date('d F Y')?>) Per Jenis Kelamin</h5>
	<table style="width: 50%; border-collapse: collapse" border="1"  class="table table-condensed">
		<tr>
			<th width="10%">No</th>
			<th width="35%">Laki-Laki</th>
			<th width="35%">Perempuan</th>
			<th width="20%">Jumlah</th>
		</tr>
		<?php 
		$c_jk_hi 	= $this->db->query("SELECT SUM(IF( jk =  'L', 1, 0 ) ) AS jkl, SUM( IF( jk =  'P', 1, 0 ) ) AS jkp FROM t_pengunjung  WHERE LEFT(tgl, 10) = DATE(NOW()) ")->result();

		foreach($c_jk_hi as $cjkh) {
		?>
		<tr>
			<td style="text-align: center">1</td>
			<td style="text-align: center"><?=$cjkh->jkl?></td>
			<td style="text-align: center"><?=$cjkh->jkp?></td>
			<td style="text-align: center"><?=$cjkh->jkl?> orang</td>
		</tr>	
		<?php
		}
		?>
	</table>
	<h5>Pengunjung Hari Ini (<?=date('d F Y')?>) Per Jenis Pengunjung</h5>
	<table style="width: 50%; border-collapse: collapse" border="1" class="table table-condensed">
		<tr>
			<th width="10%">No</th>
			<th width="35%">Mahasiswa</th>
			<th width="35%">Dosen</th>
			<th width="20%">Jumlah</th>
		</tr>
		<?php 
		$c_jen_hi 	= $this->db->query("SELECT SUM(IF( jenis =  'Mahasiswa', 1, 0 ) ) AS mahasiswa, SUM( IF( jenis =  'Dosen', 1, 0 ) ) AS dosen FROM t_pengunjung  WHERE LEFT(tgl, 10) = DATE(NOW()) ")->result();
		
		foreach($c_jen_hi as $cjh) {
		?>
		<tr>
			<td style="text-align: center">1</td>
			<td style="text-align: center"><?=$cjh->mahasiswa?></td>
			<td style="text-align: center"><?=$cjh->dosen?></td>
			<td style="text-align: center"><?=($cjh->mahasiswa + $cjh->dosen)?> orang</td>
		</tr>	
		<?php
		}
		?>
	</table>
	<h5>Pengunjung Hari Ini (<?=date('d F Y')?>) Per Keperluan</h5>
	<table style="width: 60%; border-collapse: collapse" border="1"  class="table table-condensed">
		<tr>
			<th width="10%">No</th>
			<th width="18%">Baca Buku</th>
			<th width="18%">Pinjam Buku</th>
			<th width="18%">Kembalikan Buku</th>
			<th width="18%">Baca Koran</th>
			<th width="18%">Lainnya</th>
		</tr>
		<?php 
		$c_p1	= $this->db->query("SELECT id FROM t_pengunjung  WHERE perlu LIKE '%Baca Buku%' AND LEFT(tgl, 10) = DATE(NOW()) ")->num_rows();
		$c_p2	= $this->db->query("SELECT id FROM t_pengunjung  WHERE perlu LIKE '%Pinjam Buku%' AND LEFT(tgl, 10) = DATE(NOW()) ")->num_rows();
		$c_p3	= $this->db->query("SELECT id FROM t_pengunjung  WHERE perlu LIKE '%Kembalikan Buku%' AND LEFT(tgl, 10) = DATE(NOW()) ")->num_rows();
		$c_p4	= $this->db->query("SELECT id FROM t_pengunjung  WHERE perlu LIKE '%Baca Koran%' AND LEFT(tgl, 10) = DATE(NOW()) ")->num_rows();
		$c_p5	= $this->db->query("SELECT id FROM t_pengunjung  WHERE perlu LIKE '%Lainnya%' AND LEFT(tgl, 10) = DATE(NOW()) ")->num_rows();

		?>
		<tr>
			<td style="text-align: center">1</td>
			<td style="text-align: center"><?=$c_p1?></td>
			<td style="text-align: center"><?=$c_p2?></td>
			<td style="text-align: center"><?=$c_p3?></td>
			<td style="text-align: center"><?=$c_p4?></td>
			<td style="text-align: center"><?=$c_p5?></td>
		</tr>	
	</table>
	</body>