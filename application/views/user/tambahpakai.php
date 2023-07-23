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
                            <label for="id_pelanggan" class="col-sm-2 col-form-label">ID Pelanggan</label>
                            <div class="col-sm-4">
                                <input type="text" name="id_pelanggan" class="form-control" id="id_pelanggan" value="" onkeyup="isi_otomatis()">
                                <?= form_error('id_pelanggan', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nm_pelanggan" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-4">
                                <input type="text" name="nm_pelanggan" class="form-control" id="nm_pelanggan" placeholder="Nama pelanggan">
                                <?= form_error('nm_pelanggan', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat_pelanggan" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" name="alamat_pelanggan" class="form-control" id="alamat_pelanggan" placeholder="Alamat pelanggan">
                                <?= form_error('alamat_pelanggan', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                            <div class="col-sm-2">
                                <select class="custom-select" name="tahun" id="tahun">
                                    <option value="2023" selected>2023</option>
                                    <option value="2022">2022</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bulan" class="col-sm-2 col-form-label">Bulan</label>
                            <div class="col-sm-3">
                                <select class="custom-select" name="bulan" id="bulan">
                                    <?php foreach ($bulan as $bln) : ?>
                                        <option value="<?= $bln['id_bulan']; ?>"><?= $bln['nama_bulan']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="awal" class="col-sm-2 col-form-label">Awal</label>
                            <div class="col-sm-2">
                                <input type="text" name="awal" class="form-control" id="awal" readonly>
                                <?= form_error('awal', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="akhir" class="col-sm-2 col-form-label">Akhir</label>
                            <div class="col-sm-2">
                                <input type="text" name="akhir" class="form-control" id="akhir" placeholder="Meteran Akhir">
                                <?= form_error('akhir', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pakai" class="col-sm-2 col-form-label">Pakai</label>
                            <div class="col-sm-2">
                                <input type="text" name="pakai" class="form-control" id="pakai" readonly value="">
                                <?= form_error('pakai', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tgl_input" class="col-sm-2 col-form-label">Tanggal Input</label>
                            <div class="col-sm-3">
                                <input type="text" name="tgl_daftar" class="form-control" id="tgl_daftar" value="<?= date('d F Y'); ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<!-- End of Main Content -->