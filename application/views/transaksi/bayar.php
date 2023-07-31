<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <div class="card">
        <div class="card-header">
            Pembayaran Tagihan Air
        </div>
        <div class="row m-3">
            <div class="col-lg">
                <table class="table table-striped" style="width:100%">
                    <tbody>
                        <tr>
                            <td width='150'>ID/Nama</td>
                            <td width='4'>:</td>
                            <td><?= $bayar['id_pelanggan'] . ' - ' . $bayar['nm_pelanggan']; ?></td>
                        </tr>
                        <tr>
                            <td>Bulan/Tahun</td>
                            <td>:</td>
                            <td><?= $bayar['nama_bulan'] . ' - ' . $bayar['tahun']; ?></td>
                        </tr>
                        <tr>
                            <td>Pemakaian</td>
                            <td>:</td>
                            <td><?= $bayar['pakai']; ?> M<sup>3</sup></td>
                        </tr>
                        <tr>
                            <td>Tagihan</td>
                            <td>:</td>
                            <td>Rp<?= number_format($bayar['tagihan'], 0, ",", "."); ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td>
                                <?php
                                switch ($bayar['status']) {
                                    case '0':
                                        echo "<div class='badge badge-danger'>Belum bayar</div>";
                                        break;
                                    default:
                                        echo "<div class='badge badge-primary'>Lunas</div>";
                                        break;
                                }
                                ?>
                            </td>
                    </tbody>
                </table>
                <form method="POST" action="">
                    <?php $status = $bayar['status']  ?>
                    <?php if ($status == '0') { ?>
                        <div class="form-group">
                            <input type='hidden' class="form-control" name="id_tagihan" value="<?php echo $bayar['id_tagihan']; ?>" readonly />
                        </div>
                        <div class="form-group">
                            <input type='hidden' class="form-control" name="tagih" id="tagih" value="<?php echo $bayar['tagihan']; ?>" readonly />
                        </div>
                        <div class="form-group">
                            <label>
                                <strong>Pembayaran</strong></label>
                            <input type='text' class="form-control" name="bayar" id="bayar" placeholder="Uang pembayaran" />
                        </div>
                        <div class="form-group">
                            <label>Uang Kembalian</label>
                            <input type='text' class="form-control" name="kembali" id="kembali" readonly />
                        </div>
                        <div>
                            <input type="submit" name="Bayar" value="Bayar" class="btn btn-primary">
                            <a href="?halaman=tagih_tampil" title="Kembali" class="btn btn-default">Batal</a>
                        <?php } else { ?>
                            <a href="#" class="btn btn-success"><i class="fa fa-print fa-sm"></i> Cetak Struk pembayaran</a>
                        <?php } ?>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#tagih, #bayar").keyup(function() {
            var tagih = $("#tagih").val();
            var bayar = $("#bayar").val();
            var kembali = parseInt(bayar) - parseInt(tagih);
            $("#kembali").val(kembali);

        });
    });
</script>