<?php 
		//---membuat array untuk data awal---
				$dataAwal = array();
				$listLebar = array();
				$listLuas = array();
				$listJenis = array();

				//mengambil data kriteria dari tb_valid
				foreach ($dataValid as $data) {
					// echo $data['id_valid']."<br>";
					$dataAwal[$data['id_valid']] = ["lebar" => $data['lebar'], "luas" => $data['luas'], "jenis" => $data['id_kerusakan']];
					$listLebar[$data['id_valid']] = $data['lebar'];
					$listLuas[$data['id_valid']] = $data['luas'];
					$listJenis[$data['id_valid']] = $data['id_kerusakan'];
				}
				// var_dump($dataAwal);


		//perhitungan
				//---inisialisasi---
				$flag = 0;
				$kondisi = "beda";

				//---membuat array untuk cluster---
				$hasilSekarang = array("C1" => [], "C2" => [], "C3" => []);
				$hasilSebelumnya = array("C1" => [], "C2" => [], "C3" => []);

				while ( $kondisi != "sama") {
					$hasilSebelumnya = $hasilSekarang;

					//---iterasi---
					if ($flag == 0) {
						//1. menentukan centroid awal
						$centroid = array('C1' => ["lebar" => min($listLebar), "luas" => min($listLuas), "jenis" => min($listJenis)], 'C2' => ["lebar" => array_sum($listLebar)/$total_rows, "luas" => array_sum($listLuas)/$total_rows, "jenis" => array_sum($listJenis)/$total_rows], 'C3' => ["lebar" => max($listLebar), "luas" => max($listLuas), "jenis" => max($listJenis)]);
					} else {
						$centroid = array();
						foreach ($hasilSekarang as $key => $h) {
							$lebar = 0;
							$luas = 0;
							$jenis = 0;
							foreach ($h as $c) {
								//mengambil nilai lebar, luas dan jenis dari data valid
								$lebar += $dataAwal[$c]["lebar"];
								$luas += $dataAwal[$c]["luas"];
								$jenis += $dataAwal[$c]["jenis"];
							}
		            // echo $lebar / count($hasilSekarang[$key]) . ' | ' . $luas / count($hasilSekarang[$key]). ' | ' . $jenis / count($hasilSekarang[$key]). ' | ';
					//4. menghitung centroid berikutnya		
					$centroid[$key] = ["lebar" => $lebar / count($hasilSekarang[$key]), "luas" => $luas / count($hasilSekarang[$key]), "jenis" => $jenis / count($hasilSekarang[$key])];
		            // echo '<br>';
						}
					}

	        		// var_dump($centroid);

					$euclidean = array();
					//2. menghitung jarak data dengan centroid
					foreach ($dataAwal as $key =>  $d) {
						$dC1 =  sqrt(pow(($d["lebar"] - $centroid["C1"]["lebar"]), 2) + pow(($d["luas"] - $centroid["C1"]["luas"]), 2) + pow(($d["jenis"] - $centroid["C1"]["jenis"]), 2));
						$dC2 =  sqrt(pow(($d["lebar"] - $centroid["C2"]["lebar"]), 2) + pow(($d["luas"] - $centroid["C2"]["luas"]), 2) + pow(($d["jenis"] - $centroid["C2"]["jenis"]), 2));
						$dC3 =  sqrt(pow(($d["lebar"] - $centroid["C3"]["lebar"]), 2) + pow(($d["luas"] - $centroid["C3"]["luas"]), 2) + pow(($d["jenis"] - $centroid["C3"]["jenis"]), 2));

						$euclidean[$key] = ["C1" => $dC1, "C2" => $dC2, "C3" => $dC3];
					}

					$hasilSekarang = array("C1" => [], "C2" => [], "C3" => []);
					//3. mengelompokkan data sesuai cluster
					foreach ($euclidean as $key => $e) {
						$dataAkhir = ["C1" => $e["C1"], "C2" => $e["C2"], "C3" => $e["C3"]];
						$jarakTerpendek =  min($dataAkhir);
						if (array_search($jarakTerpendek, $dataAkhir) == "C1") {
							$hasilSekarang["C1"][] = $key;
						} elseif (array_search($jarakTerpendek, $dataAkhir) == "C2") {
							$hasilSekarang["C2"][] = $key;
						} elseif (array_search($jarakTerpendek, $dataAkhir) == "C3") {
							$hasilSekarang["C3"][] = $key;
						}
					}
					
					// echo "Iterasi ".($flag+1)."<br>";
					// var_dump($hasilSekarang);
					// echo "<br>";
					
					// var_dump($euclidean);

					if ($hasilSebelumnya == $hasilSekarang) {
						$kondisi = "sama";
					}

					$flag++;
				}
				// var_dump(count($hasilSekarang['C1']));
				// var_dump(count($hasilSekarang['C2']));
				// var_dump(count($hasilSekarang['C3']));

?>