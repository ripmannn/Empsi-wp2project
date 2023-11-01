<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <?php foreach ($potongan as $p) : ?>
        <?php $potongan = $p->jml_potongan; ?>
    <?php endforeach; ?>

    <?php foreach ($gaji as $g) : ?>
        <?php $pot_gaji = $g->alpha * $potongan ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
                    <th class="text-center">Bulan / Tahun</th>
                    <th class="text-center">Gaji Pokok</th>
                    <th class="text-center">Tunjangan Transportasi</th>
                    <th class="text-center">Uang Makan</th>
                    <th class="text-center">Potongan</th>
                    <th class="text-center">Total Gaji</th>
                    <th class="text-center">Cetak Slip</th>
                </tr>
                <tr>
                    <td class="text-center"><?= $g->bulan ?></td>
                    <td class="text-center">Rp.<?= number_format($g->gaji_pokok, 0, ',', '.') ?></td>
                    <td class="text-center">Rp.<?= number_format($g->tj_transport, 0, ',', '.') ?></td>
                    <td class="text-center">Rp.<?= number_format($g->uang_makan, 0, ',', '.') ?></td>
                    <td class="text-center">Rp.<?= number_format($pot_gaji, 0, ',', '.') ?></td>
                    <td class="text-center">Rp.<?= number_format($g->tj_transport + $g->gaji_pokok + $g->uang_makan - $pot_gaji, 0, ',', '.') ?></td>
                    <td>
                        <center>
                            <a class="btn btn-sm btn-primary" href="<?= base_url('pegawai/dataGaji/cetakSlip/') . $g->id_kehadiran ?>">
                                <i class="fas fa-print"></i></a>
                        </center>
                    </td>
                </tr>
            </table>
        </div>
    <?php endforeach; ?>


</div>
</div>
<!-- /.container-fluid -->