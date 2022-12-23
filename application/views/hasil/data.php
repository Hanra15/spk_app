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
                                        <th>Ranking</th>
                        <th>Nama Alternatif</th>
                        <th>Nilai</th>
										</tr>
									</thead>
									<tbody>
                                    <?php $no=1; foreach ($hasil as $row) { ?>
                    <tr>
                        <td><?= $no++?></td>
                        <td><?php echo $row->nama_alternatif; ?></td>
                        <td><?php echo floatval($row->nilai); ?></td>
                    </tr>
                    <?php } ?>
									</tbody>
								</table>
							</div>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

		

		
</main>
