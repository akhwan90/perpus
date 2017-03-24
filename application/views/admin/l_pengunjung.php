<legend>Laporan Pengunjung</legend>

<button class="btn btn-primary" type="button" onclick="window.open('<?php echo base_URL(); ?>cetak/kunjung_hari_ini', '_blank')">Cetak Hari Ini</button> <button class="btn btn-primary" type="button" onclick="window.open('<?=base_URL()?>apps/l_pengunjung#bulanan', '_self')">Laporan Bulanan</button>
<br>
	
	<h5>Pengunjung Hari Ini Per Jenis Kelamin</h5>
	<table style="width: 50%"  class="table table-condensed">
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
	<h5>Pengunjung Hari Ini Per Jenis Pengunjung</h5>
	<table style="width: 50%"  class="table table-condensed">
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
	<h5>Pengunjung Hari Ini Per Keperluan</h5>
	<table style="width: 80%"  class="table table-condensed">
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
	
	<hr id="bulanan" style="border-width: 3px; border-color: #000">
	<!-- BULANAN COYYYY -->
	<a class="btn btn-success" href="<?=base_URL()?>cetak/kunjung_bulan/<?=date('m')?>" target="_blank">Cetak Bulan  Ini</a>
	<div class="btn-group">
		<a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="<?=base_URL()?>cetak/kunjung_bulan/<?=date('m')?>">Cetak Bulan  <span class="caret"></span></a>
		<ul class="dropdown-menu">
			<li><a href="<?=base_URL()?>cetak/kunjung_bulan/1" target="_blank">Januari</a></li>
			<li><a href="<?=base_URL()?>cetak/kunjung_bulan/2" target="_blank">Februari</a></li>
			<li><a href="<?=base_URL()?>cetak/kunjung_bulan/3" target="_blank">Maret</a></li>
			<li><a href="<?=base_URL()?>cetak/kunjung_bulan/4" target="_blank">April</a></li>
			<li><a href="<?=base_URL()?>cetak/kunjung_bulan/5" target="_blank">Mei</a></li>
			<li><a href="<?=base_URL()?>cetak/kunjung_bulan/6" target="_blank">Juni</a></li>
			<li><a href="<?=base_URL()?>cetak/kunjung_bulan/7" target="_blank">Juli</a></li>
			<li><a href="<?=base_URL()?>cetak/kunjung_bulan/8" target="_blank">Agustus</a></li>
			<li><a href="<?=base_URL()?>cetak/kunjung_bulan/9" target="_blank">September</a></li>
			<li><a href="<?=base_URL()?>cetak/kunjung_bulan/10" target="_blank">Oktober</a></li>
			<li><a href="<?=base_URL()?>cetak/kunjung_bulan/11" target="_blank">November</a></li>
			<li><a href="<?=base_URL()?>cetak/kunjung_bulan/12" target="_blank">Desember</a></li>
		</ul>
	</div>
	
	<br>
	<h5>Pengunjung Bulan Ini Per Jenis Kelamin</h5>
	<table style="width: 50%"  class="table table-condensed">
		<tr>
			<th width="10%">No</th>
			<th width="35%">Laki-Laki</th>
			<th width="35%">Perempuan</th>
			<th width="20%">Jumlah</th>
		</tr>
		<?php 
		$c_jk_hi 	= $this->db->query("SELECT SUM(IF( jk =  'L', 1, 0 ) ) AS jkl, SUM( IF( jk =  'P', 1, 0 ) ) AS jkp FROM t_pengunjung  WHERE MID(tgl, 6, 2) = MONTH(NOW()) ")->result();

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
	<h5>Pengunjung Bulan Ini Per Jenis Pengunjung</h5>
	<table style="width: 50%"  class="table table-condensed">
		<tr>
			<th width="10%">No</th>
			<th width="35%">Mahasiswa</th>
			<th width="35%">Dosen</th>
			<th width="20%">Jumlah</th>
		</tr>
		<?php 
		$c_jen_hi 	= $this->db->query("SELECT SUM(IF( jenis =  'Mahasiswa', 1, 0 ) ) AS mahasiswa, SUM( IF( jenis =  'Dosen', 1, 0 ) ) AS dosen FROM t_pengunjung  WHERE MID(tgl, 6, 2) = MONTH(NOW()) ")->result();
		
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
	<h5>Pengunjung Bulan Ini Per Keperluan</h5>
	<table style="width: 80%"  class="table table-condensed">
		<tr>
			<th width="10%">No</th>
			<th width="18%">Baca Buku</th>
			<th width="18%">Pinjam Buku</th>
			<th width="18%">Kembalikan Buku</th>
			<th width="18%">Baca Koran</th>
			<th width="18%">Lainnya</th>
		</tr>
		<?php 
		$c_p1	= $this->db->query("SELECT id FROM t_pengunjung  WHERE perlu LIKE '%Baca Buku%' AND MID(tgl, 6, 2) = MONTH(NOW()) ")->num_rows();
		$c_p2	= $this->db->query("SELECT id FROM t_pengunjung  WHERE perlu LIKE '%Pinjam Buku%' AND MID(tgl, 6, 2) = MONTH(NOW()) ")->num_rows();
		$c_p3	= $this->db->query("SELECT id FROM t_pengunjung  WHERE perlu LIKE '%Kembalikan Buku%' AND MID(tgl, 6, 2) = MONTH(NOW()) ")->num_rows();
		$c_p4	= $this->db->query("SELECT id FROM t_pengunjung  WHERE perlu LIKE '%Baca Koran%' AND MID(tgl, 6, 2) = MONTH(NOW()) ")->num_rows();
		$c_p5	= $this->db->query("SELECT id FROM t_pengunjung  WHERE perlu LIKE '%Lainnya%' AND MID(tgl, 6, 2) = MONTH(NOW()) ")->num_rows();

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