<section class="content-header">
      <center> DATA ALAT BENGEL </center>

    <!-- Main content -->
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
    			<form action="<?=site_url('peminjaman/proses')?>" method="post">
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
              <button type="button" class="btn btn-primary btn-flat" style="width: 100%;" data-toggle="modal" data-target="#modalselecttolls">ADD TOOLS</button>
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
          <table id="produkTable" class="display" style="width:100%">
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
                      class="btnSelectProduk btn btn-primary btn-sm">select</button>
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
    $('#tablealat').DataTable();

    $.fn.showItem = function(){
      var row  ='';
      var no =1;
        for(i=0; i<listItem.length; i++){
          row +='<tr>';
          row +='<td>'+no+'</td>';
          row +='<td> <input type="text" readonly="true" name="alat_id[]" value="'+listItem[i][0]+'">';
          row +='<td>'+listItem[i][1]+'</td>';          
          row +='<td> <input type="number" name="jml[]" min="1" value="1">';
          row +='</tr>';
          no++;
        }
      $('#tbalat').html(row);
    }

    $('.btnSelectProduk').click(function(){
        var id = $(this).data('id');
        var nama = $(this).data('nama');

        var item = [id,nama];
        listItem.push(item);
        $(this).showItem();
        $('#modalselecttolls').modal('toggle');
    });

    $('#btnProses').click(function(){
        $.ajax({
          url:'<?php echo site_url("pesanan/submit"); ?>',
          data:$('#form_pesanan').serialize(),
          type:'POST',
          dataType:'json',
          beforeSend:function(){
            $('#btnProses').prop('disabled', true);
            $('#loading').html('Loading....');
          },
          success:function(res){
            $('#btnProses').prop('disabled', false);
            $('#loading').html('');

            $('#idPelanggan').val('');
            $('#namaPelanggan').val('');
            $('input[name=tglPesan]').val('');
            $('textarea[name=keterangan]').val('');
            alert(res.messages);

            listItem=[];
            $(this).showItem();
          }
        });
    });
});
</script>
