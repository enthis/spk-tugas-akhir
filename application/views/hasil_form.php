<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box'>
        <div class='box-header'>

          <h3 class='box-title'>HASIL</h3>
          <div class='box box-primary'>
            <form action="<?php echo $action; ?>" method="post">
              <table class='table table-bordered'>
                <tr>
                  <td>Jenisbarang <?php echo form_error('id_jenisbarang') ?></td>
                  <td><input type="text" class="form-control" name="id_jenisbarang" id="id_jenisbarang" placeholder="Id Jenisbarang" value="<?php echo $id_jenisbarang; ?>" />
                  </td>
                <tr>
                  <td>Supplier <?php echo form_error('id_supplier') ?></td>
                  <td><input type="text" class="form-control" name="id_supplier" id="id_supplier" placeholder="Id Supplier" value="<?php echo $id_supplier; ?>" />
                  </td>
                <tr>
                  <td>Hasil <?php echo form_error('hasil') ?></td>
                  <td><input type="text" class="form-control" name="hasil" id="hasil" placeholder="Hasil" value="<?php echo $hasil; ?>" />
                  </td>
                  <input type="hidden" name="id_hasil" value="<?php echo $id_hasil; ?>" />
                <tr>
                  <td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('hasil') ?>" class="btn btn-default">Cancel</a>
                  </td>
                </tr>

              </table>
            </form>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->