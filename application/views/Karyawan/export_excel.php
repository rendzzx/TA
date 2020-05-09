<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Karyawan.xls");
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
	        <th>NIK</th>
	        <th>NAMA</th>
	        <th>GENDER</th>
	        <th>PHONE</th>
	        <th>ALAMAT</th>
	        <th>DIVISI</th>
	        <th>STATUS</th>
	      </tr>
	    </thead>
	    <tbody>
	         <?php $no = 1;
	         foreach ($row->result() as $key => $data) { ?>
	        <tr>
	            <td><?=$no++?>.</td>
	            <td><?=$data->nik?></td>
	            <td><?=$data->nama?></td>
	            <td><?=$data->gender == 'L' ? 'Pria' : 'Wanita'?></td>
	            <td><?=$data->phone?></td>
	            <td><?=$data->alamat?></td>
	            <td><?=$data->divisi?></td>
	            <td><?=$data->status?></td>
	        </tr>
	        <?php
	        } ?>
	    </tbody>
	</table>
</body>
</html>