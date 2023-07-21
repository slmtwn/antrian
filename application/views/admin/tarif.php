<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            Tarif ini akan menentukan berapa yang harus dibayar pelanggan setiap kubik pemakaian air PAMSIMAS.
            <hr>
            <form action="<? base_url('admin/tarif'); ?>" method="post">
                <div class="form-group row">
                    <label for="tarif" class="col-sm-2 col-form-label">Tarif</label>
                    <div class="col-sm-2">
                        <?php foreach ($tarif as $tf) : ?>
                            <input type="text" class="form-control" id="tarif" value="<?= $tf['tarif']; ?>">
                        <?php endforeach; ?>
                    </div>
                    <button type="button" class="btn btn-success" name="updateTarif">Update Tarif</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>