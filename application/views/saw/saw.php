<?php $i = 0;
foreach ($bobot_saw as $bobot_list) {

  //call bobot from db
  $bc1[$i] = $bobot_list['C1'];
  $bc2[$i] = $bobot_list['C2'];
  $bc3[$i] = $bobot_list['C3'];
  $bc4[$i] = $bobot_list['C4'];
  $bc5[$i] = $bobot_list['C5'];

  //bobot total
  $bt[$i] = $bc1[$i] + $bc2[$i] + $bc3[$i] + $bc4[$i] + $bc5[$i];

  //normalisasi bobot
  $nb1[$i] = $bc1[$i] / $bt[$i];
  $nb2[$i] = $bc2[$i] / $bt[$i];
  $nb3[$i] = $bc3[$i] / $bt[$i];
  $nb4[$i] = $bc4[$i] / $bt[$i];
  $nb5[$i] = $bc5[$i] / $bt[$i];

  $i += 1;
} ?>



<?php 

  $i = 0;
  $j = 0;

foreach ($tabel as $tabel_list) {
  $naman[$i] = $tabel_list['nama'];

  //proses normalisasi
  $tc1[$i] = $tabel_list['harga'] / $max_harga;
  $tc2[$i] = $tabel_list['ram'] / $max_ram;
  $tc3[$i] = $min_memori / $tabel_list['memori'];
  $tc4[$i] = $tabel_list['processor'] / $max_processor;
  $tc5[$i] = $min_kamera / $tabel_list['kamera'];

  //proses menghitung bobot prefensi
  $Whar[$i] = $tc1[$i] * $nb1[$j];
  $Wram[$i] = $tc2[$i] * $nb2[$j];
  $Wmem[$i] = $tc3[$i] * $nb3[$j];
  $Wpro[$i] = $tc4[$i] * $nb4[$j];
  $Wkam[$i] = $tc5[$i] * $nb5[$j];

  $vv[$i] = $Whar[$i] + $Wram[$i] + $Wmem[$i] + $Wpro[$i] + $Wkam[$i];

  $i += 1;
} ?>
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
              <h5 class="card-title">Penilaian</h5>
              <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->
							<div class="table-responsive">

								<table class="table table-striped table-hover" >
									<thead>
										<tr>
                                        <th>No</th>
            <th>Alternatif</th>
            <th>Lokasi</th>
            <th>Luas Tanah (m2)</th>
            <th>Harga Tanah (Ribu/m2)</th>
            <th>Bentuk Lahan</th>
            <th>Resiko Keamanan</th>
										</tr>
									</thead>
									<tbody>
                                    <?php $j = 0;
          foreach ($tabel as $tabel_list) { ?> <tr>
              <td><?php echo $j + 1 ?></td>
              <td><?php echo $tabel_list['nama'] ?></td>
              <td><?php echo $tabel_list['harga'] ?></td>
              <td><?php echo $tabel_list['ram'] ?></td>
              <td><?php echo $tabel_list['memori'] ?></td>
              <td><?php echo $tabel_list['processor'] ?></td>
              <td><?php echo $tabel_list['kamera'] ?></td>
            </tr>
          <?php $j += 1;
          } ?>
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
              <h5 class="card-title">Bobot</h5>
              <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->
							<div class="table-responsive">

								<table class="table table-striped table-hover" >
									<thead>
										<tr>
                                        <th>C1</th>
              <th>C2</th>
              <th>C3</th>
              <th>C4</th>
              <th>C5</th>
										</tr>
									</thead>
									<tbody>
                                    <?php $j = 0;
            foreach ($bobot_saw as $bobot_output) { ?>

              <tr>                
                <td><?php echo $bobot_output['C1'] ?></td>
                <td><?php echo $bobot_output['C2'] ?></td>
                <td><?php echo $bobot_output['C3'] ?></td>
                <td><?php echo $bobot_output['C4'] ?></td>
                <td><?php echo $bobot_output['C5'] ?></td>
              </tr>

            <?php $j += 1;
            } ?>
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
              <h5 class="card-title">Normalisasi Bobot</h5>
              <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->
							<div class="table-responsive">

								<table class="table table-striped table-hover" >
									<thead>
										<tr>
                                        <th>C1</th>
              <th>C2</th>
              <th>C3</th>
              <th>C4</th>
              <th>C5</th>             
										</tr>
									</thead>
									<tbody>
                                    <?php $j = 0;
            foreach ($bobot_saw as $bobot_output) { ?>
              <tr>                
                <td><?php echo $nb1[$j]?></td>
                <td><?php echo $nb2[$j]?></td>
                <td><?php echo $nb3[$j]?></td>
                <td><?php echo $nb4[$j]?></td>
                <td><?php echo $nb5[$j]?></td>
              </tr>

            <?php $j += 1;
            } ?>
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
              <h5 class="card-title">Tabel Normalisasi</h5>
              <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->
							<div class="table-responsive">

								<table class="table table-striped table-hover" >
									<thead>
										<tr>
                                        <th>No</th>
              <th>Nama</th>
              <th>C1</th>
              <th>C2</th>
              <th>C3</th>
              <th>C4</th>
              <th>C5</th>
										</tr>
									</thead>
									<tbody>
                                    <?php $j = 0;
            foreach ($tabel as $tabel_list) { ?>

              <tr>
                <td><?php echo $j + 1 ?></td>
                <td><?php echo $tabel_list['nama'] ?></td>
                <td><?php echo round($tc1[$j], 4)  ?></td>
                <td><?php echo round($tc2[$j], 4) ?></td>
                <td><?php echo round($tc3[$j], 4) ?></td>
                <td><?php echo round($tc4[$j], 4) ?></td>
                <td><?php echo round($tc5[$j], 4) ?></td>
              </tr>

            <?php $j += 1;
            } ?>
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
              <h5 class="card-title">Nilai Ranking</h5>
              <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->
							<div class="table-responsive">

								<table class="table table-striped table-hover" >
									<thead>
										<tr>
                                        <th>No</th>
              <th>Nama</th>
              <th>Nilai</th>
										</tr>
									</thead>
									<tbody>
                                    <?php 
            $j = 0;

              foreach ($tabel as $tabel_list) { ?>
              <tr>
                <td><?php echo $j + 1 ?></td>
                <td><?php echo $tabel_list['nama'] ?></td>
                <td><?php echo round($vv[$j], 5) ?></td>
              </tr>
            
            <?php
            
            // $data = array(
            // 'id' => $j + 2,
            // 'nilai' => $vv[$j],
            // );
            // $this->db->insert('hasil_saw', $data);
            ?>

            <?php $j += 1;
            } ?>
									</tbody>
								</table>
							</div>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
        <?php
  $jumlah = count($vv);
  $maxam = $vv[0];
  $ind = 0;
  for ($x = 1; $x < $jumlah; $x++) {
    if ($vv[$x] > $maxam) {
      $maxam = $vv[$x];
      $ind = $x;
    }
  }
  ?>

<div class="col-lg-12">

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Kesimpulan</h5>
    <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->
    <p>Dari hasil perhitungan ranking diatas, maka penilaian terbaik adalah <b><?php echo $naman[$ind] ?></b> dengan nilai <?php echo round($maxam, 5) ?> </p>

  </div>
</div>

</div>

      </div>
    </section>

		

		
</main>
