<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Laporan Tools.xls");
?>

<html>
<head>
	<title>Laporan Tools</title>
	<style type="text/css">
		body{
			font-family: sans-serif;
		}
		table{
			margin: 20px auto;
			border-collapse: collapse;
		}
		table th,
		table td{
			border: 1px solid #3c3c3c;
			padding: 3px 8px;
	 
		}
		a{
			background: blue;
			color: #fff;
			padding: 8px 10px;
			text-decoration: none;
			border-radius: 2px;
		}
	</style>
</head>
<body>
	<table>
	    <thead>
	      <tr>
	        <th>NO</th>
	        <th>NO TRANSAKSI</th>
	        <th>Karyawan</th>
	        <th>ALAT</th>
	        <th>JUMLAH KEMBALI</th>
	        <th>TANGGAL PINJAM</th>
	        <th>TANGGAL KEMBALI</th>
	        <th>KETERANGAN</th>
	      </tr>
	    </thead>
	    <tbody>
	         <?php $no = 1;
	         foreach ($row->result() as $key => $data) { ?>
	        <tr>
	            <td><?=$no++?>.</td>
	            <td><?=$data->no_trans?></td>
	            <td><?=$data->nama_karyawan?></td>
	            <td><?=$data->nama_tools?></td>
	            <td><?=$data->qty?></td>
	            <td><?=$data->tanggal_pinjam?></td>
	            <td><?=$data->tanggal_kembali?></td>
	            <td><?=$data->keterangan?></td>
	        </tr>
	        <?php
	        } ?>
	    </tbody>
	  </table>
</body>
</html>