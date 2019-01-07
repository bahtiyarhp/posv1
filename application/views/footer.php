</div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/sbadmin/vendor/jquery/jquery.min.js');?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/sbadmin/vendor/bootstrap/js/bootstrap.min.js');?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assets/sbadmin/vendor/metisMenu/metisMenu.min.js');?>"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url('assets/sbadmin/vendor/raphael/raphael.min.js');?>"></script>
    <script src="<?php echo base_url('assets/sbadmin/vendor/morrisjs/morris.min.js');?>"></script>
    <script src="<?php echo base_url('assets/sbadmin/data/morris-data.js');?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('assets/sbadmin/dist/js/sb-admin-2.js');?>"></script>

    <script src="<?php echo base_url('assets/sbadmin/vendor/datatables/js/jquery.dataTables.min.js');?>"></script>
    <script src="<?php echo base_url('assets/sbadmin/vendor/datatables-plugins/dataTables.bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/sbadmin/vendor/datatables-responsive/dataTables.responsive.js');?>"></script>

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true,
            "ordering": false,
            "columns": [
            { "width": "40%" },
            null,
            null,
            null,
            null,
            null,
            { "width": "40%" }
        ]
        });
    });
</script>

</body>

</html>