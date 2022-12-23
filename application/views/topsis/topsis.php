<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'wp_kinerja';
$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
$sql = "
        SELECT 
          b.name,c.criteria,a.value,c.weight,c.attribute
        FROM 
          topsis_evaluations a
          JOIN 
            topsis_alternatives b USING(id_alternative)
          JOIN 
            topsis_criterias c USING(id_criteria)
        ";
$result = $db->query($sql);

// $dbhost = 'localhost';
// $dbuser = 'dundang1_wp_kinerja';
// $dbpass = 'q1w2e3qwe123';
// $dbname = 'dundang1_wp_kinerja';
// $db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
// $sql = "
//         SELECT 
//           b.name,c.criteria,a.value,c.weight,c.attribute
//         FROM 
//           topsis_evaluations a
//           JOIN 
//             topsis_alternatives b USING(id_alternative)
//           JOIN 
//             topsis_criterias c USING(id_criteria)
//         ";
// $result = $db->query($sql);


$data = array();
$kriterias = array();
$bobot = array();
$atribut = array();
$nilai_kuadrat = array();

while ($row = $result->fetch_object()) {
  if (!isset($data[$row->name])) {
    $data[$row->name] = array();
  }
  if (!isset($data[$row->name][$row->criteria])) {
    $data[$row->name][$row->criteria] = array();
  }
  if (!isset($nilai_kuadrat[$row->criteria])) {
    $nilai_kuadrat[$row->criteria] = 0;
  }
  $bobot[$row->criteria] = $row->weight;
  $atribut[$row->criteria] = $row->attribute;
  $data[$row->name][$row->criteria] = $row->value;
  $nilai_kuadrat[$row->criteria] += pow($row->value, 2);
  $kriterias[] = $row->criteria;
}

$kriteria = array_unique($kriterias);
$jml_kriteria = count($kriteria);

