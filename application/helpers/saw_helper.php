<?php
$simpanNormalisasi = array();

function getKriteria()
{
    $ci = get_instance();
    $data = array();
    $querykriteria = "SELECT namaKriteria FROM kriteria"; //query tabel kriteria
    $execute = $ci->db->query($querykriteria);
    foreach ($execute->result_array() as $row) {
        array_push($data, $row['namaKriteria']);
    }
    return $data;
}
//mendapatkan alternative
function getAlternative($idCookie)
{
    $ci = get_instance();
    $data = array();
    $queryAlternative = "SELECT supplier.namaSupplier AS namaSupplier,id_supplier FROM nilai_supplier INNER JOIN supplier USING(id_supplier) WHERE id_jenisbarang='$idCookie' GROUP BY id_supplier ";
    $execute = $ci->db->query($queryAlternative);
    foreach ($execute->result_array() as $row) {
        array_push($data, array("namaSupplier" => $row['namaSupplier'], "id_supplier" => $row['id_supplier']));
    }
    return $data;
}
function getNilaiMatriks($id_supplier, $idCookie)
{
    $ci = get_instance();
    $data = array();
    $queryGetNilai = "SELECT
    IFNULL(nilai_kriteria.nilai,0) AS nilai,
    kriteria.sifat AS sifat,
    kriteria.id_kriteria AS id_kriteria
  FROM kriteria
    LEFT JOIN nilai_supplier
      ON kriteria.id_kriteria = nilai_supplier.id_kriteria
      AND (id_jenisbarang = '$idCookie'
      AND id_supplier = '$id_supplier')
    LEFT JOIN nilai_kriteria
      ON nilai_kriteria.id_nilaikriteria = nilai_supplier.id_nilaikriteria;";
    $execute = $ci->db->query($queryGetNilai);
    foreach ($execute->result_array() as $row) {
        array_push($data, array(
            "nilai" => $row['nilai'],
            "sifat" => $row['sifat'],
            "id_kriteria" => $row['id_kriteria']
        ));
    }
    return $data;
}
function getArrayNilai($id_kriteria, $idCookie)
{
    $ci = get_instance();
    $data = array();
    $queryGetArrayNilai = "SELECT nilai_kriteria.nilai AS nilai FROM nilai_supplier INNER JOIN nilai_kriteria ON nilai_supplier.id_nilaikriteria=nilai_kriteria.id_nilaikriteria WHERE nilai_supplier.id_kriteria='$id_kriteria' AND nilai_supplier.id_jenisbarang='$idCookie'";
    $execute = $ci->db->query($queryGetArrayNilai);
    $dataexec = $execute->result_array();
    log_message('debug', sizeof($dataexec));
    if (sizeof($dataexec)) {
        foreach ($dataexec as $row) {
            array_push($data, $row['nilai']);
        }
    } else {
        array_push($data, 0);
    }
    return $data;
}
//rumus normalisasai
function normalisasi($array, $sifat, $nilai)
{
    if ($sifat == 'Benefit') {
        if (max($array) > 0) {
            $result = $nilai / max($array);
        } else {
            $result = 0;
        }
    } elseif ($sifat == 'Cost') {
        if ($nilai > 0) {
            $result = min($array) / $nilai;
        } else {
            $result = 0;
        }
    }
    return round($result, 3);
}
//mendapatkan bobot kriteria
function getBobot($id_kriteria, $idCookie)
{
    $ci = get_instance();
    $queryBobot = "SELECT bobot FROM bobot_kriteria WHERE id_jenisbarang='$idCookie' AND id_kriteria='$id_kriteria' ";
    $row = $ci->db->query($queryBobot)->result_array();
    if (sizeof($row) > 0) {
        $bobot = $row[0]['bobot'];
    }else{
        $bobot = 0;
    }
    return $bobot;
}
//meyimpan hasil perhitungan
function simpanHasil($id_supplier, $hasil, $idCookie)
{
    $ci = get_instance();
    $queryCek = "SELECT hasil FROM hasil WHERE id_supplier='$id_supplier' AND id_jenisbarang='$idCookie'";
    $execute = $ci->db->query($queryCek);
    if ($execute->num_rows > 0) {
        $querySimpan = "UPDATE hasil SET hasil='$hasil' WHERE id_supplier='$id_supplier' AND id_jenisbarang='$idCookie'";
    } else {
        $querySimpan = "INSERT INTO hasil(hasil,id_supplier,id_jenisbarang) VALUES ('$hasil','$id_supplier','$idCookie')";
    }
    $ci->db->query($querySimpan);
}
//Kmencari kesimpulan
function getHasil($idCookie)
{
    $ci = get_instance();
    $queryHasil     =   "SELECT hasil.hasil AS hasil,jenis_barang.namaBarang,supplier.namaSupplier AS namaSupplier FROM hasil JOIN jenis_barang ON jenis_barang.id_jenisbarang=hasil.id_jenisbarang JOIN supplier ON supplier.id_supplier=hasil.id_supplier WHERE hasil.hasil=(SELECT MAX(hasil) FROM hasil WHERE id_jenisbarang='$idCookie')";
    $execute       =   $ci->db->query($queryHasil)->result_array()[0];
    echo "<p>Jadi rekomendasi pemilihan supplier <i>" . $execute['namaBarang'] . "</i> jatuh pada <i>" . $execute['namaSupplier'] . "</i> dengan Nilai <b>" . round($execute['hasil'], 3) . "</b></p>";
}
