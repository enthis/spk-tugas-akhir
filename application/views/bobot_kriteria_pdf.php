<!doctype html>
<html>

<head>
    <title>harviacode.com - codeigniter crud generator</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" />
    <style>
        .word-table {
            border: 1px solid black !important;
            border-collapse: collapse !important;
            width: 100%;
        }

        .word-table tr th,
        .word-table tr td {
            border: 1px solid black !important;
            padding: 5px 10px;
        }
    </style>
</head>

<body>
    <h2>Bobot_kriteria List</h2>
    <table class="word-table" style="margin-bottom: 10px">
        <tr>
            <th>No</th>
            <th>Jenisbarang</th>
            <th>Kriteria</th>
            <th>Bobot</th>

        </tr><?php
                foreach ($bobot_kriteria_data as $bobot_kriteria) {
                ?>
            <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $bobot_kriteria->id_jenisbarang ?></td>
                <td><?php echo $bobot_kriteria->id_kriteria ?></td>
                <td><?php echo $bobot_kriteria->bobot ?></td>
            </tr>
        <?php
                }
        ?>
    </table>
</body>

</html>