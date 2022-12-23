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
              <h5 class="card-title">Detail Data Alternatif</h5>
              <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->

							<!-- Button trigger modal -->
							
              <!-- Table with stripped rows -->
							<div class="table-responsive">

								<table class="table table-hover">
                                <tr>
                    <td width="200">Nama Alternatif</td>
                    <td>: <?php echo $nama_alternatif; ?></td>
                </tr>
                <?php foreach ($query as $row): ?>
                <tr>
                    <td><?php echo $row->nama_kriteria; ?></td>
                    <td>: <?php echo $sub[$row->id_kriteria]; ?></td>
                </tr>
                <?php endforeach; ?>
                
								</table>
							</div>
              <!-- End Table with stripped rows -->
              <a href="<?php echo site_url('alternatif'); ?>" class="btn btn-secondary">Kembali</a>
            </div>
          </div>

        </div>
      </div>
    </section>

		

		
</main>
