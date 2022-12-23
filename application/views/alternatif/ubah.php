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
				
				<form action="<?php echo site_url('alternatif/ubah/' . $id_alternatif); ?>" method="post">
					<div class="mb-3">
						<label for="nama_alternatif" class="mb-3">Nama Alternatif</label>
						<input name="nama_alternatif" id="nama_alternatif" class="form-control" required type="text" value="<?php echo set_value('nama_alternatif', $nama_alternatif); ?>" style="width: 30% !important;">
					</div>
					<?php foreach ($query as $row): ?>
						<div class="mb-3">
							<label for="kriteria<?php echo $row->id_kriteria; ?>" class="mb-3"><?php echo $row->nama_kriteria; ?></label>
							<select class="form-control" name="kriteria<?php echo $row->id_kriteria; ?>" required style="width: 30% !important;">
								<option value="">Pilih...</option>
								<?php foreach ($sub[$row->id_kriteria] as $row_sub) { ?>
                        <option value="<?php echo $row_sub->id_subkriteria; ?>" <?php echo set_select('kriteria' . $row->id_kriteria, $row_sub->id_subkriteria, ($alt[$row->id_kriteria] == $row_sub->id_subkriteria ? TRUE : FALSE)); ?>><?php echo $row_sub->nama_subkriteria; ?></option>
                        <?php } ?>
							</select>
						</div>
					<?php endforeach; ?>
					
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
