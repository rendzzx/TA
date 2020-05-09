<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data User.xls");
?>

<html>
<head>
	<title>Data User</title>
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
            <th>USER ID</th>
            <th>USERNAME</th>
            <th>NAMA</th>
            <th>ALAMAT</th>
            <th>LEVEL</th>
          </tr>
        </thead>
        <tbody>
             <?php $no = 1;
             foreach ($row->result() as $key => $data) { ?>
            <tr>
                <td><?=$no++?>.</td>
                <td><?=$data->user_id?></td>
                <td><?=$data->username?></td>
                <td><?=$data->nama?></td>
                <td><?=$data->alamat?></td>
                <td><?=$data->level == 1 ? "Admin" : "User" ?></td>
            </tr>
            <?php
            } ?>
        </tbody>
    </table>
</body>
</html>