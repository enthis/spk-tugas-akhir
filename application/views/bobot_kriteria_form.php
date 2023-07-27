<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box'>
        <div class='box-header'>

          <h3 class='box-title'>BOBOT_KRITERIA</h3>
          <div class='box box-primary'>
            <form action="<?php echo $action; ?>" method="post">
              <table class='table table-bordered'>
                <tr>
                  <td>Jenisbarang <?php echo form_error('id_jenisbarang') ?></td>
                  <td>
                    <?php echo cmb_dinamis('id_jenisbarang', 'jenis_barang', 'namaBarang', 'id_jenisbarang', $id_jenisbarang, '') ?>
                  </td>
                <tr>
                  <td>Kriteria <?php echo form_error('id_kriteria') ?></td>
                  <td>
                    <?php echo cmb_dinamis('id_kriteria', 'kriteria', 'namaKriteria', 'id_kriteria', $id_kriteria, '') ?>
                  </td>
                <tr>
                  <td>Bobot <?php echo form_error('bobot') ?></td>
                  <td><input type="text" class="form-control" name="bobot" id="bobot" placeholder="Bobot" value="<?php echo $bobot; ?>" />
                  </td>
                  <input type="hidden" name="id_bobotkriteria" value="<?php echo $id_bobotkriteria; ?>" />
                <tr>
                  <td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('bobot_kriteria') ?>" class="btn btn-default">Cancel</a>
                  </td>
                </tr>

              </table>
            </form>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->