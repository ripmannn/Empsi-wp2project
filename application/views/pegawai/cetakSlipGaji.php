<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style type="text/css">
        body{
            font-family: Arial;
            color: black;
        }
    </style>
</head>
<body>

    <center>
        <h1>PT. BINTANG MAKMUR SEJAHTERA</h1>
        <h2>Slip Gaji Pegawai</h2>
        <hr style="width: 50%; border-width: 5px; color: black; " >
    </center>

        <?php foreach($potongan as $p): {
            
            $potongan = $p->jml_potongan;
        }?>
       
          

        <?php foreach($print_slip as $ps): ?>
            <?php $potongan_gaji = $ps->alpha * $potongan; ?>
        <table style="width:100%">
            <tr>
                <td width="20%" >NIK</td>
                <td width="1%">:</td>
                <td><?= $ps->nik?></td>
            </tr>
            <tr>
                <td>Nama Pegawai</td>
                <td>:</td>
                <td><?= $ps->nama_pegawai ?></td>
            </tr>
            
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td><?= $ps->nama_jabatan ?></td>
            </tr>
            
            <tr>
                <td>Bulan</td>
                <td>:</td>
                <td><?= substr($ps->bulan, 0,2) ?></td>
            </tr>
            
            <tr>
                <td>Tahun</td>
                <td>:</td>
                <td><?= substr($ps->bulan, 2,4) ?></td>
            </tr>
        </table>

        <table class="table table-striped table-bordered">
            <tr>
                <th class="text-center" width="5%" >No</th>
                <th class="text-center">Keterangan</th>
                <th class="text-center">Jumlah</th>
            </tr>

            <tr>
                <td class="text-center">1</td>
                <td class="text-center">Gaji Pokok</td>
                <td class="text-center">Rp. <?= number_format($ps->gaji_pokok,0,',','.') ?></td>
            </tr>
            
            <tr>
                <td class="text-center">2</td>
                <td class="text-center">Tunjangan Transportasi</td>
                <td class="text-center">Rp. <?= number_format($ps->tj_transport,0,',','.') ?></td>
            </tr>
            
            <tr>
                <td class="text-center">3</td>
                <td class="text-center">Uang Makan</td>
                <td class="text-center">Rp. <?= number_format($ps->uang_makan,0,',','.') ?></td>
            </tr>
            
            <tr>
                <td class="text-center">4</td>
                <td class="text-center">Potongan</td>
                <td class="text-center">Rp. <?= number_format($potongan_gaji,0,',','.') ?></td>
            </tr>

            <tr>
                
                <th colspan="2" style="text-align: right;" >TOTAL GAJI</th>
                <th class="text-center">Rp. <?= number_format($ps->gaji_pokok + $ps->tj_transport + $ps->uang_makan - $potongan_gaji,0,',','.') ?></td>
            </tr>

        </table>

        <table width="100%" >
            <tr>
                <td></td>
                <td>
                    <p>Pegawai</p>
                    <br>
                    <br>
                    <p class="font-weight-bold" ><?= $ps->nama_pegawai ?></p>
                </td>

                <td width="230px">
                    <p>Jakarta, <?= date("d M Y") ?> <br> IT Manager, </p>
                    <br>
                    <br>
                    <p>Arief Rahman P S.kom M.kom</p>
                </td>
            </tr>
        </table>
        <?php endforeach; ?>
        <?php endforeach; ?>
    
</body>
</html>

<script text="text/javascript" >
    window.print();
</script>