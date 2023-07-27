<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box'>
        <div class='box-header'>
          <h3 class='box-title'>NILAI_KRITERIA LIST <?php echo anchor('nilai_kriteria/create/', 'Create', array('class' => 'btn btn-danger btn-sm')); ?>
            <?php echo anchor(site_url('nilai_kriteria/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
        </div><!-- /.box-header -->
        <div class='box-body'>
          <table class="table table-bordered table-striped" id="mytable">
            <thead>
              <tr>
                <th width="80px">No</th>
                <th>Kriteria</th>
                <th>Nilai</th>
                <th>Keterangan</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $start = 0;
              foreach ($nilai_kriteria_data as $nilai_kriteria) {
              ?>
                <tr>
                  <td><?php echo ++$start ?></td>
                  <td><?php echo cmb_dinamis('id_kriteria','kriteria','namaKriteria','id_kriteria',$nilai_kriteria->id_kriteria,'disabled') ?></td>
                  <td><?php echo $nilai_kriteria->nilai ?></td>
                  <td><?php echo $nilai_kriteria->keterangan ?></td>
                  <td style="text-align:center" width="140px">
                    <?php
                    echo anchor(site_url('nilai_kriteria/read/' . $nilai_kriteria->id_nilaikriteria), '<i class="fa fa-eye"></i>', array('title' => 'detail', 'class' => 'btn btn-danger btn-sm'));
                    echo '  ';
                    echo anchor(site_url('nilai_kriteria/update/' . $nilai_kriteria->id_nilaikriteria), '<i class="fa fa-pencil-square-o"></i>', array('title' => 'edit', 'class' => 'btn btn-danger btn-sm'));
                    echo '  ';
                    echo anchor(site_url('nilai_kriteria/delete/' . $nilai_kriteria->id_nilaikriteria), '<i class="fa fa-trash-o"></i>', 'title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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