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
				
				<form action="<?php echo site_url('subkriteria/ubah/' . $id_kriteria . '/' . $id_subkriteria); ?>" method="post">
                <?php echo validation_errors('<div class="alert bg-danger" role="alert">', '</div>'); ?>
					<div class="mb-3">
						<label for="nilai_sub" class="mb-3">Data Awal</label>
						<input name="nilai_sub" id="nilai_sub" class="form-control" required type="text" value="<?php echo set_value('nilai_sub'); ?>" style="width: 30% !important;">
					</div>
					<div class="mb-3">
						<label for="nama_subkriteria" class="mb-3">Keterangan</label>
						<input name="nama_subkriteria" id="nama_subkriteria" class="form-control" required type="text" value="<?php echo set_value('nama_subkriteria', $nama_subkriteria); ?>" style="width: 30% !important;">
					</div>
					<div class="mb-3">
						<label for="bobot" class="mb-3">Bobot</label>
						<input name="bobot" id="bobot" class="form-control" required type="number" value="<?php echo set_value('bobot', $bobot); ?>" style="width: 30% !important;">
					</div>
					
					
					<div class="mt-5">
						<button type="submit" name="save" class="btn btn-primary">Simpan</button>
						<a href="<?php echo site_url('subkriteria'); ?>" class="btn btn-secondary">Batal</a>

					</div>

				</form>

            </div>
          </div>

        </div>
      </div>
    </section>

		

		
</main>
