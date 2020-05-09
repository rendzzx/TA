<section class="content-header">
      <center> DATA KARYAWAN </center>
    </section>

    <!-- Main content -->
<section class="content">
  <?php $this->view('messages') ?>
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> karyawan</h3>
            <div class="pull-right">
              <a href="<?=site_url('karyawan/exportexcel') ?>" class="btn btn-success btn-flat">
                <i class="fa fa-table"></i> Export to excel
              </a>

              <a href="<?=site_url('karyawan/add') ?>" class="btn btn-primary btn-flat">
                <i class="fa fa-plus"></i> Tambah Data
              </a>
               <!-- <a href="<?=site_url('karyawan/add') ?>" class="btn btn-warning btn-flat">
                <i class="fa fa-print"></i> Export Data
              </a> -->

            </div>
          </div>
          <div class="box-body table-responsive">
              <table class="table table-bordered table-striped" id="table1">
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
                    <th><center>AKSI</center></th>
                  </tr>
                </thead>
                <tbody>
                     <?php $no = 1;
                     foreach ($row->result() as $key => $data) { ?>
                    <tr>
                        <!-- <td><?=$data->user_id?>.</td> -->
                        <td><?=$no++?>.</td>
                        <td><?=$data->nik?></td>
                        <td><?=$data->nama?></td>
                        <td><?=$data->gender == 'L' ? 'Pria' : 'Wanita' ?></td>
                        <td><?=$data->phone?></td>
                        <td><?=$data->alamat?></td>
                        <td><?=$data->divisi?></td>
                        <td><?=$data->status?></td>
                        <td class="text-center" width="160px">
                          <a href="<?=site_url('karyawan/edit/'.$data->karyawan_id)?>" class="btn btn-primary btn-xs">
                              <i class="fa fa-edit"></i> Edit
                          </a>
                          <a href="<?=site_url('karyawan/del/'.$data->karyawan_id)?>" onclick="return confirm('Apakah Anda yakin?')"class="btn btn-danger btn-xs">
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