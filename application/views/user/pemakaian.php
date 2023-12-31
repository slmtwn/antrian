<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg mb-3">
            <a href="<?= base_url('user/tambahpakai'); ?>" class="btn btn-primary">Tambah Pemakaian</a>
        </div>
    </div>
    <div class="card">
        <div class="row m-3">
            <div class="col-lg">

                <table id="pelanggan" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Bulan - Tahun</th>
                            <th>Meter Awal</th>
                            <th>Meter Akhir</th>
                            <th>Pakai</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($pemakaian as $pakai) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $pakai['id_pelanggan']; ?></td>
                                <td><?= $pakai['nm_pelanggan']; ?></td>
                                <td><?= $pakai['nama_bulan'] . " - " . $pakai['tahun']; ?> </td>
                                <td><?= $pakai['awal']; ?> M<sup>3</sup></td>
                                <td><?= $pakai['akhir']; ?> M<sup>3</sup></td>
                                <td><?= $pakai['pakai']; ?> M<sup>3</sup></td>
                                <td>
                                    <?php
                                    switch ($pakai['status']) {
                                        case '1':
                                            echo "<div class='badge badge-success'>Lunas</div>";
                                            break;
                                        default:
                                            echo "<div class='badge badge-danger'>Belum Lunas</div>";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($pakai['status'] == 1) {
                                    ?>
                                        <div class="badge">locked</div>
                                    <?php } else { ?>
                                        <a href="<?= base_url('user/hapuspakai/') . $pakai['id_pakai']; ?>" class="badge badge-danger" onclick="return confirm('Yakin akan menghapus data pemakaian dengan Id Pakai <?= $pakai['id_pakai']; ?>?');">hapus</a>
                                    <?php } ?>
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