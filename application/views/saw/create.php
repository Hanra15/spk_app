

<main id="main" class="main">

<div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url()?>dashboard">Dashboard</a></li>
          <li class="breadcrumb-item active"><?= $page?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?= $page?></h5>
              <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->
				
				<form action="<?php echo site_url('saw/create'); ?>" method="post">
                <?php echo validation_errors('<div class="alert bg-danger" role="alert">', '</div>'); ?>
					<div class="mb-3">
						<label for="nama" class="mb-3">Nama</label>
						<input name="nama" id="nama" class="form-control" required type="text" value="<?php echo set_value('nama'); ?>" style="width: 30% !important;">
					</div>
					<div class="mb-3">
						<label for="harga" class="mb-3">Lokasi</label>
						<input name="harga" id="harga" class="form-control" required type="text" value="<?php echo set_value('harga'); ?>" style="width: 30% !important;">
					</div>
					<div class="mb-3">
						<label for="ram" class="mb-3">Luas Tanah (m2)</label>
						<input name="ram" id="ram" class="form-control" required type="text" value="<?php echo set_value('ram'); ?>" style="width: 30% !important;">
					</div>
					<div class="mb-3">
						<label for="memori" class="mb-3">Harga Tanah (Ribu/m2)</label>
						<input name="memori" id="memori" class="form-control" required type="text" value="<?php echo set_value('memori'); ?>" style="width: 30% !important;">
					</div>
					<div class="mb-3">
						<label for="processor" class="mb-3">Bentuk Lahan</label>
						<input name="processor" id="processor" class="form-control" required type="text" value="<?php echo set_value('processor'); ?>" style="width: 30% !important;">
					</div>
					<div class="mb-3">
						<label for="kamera" class="mb-3">Resiko Keamanan</label>
						<input name="kamera" id="kamera" class="form-control" required type="text" value="<?php echo set_value('kamera'); ?>" style="width: 30% !important;">
					</div>
					
					
					<div class="mt-5">
						<button type="submit" name="save" class="btn btn-primary">Simpan</button>
						<a href="<?php echo site_url('saw/data'); ?>" class="btn btn-secondary">Batal</a>

					</div>

				</form>

            </div>
          </div>

        </div>
      </div>
    </section>

		

		
</main>
