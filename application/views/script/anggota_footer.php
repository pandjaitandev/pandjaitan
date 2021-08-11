<!-- DataTables -->
<script src="<?=base_url()?>/assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=base_url()?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?=base_url()?>/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url()?>/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url()?>/assets/plugins/datatables-buttons/js/buttons.flash.min.js"></script>
<script src="<?=base_url()?>/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url()?>/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url()?>/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?=base_url()?>/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=base_url()?>/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=base_url()?>/assets/plugins/jszip/jszip.min.js"></script>
<script src="<?=base_url()?>/assets/plugins/datatables-select/js/dataTables.select.min.js"></script>
<script src="<?=base_url()?>/assets/plugins/datatables-select/js/select.bootstrap4.min.js"></script>


<!-- DataTables Data -->
<script>
  $(function () {
    $("#fulltable").DataTable({});
    
    $('#list').DataTable({
      "paging": true,
      "pagingType": "simple",
      "autoWidth": true,
      "searching": false,
      "info": true,
      "ordering": false,
      "lengthChange": false,
      "lengthMenu": [ [10, 20, 30], [10, 20, 30] ],
    });

    $('#simple-full-table').DataTable({
      "paging": true,
      "pagingType": "simple",
      "autoWidth": true,
      "searching": true,
      "info": true,
      "ordering": true,
      "lengthChange": false,
      "lengthMenu": [ [50, 100, 150, 500], [50, 100, 150, 500] ],
    });

                   
  });
</script>