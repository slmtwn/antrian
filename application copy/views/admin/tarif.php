<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <div class="card">
        <div class="row m-3">
            <div class="col-lg">
                <?= $this->session->flashdata('message'); ?>
                <table id="pelanggan" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Layanan</th>
                            <th>Tarif</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($tarif as $trf) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <!-- <td><?= $pakai['id_pakai']; ?></td> -->
                                <td><?= $trf['layanan']; ?></td>
                                <td><?= $trf['tarif']; ?></td>

                                <td>
                                    <a href="<?= base_url('admin/edittarif/') . $trf['id_layanan']; ?>" class="badge badge-success">edit</a>
                                    <a href="<?= base_url('admin/hpstarif/') . $trf['id_layanan']; ?>" class="badge badge-danger">hapus</a>
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