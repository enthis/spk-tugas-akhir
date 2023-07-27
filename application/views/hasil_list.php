<!-- Main content -->
<?php
$id_jenisbarang = $this->input->get('id_jenisbarang') ?? 1;
?>
<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Pilih Barang</h3>
        </div>
        <div class="box-body">
          <?php echo cmb_dinamis('id_jenisbarang', 'jenis_barang', 'namaBarang', 'id_jenisbarang', $id_jenisbarang, '') ?>
        </div>
      </div>
    </div><!-- /.col -->
  </div><!-- /.row -->
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box'>
        <div class='box-header'>
          <h3 class='box-title'>Matriks Keputusan </h3>
        </div><!-- /.box-header -->
        <div class='box-body'>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th rowspan="2">Alternative</th>
                <th colspan="<?php echo count(getKriteria()) ?>">Kriteria</th>
              </tr>
              <tr>
                <?php
                foreach (getKriteria() as $key) {
                  echo "<th>$key</th>";
                }
                ?>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach (getAlternative($id_jenisbarang) as $key) {
                echo "<tr id='data'>";
                echo "<td>" . $key['namaSupplier'] . "</td>";
                $no = 0;
                foreach (getNilaiMatriks($key['id_supplier'], $id_jenisbarang) as $data) {
                  echo "<td>$data[nilai]</td>";
                }
                echo "</tr>";
              }
              ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box'>
        <div class='box-header'>
          <h3 class='box-title'>Normalisasi Matriks Keputusan </h3>
        </div><!-- /.box-header -->
        <div class='box-body'>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th rowspan="2">Alternative</th>
                <th colspan="<?php echo count(getKriteria($id_jenisbarang)) ?>">Kriteria</th>
              </tr>
              <tr>
                <?php
                foreach (getKriteria($id_jenisbarang) as $key) {
                  echo "<th>$key</th>";
                }
                ?>
              </tr>
            </thead>
            <tbody>
              <?php
              //foreach data supplier
              foreach (getAlternative($id_jenisbarang) as $key) {
                echo "<tr id='data'>";
                echo "<td>" . $key['namaSupplier'] . "</td>";
                $no = 0;
                //foreach nilai supplier
                foreach (getNilaiMatriks($key['id_supplier'], $id_jenisbarang) as $data) {
                  //menghitung normalisasi
                  $hasil = Normalisasi(getArrayNilai($data['id_kriteria'], $id_jenisbarang), $data['sifat'], $data['nilai']);
                  echo "<td>$hasil</td>";
                  $hitungbobot[$key['id_supplier']][$no] = $hasil * getBobot($data['id_kriteria'], $id_jenisbarang);
                  $no++;
                }
                echo "</tr>";
              }
              ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->

  <div class='row'>
    <div class='col-xs-12'>
      <div class='box'>
        <div class='box-header'>
          <h3 class='box-title'>Perangkingan </h3>
        </div><!-- /.box-header -->
        <div class='box-body'>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th rowspan="2">Alternative</th>
                <th colspan="<?php echo count(getKriteria($id_jenisbarang)) ?>">Kriteria</th>
                <th rowspan="2">Hasil</th>
              </tr>
              <tr>
                <?php
                foreach (getKriteria($id_jenisbarang) as $key) {
                  echo "<th>$key</th>";
                }
                ?>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach (getAlternative($id_jenisbarang) as $key) {
                echo "<tr id='data'>";
                echo "<td>" . $key['namaSupplier'] . "</td>";
                $no = 0;
                $hasil = 0;
                foreach ($hitungbobot[$key['id_supplier']] as $data) {
                  echo "<td>$data</td>";
                  //menjumlahkan
                  $hasil += $data;
                }
                simpanHasil($key['id_supplier'], $hasil, $id_jenisbarang);
                echo "<td>" . $hasil . "</td>";
                echo "</tr>";
              }
              ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->

  <div class='row'>
    <div class='col-xs-12'>
      <div class='box'>
        <div class='box-header'>
          <h3 class='box-title'>
            <?php
            //cetak hasil
            getHasil($id_jenisbarang);
            ?>
          </h3>
        </div><!-- /.box-header -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->


<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#id_jenisbarang").change(function() {
      var url = window.location.href;
      console.log(url.split("?"));
      window.location.href = url.split("?")[0] + "?id_jenisbarang=" + $('option:selected', this).val();
    });
    $(".table").dataTable();
  });
</script>