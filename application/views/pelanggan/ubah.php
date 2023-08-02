        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->
            <div class="row">
                <div class="col-lg">
                    <div class="card col-lg">
                        <div class="card-body col-lg">
                            <form action="" method="post">
                                <div class="form-group row">
                                    <label for="nm_pelanggan" class="col-sm-2 col-form-label">ID Pelanggan</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="id_pelanggan" class="form-control-plaintext font-weight-bold btn btn-danger" id="id_pelanggan" value="<?= $pelanggan['id_pelanggan']; ?>">
                                        <?= form_error('id_pelanggan', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nm_pelanggan" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="nm_pelanggan" class="form-control" id="nm_pelanggan" value="<?= $pelanggan['nm_pelanggan']; ?>">
                                        <?= form_error('nm_pelanggan', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat_pelanggan" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="alamat_pelanggan" class="form-control" id="alamat_pelanggan" value="<?= $pelanggan['alamat_pelanggan']; ?>">
                                        <?= form_error('alamat_pelanggan', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat_pelanggan" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-2">
                                        <select class="custom-select" name="status" id="status">
                                            <option value="1" selected>Aktif</option>
                                            <option value="0">Tidak Aktif</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat_pelanggan" class="col-sm-2 col-form-label">No HP</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="nohp" class="form-control" id="nohp" value="<?= $pelanggan['no_hp']; ?>">
                                        <?= form_error('nohp', '<small class="text-danger pl-3">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat_pelanggan" class="col-sm-2 col-form-label">Layanan</label>
                                    <div class="col-sm-3">
                                        <input type="hidden" name="id_layanan" class="form-control" id="id_layanan" value="<?= $pelanggan['id_layanan']; ?>">
                                        <?php if ($pelanggan['id_layanan'] == $layanan['id_layanan']) : ?>
                                            <input type="text" name="layanan" class="form-control" id="layanan" value="<?= $layanan['layanan']; ?>" readonly>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tgl_daftar" class="col-sm-2 col-form-label">Tanggal Daftar</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="tgl_daftar" class="form-control" id="tgl_daftar" value="<?= date('d F Y'); ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tgl_daftar" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-3">
                                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->