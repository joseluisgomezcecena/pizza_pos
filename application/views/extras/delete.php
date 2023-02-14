<div class="container">

	<div class="row">
		<div class="col">
			<?php if($this->session->flashdata('message')): ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<span class="alert-icon m-r-20 font-size-30">
						<i class="anticon anticon-check-circle"></i>
					</span>
					<strong>Operación exitosa</strong>
					<?php echo $this->session->flashdata('message'); ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php endif; ?>
		</div>
	</div>

	<div class="row mt-2 mb-3 card">
		<div class="col mt-3 mb-3">

			<h1 class="font-weight-bolder mx-sm-3">Extras</h1>

			<?php echo form_open(base_url() . 'extras/delete/' . $extra['extra_id'], array('class'=>'form-inline')) ?>

			<div class="form-group mb-3 col-lg-12">
				<label for="inputPassword2" class="sr-only">Ingrediente</label>
				<select class="form-control" name="ingredient_id" disabled>
					<option value="">Ingrediente</option>

					<?php
						$selected = '';
						foreach ($ingredients as $ingredient):
					?>
						<?php
							if($ingredient['ingredient_id'] == $extra['ingredient_id'])
							{
								$selected = 'selected';
							}
							else
							{
								$selected = '';
							}
						?>

						<option value="<?php echo $ingredient['ingredient_id']; ?>" <?php echo $selected ?> ><?php echo $ingredient['ingredient_name']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>


			<div class="form-group mx-sm-3 mb-2">
				<label for="inputPassword2" class="">Precio para: <?php echo $extra['size_name'] ?></label>
				<input type="text" value="<?php echo $extra['extra_price'] ?>" class="form-control" name="price"  id="name" placeholder="Precio para: <?php echo $extra['size_name'] ?>" disabled>
			</div>

			<button type="submit" name="delete" class="btn btn-danger mb-2">Eliminar</button>

		</div>
	</div>

</div>
