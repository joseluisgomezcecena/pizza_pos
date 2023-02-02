<div class="container">
	<div>
		<table id="data-table" class="table">

			<a class="btn btn-primary" href="<?php echo base_url() ?>cashier/clients/add">Nuevo Cliente</a>
			<br><br>
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
					<td><a href="<?php echo base_url() ?>cashier/order/<?php echo $client['client_id'] ?>" class="btn btn-primary">Generar Pedido</a></td>
				</tr>
				<?php endforeach; ?>

			</tbody>


		</table>
	</div>
</div>
