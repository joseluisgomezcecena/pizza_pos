<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>


<style>
																												  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
	.container_parent {
		height: 100vh;
		position: relative;
		/*border: 3px solid green;*/
	}

	.vertical-center {
		margin: 0;
		position: absolute;
		top: 50%;
		-ms-transform: translateY(-50%);
		transform: translateY(-50%);
		width: 100%;
	}

	body{
		/*font-family: 'Nunito Sans', sans-serif;*/
		font-family: 'Poppins', sans-serif;
		/*font-family: 'Roboto', sans-serif;*/
	}

	a{
		color: rgba(231, 33, 69, 0.91);
		text-decoration: none;
		text-decoration-color: #0aa370;
		font-size: 24px;
		text-align: center;
		font-weight: 500;

	}

	a:hover{
		color: rgba(231, 33, 115, 0.91);
		text-decoration: none;
		text-decoration-color: #10ffb0;
		font-size: 24px;
	}
</style>

<div class="container_parent">
	<div class="vertical-center">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div  class="cardw align-items-center">
						<div >
							<div class="col-lg-12 ">
								<div class="card-body text-center">
									<h1 style="font-size: 44px; font-weight: bolder;" class="card-title text-center">🍕 Pizza POS </h1>

									<div class="col-lg-8 offset-lg-2">
										<a style="" href="<?php echo base_url() ?>cashier">Cajero ></a>
										&nbsp;&nbsp;
										&nbsp;&nbsp;
										<a style="" href="<?php echo base_url() ?>admin">Administrador ></a>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
