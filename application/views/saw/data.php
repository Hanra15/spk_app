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
              <h5 class="card-title">Data Alternatif</h5>
              <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->

							<!-- Button trigger modal -->
							<a type="button" class="btn btn-outline-primary mb-4" href="<?= base_url()?>saw/create">Tambah Alternatif</a> 
              <!-- Table with stripped rows -->
							<div class="table-responsive">

								<table class="table datatable table-striped table-hover" id="datatables1">
									<thead>
										<tr>
                                        <th>No</th>
            <th>Alternatif</th>
            <th>Lokasi</th>
            <th>Luas Tanah (m2)</th>
            <th>Harga Tanah (Ribu/m2)</th>
            <th>Bentuk Lahan</th>
            <th>Resiko Keamanan</th>
											<th scope="col">Aksi</th>
											
										</tr>
									</thead>
									<tbody>

                                    <?php $j = 1;
            foreach ($tabel as $tabel_list) { ?> <tr>
            <td><?php echo $j++ ?></td>
            <td><?php echo $tabel_list['nama'] ?></td>
            <td><?php echo $tabel_list['harga'] ?></td>
            <td><?php echo $tabel_list['ram'] ?></td>
            <td><?php echo $tabel_list['memori'] ?></td>
            <td><?php echo $tabel_list['processor'] ?></td>
            <td><?php echo $tabel_list['kamera'] ?></td>
            <td>
              <a href="<?php echo site_url('saw/update/' . $tabel_list['id']); ?>" class="btn btn-outline-success btn-xs" title="Ubah">Ubah</a> &nbsp;
              <a href="#" data-href="<?php echo site_url('saw/delete/' . $tabel_list['id']); ?>" data-toggle="modal" data-target="#confirm-delete" class="btn btn-outline-danger btn-xs" title="Hapus">Hapus</a> &nbsp;
            </td>
            </tr>
          <?php } ?>
									</tbody>
								</table>
							</div>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
        
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Bobot</h5>
              <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->

							<!-- Button trigger modal -->
							
              <!-- Table with stripped rows -->
							<div class="table-responsive">

								<table class="table datatable table-striped table-hover" id="datatables1">
									<thead>
										<tr>
                                        <th>C1</th>
                                        <th>C2</th>
                                        <th>C3</th>
                                        <th>C4</th> 
                                        <th>C5</th>           
            
											<th scope="col">Aksi</th>
											
										</tr>
									</thead>
									<tbody>

                                    <?php $j = 0;
            foreach ($bobot as $bobot_list) { ?> <tr>
            <td><?php echo $bobot_list['C1'] ?></td>
            <td><?php echo $bobot_list['C2'] ?></td>
            <td><?php echo $bobot_list['C3'] ?></td>
            <td><?php echo $bobot_list['C4'] ?></td>
            <td><?php echo $bobot_list['C5'] ?></td>
            <td>
              <a href="<?php echo site_url('saw/update_bobot/'); ?>" class="btn btn-outline-success btn-xs" title="Ubah">Ubah</a> &nbsp;
            </td>
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
