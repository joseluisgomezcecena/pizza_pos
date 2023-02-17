<div class="container">
	<div class="row mt-5">
		<div class="col-lg-6 offset-3 text-center">
			<?php if($this->session->flashdata('errors')): ?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Error de autenticación</strong>
					<?php echo $this->session->flashdata('errors'); ?>.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php endif; ?>

			<?php if ($this->session->flashdata('message')):  ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Operación Exitosa</strong>
					<?php echo $this->session->flashdata('message'); ?>.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php endif; ?>

			<?php echo validation_errors(); ?>
		</div>
	</div>
</div>



<div class="container">
	<div class="row mt-5">
		<div class="col-lg-6 offset-lg-3">
			<div style="min-height: 400px" class="card">
				<div class="card-body">
					<h2 class="m-t-20 font-weight-bolder fw-bolder">Registro de usuario</h2>
					<?php echo form_open_multipart(base_url() . "auth/register")?>

					<div class="form-group">
						<label class="font-weight-semibold" for="userName">Usuario:</label>
						<div class="input-affix">
							<i class="prefix-icon anticon anticon-user"></i>
							<input type="text" class="form-control" name="username" id="userName" placeholder="Usuario">
						</div>
					</div>

					<div class="form-group">
						<label class="font-weight-semibold" for="password">Contraseña:</label>
						<div class="input-affix m-b-10">
							<i class="prefix-icon anticon anticon-lock"></i>
							<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
						</div>
					</div>

					<div class="form-group">
						<label class="font-weight-semibold" for="password">Confirme La Contraseña:</label>
						<div class="input-affix m-b-10">
							<i class="prefix-icon anticon anticon-lock"></i>
							<input type="password" class="form-control" id="password2" name="password2" placeholder="Confirme La contraseña">
						</div>
					</div>

					<div class="form-group">
						<div class="d-flex align-items-center justify-content-between">
							<button type="submit" class="btn btn-primary">Registrar</button>
						</div>
					</div>

					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
