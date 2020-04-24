<section class="content-header">
	<h1>
		Dashboard
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?=base_url('dashboard')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<!-- <li class="active">Dashboard</li> -->
	</ol>
</section>

<!-- Main content -->
<section class="content" >
	<!-- <div class="col-md-10 p-5 pt-2"> -->
		<div class="box"></div>
		<div class="row text-white" style="margin-top: 8vh; margin-left: 10vh;">
			<div class="col-lg-4">
				<div class="card bg-info" style="width: 20rem;">
					<div class="card-body">
						<h5 class="card-title text-center"> Data Tools </h5>
						<p class="text-center"><i class="fa fa-wrench fa-3x"></i></p>
						<div class="display-4 text-center"><?= $tools[0]->tools; ?></div>
						<p class="text-center"><a href="<?=site_url('tools')?>" class="btn btn-primary">Lihat Detial</a></p>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="card bg-info" style="width: 20rem;">
					<div class="card-body">
						<h5 class="card-title text-center"> Data Karyawan </h5>
						<p class="text-center"><i class="fa fa-user fa-3x"></i></p>
						<div class="display-4 text-center"><?= $karyawan[0]->karyawan; ?></div>
						<p class="text-center"> <a href="<?=site_url('karyawan')?>" class="btn btn-primary">Lihat Detial</a></p>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="card bg-info" style="width: 20rem;">
					<div class="card-body">
						<h5 class="card-title text-center"> Data Users </h5>
						<p class="text-center"><i class="fa fa-users fa-3x"></i></p>
						<div class="display-4 text-center"><?= $user[0]->user; ?></div>
						<p class="text-center"><a href="<?=site_url('users')?>" class="btn btn-primary">Lihat Detial</a></p>
					</div>
				</div>
			</div>
		</div>
		<br>
		<div class="row text-white" style="margin-top: 8vh; margin-left: 10vh;">
			<div class="col-lg-4">
				<div class="card bg-info" style="width: 20rem;">
					<div class="card-body">
						<h5 class="card-title text-center"> Data Peminjaman </h5>
						<p class="text-center"><i class="fa fa-hourglass-1 fa-3x"></i></p>
						<div class="display-4 text-center"><?= $pinjam[0]->pinjam; ?></div>
						<p class="text-center"><a href="<?=site_url('peminjaman')?>" class="btn btn-primary">Lihat Detial</a></p>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="card bg-info" style="width: 20rem;">
					<div class="card-body">
						<h5 class="card-title text-center"> Data Pengembalian </h5>
						<p class="text-center"><i class=" fa fa-hourglass-end fa-3x"></i></p>
						<div class="display-4 text-center"><?= $kembali[0]->kembali; ?></div>
						<p class="text-center"><a href="<?=site_url('pengembalian')?>" class="btn btn-primary">Lihat Detial</a></p>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="card bg-info" style="width: 20rem;">
					<div class="card-body">
						<h5 class="card-title text-center"> Laporan </h5>
						<p class="text-center"><i class="fa fa-book fa-3x"></i></p>
						<div class="display-4 text-center"> 100 </div>
						<p class="text-center"><a href="#" class="btn btn-primary">Lihat Detial</a></p>
					</div>
				</div>
			</div>
		</div>
	<!-- </div> -->
</section>