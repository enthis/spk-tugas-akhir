<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box'>
        <div class='box-header'>
          <h3 class='box-title'>Hasil Read</h3>
          <table class="table table-bordered">
            <tr>
              <td>Jenisbarang</td>
              <td><?php echo $id_jenisbarang; ?></td>
            </tr>
            <tr>
              <td>Supplier</td>
              <td><?php echo $id_supplier; ?></td>
            </tr>
            <tr>
              <td>Hasil</td>
              <td><?php echo $hasil; ?></td>
            </tr>
            <tr>
              <td></td>
              <td><a href="<?php echo site_url('hasil') ?>" class="btn btn-default">Cancel</a></td>
            </tr>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->