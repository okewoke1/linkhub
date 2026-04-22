    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url() ?>assets/simakand/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/simakand/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url() ?>assets/simakand/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url() ?>assets/simakand/js/sb-admin-2.min.js"></script>
<script src="<?php echo base_url() ?>simakand/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>simakand/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="<?php echo base_url() ?>simakand/js/demo/datatables-demo.js"></script>

    <script src="<?php echo base_url()?>/assets/simakand/chart.js/Chart.js"></script>

</body>

</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#nama').change(function()
		{
			var nama = $('#nama').val();
			if (nama != '')
			{
      			$.ajax({
       				url: "<?php echo base_url() ?>simakand/operator/Bbm/autofill",
       				method: "POST",
        			data: {nama:nama},
        			dataType:'json',
        			success:function(data){
        				$('#nip').val(data[0].nip);
				  }
      				  });
    		}
		});
	});
</script>