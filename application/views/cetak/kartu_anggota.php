<style type="text/css">
table { font-size: 10px; font-family: arial }
tr, td { vertical-align: top; padding: 0px }
</style>

<div style="width: 210mm; margin: 0.5mm;">
<?php
$i = $this->db->query("SELECT * FROM r_config LIMIT 1")->row();

foreach ($data as $d) {
?>

<div style="; margin-right: 10px; margin-top: 5px; margin-bottom: 18px; width: 90mm; height: 60mm; display: inline; float: left; border: solid 1px; padding: 5px">
<table width="100%">
<tr>
<td style="width: 18mm"><img src="<?=base_URL()?>aset/<?=$i->logo?>" style="width: 50px; height: 50px"></td>
<td style="" colspan="3"><b style="font-size: 12px">PERPUSTAKAAN <?=strtoupper($i->nama)?></b><br><span style="font-size: 10px">Alamat : <?=$i->alamat?></span></td>
</tr>
<tr><td colspan="4" style="text-align: center"><hr></td></tr>
<tr><td colspan="4" style="text-align: center"><b style="font-size: 14px"><u><br>KARTU ANGGOTA</u></b><br>Nomor : <?=$d->id?><br><br><br></td></tr>

<tr><td rowspan="5"><img src="" style="width: 60px; height: 80px"></td><td>Nama</td><td>:</td><td> <b><?=$d->nama?></b></td></tr>
<tr><td>Alamat</td><td>:</td><td><b><?=substr($d->alamat, 0, 50)?></b></td></tr>
<tr><td>J K</td><td>:</td><td><b><?=$d->jk?></b></td></tr>
<tr><td>Agama</td><td>:</td><td><b><?=$d->agama?></b></td></tr>
<tr><td>T T L</td><td>:</td><td><b><?=$d->tmp_lahir.", ".tgl_panjang($d->tgl_lahir, "sm")?></b></td></tr>

</table>
</div>

<?php 
}
?>

</div>