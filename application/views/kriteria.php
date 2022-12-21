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

							<!-- Button trigger modal -->
							<button type="button" class="btn btn-outline-primary mb-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
								Tambah <?= $page?>
							</button>
							
              <!-- Table with stripped rows -->
							<div class="table-responsive">

								<table class="table datatable table-striped" id="datatable1">
									<thead>
										<tr>
											<th scope="col" width="5%">No</th>
											<th scope="col" width="10%">Kode <?= $page?></th>
											<th scope="col">Nama <?= $page?></th>
											<th scope="col">Bobot</th>
											<th scope="col">Tipe</th>
											<th scope="col">Aksi</th>
											
										</tr>
									</thead>
									<tbody>
										<tr>
											<th scope="row">1</th>
											<td>Brandon Jacob</td>
											
										</tr>
										<tr>
											<th scope="row">2</th>
											<td>Bridie Kessler</td>
											
										</tr>
										<tr>
											<th scope="row">3</th>
											<td>Ashleigh Langosh</td>
											
										</tr>
										<tr>
											<th scope="row">4</th>
											<td>Angus Grady</td>
											
										</tr>
										<tr>
											<th scope="row">5</th>
											<td>Raheem Lehner</td>
											
										</tr>
									</tbody>
								</table>
							</div>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

		

		<!-- Modal -->
		<div class="modal fade tambah" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">Tambah <?= $page?></h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
					
					<form>
						<div class="mb-3">
							<label for="kode" class="form-label">Kode <?= $page?></label>
							<input type="text" class="form-control" id="kode" aria-describedby="emailHelp">
							<!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
						</div>
						<div class="mb-3">
							<label for="kriteria" class="form-label">Nama <?= $page?></label>
							<input type="text" class="form-control" id="kriteria" aria-describedby="emailHelp">
							<!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
						</div>
						<div class="mb-3">
							<label for="Bobot" class="form-label">Bobot</label>
							<input type="text" class="form-control" id="Bobot" aria-describedby="emailHelp">
							<!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
						</div>
						<div class="mb-3">
							<label for="tipe" class="form-label">Tipe</label>
							<select name="tipe" id="tipe" class="form-select">
								<option value="">Pilih Tipe</option>
								<option value="cost">Cost</option>
								<option value="benefit">Benefit</option>
							</select>
							<!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
						</div>
						<!-- <div class="mb-3">
							<label for="exampleInputPassword1" class="form-label">Password</label>
							<input type="password" class="form-control" id="exampleInputPassword1">
						</div> -->
						<!-- <div class="mb-3 form-check">
							<input type="checkbox" class="form-check-input" id="exampleCheck1">
							<label class="form-check-label" for="exampleCheck1">Check me out</label>
						</div> -->
						
					</form>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</div>
		</div>

</main>

<script>
$(document).ready(function() {
            var t = $('#datatable1').DataTable({
                "columnDefs": [{
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                }],
                "responsive": true,
                "bLengthChange": true,
                "bInfo": true,
                "oLanguage": {
                    "sSearch": "<i class='fa fa-search fa-fw'></i> Pencarian : ",
                    "sLengthMenu": "_MENU_ &nbsp;&nbsp;data per halaman",
                    "sInfo": "Menampilkan _START_ s/d _END_ dari <b>_TOTAL_ data</b>",
                    "sInfoEmpty": "",
                    "sInfoFiltered": "(difilter dari _MAX_ total data)",
                    "sZeroRecords": "Pencarian tidak ditemukan",
                    "sEmptyTable": "Tidak ada data"
                }
            });

            t.on('order.dt search.dt', function() {
                t.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();

            $('#confirm-delete').on('show.bs.modal', function(e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
        });
    </script>
