<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Nilai_supplier List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Supplier</th>
		<th>Jenisbarang</th>
		<th>Kriteria</th>
		<th>Nilaikriteria</th>
		
            </tr><?php
            foreach ($nilai_supplier_data as $nilai_supplier)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $nilai_supplier->id_supplier ?></td>
		      <td><?php echo $nilai_supplier->id_jenisbarang ?></td>
		      <td><?php echo $nilai_supplier->id_kriteria ?></td>
		      <td><?php echo $nilai_supplier->id_nilaikriteria ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>