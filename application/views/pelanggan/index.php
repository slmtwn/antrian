        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="card">
                <div class="row m-3">
                    <div class="col-lg">
                        <div class="row">
                            <div class="col-lg mb-3 text-right">
                                <a href="<?= base_url('teknis/tambahPel'); ?>" class="btn btn-primary">Tambah Pelanggan</a>
                            </div>
                        </div>
                        <table id="pelanggan" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <!-- <th>Id</th> -->
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Status</th>
                                    <th>Tgl Daftar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pelanggan as $plg) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <!-- <td><?= $plg['id']; ?></td> -->
                                        <td><?= $plg['nm_pelanggan']; ?></td>
                                        <td><?= $plg['alamat_pelanggan']; ?></td>
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
                                            ?>
                                            <!-- <?= $plg['status']; ?></td> -->
                                        <td><?= date('d F Y', $plg['tgl_daftar']); ?></td>
                                        <td>
                                            <a href="<?= base_url('transaksi/tambah/') . $plg['id']; ?>" type="button" class="badge badge-primary">
                                                Catat Meteran
                                            </a>
                                            <a href="<?= base_url('teknis/ubahPel/') . $plg['id']; ?>" class="badge badge-success">edit</a>
                                            <a href="<?= base_url('teknis/hapusPel/') . $plg['id']; ?>" class="badge badge-danger">delete</a>
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
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Catat Meteran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Id Pel</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="id" value="<?= $idpel['id']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="nama" value="<?= $plg['nm_pelanggan']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Main Content -->