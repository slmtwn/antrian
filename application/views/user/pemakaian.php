 <!-- Begin Page Content -->
 <div class="container-fluid">
     <?= $this->session->flashdata('message'); ?>
     <div class="row">
         <div class="col-lg mb-3">
             <a href="<?= base_url('user/tambahpakai'); ?>" class="btn btn-primary">Tambah Pemakaian</a>
         </div>
     </div>
     <div class="card">
         <div class="row m-3">
             <div class="col-lg">

                 <table id="pelanggan" class="table table-striped table-bordered" style="width:100%">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>ID</th>
                             <th>Nama</th>
                             <th>Bulan - Tahun</th>
                             <th>Meter Awal</th>
                             <th>Meter Akhir</th>
                             <th>Pakai</th>
                             <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $i = 1; ?>
                         <?php foreach ($pemakaian as $pakai) : ?>
                             <tr>
                                 <td><?= $i++; ?></td>
                                 <td><?= $pakai['id_pelanggan']; ?></td>
                                 <td><?= $pakai['nm_pelanggan']; ?></td>
                                 <td><?= $pakai['nama_bulan'] . " - " . $pakai['tahun']; ?> </td>
                                 <td><?= $pakai['awal']; ?></td>
                                 <td><?= $pakai['akhir']; ?></td>
                                 <td><?= $pakai['pakai']; ?></td>
                                 <td>
                                     <a href="<?= base_url('user/hapuspakai/') . $pakai['id_pakai']; ?>" class="badge badge-danger">hapus</a>
                                 </td>
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