        <!-- Begin Page Content -->
        <div class="container-fluid">
            <?= $this->session->flashdata('message'); ?>
            <div class="row">
                <div class="col-lg mb-3">
                    <a href="<?= base_url('admin/tambah'); ?>" class="btn btn-primary">Tambah Pelanggan</a>
                </div>
            </div>
            <div class="card">
                <div class="row m-3">
                    <div class="col-lg">
                        <table id="pelanggan" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id Pel</th>
                                    <th>Nama</th>
                                    <!-- <th>Alamat</th> -->
                                    <th>Status</th>
                                    <th>No HP</th>
                                    <th>Layanan</th>
                                    <!-- <th>Tgl Daftar</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pelanggan as $plg) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $plg['id_pelanggan']; ?></td>
                                        <td><?= $plg['nm_pelanggan']; ?></td>
                                        <!-- <td><?= $plg['alamat_pelanggan']; ?></td> -->
                                        <td>
                                            <?php
                                            $status = $plg['status'];
                                            switch ($status) {
                                                case 1:
                                                    echo 'Aktif';
                                                    break;
                                                default:
                                                    echo 'Tidak AKtif';
                                            }
                                            ?></td>
                                        <td><?= $plg['no_hp']; ?></td>
                                        <td><?= $plg['layanan']; ?></td>
                                        <!-- <td><?= date('d F Y', $plg['tgl_daftar']); ?></td> -->
                                        <td>
                                            <a href="<?= base_url('admin/ubahpelanggan/') . $plg['id_pelanggan']; ?>" class="badge badge-success">edit</a>
                                            <a href="<?= base_url('admin/hapuspelanggan/') . $plg['id_pelanggan']; ?>" class="badge badge-danger">delete</a>
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
        <!-- End of Main Content -->