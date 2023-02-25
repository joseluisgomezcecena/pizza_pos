<div style="margin-top: 500px;" class="container mt-5">
	<br>
	<div class="row card  mt-5">
		<div class="col-lg-12 mt-5 mb-5">

			<a class="btn btn-primary btn-rounded" href="<?php echo base_url() ?>cashier/clients/add/new"> <i class="anticon anticon-user-add"></i>&nbsp; Nuevo Cliente</a>
			<br><br>

			<table style="width: 100%" id="data-table" class="table">

				<thead>
				<tr>
					<th>Nombre</th>
					<th>Telefono</th>
					<th>Calle</th>
					<th>Numero</th>
					<th>Colonia</th>
					<th>Notas</th>
					<th>Acciones</th>
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
						<td><a href="<?php echo base_url() ?>cashier/order/<?php echo $client['client_id'] ?>" class="btn btn-primary btn-rounded"><i class="fa fa-pizza-slice"></i>&nbsp;+Orden</a></td>
					</tr>
				<?php endforeach; ?>

				</tbody>


			</table>
		</div>
	</div>
</div>
