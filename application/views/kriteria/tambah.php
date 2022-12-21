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
				
				<form action="<?php echo site_url('kriteria/tambah'); ?>" method="post">
					<div class="mb-3">
						<label for="kode_kriteria" class="mb-3">Kode Kriteria</label>
						<input name="kode_kriteria" id="kode_kriteria" class="form-control" required type="text" value="<?php echo set_value('kode_kriteria'); ?>" style="width: 30% !important;">
					</div>
					<div class="mb-3">
						<label for="nama_kriteria" class="mb-3">Nama Kriteria</label>
						<input name="nama_kriteria" id="nama_kriteria" class="form-control" required type="text" value="<?php echo set_value('nama_kriteria'); ?>" style="width: 30% !important;">
					</div>
					<div class="mb-3">
						<label for="bobot" class="mb-3">Bobot</label>
						<input name="bobot" id="bobot" class="form-control" required type="number" value="<?php echo set_value('bobot'); ?>" style="width: 30% !important;">
					</div>
					
					<div class="mb-3">
						<label for="tipe" class="mb-3">Tipe</label>
						<select class="form-control" name="tipe" id="tipe" required style="width: 30% !important;">
							<option value="">Pilih Tipe...</option>
							<option value="cost" <?php echo set_select('tipe', 'cost'); ?>>cost</option>
							<option value="benefit" <?php echo set_select('tipe', 'benefit'); ?>>benefit</option>
						</select>
					</div>
					<div class="mt-5">
						<button type="submit" name="save" class="btn btn-primary">Simpan</button>
						<a href="<?php echo site_url('kriteria'); ?>" class="btn btn-secondary">Batal</a>

					</div>

				</form>

            </div>
          </div>

        </div>
      </div>
    </section>

		

		
</main>
