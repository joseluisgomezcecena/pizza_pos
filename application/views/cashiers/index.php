<br><br><br><br>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<a href="<?php echo base_url(); ?>" class="btn btn-dark float-right btn-rounded"> <i class="fa fa-arrow-left"></i>&nbsp;Volver A Inicio</a>
			<a href="<?php echo base_url(); ?>cashier/order/counter" class="btn btn-success float-left btn-rounded"> <i class="fa fa-cash-register"></i>&nbsp;Orden De Mostrador</a>

		</div>
	</div>
</div>


<div style="margin-top: 500px;" class="container mt-5">
	<div class="row card ">
		<div class="col-lg-12 mt-5 mb-5">

			<a class="btn btn-primary btn-rounded mt-2 mb-3" href="<?php echo base_url() ?>cashier/clients/add/new"> <i class="anticon anticon-user-add"></i>&nbsp; Nuevo Cliente</a>

			<br><br>

			<table style="width: 100%; font-size: 13px;" id="data-table" class="table table-responsive-lg">

				<thead>
				<tr>
					<th style="width: 150px;">Nombre</th>
					<th style="width: 100px;">Telefono</th>
					<th style="width: 100px;">Calle</th>
					<th style="width: 100px;">Numero</th>
					<th style="width: 100px;">Colonia</th>
					<th style="width: 200px;">Notas</th>
					<th style="width: 100px;">Acciones</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($clients as $client): ?>
					<tr>
						<td><?php echo $client['client_name']; ?></td>
						<td><?php echo $client['client_phone']; ?></td>
						<td><?php echo $client['client_street']; ?></td>
						<td><?php echo $client['client_number']; ?></td>
						<td><?php echo $client['client_block']; ?></td>
						<td><?php echo $client['client_address_notes']; ?></td>
						<td>
							<a href="<?php echo base_url() ?>cashier/order/<?php echo $client['client_id'] ?>" class="btn btn-primary btn-rounded">
								<i class="fa fa-pizza-slice"></i>&nbsp;+Orden
							</a>
						</td>
					</tr>
				<?php endforeach; ?>

				</tbody>


			</table>
		</div>
	</div>
</div>
