<section class="content-header">
      <center> DATA PENGEMBALIAN </center>
<!--       <ol class="breadcrumb">
        <li><a href="<?=site_url('pengembalian') ?>"><i class="fa fa-user"></i>pengembalian</a></li>
        <!-- <li class="active">pengembalian</li>
      </ol>
    </section> -->

    <!-- Main content -->
<section class="content">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title"><?=ucfirst($page)?> pengembalian</h3>
            <div class="pull-right">
              <a href="<?=site_url('pengembalian') ?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i> Back
              </a>

            </div>
          </div>
          <div class="box-body">
          	<div class="row">
          		<div class="col-md-4 col-md-offset-4">
          			<form action="<?=site_url('pengembalian/proses')?>" method="post">
          				<div class="form-group">
                  <div class="form-group">
                    <label> NO TRANSAKSI *</label>
                    <input type="hidden" name="id" value="<?=$row->pengembalian_id?>">
                    <input type="text" name="no_trans" value="<?=$row->no_trans?>" class="form-control" required>
                  </div>
                    <label> NIK *</label>
                    <input type="text" name="nik" value="<?=$row->nik?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label> KODE ALAT *</label>
                    <input type="text" name="kd" value="<?=$row->kd_alat?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label> JUMLAH ALAT *</label>
                    <input type="text" name="jml" value="<?=$row->jumlah?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label> TANGGAL PINJAM *</label>
                    <input type="date" name="tgl" value="<?=$row->tgl_pinjam?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label> KETERANGAN *</label>
                    <textarea name="ket" class="form-control" required><?=$row->keterangan?></textarea>
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