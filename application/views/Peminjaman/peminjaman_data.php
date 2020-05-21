<section class="content-header">
      <center> DATA PEMINJAMAN </center>
    <!-- Main content -->
<section class="content">
<?php $this->view('messages') ?>
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> peminjaman</h3>
            <div class="pull-right">
              <a href="<?=site_url('peminjaman/add') ?>" class="btn btn-primary btn-flat">
                <i class="fa fa-hourglass-1"></i> Peminjaman Tools
              </a>
            </div>
          </div>
          <div class="box-body table-responsive">
              <table class="table table-bordered table-striped" id="table1">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>NO TRANSAKSI</th>
                    <th>Karyawan</th>
                    <th>ALAT</th>
                    <th>JUMLAH PINJAM</th>
                    <th>TANGGAL PINJAM</th>
                    <th>KETERANGAN</th>
                    <th><center>AKSI</center></th>
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
                        <td><?=$data->keterangan?></td>
                        <td class="text-center" width="160px">
                          <a href="<?=site_url('peminjaman/edit/'.$data->no_trans)?>" class="btn btn-primary btn-xs">
                              <i class="fa fa-edit"></i> Edit
                          </a>
                          <a href="<?=site_url('peminjaman/del/'.$data->no_trans)?>" onclick="return confirm('Apakah Anda yakin?')"class="btn btn-danger btn-xs">
                              <i class="fa fa-trash"></i> Hapus
                          </a>

                        </td>
                    </tr>
                    <?php
                    } ?>
                </tbody>
              </table>
          </div>
    </div>
</section>

<?php 
$email = strtoupper(md5('guest@ifca.co.id'));
$pass = strtoupper(md5('pass1234'));
$p = strtoupper(md5($email."P@ssw0rd".$pass));

$pas = "30330,000";
var_dump(number_format((float)$pas,2,".",""));
 ?>