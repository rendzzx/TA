<section class="content-header">
      <center> DATA PENGEMBALIAN </center>

    <!-- Main content -->
<section class="content">
  <?php $this->view('messages') ?>
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">History Transaksi</h3>
            <div class="pull-right">
              <a href="<?=site_url('history/printall') ?>" class="btn btn-primary btn-flat">
                <i class="fa fa-print"></i> Print All
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
                    <th>JUMLAH KEMBALI</th>
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
                          <a href="<?=site_url('history/del/'.$data->no_trans)?>" onclick="return confirm('Apakah Anda yakin hapus semua data?')"class="btn btn-danger btn-xs">
                              <i class="fa fa-trash"></i> Hapus
                          </a>
                          <a href="<?=site_url('history/printone/'.$data->no_trans)?>" target="_blank" class="btn btn-primary btn-xs">
                              <i class="fa fa-print"></i> Print
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