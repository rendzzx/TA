<section class="content-header">
      <center> DATA PENGEMBALIAN </center>
<!--       <ol class="breadcrumb">
        <li><a href="<?=site_url('pengembalian') ?>"><i class="fa fa-user"></i>pengembalian</a></li>
      </ol>
    </section> -->

    <!-- Main content -->
<section class="content">
<?php $this->view('messages') ?>
        <div class="box">
          <div class="box-header">
           <!--  <h3 class="box-title"> pengembalian</h3> -->
            <div class="pull-right">
              <a href="<?=site_url('pengembalian/add') ?>" class="btn btn-primary btn-flat">
                <i class="fa fa-hourglass-end"></i> Pengembalian Tools
              </a>
            </div>
          </div>

          <div class="box-body table-responsive">
              <table class="table table-bordered table-striped" id="tableprocess">
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
                     foreach ($process->result() as $key) { ?>
                    <tr>
                        <td><?=$no++?>.</td>
                        <td><?=$key->no_trans?></td>
                        <td><?=$key->nama_karyawan?></td>
                        <td><?=$key->nama_tools?></td>
                        <td><?=$key->qty?></td>
                        <td><?=$key->tanggal_pinjam?></td>
                        <td><?=$key->keterangan?></td>
                        <td class="text-center" width="160px">
                          <a href="<?=site_url('pengembalian/kembali/'.$key->no_trans)?>" class="btn btn-primary btn-xs">
                              <i class="fa fa-send"></i> Kembalikan
                          </a>
                        </td>
                    </tr>
                    <?php
                    } ?>
                </tbody>
              </table>
          </div>

          <br><br><br>

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
                    <th>TANGGAL KEMBALI</th>
                    <th>KETERANGAN</th>
                    <th><center>AKSI</center></th>
                  </tr>
                </thead>
                <tbody>
                     <?php $no = 1;
                     foreach ($row->result() as $key => $data) { ?>
                    <tr>
                        <!-- <td><?=$data->user_id?>.</td> -->
                        <td><?=$no++?>.</td>
                        <td><?=$data->no_trans?></td>
                        <td><?=$data->nama_karyawan?></td>
                        <td><?=$data->nama_tools?></td>
                        <td><?=$data->qty?></td>
                        <td><?=$data->tanggal_pinjam?></td>
                        <td><?=$data->tanggal_kembali?></td>
                        <td><?=$data->keterangan?></td>
                        <td class="text-center" width="160px">
                          <a href="<?=site_url('pengembalian/edit/'.$data->no_trans)?>" class="btn btn-primary btn-xs">
                              <i class="fa fa-edit"></i> Edit
                          </a>
                          <a href="<?=site_url('pengembalian/del/'.$data->no_trans)?>" onclick="return confirm('Apakah Anda yakin?')"class="btn btn-danger btn-xs">
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