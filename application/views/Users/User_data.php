<section class="content-header">
     <center> DATA PENGGUNA </center>
<!--       <ol class="breadcrumb">
        <li><a href="<?=base_url('Users')?>"><i class="fa fa-user"></i>Users</a></li>
        <!-- <li class="active">Dashboard</li> -->
      </ol>
    </section>

    <!-- Main content --> 
<section class="content">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> Data Users</h3>
            <div class="pull-right">
              <a href="<?=site_url('users/add') ?>" class="btn btn-primary btn-flat">
                <i class="fa fa-user-plus"></i> Tambah Data
              </a>
              <a href="<?=site_url('users/add') ?>" class="btn btn-warning btn-flat">
                <i class="fa fa-user-print"></i> Export Data
              </a>

            </div>
          </div>
          <div class="box-body table-responsive">
         <!-- <?php print_r($row->result()) ?> -->

              <table class="table table-bordered table-striped" id="table1">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>USERNAME</th>
                    <th>NAMA</th>
                    <th>ALAMAT</th>
                    <th>LEVEL</th>
                    <th><center>AKSI</center></th>
                  </tr>
                </thead>
                <tbody>
                     <?php $no = 1;
                     foreach ($row->result() as $key => $data) { ?>
                    <tr>
                        <!-- <td><?=$data->user_id?>.</td> -->
                        <td><?=$no++?>.</td>
                        <td><?=$data->username?></td>
                        <td><?=$data->nama?></td>
                        <td><?=$data->alamat?></td>
                        <td><?=$data->level == 1 ? "Admin" : "Kasir" ?></td>
                        <td class="text-center" width="160px">
                          <form action="<?=site_url('users/del/')?>" method="post">
                           <a href="<?=site_url('users/edit/' .$data->user_id)?>" class="btn btn-primary btn-xs">
                              <i class="fa fa-edit"></i> Edit
                          </a>
                      
                            <input type="hidden" name="user_id" value="<?=$data->user_id?>">
                          <button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs">
                              <i class="fa fa-trash"></i> Hapus
                          </button>
                        </form>
                        </td>
                    </tr>
                    <?php
                    } ?>
                </tbody>
              </table>
          </div>
    </div>
</section>