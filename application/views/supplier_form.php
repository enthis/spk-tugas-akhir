<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>SUPPLIER</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>NamaSupplier <?php echo form_error('namaSupplier') ?></td>
            <td><input type="text" class="form-control" name="namaSupplier" id="namaSupplier" placeholder="NamaSupplier" value="<?php echo $namaSupplier; ?>" />
        </td>
	    <input type="hidden" name="id_supplier" value="<?php echo $id_supplier; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('supplier') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->