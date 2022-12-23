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
							<div class="table-responsive">

								<table class="table table-striped table-hover" >
									<thead>
										<tr>
                                        <th>Alternatif</th>
                        <?php foreach ($query_kriteria as $row) : ?>
                        <th><?php echo $row->kode_kriteria; ?></th>
                        <?php endforeach; ?>
											
										</tr>
									</thead>
									<tbody>

                                    <?php foreach ($query_alt as $row) : ?>
                    <tr>
                        <td width="200"><?php echo $row->nama_alternatif; ?></td>
                        <?php foreach ($query_kriteria as $row2) : ?>
                        <td class="text-center"><?php echo $bobot[$row->id_alternatif][$row2->id_kriteria]; ?></td>
                        <?php endforeach; ?>
                    </tr>
                    <?php endforeach; ?>
									</tbody>
								</table>
							</div>
                            <?php echo $rumus; ?>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

		

		
</main>