?>

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
                                        <th rowspan='3'>No</th>
            <th rowspan='3'>Alternatif</th>
            <th rowspan='3'>Nama</th>
            <th colspan='<?php echo $jml_kriteria; ?>'>Kriteria</th>
										</tr>
                                        <tr>
            <?php
            foreach ($kriteria as $k)
              echo "<th>{$k}</th>\n";
            ?>
          </tr>
          <tr>
            <?php
            for ($n = 1; $n <= $jml_kriteria; $n++)
              echo "<th>C{$n}</th>";
            ?>
          </tr>
									</thead>
									<tbody>
                                    <?php
          $i = 0;
          foreach ($data as $nama => $krit) {
            echo "<tr>
            <td>" . (++$i) . "</td>
            <th>A{$i}</th>
            <td>{$nama}</td>";
            foreach ($kriteria as $k) {
              echo "<td align='center'>{$krit[$k]}</td>";
            }
            echo
            "</tr>\n";
          }
          ?>
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
              <h5 class="card-title">Rating Kinerja Ternormalisasi</h5>
              <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->
							<div class="table-responsive">

								<table class="table table-striped table-hover" >
									<thead>
										<tr>
                                        <th rowspan='3'>No</th>
            <th rowspan='3'>Alternatif</th>
            <th rowspan='3'>Nama</th>
            <th colspan='<?php echo $jml_kriteria; ?>'>Kriteria</th>
										</tr>
                                        <tr>
            <?php
            foreach ($kriteria as $k)
              echo "<th>{$k}</th>\n";
            ?>
          </tr>
          <tr>
            <?php
            for ($n = 1; $n <= $jml_kriteria; $n++)
              echo "<th>C{$n}</th>";
            ?>
          </tr>
									</thead>
									<tbody>
                                    <?php
          $i = 0;
          foreach ($data as $nama => $krit) {
            echo "<tr>
            <td>" . (++$i) . "</td>
            <th>A{$i}</th>
            <td>{$nama}</td>";
            foreach ($kriteria as $k) {
              echo "<td align='center'>" . round(($krit[$k] / sqrt($nilai_kuadrat[$k])), 4) . "</td>";
            }
            echo
            "</tr>\n";
          }
          ?>
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
              <h5 class="card-title">Rating Bobot Ternormalisasi</h5>
              <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->
							<div class="table-responsive">

								<table class="table table-striped table-hover" >
									<thead>
										<tr>
                                        <th rowspan='3'>No</th>
              <th rowspan='3'>Alternatif</th>
              <th rowspan='3'>Nama</th>
              <th colspan='<?php echo $jml_kriteria; ?>'>Kriteria</th>
										</tr>
                                        <tr>
              <?php
              foreach ($kriteria as $k)
                echo "<th>{$k}</th>\n";
              ?>
            </tr>
            <tr>
              <?php
              for ($n = 1; $n <= $jml_kriteria; $n++)
                echo "<th>C{$n}</th>";
              ?>
            </tr>
									</thead>
									<tbody>
                                    <?php
            $i = 0;
            $y = array();
            foreach ($data as $nama => $krit) {
              echo "<tr>
            <td>" . (++$i) . "</td>
            <th>A{$i}</th>
            <td>{$nama}</td>";
              foreach ($kriteria as $k) {
                $y[$k][$i - 1] = round(($krit[$k] / sqrt($nilai_kuadrat[$k])), 4) * $bobot[$k];
                echo "<td align='center'>" . $y[$k][$i - 1] . "</td>";
              }
              echo
              "</tr>\n";
            }
            ?>
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
              <h5 class="card-title">Solusi Ideal Positif</h5>
              <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->
							<div class="table-responsive">

								<table class="table table-striped table-hover" >
									<thead>
                                    <tr>
                <th colspan='<?php echo $jml_kriteria; ?>'>Kriteria</th>
              </tr>
              <tr>
                <?php
                foreach ($kriteria as $k)
                  echo "<th>{$k}</th>\n";
                ?>
              </tr>
              <tr>
                <?php
                for ($n = 1; $n <= $jml_kriteria; $n++)
                  echo "<th>y<sub>{$n}</sub><sup>+</sup></th>";
                ?>
              </tr>
									</thead>
									<tbody>
                                    <tr>
                <?php
                $yplus = array();
                foreach ($kriteria as $k) {
                  $yplus[$k] = ($atribut[$k] == 'benefit' ? max($y[$k]) : min($y[$k]));
                  echo "<th>{$yplus[$k]}</th>";
                }
                ?>
              </tr>
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
              <h5 class="card-title">Solusi Ideal Negatif</h5>
              <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->
							<div class="table-responsive">

								<table class="table table-striped table-hover" >
									<thead>
                                    <tr>
                <th colspan='<?php echo $jml_kriteria; ?>'>Kriteria</th>
              </tr>
              <tr>
                <?php
                foreach ($kriteria as $k)
                  echo "<th>{$k}</th>\n";
                ?>
              </tr>
              <tr>
                <?php
                for ($n = 1; $n <= $jml_kriteria; $n++)
                  echo "<th>y<sub>{$n}</sub><sup>-</sup></th>";
                ?>
              </tr>
									</thead>
									<tbody>
                                    <tr>
                <?php
                $ymin = array();
                foreach ($kriteria as $k) {
                  $ymin[$k] = $atribut[$k] == 'cost' ? max($y[$k]) : min($y[$k]);
                  echo "<th>{$ymin[$k]}</th>";
                }
                ?>
              </tr>
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
              <h5 class="card-title">Jarak positif (D<sub>i</sub><sup>+</sup>)</h5>
              <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->
							<div class="table-responsive">

								<table class="table table-striped table-hover" >
									<thead>
                                    <tr>
                                    <th>No</th>
                  <th>Alternatif</th>
                  <th>Nama</th>
                  <th>D<suo>+</sup></th>
              </tr>
									</thead>
									<tbody>
                                    <?php
                $i = 0;
                $dplus = array();
                foreach ($data as $nama => $krit) {
                  echo "<tr>
            <td>" . (++$i) . "</td>
            <th>A{$i}</th>
            <td>{$nama}</td>";
                  foreach ($kriteria as $k) {
                    if (!isset($dplus[$i - 1])) $dplus[$i - 1] = 0;
                    $dplus[$i - 1] += pow($yplus[$k] - $y[$k][$i - 1], 2);
                  }
                  echo "<td>" . round(sqrt($dplus[$i - 1]), 6) . "</td>
           </tr>\n";
                }
                ?>
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
              <h5 class="card-title">Jarak negatif (D<sub>i</sub><sup>-</sup>)</h5>
              <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->
							<div class="table-responsive">

								<table class="table table-striped table-hover" >
									<thead>
                                    <tr>
                                    <th>No</th>
                  <th>Alternatif</th>
                  <th>Nama</th>
                  <th>D<suo>+</sup></th>
              </tr>
									</thead>
									<tbody>
                                    <?php
                $i = 0;
                $dmin = array();
                foreach ($data as $nama => $krit) {
                  echo "<tr>
            <td>" . (++$i) . "</td>
            <th>A{$i}</th>
            <td>{$nama}</td>";
                  foreach ($kriteria as $k) {
                    if (!isset($dmin[$i - 1])) $dmin[$i - 1] = 0;
                    $dmin[$i - 1] += pow($ymin[$k] - $y[$k][$i - 1], 2);
                  }
                  echo "<td>" . round(sqrt($dmin[$i - 1]), 6) . "</td>
           </tr>\n";
                }
                ?>
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
              <h5 class="card-title">Nilai Preferensi(V<sub>i</sub>)</h5>
              <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->
							<div class="table-responsive">

								<table class="table table-striped table-hover" >
									<thead>
                                    <tr>
                                    <th>No</th>
                    <th>Alternatif</th>
                    <th>Nama</th>
                    <th>V<sub>i</sub></th>
              </tr>
									</thead>
									<tbody>
                                    <?php
                  $i = 0;
                  $V = array();

                  foreach ($data as $nama => $krit) {
                    echo "<tr>
            <td>" . (++$i) . "</td>
            <th>A{$i}</th>
            <td>{$nama}</td>";
                    foreach ($kriteria as $k) {
                      $V[$i - 1] = round(sqrt($dmin[$i - 1]), 6) / (round(sqrt($dmin[$i - 1]), 6) + round(sqrt($dplus[$i - 1]), 6));
                    }
                    echo "<td>{$V[$i - 1]}</td></tr>\n";
                  }
                  ?>
									</tbody>
								</table>
							</div>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
        <?php
  $jumlah = count($V);
  $maxam = $V[0];
  $ind = 0;
  for ($x = 1; $x < $jumlah; $x++) {
    if ($V[$x] > $maxam) {
      $maxam = $V[$x];
      $ind = $x;
    }
  }
  ?>

<div class="col-lg-12">

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Kesimpulan</h5>
    <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->
    <p>Dari hasil perhitungan ranking diatas, maka penilaian terbaik adalah <b>Jalan <?php echo $nama[$ind] ?></b> dengan nilai <b><?php echo round($maxam, 5) ?></b> </p>

  </div>
</div>

</div>

      </div>
    </section>

		

		
</main>
