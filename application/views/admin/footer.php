
<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; Your Website 2020</span>
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
<!-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <a class="btn btn-primary" href="<?php echo base_url('main/logout')?>">Logout</a>
      </div>
    </div>
  </div>
</div> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>

 $(document).ready(function(){

  var idKec = $('#kecamatan').find('option:selected').val();

  $.ajax({
    url : "<?= base_url();?>c_admin/c_valid/get_ruas",
    method : "POST",
    data : {id: idKec},
    async : true,
    dataType : 'json',
    success: function(data){
      console.log(data);
      let html = '';
      data.forEach(val => {
          // console.log(val.nama_ruas);
          let b = `
                    <option value='${val.id_ruas}'>${val.nama_ruas}</option>
                  `;
          html+=b;
      });

      let container = document.querySelector('#ruas');
      container.innerHTML = html;

    }
  });


  $('#kecamatan').change(function(){ 
    var id=$(this).val();
    $.ajax({
      url : "<?= base_url();?>c_admin/c_valid/get_ruas",
      method : "POST",
      data : {id: id},
      async : true,
      dataType : 'json',
      success: function(data){

        var html = '<option value='+ 0 +'>--Pilih Ruas--</option>';
        var i;
        for(i=0; i<data.length; i++){
          html += '<option value='+data[i].id_ruas+'>'+data[i].nama_ruas+'</option>';
        }
        $('#ruas').html(html);

      }
    });
  }); 

});
</script>




<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script> -->

<script src="vendor/chart.js/Chart.min.js"></script>
<script src="js/demo/chart-bar-demo.js"></script>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/admin/vendor/jquery/jquery.min.js')?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('assets/admin/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('assets/admin/js/sb-admin-2.min.js')?>"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url('assets/admin/vendor/chart.js/Chart.min.js')?>"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url('assets/admin/js/demo/chart-area-demo.js')?>"></script>
<script src="<?php echo base_url('assets/admin/js/demo/chart-pie-demo.js')?>"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js')?>"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url('assets/js/demo/datatables-demo.js')?>"></script>


<!--   <script type="text/javascript">
      $(document).ready( function () {
        $('#tabel-data').DataTable({
          "language": {
          "emptyTable": "No data available in table"
          },
          "searching": true,
          "scrollX": true
        });
      });
    </script> -->

  </body>

  </html>
