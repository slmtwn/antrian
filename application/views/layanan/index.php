        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">Ini adalah header</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg">
                            <table id="layanan" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Layanan</th>
                                        <th>Tanggal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($layanan as $lyn) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $lyn['nama_layanan']; ?></td>
                                            <td><?= date('d F Y', $lyn['tanggal']); ?></td>
                                            <td>
                                                <a href="#" class="badge badge-primary">Edit</a>
                                                <a href="#" class="badge badge-danger">Hapus</a>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->