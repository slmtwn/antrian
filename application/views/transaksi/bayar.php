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
                        <tr>
                            <td></td>
                            <!-- <td><?= $pakai['id_pakai']; ?></td> -->
                            <td></td>
                            <td></td>

                            <td>
                                <a href="#" class="badge badge-success">edit</a>
                                <a href="#" class="badge badge-danger">hapus</a>
                            </td>
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