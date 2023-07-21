 <div class="modal" tabindex="-1" role="dialog">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Modal title</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <p>Modal body text goes here.</p>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-primary">Save changes</button>
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             </div>
         </div>
     </div>
 </div>
 <!-- Begin Page Content -->
 <div class="container-fluid">
     <div class="card">
         <div class="row m-3">
             <div class="col-lg">
                 <?= $this->session->flashdata('message'); ?>
                 <table id="pelanggan" class="table table-striped table-bordered" style="width:100%">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>Id Pelanggan</th>
                             <th>Nama</th>
                             <th>Alamat</th>
                             <!-- <th>Kubik</th> -->
                             <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $i = 1; ?>
                         <?php foreach ($pelanggan as $plg) : ?>
                             <tr>
                                 <td><?= $i++; ?></td>
                                 <td><?= $plg['id']; ?></td>
                                 <td><?= $plg['nm_pelanggan']; ?></td>
                                 <td><?= $plg['alamat_pelanggan']; ?></td>
                                 <!-- <td><?= $plg['kubik']; ?></td> -->
                                 <td>
                                     <a href="<?= base_url('user/catatMeteran/') . $plg['id']; ?>" class="badge badge-success">Catat Meteran</a>

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