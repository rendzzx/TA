<section class="content-header">
      <center> DATA PENGEMBALIAN </center>

    <!-- Main content -->
<section class="content">
  <?php $this->view('messages') ?>
        <div class="box">
          <div class="box-header">
            <div class="pull-right">
            </div>
          </div>
          <div class="box-body table-responsive">
            <h1 align="center">Selesai</h1>
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