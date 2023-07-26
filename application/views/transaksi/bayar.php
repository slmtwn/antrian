<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    Featured
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group row">
                            <label for="id_pelanggan" class="col-sm-2 col-form-label">No Pemakaian</label>
                            <div class="col-sm-2">
                                <input type="text" name="id_pakai"
                                    class="form-control-plaintext font-weight-bold text-left" id="id_pakai"
                                    value="<?= $id_pakai; ?>">
                                <?= form_error('id_pakai', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_pelanggan" class="col-sm-2 col-form-label">ID Pelanggan</label>
                            <div class="col-sm-2">
                                <input type="text" name="id_pelanggan" class="form-control" id="id_pelanggan">
                                <?= form_error('id_pelanggan', '<small class="text-danger pl-3">', '</small>') ?>
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
                                <input type="text" name="akhir" class="form-control" id="akhir"
                                    placeholder="Meteran Akhir">
                                <?= form_error('akhir', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pakai" class="col-sm-2 col-form-label">Pakai</label>
                            <div class="col-sm-2">
                                <input type="text" name="pakai" class="form-control" id="pakai" readonly>
                                <?= form_error('pakai', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tarif" class="col-sm-2 col-form-label">Tarif</label>
                            <div class="col-sm-3">
                                <input type="text" name="tarif"
                                    class="form-control-plaintext font-weight-bold text-left" id="tarif" value=1500
                                    readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tagihan" class="col-sm-2 col-form-label">Tagihan</label>
                            <div class="col-sm-3">
                                <input type="text" name="harga" id="harga"
                                    class="form-control-plaintext font-weight-bold text-left" readonly="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <input type="hidden" name="tgl_daftar" class="form-control" id="tgl_daftar"
                                    value="<?= date('d F Y'); ?>" readonly>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#id_pelanggan').on('input', function() {
        var id_pelanggan = $(this).val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('user/get_awal') ?>",
            dataType: "JSON",
            data: {
                id_pelanggan: id_pelanggan
            },
            cache: false,
            success: function(data) {
                $.each(data, function(id_pelanggan, awal) {
                    $('[name="awal"]').val(data.awal);
                    //$('[name="harga"]').val(data.harga);
                    //$('[name="satuan"]').val(data.satuan);
                });
            }
        });
        return false;
    });
});
</script>
<!-- /.container-fluid -->
<!-- End of Main Content -->