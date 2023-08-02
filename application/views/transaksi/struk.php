<div class="container">
    <div class="row">
        <div class="col-lg">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="4" class="w-auto">PAMSIMAS GONDANGLEGI</th>
                    </tr>
                    <tr>
                        <th colspan="4">Gondanglegi</th>
                    </tr>
                    <tr>
                        <td colspan="4">--------------------------------------------</td>
                    </tr>
                    <tr>
                        <td><small>Tgl : <?= date('d/m/Y', $struk['tglbayar']); ?></small></td>
                        <td></td>
                        <td align="right" colspan="2"><small>Kasir : <?= $user['name']; ?></small></td>

                    </tr>
                    <tr>
                        <th colspan="4">=============================</th>
                    </tr>

                </thead>
                <tbody width='50%'>
                    <tr>
                        <td><small>Id Pel</small></td>
                        <td>:</td>
                        <td><small><?= $struk['idpelanggan']; ?></small></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><small>Nama</small></td>
                        <td>:</td>
                        <td><small><?= $struk['nama_pelanggan']; ?></small></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="4">-------------------------------------------</td>
                    </tr>
                    <tr>
                        <td><small>Jml Pakai</small></td>
                        <td>:</td>
                        <td><small><?= $struk['pemakaian']; ?> M<sup>3</sup></small></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><small>Beban</small></td>
                        <td>:</td>
                        <td><small>Rp<?= number_format($struk['beban'], 0, ',', '.'); ?></small></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><small>Tarif</small></td>
                        <td>:</td>
                        <td><small>Rp1.500/M<sup>3</sup></small></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="4">-------------------------------------------</td>
                    </tr>
                    <tr>
                        <td><small>Tagihan</small></td>
                        <td>:</td>
                        <td><small>Rp<?= number_format($struk['tagihan'], 0, ',', '.'); ?></small></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><small>Dibayar</td>
                        <td>:</td>
                        <td><small>Rp<?= number_format($struk['pembayaran'], 0, ',', '.'); ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><small>Kembali</td>
                        <td>:</td>
                        <td><small>Rp<?= number_format($struk['kembali'], 0, ',', '.'); ?></small></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th colspan="4">============================</th>
                    </tr>
                    <tr>
                        <th colspan="4">-------- Terima Kasih --------</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    window.print();
</script>