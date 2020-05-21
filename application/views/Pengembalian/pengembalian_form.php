<section class="content-header">
  <center> DATA PENGEMBALIAN </center>
</section>
<section class="content">
  <?php if ($this->session->flashdata('error')) { ?>
    <div class="row">
      <div class="col-12 alert alert-danger" role="alert">
        <?php echo $this->session->flashdata('error'); ?>
      </div>
    </div>
  <?php } ?>
  
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
    		<div class="col-md-10 col-md-offset-1">
    			<form action="<?=site_url('pengembalian/proses')?>" method="post" enctype="multipart/form-data">
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

            <br>
            
            <div class="form-group">
              <table id="tablealat" class="table table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>ID Tools</th>
                    <th>Nama Tools</th>
                    <th>QTY</th>
                  </tr>
                </thead>
                <tbody id="tbalat"></tbody>
              </table>
            </div>

            <br>

            <div class="form-group">
              <div class="container-fluid">
                <div class="row">
                  <div class="col col-md-6">
                    <label>Foto</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" accept="image/*" class="custom-file-input" name="foto" id="foto" required>
                      </div>
                    </div>
                  </div>
                  <div class="col col-md-6">
                    <img src="<?= base_url().$row->foto_pinjam ?>" alt="foto pinjam" style="height: 200px; width: auto;">
                  </div>
                </div>
              </div>
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
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    loaddata();
      $('#tablealat').DataTable();
  });

  function loaddata() {
    $('#karyawan').attr('readonly','true');
    $('#addtools').attr('disabled','true');
    $('#upfoto').hide();
    var alat_id = <?= json_encode($alat_id);?>;
    var nama_tools = <?= json_encode($nama_tools);?>;
    var qty = <?= json_encode($qty);?>;

    var row  ='';
    var no =1;
      for(i=0; i<alat_id.length; i++){
        row +='<tr>';
        row +='<td>'+no+'</td>';
        row +='<td> <input type="hidden" readonly="true" name="tools[]" value="'+alat_id[i]+'">'+alat_id[i];
        row +='<td>'+nama_tools[i]+'</td>';
        row +='<td> <input type="hidden" readonly="true" name="jml[]" min="1" value="'+qty[i]+'">'+qty[i];
        row +='</tr>';
        no++;
      }
    $('#tbalat').html(row);
  }
</script>