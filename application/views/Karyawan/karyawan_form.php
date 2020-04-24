<section class="content-header">
      <center> DATA KARYAWAN </center>
<!--       <ol class="breadcrumb">
        <li><a href="<?=site_url('karyawan') ?>"><i class="fa fa-user"></i>karyawan</a></li>
        <!-- <li class="active">karyawan</li>
      </ol>
    </section> -->

    <!-- Main content -->
<section class="content">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title"><?=ucfirst($page)?> karyawan</h3>
            <div class="pull-right">
              <a href="<?=site_url('karyawan') ?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i> Back
              </a>

            </div>
          </div>
          <div class="box-body">
          	<div class="row">
          		<div class="col-md-4 col-md-offset-4">
          			<form action="<?=site_url('karyawan/proses')?>" method="post">
          				<div class="form-group">
          					<label> Nik *</label>
                    <input type="hidden" name="id" value="<?=$row->karyawan_id?>">
          					<input type="text" name="nik" value="<?=$row->nik?>" class="form-control" required>
          				</div>
                    <div class="form-group">
                    <label> Nama *</label>
                    <input type="text" name="karyawan_name" value="<?=$row->nama?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label> Gender *</label>
                    <select name="gender" class="form-control" required>
                      <option value="">-PILIH-</option>
                      <option value="L">Laki-Laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label> Phone *</label>
                    <input type="text" name="nom" value="<?=$row->phone?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label> Alamat *</label>
                    <input type="text" name="addr" value="<?=$row->alamat?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label> Divisi *</label>
                    <input type="text" name="div" value="<?=$row->divisi?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label> Status *</label>
                    <input type="text" name="status" value="<?=$row->status?>" class="form-control" required>
                  </div>
          				<div class="form-group">
          					<button type="submit" name="<?=$page?>" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Simpan</button>
          					<button type="reset" class="btn btn-flat"><i class="fa fa-reply"></i> Reset</button>
          				</div>
          			</form>
          		</div>
          		
          	</div>
          	
          </div>
          </div>
    </div>
</section>