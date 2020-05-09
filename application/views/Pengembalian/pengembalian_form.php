<section class="content-header">
      <center> DATA PENGEMBALIAN </center>
<!--       <ol class="breadcrumb">
        <li><a href="<?=site_url('pengembalian') ?>"><i class="fa fa-user"></i>pengembalian</a></li>
         <li class="active">pengembalian</li>
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
                    <label> NO TRANSAKSI *</label>
                    <input type="text" name="no_trans" value="<?=$row->no_trans?>" class="form-control" readonly>
                  </div>
                  <div class="form-group">
                    <label>Karyawan</label>
                    <select name="tools" class="form-control" readonly>
                      <option value="<?= $row->karyawan_id ?>"><?= $row->karyawan_id.' - '.$row->nama_karyawan ?></option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Alat</label>
                    <select name="tools" class="form-control" readonly>
                      <option value="<?= $row->alat_id ?>"><?= $row->alat_id.' - '.$row->nama_tools ?></option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label> JUMLAH ALAT *</label>
                    <input type="number" name="jml" value="<?=$row->qty?>" class="form-control" readonly>
                  </div>
                  <div class="form-group">
                    <label> TANGGAL KEMBALI *</label>
                    <input type="date" default="now" name="tgl" value="<?= date("Y-m-d");?>" class="form-control" readonly>
                  </div>
                  <div class="form-group">
                    <label> KETERANGAN *</label>
                    <textarea name="ket" class="form-control" autofocus required placeholder="tulis keterangan disini"><?php if($page!='kembali'){echo $row->keterangan;}?></textarea>
                  </div>
          				
          				<div class="form-group">
          					<button type="submit" name="kembali" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Simpan</button>
          					<button type="reset" class="btn btn-flat"><i class="fa fa-reply"></i> Reset</button>
          				</div>
          			</form>
          		</div>
          		
          	</div>
          	
          </div>
          </div>
    </div>
</section>