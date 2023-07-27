<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <div class="card">
        <div class="card-header">
            Pembayaran Tagihan Air
        </div>
        <div class="row m-3">
            <div class="col-lg-8">
                <?= $this->session->flashdata('message'); ?>
                <table class="table table-striped" style="width:100%">
                    <tbody>
                        <tr>
                            <td>ID/Nama</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Bulan/Tahun</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Pemakaian</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Tagihan</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->