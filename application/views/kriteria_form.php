<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box'>
        <div class='box-header'>

          <h3 class='box-title'>KRITERIA</h3>
          <div class='box box-primary'>
            <form action="<?php echo $action; ?>" method="post">
              <table class='table table-bordered'>
                <tr>
                  <td>NamaKriteria <?php echo form_error('namaKriteria') ?></td>
                  <td><input type="text" class="form-control" name="namaKriteria" id="namaKriteria" placeholder="NamaKriteria" value="<?php echo $namaKriteria; ?>" />
                  </td>
                <tr>
                  <td>Sifat <?php echo form_error('sifat') ?></td>
                  <td>
                    <?php echo cmb_dinamis_array('sifat', array('Cost' => 'Cost','Benefit'=> 'Benefit'),$sifat) ?>
                  </td>
                  <input type="hidden" name="id_kriteria" value="<?php echo $id_kriteria; ?>" />
                <tr>
                  <td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('kriteria') ?>" class="btn btn-default">Cancel</a>
                  </td>
                </tr>

              </table>
            </form>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->