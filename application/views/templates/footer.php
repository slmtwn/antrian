<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Web Embuh Ra Dong 2021 - <?= date('Y', $user['date_created']); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?> ">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- <script src="<?= base_url('assets/') ?>js/dataTables.bootstrap4.min.js"></script> -->
<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/') ?>js/jquery.dataTables.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>
<script src="<?= base_url('assets/') ?>js/bootstrap.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<!-- <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script> -->
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>
<script>
    $('.custom-file-input').on('change', function() {
        let filename = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(filename);
    });
    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');
        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
            }
        });
    });
</script>
<!-- datatable pelanggan-->
<script type="text/javascript">
    $(document).ready(function() {
        $('#pelanggan').dataTable();
        responsive: true;
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tagihan').dataTable();
        responsive: true;
    });
</script>
</script>
<!-- datatable pelanggan-->
<script type="text/javascript">
    $(document).ready(function() {
        $('#allUser').dataTable();
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#submenu').dataTable();
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#awal, #akhir").keyup(function() {
            var awal = $("#awal").val();
            var akhir = $("#akhir").val();
            var jml = parseInt(akhir) - parseInt(awal);
            $("#pakai").val(jml);

            var tarif = $("#tarif").val();
            var harga = parseInt(jml) * parseInt(tarif);
            $("#harga").val(harga);
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: 'Vote Warna',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    type: 'linear',
                    //beginAtZero: true
                }
            }
        }
    });
</script>
</body>

</html>