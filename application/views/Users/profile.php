
<section class="content-header">
     <center> DATA PENGGUNA </center>
</section>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">
<style>
  .thead{
    font-family: 'Kaushan Script', cursive;
    border-color: white;
    font-size: 50px;
    font-weight: 30px;
  }
  .tbody{
    font-family: 'Kaushan Script', cursive;
    border-color: white;
    font-size: 50px;
    font-weight: 20px;
  }
</style>

    <!-- Main content --> 
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title"> Data Users</h3>
    </div>
    <div class="box-content">
      <div class="content">
        <div class="row">
          <div class="col-md-3">
            <span class="thead">Userid</span>
          </div>
          <div class="col-md-6">
            <span class="tbody">: <?= $row[0]->user_id; ?></span>
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            <span class="thead">Username</span>
          </div>
          <div class="col-md-6">
            <span class="tbody">: <?= $row[0]->username; ?></span>
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            <span class="thead">Nama</span>
          </div>
          <div class="col-md-6">
            <span class="tbody">: <?= strtoupper($row[0]->nama); ?></span>
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            <span class="thead">Alamat</span>
          </div>
          <div class="col-md-6">
            <span class="tbody">: <?= ucfirst($row[0]->alamat); ?></span>
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            <span class="thead">Level</span>
          </div>
          <div class="col-md-6">
            <span class="tbody">: 
              <?php 
                if ($row[0]->level == 1) {
                  echo 'Admin';
                }else{
                  echo 'User';
                }
              ?>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>