<section class="content-header">
      <center> DATA ALAT BENGEL </center>
<!--       <ol class="breadcrumb">
        <li><a href="<?=site_url('tools') ?>"><i class="fa fa-user"></i>Tools</a></li>
        <!-- <li class="active">Tools</li>
      </ol>
    </section> -->

    <!-- Main content -->
<section class="content">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title"><?=ucfirst($page)?> Tools</h3>
            <div class="pull-right">
              <a href="<?=site_url('tools') ?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i> Back
              </a>

            </div>
          </div>
          <div class="box-body">
          	<div class="row">
          		<div class="col-md-4 col-md-offset-4">
          			<form action="<?=site_url('tools/proses')?>" method="post">
          				<div class="form-group">
                  <div class="form-group">
                    <label> Kode Alat *</label>
                    <input type="hidden" name="id" value="<?=$row->alat_id?>">
                    <input type="text" name="kd" value="<?=$row->kd_alat?>" class="form-control" required>
                  </div>
                    <label> Nama Alat *</label>
                    <input type="text" name="alat_name" value="<?=$row->nama?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label> Harga *</label>
                    <input type="number" name="price" value="<?=$row->harga?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label> Keterangan *</label>
                    <textarea name="keterangan" class="form-control"><?=$row->keterangan?></textarea>
                  </div>
                  <div class="form-group">
                    <label> Tgl Beli *</label>
                    <input type="date" name="beli" value="<?=$row->tgl_beli?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label> Stok *</label>
                    <input type="number" name="stok" value="<?=$row->stok?>" class="form-control" required>
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