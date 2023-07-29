<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="<?php echo base_url() ?>assets/img/-.jpg">
    <title>Laporan Data gaji</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 10pt;
        }
    </style>

    <style>
        .line-title {
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }
    </style>

    <style>
        td {
            font-size: 14px;
        }

        ]
    </style>
</head>

<body>
    <h3 style="font-size: 16px; font-weight: bold">PT. BASIRIH INDUSTRIAL</h3><br>
    <table>
        <tbody>
            <tr>
                <td>NIK</td>
                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                <td><?= $gaji->nik_pegawai ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                <td><?= $gaji->nama_pegawai ?></td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                <td><?= $gaji->nama_jabatan ?></td>
            </tr>
            <tr>
                <td>Divisi</td>
                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                <td><?= $gaji->nama_divisi ?></td>
            </tr>
        </tbody>
    </table>
    <br>
    <div style="background-color: #ddd; padding: 7px; font-weight: bold">Earnings</div>
    <div style="border: 1px solid #888; border-top: none; padding: 10px">
        <span style="width: 50%; display: inline-block">
            Basic Salary
        </span>
        <span style="width: 50%; display: inline-block; text-align: right">
            Rp. <?= number_format($gaji->gaji_jabatan, 0, ',', '.') ?>
        </span>
        <br>
        <span style="width: 50%; display: inline-block">
            PPH (10%)
        </span>
        <span style="width: 50%; display: inline-block; text-align: right">
            <?php
            $pph = $gaji->gaji_jabatan * 0.1;
            echo '- Rp. ' . number_format($pph, 0, ',', '.');
            ?>
        </span>
        <?php if ((int)$gaji->gaji_jabatan - (int)($gaji->gaji_dibayar + $pph) !== 0) : ?>
            <br>
            <span style="width: 50%; display: inline-block">
                Hutang
            </span>
            <span style="width: 50%; display: inline-block; text-align: right">
                - Rp. <?= number_format(($gaji->gaji_jabatan - $gaji->gaji_dibayar), 0, ',', '.') ?>
            </span>
        <?php endif; ?>
    </div>
    <div style="border: 1px solid #888; border-top: none; padding: 10px">
        <span style="width: 50%; display: inline-block">
            Total Earnings
        </span>
        <span style="width: 50%; display: inline-block; text-align: right">
            Rp. <?= number_format($gaji->gaji_dibayar, 0, ',', '.') ?>
        </span>
    </div>
</body>

</html>