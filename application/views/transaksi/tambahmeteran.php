        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group row">
                            <label for="idpel" class="col-sm-2 col-form-label">Id Pelanggan</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="idpel" value="<?= $pelanggan['id']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nm_pelanggan" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="nm_pelanggan" name="nm_pelanggan" value="<?= $pelanggan['nm_pelanggan']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nm_pelanggan" class="col-sm-2 col-form-label">Tahun</label>
                            <div class="col-sm-2">
                                <?php
                                $now = date('Y');
                                echo "<select name=’tahun’ class='form-control'>";
                                for ($a = 2023; $a <= $now; $a++) {
                                    echo "<option value='$a'>$a</option>";
                                }
                                echo "</select>";
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nm_pelanggan" class="col-sm-2 col-form-label">Bulan</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="nm_pelanggan" name="nm_pelanggan" value="<?= $pelanggan['nm_pelanggan']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="awal" class="col-sm-2 col-form-label">Meteran Awal</label>
                            <div class="col-sm-2">
                                <input type="text" readonly class="form-control" id="awal" name="awal" value="<?= $pelanggan['nm_pelanggan']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="akhir" class="col-sm-2 col-form-label">Meteran Akhir</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="akhir" name="akhir" value="<?= $pelanggan['nm_pelanggan']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jml" class="col-sm-2 col-form-label">Jumlah</label>
                            <div class="col-sm-2">
                                <input type="text" readonly class="form-control" id="jml" name="jml" value="<?= $pelanggan['nm_pelanggan']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jml" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-2">
                                <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Tambah Meteran">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->