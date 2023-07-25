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
                                        <a href="<?= base_url('transaksi/bayar/') . $tagih['id_tagihan']; ?>" class="badge badge-danger">BELUM LUNAS</a>
                                    <?php else : ?>
                                        <div class="badge badge-success">LUNAS</div>
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