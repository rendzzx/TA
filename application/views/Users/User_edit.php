<section class="content-header">
     <center> DATA PENGGUNA </center>
<!--       <ol class="breadcrumb">
        <li><a href="<?=base_url('Users')?>"><i class="fa fa-user"></i>Users</a></li>
        <!-- <li class="active">Dashboard</li>
      </ol>
    </section> -->

    <!-- Main content --> 
<section class="content">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> Edit Users</h3>
            <div class="pull-right">
              <a href="<?=site_url('users') ?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i> Back
              </a>

            </div>
          </div>
          <div class="box-body">
          	<div class="row">
          		<div class="col-md-4 col-md-offset-4">
          			<form action="" method="post">
          				<div class="form-group <?=form_error('fullname') ? 'has-error' : null?>">
          					<label> Nama*</label>
                    <input type="hidden" name="user_id" value="<?=$row->user_id?>">
          					<input type="text" name="fullname" value="<?=$this->input->post('fullname') ?? $row->nama?>" class="form-control">
          					<span class="help-block"><?=form_error('fullname')?></span>
          				</div>

          				<div class="form-group <?=form_error('username') ? 'has-error' : null?>">
          					<label> Username*</label>
          					<input type="text" name="username" value="<?=$this->input->post('username') ?? $row->username?>" class="form-control">
          					<?=form_error('username')?>
          				</div>

          				<div class="form-group <?=form_error('password') ? 'has-error' : null?>">
          					<label> Password</label> <small>(Biarkan kosong jika tidak diganti)</small>
          					<input type="password" name="password" value="<?=$this->input->post('password')?>" class="form-control">
          					<?=form_error('password')?>
          				</div>

          				<div class="form-group <?=form_error('passconf') ? 'has-error' : null?>">
          					<label> Konfirmasi Password</label>
          					<input type="password" name="passconf" value="<?=$this->input->post('passconf')?>" class="form-control">
          					<?=form_error('passconf')?>
          				</div>

          				<div class="form-group <?=form_error('alamat') ? 'has-error' : null?>">
          					<label> Alamat*</label>
          					<textarea name="alamat" class="form-control"><?=$this->input->post('alamat') ?? $row->alamat?></textarea>
          					<?=form_error('alamat')?>
          				</div>

          				<div class="form-group <?=form_error('level') ? 'has-error' : null?>">
          					<label> Level</label>
          					<select name="level" class="form-control">
                      <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level  ?>
          						<option value="1">Admin</option>
          						<option value="2" <?=$level == 2 ? 'selected' : null?>>Kasir</option>
          					</select>
          					<?=form_error('level')?>
          				</div>
          				<div class="form-group">
          					<button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Simpan</button>
          					<button type="reset" class="btn btn-flat"><i class="fa fa-reply"></i> Reset</button>
          				</div>
          			</form>
          		</div>
          		
          	</div>
          	
          </div>
          </div>
    </div>
</section>