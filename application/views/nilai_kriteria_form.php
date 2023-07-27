<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box'>
        <div class='box-header'>

          <h3 class='box-title'>NILAI_KRITERIA</h3>
          <div class='box box-primary'>
            <form action="<?php echo $action; ?>" method="post">
              <table class='table table-bordered'>
                <tr>
                  <td>Kriteria <?php echo form_error('id_kriteria') ?></td>
                  <td>
                    <?php echo cmb_dinamis('id_kriteria', 'kriteria', 'namaKriteria', 'id_kriteria', $id_kriteria, '') ?>
                  </td>
                <tr>
                  <td>Nilai <?php echo form_error('nilai') ?></td>
                  <td><input type="text" class="form-control" name="nilai" id="nilai" placeholder="Nilai" value="<?php echo $nilai; ?>" />
                  </td>
                <tr>
                  <td>Keterangan <?php echo form_error('keterangan') ?></td>
                  <td><input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
                  </td>
                  <input type="hidden" name="id_nilaikriteria" value="<?php echo $id_nilaikriteria; ?>" />
                <tr>
                  <td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('nilai_kriteria') ?>" class="btn btn-default">Cancel</a>
                  </td>
                </tr>

              </table>
            </form>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->