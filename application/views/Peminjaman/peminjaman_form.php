<section class="content-header">
      <center> DATA ALAT BENGEL </center>
<!--       <ol class="breadcrumb">
        <li><a href="<?=site_url('peminjaman') ?>"><i class="fa fa-user"></i>peminjaman</a></li>
        <!-- <li class="active">peminjaman</li>
      </ol>
    </section> -->

    <!-- Main content -->
<section class="content">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title"><?=ucfirst($page)?> peminjaman</h3>
            <div class="pull-right">
              <a href="<?=site_url('peminjaman') ?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i> Back
              </a>

            </div>
          </div>
          <div class="box-body">
          	<div class="row">
          		<div class="col-md-4 col-md-offset-4">
          			<form action="<?=site_url('peminjaman/proses')?>" method="post">
          				<div class="form-group">
                  <div class="form-group">
                    <label> NO TRANSAKSI *</label>
                    <!-- <input type="hidden" name="id" value="<?=$row->peminjaman_id?>"> -->
                    <input type="text" name="no_trans" value="<?=$row->no_trans?>" class="form-control" readonly placeholder="No trans will be adedd automatically">
                  </div>
                    <label> Karyawan *</label>
                    <br>
                    <select name="karyawan" class="form-control">
                      <?php if (is_null($row->karyawan_id)) { ?>
                        <option value="">pilih Karyawan</option>
                      <?php }else{ ?>
                        <option value="<?= $row->karyawan_id ?>"><?= $row->karyawan_id.' - '.$row->nama_karyawan; ?></option>
                      <?php } ?>
                      <?php foreach ($combo_kar as $comkar) { ?>
                        <option value="<?= $comkar->karyawan_id ?>"><?= $comkar->karyawan_id.' - '.$comkar->nama; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label> KODE ALAT *</label>
                    <br>
                    <select name="tools" class="form-control">
                      <?php if (is_null($row->alat_id)) { ?>
                        <option value="">pilih Tools</option>
                      <?php }else{ ?>
                        <option value="<?= $row->alat_id ?>"><?= $row->alat_id.' - '.$row->nama_tools; ?></option>
                      <?php } ?>
                      <?php foreach ($combo_tools as $comtools) { ?>
                        <option value="<?= $comtools->alat_id ?>"><?= $comtools->alat_id.' - '.$comtools->nama; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label> JUMLAH ALAT *</label>
                    <input type="number" name="jml" value="<?=$row->qty?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label> TANGGAL PINJAM *</label>
                    <input type="date" name="tgl" value="<?=$row->tanggal_pinjam?>" class="form-control" required>
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