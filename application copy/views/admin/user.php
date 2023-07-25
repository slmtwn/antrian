        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="card">
                <div class="row m-3">
                    <div class="col-lg">
                        <table id="allUser" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Active</th>
                                    <th>Terdaftar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($allUser as $au) : ?>
                                    <tr>
                                        <td><?= $au['name']; ?></td>
                                        <td><?= $au['email']; ?></td>
                                        <td>
                                            <?php
                                            $role_id = $au['role_id'];
                                            switch ($role_id) {
                                                case 1:
                                                    echo 'Administrator';
                                                    break;
                                                default:
                                                    echo 'Member';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $role_id = $au['is_active'];
                                            switch ($role_id) {
                                                case 1:
                                                    echo 'Aktif';
                                                    break;
                                                default:
                                                    echo 'Tidak Aktif';
                                            }
                                            ?>
                                        <td><?= date('d F Y', $au['date_created']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->