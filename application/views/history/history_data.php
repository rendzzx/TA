<section class="content-header">
  <center> HISTORY TRANSAKSI </center>
    <!-- Main content -->
<section class="content">
  <?php $this->view('messages') ?>
  <div class="box">
    <div class="box-header">
      <div class="pull-left">
        <form action="">
          <span>SORT BY</span>
          &nbsp;
          <select name="karyawan" id="karyawan">
            <option value="">all karyawan</option>
            <?php foreach ($karyawan as $kar) { ?>
              <option value="<?= $kar->karyawan_id ?>"><?= $kar->nik." - ". $kar->nama ?></option>
            <?php } ?>
          </select>
          &nbsp;
          <select name="tools" id="tools">
            <option value="">all tools</option>
            <?php foreach ($tools as $tol) { ?>
              <option value="<?= $tol->alat_id ?>"><?= $tol->alat_id." - ". $tol->nama ?></option>
            <?php } ?>
          </select>
          &nbsp;
          <button class="btn btn-primary">
            <i class="fa fa-sort"></i> SORT
          </button>
        </form>
      </div>
      <div class="pull-right">
        <a id="xexcel" class="btn btn-success btn-flat">
          <i class="fa fa-table"></i> Export to excel
        </a>
        &nbsp;
        <a id="xpdf" class="btn btn-primary btn-flat">
          <i class="fa fa-print"></i> Print All
        </a>
      </div>
    </div>
    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th>NO</th>
            <th>NO TRANSAKSI</th>
            <th>Karyawan</th>
            <th>ALAT</th>
            <th>JUMLAH KEMBALI</th>
            <th>TANGGAL PINJAM</th>
            <th>TANGGAL KEMBALI</th>
            <th>KETERANGAN</th>
            <th colspan="2">Foto</th>
            <th><center>AKSI</center></th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($row->result() as $key => $data) { ?>
            <tr>
              <td><?=$no++?>.</td>
              <td><?=$data->no_trans?></td>
              <td><?=$data->nama_karyawan?></td>
              <td><?=$data->nama_tools?></td>
              <td><?=$data->qty?></td>
              <td><?=$data->tanggal_pinjam?></td>
              <td><?=$data->tanggal_kembali?></td>
              <td><?=$data->keterangan?></td>
              <td>
                <a href="<?= base_url().$data->foto_pinjam ?>" target="_blank" data-toggle="tooltip" data-placement="top" title="click to zoom">
                  <img src="<?= base_url().$data->foto_pinjam ?>" alt="foto pinjam" style="height: 60px; width: auto;">
                </a>
              </td>
              <td>
                <a href="<?= base_url().$data->foto_kembali ?>" target="_blank" data-toggle="tooltip" data-placement="top" title="click to zoom">
                  <img src="<?= base_url().$data->foto_kembali ?>" alt="foto pinjam" style="height: 60px; width: auto;">
                </a>
              </td>
              <td class="text-center" width="160px">
                <a href="<?=site_url('history/printone/'.$data->no_trans)?>" target="_blank" class="btn btn-primary btn-xs">
                    <i class="fa fa-print"></i> Print
                </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
  </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();

    var tol = "<?= $_GET['tools']; ?>";
    if (tol != null || tol != '' || tol !== undefined) {
      $('#tools').val(tol).trigger('change');
    }

    var kar = "<?= $_GET['karyawan']; ?>";
    if (kar != null || kar != '' || tol !== undefined) {
      $('#karyawan').val(kar).trigger('change');
    }

    var xkar = $('#karyawan').val();
    var xtol = $('#tools').val();

    $('#xexcel').click(function() {
      var go = "<?= base_url('History/exportexcel'); ?>"+"?karyawan="+xkar+"&tools="+xtol;
      document.location.href = go;
    })

    $('#xpdf').click(function() {
      var go = "<?= base_url('History/printall'); ?>"+"?karyawan="+xkar+"&tools="+xtol;
      document.location.href = go;
    })

  });
</script>