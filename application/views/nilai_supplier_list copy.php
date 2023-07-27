<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box'>
        <div class='box-header'>
          <h3 class='box-title'>NILAI SUPPLIER LIST <?php echo anchor('nilai_supplier/create/', 'Create', array('class' => 'btn btn-danger btn-sm')); ?>
            <?php echo anchor(site_url('nilai_supplier/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
        </div><!-- /.box-header -->
        <div class='box-body'>

          <?php
          foreach ($nilai_supplier_data_grouped as $knilai_supplier_grouped => $nilai_supplier_grouped) {
          ?>
            <div class='row'>
              <div class='col-xs-12'>
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Jenis Barang</h3>
                  </div>
                  <div class="box-body">
                    <?php echo cmb_dinamis('id_jenisbarang', 'jenis_barang', 'namaBarang', 'id_jenisbarang', $knilai_supplier_grouped, 'disabled') ?>
                  </div>
                </div>
              </div><!-- /.col -->

              <?php
              foreach ($nilai_supplier_grouped as $ksupplier => $vsupplier) {
              ?>
                <div class='col-xs-12'>
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Supplier</h3>
                    </div>
                    <div class="box-body">
                      <?php echo cmb_dinamis('id_supplier', 'supplier', 'namaSupplier', 'id_supplier', $ksupplier, 'disabled') ?>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12">
                  <table class="table table-bordered table-striped" id="mytable">
                    <thead>
                      <tr>
                        <?php $i = 0;
                        foreach ($vsupplier as $knilai_supplier => $vnilai_supplier) { ?>
                          <th><?php echo cmb_dinamis('id_kriteria', 'kriteria', 'namaKriteria', 'id_kriteria', $vnilai_supplier, 'disabled') ?></th>
                        <?php } ?>
                      </tr>
                      
                    </thead>
                  </table>
                </div>
              <?php
              }
              ?>
            </div><!-- /.row -->
          <?php
          }
          ?>
          <table class="table table-bordered table-striped" id="mytable">
            <thead>
              <tr>
                <th width="80px">No</th>
                <th>Supplier</th>
                <th>Jenisbarang</th>
                <th>Kriteria</th>
                <th>Nilaikriteria</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $start = 0;
              foreach ($nilai_supplier_data as $nilai_supplier) {
              ?>
                <tr>
                  <td><?php echo ++$start ?></td>
                  <td><?php echo cmb_dinamis('id_supplier', 'supplier', 'namaSupplier', 'id_supplier', $nilai_supplier->id_supplier, 'disabled') ?></td>
                  <td><?php echo cmb_dinamis('id_jenisbarang', 'jenis_barang', 'namaBarang', 'id_jenisbarang', $nilai_supplier->id_jenisbarang, 'disabled') ?></td>
                  <td><?php echo cmb_dinamis('id_kriteria', 'kriteria', 'namaKriteria', 'id_kriteria', $nilai_supplier->id_kriteria, 'disabled') ?></td>
                  <td><?php echo cmb_dinamis('id_nilaikriteria', 'nilai_kriteria', 'keterangan', 'id_nilaikriteria', $nilai_supplier->id_nilaikriteria, 'disabled') ?></td>
                  <td style="text-align:center" width="140px">
                    <?php
                    echo anchor(site_url('nilai_supplier/read/' . $nilai_supplier->id_nilaisupplier), '<i class="fa fa-eye"></i>', array('title' => 'detail', 'class' => 'btn btn-danger btn-sm'));
                    echo '  ';
                    echo anchor(site_url('nilai_supplier/update/' . $nilai_supplier->id_nilaisupplier), '<i class="fa fa-pencil-square-o"></i>', array('title' => 'edit', 'class' => 'btn btn-danger btn-sm'));
                    echo '  ';
                    echo anchor(site_url('nilai_supplier/delete/' . $nilai_supplier->id_nilaisupplier), '<i class="fa fa-trash-o"></i>', 'title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                    ?>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
          <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
          <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
          <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
          <script type="text/javascript">
            $(document).ready(function() {
              $("#mytable").dataTable();
            });
          </script>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->