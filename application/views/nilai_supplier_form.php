<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box'>
        <div class='box-header'>

          <h3 class='box-title'>NILAI_SUPPLIER</h3>
          <div class='box box-primary'>
            <form action="<?php echo $action; ?>" method="post">
              <table class='table table-bordered'>
                <tr>
                  <td>Supplier <?php echo form_error('id_supplier') ?></td>
                  <td>
                    <?php echo cmb_dinamis('id_supplier', 'supplier', 'namaSupplier', 'id_supplier', $id_supplier, $button == 'Update' ? 'readonly' : '') ?>
                  </td>
                <tr>
                  <td>Jenisbarang <?php echo form_error('id_jenisbarang') ?></td>
                  <td>
                    <?php echo cmb_dinamis('id_jenisbarang', 'jenis_barang', 'namaBarang', 'id_jenisbarang', $id_jenisbarang, $button == 'Update' ? 'readonly' : '') ?>
                  </td>
                <tr>
                  <td>Kriteria <?php echo form_error('id_kriteria') ?></td>
                  <td>
                    <?php echo cmb_dinamis('id_kriteria', 'kriteria', 'namaKriteria', 'id_kriteria', $id_kriteria, '') ?>
                  </td>
                <tr>
                  <td>Nilaikriteria <?php echo form_error('id_nilaikriteria') ?></td>
                  <td>
                    <?php echo cmb_dinamis('id_nilaikriteria', 'nilai_kriteria', 'keterangan', 'id_nilaikriteria', $id_nilaikriteria, '', ['id_kriteria', ($this->input->get('id_kriteria') ?? $id_kriteria)]) ?>
                  </td>
                  <input type="hidden" name="id_nilaisupplier" value="<?php echo $id_nilaisupplier; ?>" />
                <tr>
                  <td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('nilai_supplier') ?>" class="btn btn-default">Cancel</a>
                  </td>
                </tr>

              </table>
            </form>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
<script>
  $(document).ready(function() {
    var url = window.location.href;
    console.log('id_kriteria', url.split('?'));
    let param = '?';

    if (url.split('?').length == 1) {
      $("select").each(function(idx) {
        param += (idx == 0 ? '' : '&') + $(this).attr('id') + '=' + encodeURIComponent($('option:selected', this).val());
      });
      window.location.href = url.split('?')[0] + param;
    }
    $("#id_kriteria").change(function() {
      $("select").each(function(idx) {
        param += (idx == 0 ? '' : '&') + $(this).attr('id') + '=' + encodeURIComponent($('option:selected', this).val());
      });
      window.location.href = url.split('?')[0] + param;
    });
    var dataGet = <?php echo json_encode($this->input->get()) ?>;
    $.each(dataGet, function(idx, data) {
      console.log(idx);
      $("#" + idx).val(data);
    });
  });
</script>