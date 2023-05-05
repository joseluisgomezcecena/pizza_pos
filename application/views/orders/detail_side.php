<style>
	section {background: #e0e0e0; padding:40px 0; border-radius: 15px;}

	@media (max-width: 768px) {
		.m-text-center {text-align:center;}
		.call-to-action h1{font-size:20px;}
	}
	@media (max-width: 1024px) {
		.m-text-center {text-align:center;}
		.call-to-action h1{font-size:25px;}
	}
</style>



<?php  echo form_open(base_url() . 'cashier/order/items/detail/'.$item_id . '/' . $order); ?>

<div class="container-fluid mt-5 mb-5">

	<div class="row">

		<div class="col align-middle mt-5">
			<div class="card">
				<div class="card-body">
					<h2><?php echo $item['item_name'] ?></h2>

					<p style="font-weight: bolder; font-size: 16px;" id="price"></p>


					<div class="row mt-3">
						<div class="col">
							<label>Cantidad:</label>
							<input type="number" name="qty" class="form-control" required>
						</div>
					</div>


					<button type="submit" class="btn btn-primary mt-3">Agregar a la Orden.</button>
				</div><!--card-body-->
			</div>
		</div>
	</div>
</div>

<?php echo form_close(); ?>
