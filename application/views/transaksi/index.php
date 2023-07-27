<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <div class="card">
        <div class="card-header">
            Tagihan Penggunaan Air Pamsimas
        </div>
        <div class="row m-3">
            <div class="col-lg">
                <table id="tagihan" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Pel</th>
                            <th>Nama</th>
                            <th>Bulan - Tahun</th>
                            <th>Pemakaian</th>
                            <th>Tagihan</th>
                            <th>Action/Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($tagihan as $tagih) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $tagih['id_pelanggan']; ?></td>
                                <td><?= $tagih['nm_pelanggan']; ?></td>
                                <td><?= $tagih['nama_bulan'] . " - " . $tagih['tahun']; ?> </td>
                                <td><?= $tagih['pakai']; ?> M<sup>3</sup></td>
                                <td>Rp<?= number_format($tagih['tagihan'], 0, ",", "."); ?></td>
                                <td>
                                    <?php if ($tagih['status'] === '0') :; ?>
                                        <a href="<?= base_url('transaksi/bayar/') . $tagih['id_tagihan']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-cash-register fa-sm"></i> Bayar</a>
                                    <?php else : ?>
                                        <a href="#" class="btn btn-success btn-sm"><i class="fa fa-print fa-sm"></i> Cetak Struk Pembayaran</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->