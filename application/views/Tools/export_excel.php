<?php
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=Data tools.xls");
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
        <th>ID</th>
        <th>NAMA</th>
        <th>HARGA</th>
        <th>KETERANGAN</th>
        <th>Tgl Beli</th>
        <th>STOK</th>
      </tr>
    </thead>
    <tbody>
         <?php $no = 1;
         foreach ($row->result() as $key => $data) { ?>
        <tr>
            <td><?=$no++?>.</td>
            <td><?=$data->alat_id?></td>
            <td><?=$data->nama?></td>
            <td><?=$data->harga?></td>
            <td><?=$data->keterangan?></td>
            <td><?=$data->tgl_beli?></td>
            <td><?=$data->stok?></td>
        </tr>
        <?php
        } ?>
    </tbody>
  </table>
</body>
</html>