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
            <div class="pull-right">
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
    </div>
</section>