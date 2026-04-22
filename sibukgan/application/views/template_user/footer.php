    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url() ?>assets/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

    <script src="<?php echo base_url() ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="<?php echo base_url() ?>js/demo/datatables-demo.js"></script>

    <script src="<?php echo base_url()?>/assets/chart.js/Chart.js"></script>


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
       				url: "<?php echo base_url() ?>user/Spt/autofill",
       				method: "POST",
        			data: {nama:nama},
        			dataType:'json',
        			success:function(data){
        				$('#nip').val(data[0].nip);
                $('#jabatan').val(data[0].jabatan);
                $('#golongan_pegawai').val(data[0].golongan);
                $('#pangkat_pegawai').val(data[0].pangkat);


				  }
      				  });
    		}
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#anggota_1').change(function()
		{
			var nama = $('#anggota_1').val();
			if (nama != '')
			{
      			$.ajax({
       				url: "<?php echo base_url() ?>user/Spt/autofill",
       				method: "POST",
        			data: {nama:nama},
        			dataType:'json',
        			success:function(data){
        				$('#nip_1').val(data[0].nip);
                $('#jabatan_1').val(data[0].jabatan);
                $('#golongan_1').val(data[0].golongan);
                $('#pangkat_1').val(data[0].pangkat);


				  }
      				  });
    		}
		});
	});
</script>

<!-- <script type="text/javascript">
  $(document).ready(function(){
    $('#pegawai').change(function()
    {
      var pegawai = $('#pegawai').val();
      if (pegawai != '')
      {
            $.ajax({
              url: "<?php echo base_url() ?>administrator/Sppd/autofill2",
              method: "POST",
              data: {pegawai:pegawai},
              dataType:'json',
              success:function(data){
                $('#nip_pegawai').val(data[0].nip);
                $('#jabatan_pegawai').val(data[0].jabatan);
                $('#golongan_pegawai').val(data[0].golongan);
                $('#pangkat_pegawai').val(data[0].pangkat);
          }
                });
        }
    });
  });
</script> -->

