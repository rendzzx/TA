<section class="content-header">
  <center> DATA ALAT BENGEL </center>
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
      <h3 class="box-title"><?=ucfirst($page)?> peminjaman</h3>
      <div class="pull-right">
        <a href="<?=site_url('peminjaman') ?>" class="btn btn-warning btn-flat">
          <i class="fa fa-undo"></i> Back
        </a>

      </div>
    </div>
    <div class="box-body">
    	<div class="row">
    		<div class="col-md-10 col-md-offset-1">
    			<form action="<?=site_url('peminjaman/proses')?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label> NO TRANSAKSI *</label>
              <input type="text" name="no_trans" value="<?=$row->no_trans?>" class="form-control" readonly placeholder="No trans will be adedd automatically">
            </div>

            <div class="form-group">
              <label> TANGGAL PINJAM *</label>
              <input type="date" name="tgl" value="<?php if(!is_null($row->tanggal_pinjam)){echo $row->tanggal_pinjam;}else{echo date("Y-m-d");}?>" class="form-control" readonly>
            </div>

            <div class="form-group">
              <label> Karyawan *</label>
              <br>
              <select name="karyawan" id="karyawan" class="form-control" required>
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
              <button type="button" id="addtools"  class="btn btn-primary btn-flat" style="width: 100%;" data-toggle="modal" data-target="#modalselecttolls">ADD TOOLS</button>
            </div>

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

            <div class="form-group" id="upfoto">
              <label>Foto</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" accept="image/*" class="custom-file-input" name="foto" id="foto" required>
                </div>
              </div>
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

  <div class="modal fade" id="modalselecttolls" tabindex="-1" role="dialog" aria-labelledby="modalselecttolls" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Daftar Produk</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table id="tblselectalat" class="display" style="width:100%">
          <thead>
              <tr>
                  <th>ACTION</th>          
                  <th>ID PRODUK</th>
                  <th>NAMA PRODUK</th>
                  <th>STOK</th>
              </tr>
          </thead>
          <tbody>
            <?php foreach($tools as $row){ ?>
              <tr>
                  <td>
                      <button type="button" 
                      data-id="<?php echo $row->alat_id; ?>"
                      data-nama="<?php echo $row->nama; ?>" 
                      data-stok="<?php echo $row->stok; ?>" 
                      class="btnSelectProduk btn btn-primary" style="width: 80%; margin-top: 1px; margin-bottom: 1px;">select</button>
                  </td>
                  <td><?php echo $row->alat_id; ?></td>
                  <td><?php echo $row->nama; ?></td>
                  <td><?php echo $row->stok; ?></td>
              </tr>
              <?php } ?>
          </tbody>
        </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
  var listItem =[];

$(document).ready(function() {
  loaddata();
    $('#tablealat').DataTable();
    $('#tblselectalat').DataTable();

    $.fn.showItem = function(){
      var row  ='';
      var no =1;
        for(i=0; i<listItem.length; i++){
          row +='<tr>';
          row +='<td>'+no+'</td>';
          row +='<td> <input type="hidden" readonly="true" name="tools[]" value="'+listItem[i][0]+'">'+listItem[i][0];
          row +='<td>'+listItem[i][1]+'</td>';
          row +='<td> <input type="number" name="jml[]" min="1" value="1">';
          row +='</tr>';
          no++;
        }
      $('#tbalat').html(row);
      // console.log(listItem);
    }

    $('.btnSelectProduk').click(function(){
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var stok = $(this).data('stok');

        var item = [id,nama,stok];
        listItem.push(item);
        $(this).showItem();
        $('#modalselecttolls').modal('toggle');
    });
});

function loaddata() {
  <?php if ($this->uri->segment(2) == 'edit') { ?>
    $('#karyawan').attr('readonly','true');
    $('#addtools').hide();
    $('#upfoto').remove();
    var alat_id     = <?= isset($alat_id) ? json_encode($alat_id) : ' ' ;?>;
    var nama_tools  = <?= isset($nama_tools) ? json_encode($nama_tools) : ' ' ;?>;
    var qty         = <?= isset($qty) ? json_encode($qty) : ' ' ;?>;

    var row  ='';
    var no =1;
      for(i=0; i<alat_id.length; i++){
        row +='<tr>';
        row +='<td>'+no+'</td>';
        row +='<td> <input type="hidden" readonly="true" name="tools[]" value="'+alat_id[i]+'">'+alat_id[i];
        row +='<td>'+nama_tools[i]+'</td>';
        row +='<td> <input type="number" name="jml[]" min="1" value="'+qty[i]+'">';
        row +='</tr>';
        no++;
      }
    $('#tbalat').html(row);
  <?php } ?>
}
</script>
