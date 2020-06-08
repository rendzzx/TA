<section class="content-header">
      <center> DATA ALAT BENGEL </center>
    </section>

    <!-- Main content -->
<section class="content">
<?php $this->view('messages') ?>
<?php if ($this->session->flashdata('error')) { ?>
    <div class="row">
      <div class="col-12 alert alert-danger" role="alert">
        <?php echo $this->session->flashdata('error'); ?>
      </div>
    </div>
  <?php } ?>
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> Tools</h3>
            <div class="pull-right">
              <a href="<?=site_url('tools/exportexcel') ?>" class="btn btn-success btn-flat">
                <i class="fa fa-table"></i> Export to excel
              </a>

              <a href="<?=site_url('tools/add') ?>" class="btn btn-primary btn-flat">
                <i class="fa fa-plus"></i> Tambah Data
              </a>
            </div>
          </div>
          <div class="box-body table-responsive">
         <!-- <?php print_r($row->result()) ?> -->

              <table class="table table-bordered table-striped" id="table1">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>ID</th>
                    <th>NAMA</th>
                    <th>HARGA</th>
                    <th>KETERANGAN</th>
                    <th>Tgl Beli</th>
                    <th>STOK</th>
                    <th><center>AKSI</center></th>
                  </tr>
                </thead>
                <tbody>
                     <?php $no = 1;
                     foreach ($row->result() as $key => $data) { ?>
                    <tr>
                        <!-- <td><?=$data->user_id?>.</td> -->
                        <td><?=$no++?>.</td>
                        <td><?=$data->alat_id?></td>
                        <td><?=$data->nama?></td>
                        <td><?=$data->harga?></td>
                        <td><?=$data->keterangan?></td>
                        <td><?=$data->tgl_beli?></td>
                        <td><?=$data->stok?></td>
                        <td class="text-center" width="160px">
                          <a href="<?=site_url('tools/edit/'.$data->alat_id)?>" class="btn btn-primary btn-xs">
                              <i class="fa fa-edit"></i> Edit
                          </a>
                          <a href="<?=site_url('tools/del/'.$data->alat_id)?>" onclick="return confirm('Apakah Anda yakin?')"class="btn btn-danger btn-xs">
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