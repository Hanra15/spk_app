<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $title;?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url()?>assets/img/favicon.png" rel="icon">
  <link href="<?= base_url()?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url()?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url()?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url()?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?= base_url()?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?= base_url()?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url()?>assets/vendor/simple-datatables/style.css" rel="stylesheet">

	<!-- Datatables CSS for Bootstrap -->
	<link href="<?= base_url() ?>assets/vendor/datatables/css/dataTables.bootstrap.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url()?>assets/css/style.css" rel="stylesheet">
	<!-- Bootstrap 3.3.5 -->
	<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
	<!-- jQuery 2.1.4 -->
	<script src="<?= base_url() ?>assets/js/jQuery-2.1.4.min.js"></script>
	<!-- Datatables Javascript for Bootstrap -->
	<script src="<?= base_url() ?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
	<script src="<?= base_url() ?>assets/vendor/datatables/js/dataTables.bootstrap.min.js"></script>
	<script>
        $(document).ready(function() {
            var t = $('#dataTables1').DataTable({
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

	

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="<?= base_url()?>dashboard" class="logo d-flex align-items-center">
        <img src="<?= base_url()?>assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">SPK APP</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
			<h3 class="d-flex align-items-center mt-2 mx-3"><?= $page?></h3>
    </div><!-- End Logo -->

    

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?= base_url()?>assets/img/logo.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Administrator</h6>
              <span>SPK APP</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            
            <li>
              <hr class="dropdown-divider">
            </li>

            <!-- <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li> -->
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?= base_url()?>login">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="<?= base_url()?>dashboard">
          <i class="bi bi-house-fill"></i>
          <span>Home</span>
        </a>
      </li><!-- End Dashboard Nav -->

			<li class="nav-item mt-3">
				<h5>Metode</h5>
				<hr>
			</li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#saw-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>SPK SAW</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="saw-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url()?>saw">
              <i class="bi bi-circle"></i><span>Penilaian dan Hasil</span>
            </a>
          </li>
          
          
        </ul>

      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#wp-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>SPK WP</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="wp-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url()?>penilaian">
              <i class="bi bi-circle"></i><span>Penilaian</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url()?>hasil">
              <i class="bi bi-circle"></i><span>Hasil</span>
            </a>
          </li>
          
          
        </ul>

      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#topsis-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>SPK TOPSIS</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="topsis-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url()?>topsis">
              <i class="bi bi-circle"></i><span>Penilaian dan Hasil</span>
            </a>
          </li>
          
          
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item mt-3">
				<h5>Master data</h5>
				<hr>
			</li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#kriteria-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-card-list"></i><span>Kriteria</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="kriteria-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url()?>kriteria">
              <i class="bi bi-circle"></i><span>Data</span>
            </a>
          </li>
         
          
        </ul>
      </li><!-- End Components Nav -->

			<li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#alternatif-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-share"></i><span>Alternatif</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="alternatif-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url()?>alternatif">
              <i class="bi bi-circle"></i><span>Data</span>
            </a>
          </li>
     
          
        </ul>
      </li><!-- End Components Nav -->

			

      

    </ul>

  </aside><!-- End Sidebar-->

  <?= $contents?>

    <!-- ======= Footer ======= -->
	<footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Kelompok1</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="#">Kelompok 1</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

	<!-- delete modal -->
	<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Konfirmasi</h4>
				</div>
				<div class="modal-body">
					<p>Anda yakin akan menghapus data ini ?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-bs-dismiss="modal">Batal</button>
					<a class="btn btn-danger btn-ok">Hapus</a>
				</div>
			</div>
		</div>
	</div>


  <!-- Vendor JS Files -->
  <script src="<?= base_url()?>assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?= base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url()?>assets/vendor/chart.js/chart.min.js"></script>
  <script src="<?= base_url()?>assets/vendor/echarts/echarts.min.js"></script>
  <script src="<?= base_url()?>assets/vendor/quill/quill.min.js"></script>
  <script src="<?= base_url()?>assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?= base_url()?>assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?= base_url()?>assets/vendor/php-email-form/validate.js"></script>
	

  <!-- Template Main JS File -->
  <script src="<?= base_url()?>assets/js/admin_main.js"></script>

</body>

</html>

