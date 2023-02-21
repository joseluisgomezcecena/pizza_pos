<div class="container">
	<div class="row">
		<div class="col">

			<!-- Footer START -->
			<footer class="footer">
				<div class="footer-content">
					<p class="m-b-0">Copyright © <?php echo date("Y") ?> Nexus Software Solutions. All rights reserved.</p>
					<span>
						<a href="" class="text-gray m-r-15">Term &amp; Conditions</a>
						<a href="" class="text-gray">Privacy &amp; Policy</a>
					</span>
				</div>
			</footer>
			<!-- Footer END -->

		</div>
	</div>
</div>

<!-- Core Vendors JS -->
<script src="<?php echo base_url() ?>assets/js/vendors.min.js"></script>

<!-- Datatables -->
<script src="<?php echo base_url() ?>assets/vendors/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/datatables/dataTables.bootstrap.min.js"></script>


<!-- page js -->
<script src="<?php echo base_url() ?>assets/vendors/chartjs/Chart.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/pages/dashboard-crm.js"></script>

<!-- Core JS -->
<script src="<?php echo base_url() ?>assets/js/app.min.js"></script>

<script>
	//$('#data-table').DataTable();

</script>

<script>
	$('#data-table').DataTable({
		'scrollX': true,
		"oLanguage": {
			"sEmptyTable": "No hay informacion... <a href='<?php echo base_url() ?>request/new' class='btn btn-primary'>Agregar Aqui</a>",
			"sZeroRecords": "No se encontro el cliente ... <br><br> <a href='<?php echo base_url() ?>cashier/clients/add/next' class='btn btn-primary btn-rounded'>Agregar Aqui</a>"
		}
		//'bSort': false
		//'scrollCollapse': true,
	});
</script>

<script>
	$(document).ready(function() {
		//on click
		$("#size").on('change',function() {
			$.ajax({
				url: '<?php echo base_url() ?>ajaxprice',
				type: 'post',
				data: {
					'size': this.value,
					'item': '<?php echo $item['item_id'] ?>'
				},
				//dataType: 'json',
				success: function(data) {
					//alert item_id
					$('#price').html("$ "+data);
				}
			});

		});
	} );
</script>



</body>

</html>
