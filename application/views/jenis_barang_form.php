<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box'>
        <div class='box-header'>

          <h3 class='box-title'>JENIS_BARANG</h3>
          <div class='box box-primary'>
            <form action="<?php echo $action; ?>" method="post">
              <table class='table table-bordered'>
                <tr>
                  <td>NamaBarang <?php echo form_error('namaBarang') ?></td>
                  <td><input type="text" class="form-control" name="namaBarang" id="namaBarang" placeholder="NamaBarang" value="<?php echo $namaBarang; ?>" />
                  </td>
                  <input type="hidden" name="id_jenisbarang" value="<?php echo $id_jenisbarang; ?>" />
                <tr>
                  <td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('jenis_barang') ?>" class="btn btn-default">Cancel</a>
                  </td>
                </tr>

              </table>
            </form>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->