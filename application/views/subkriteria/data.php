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
			<div class="table-responsive">
            <table class="table">
                <tr>
                    <td width="150">Nama Kriteria</td>
                    <td>: <?php echo $kode_kriteria . " - " . $nama_kriteria; ?></td>
                </tr>
                <tr>
                    <td width="150">Bobot </td>
                    <td>: <?php echo $bobot; ?></td>
                </tr>
                <tr>
                    <td width="150">Tipe </td>
                    <td>: <?php echo $tipe; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <a href="<?php echo site_url('kriteria'); ?>" class="btn btn-warning">Kembali</a> &nbsp;
                        <a href="<?php echo site_url('subkriteria/tambah/' . $id_kriteria); ?>" class="btn btn-primary">Tambah Subkriteria</a>
                    </td>
                </tr>
            </table>
        </div>
			</div>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?= $page?></h5>
              <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->


              <!-- Table with stripped rows -->
							<div class="table-responsive">

								<table class="table datatable table-striped table-hover" id="datatables1">
									<thead>
										<tr>
                      <th>No</th>
                      <th>Data Awal</th>
                      <th>Keterangan</th>
                      <th>Bobot</th>
											<th scope="col">Aksi</th>
											
										</tr>
									</thead>
									<tbody>

										<?php 
										$no = 1;
										 foreach($query as $row) :
										 ?>

										<tr>
											<th><?= $no++;?></th>
									
                        <td><?php echo $row->nilai_sub; ?></td>
                        <td><?php echo $row->nama_subkriteria; ?></td>
                        <td><?php echo $row->bobot; ?></td>
											<td>
												<a href="<?php echo site_url('subkriteria/ubah/' . $id_kriteria . '/' . $row->id_subkriteria); ?>" class="btn btn-outline-success btn-xs" title="Ubah">Ubah</a> 
												<a href="<?php echo site_url('subkriteria/hapus/' . $id_kriteria . '/' . $row->id_subkriteria); ?>" class="btn btn-outline-danger btn-xs">Hapus</a> 
											</td>
											
										</tr>
										
										<?php endforeach?>
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
