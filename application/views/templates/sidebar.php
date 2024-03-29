<!-- Side Nav START -->
<div style="" class="side-nav">
	<div class="side-nav-inner">
		<ul class="side-nav-menu scrollable">


			<!--ORDENES-->
			<li class="nav-item dropdown">
				<a class="dropdown-toggle" href="<?php echo base_url() ?>admin">
					<span class="icon-holder">
						<i class="anticon anticon-dashboard fa-lg"></i>
					</span>
					<span class="title">Inicio</span>
				</a>
			</li>




			<!--ORDENES-->
			<li class="nav-item dropdown">
				<a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-file fa-lg"></i>
                                </span>
					<span class="title">Ordenes</span>
					<span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="<?php echo base_url() ?>cashier">Tomar Orden</a>
					</li>
				</ul>
			</li>

			<!--PLATILLOS CONFIG-->
			<?php  ?>
			<li class="nav-item dropdown">
				<a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="fa fa-pizza-slice fa-lg"></i>
                                </span>
					<span class="title">Configurar Platillos</span>
					<span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="<?php echo base_url() ?>admin/ingredients">Ingredientes</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>admin/sizes">Medidas</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>admin/items">Pizzas</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>admin/sides">Platillos</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>admin/extras">Extras</a>
					</li>
				</ul>
			</li>


			<!--ENTREGAS CONFIG-->
			<li class="nav-item dropdown">
				<a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="fa fa-motorcycle fa-lg"></i>
                                </span>
					<span class="title">Configurar Envios</span>
					<span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="<?php echo base_url() ?>admin/shipping">Precios de envio.</a>
					</li>
				</ul>
			</li>



			<!--PLATILLOS CONFIG-->
			<li class="nav-item dropdown">
				<a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="fa fa-file-excel fa-lg"></i>
                                </span>
					<span class="title">Reporte de ventas</span>
					<span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="<?php echo base_url() ?>admin/sales">Reporte de ventas</a>
					</li>
				</ul>
			</li>

			<?php ?>



			<!--
			<li class="nav-item dropdown">
				<a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
									<i class="anticon anticon-build"></i>
								</span>
					<span class="title">UI Elements</span>
					<span class="arrow">
									<i class="arrow-icon"></i>
								</span>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="avatar.html">Avatar</a>
					</li>
					<li>
						<a href="alert.html">Alert</a>
					</li>
					<li>
						<a href="badge.html">Badge</a>
					</li>
					<li>
						<a href="buttons.html">Buttons</a>
					</li>
					<li>
						<a href="cards.html">Cards</a>
					</li>
					<li>
						<a href="icons.html">Icons</a>
					</li>
					<li>
						<a href="lists.html">Lists</a>
					</li>
					<li>
						<a href="typography.html">Typography</a>
					</li>
				</ul>
			</li>
			<li class="nav-item dropdown">
				<a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-hdd"></i>
                                </span>
					<span class="title">Components</span>
					<span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="accordion.html">Accordion</a>
					</li>
					<li>
						<a href="carousel.html">Carousel</a>
					</li>
					<li>
						<a href="dropdown.html">Dropdown</a>
					</li>
					<li>
						<a href="modals.html">Modals</a>
					</li>
					<li>
						<a href="toasts.html">Toasts</a>
					</li>
					<li>
						<a href="popover.html">Popover</a>
					</li>
					<li>
						<a href="slider-progress.html">Slider & Progress</a>
					</li>
					<li>
						<a href="tabs.html">Tabs</a>
					</li>
					<li>
						<a href="tooltips.html">Tooltips</a>
					</li>
				</ul>
			</li>
			<li class="nav-item dropdown">
				<a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-form"></i>
                                </span>
					<span class="title">Forms</span>
					<span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="form-elements.html">Form Elements</a>
					</li>
					<li>
						<a href="form-layouts.html">Form Layouts</a>
					</li>
					<li>
						<a href="form-validation.html">Form Validation</a>
					</li>
				</ul>
			</li>
			<li class="nav-item dropdown">
				<a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-table"></i>
                                </span>
					<span class="title">Tables</span>
					<span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="basic-table.html">Basic Table</a>
					</li>
					<li>
						<a href="data-table.html">Data Table</a>
					</li>
				</ul>
			</li>
			<li class="nav-item dropdown">
				<a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-pie-chart"></i>
                                </span>
					<span class="title">Charts</span>
					<span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="chartist.html">Chartist</a>
					</li>
					<li>
						<a href="chartjs.html">ChartJs</a>
					</li>
				</ul>
			</li>
			<li class="nav-item dropdown">
				<a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-file"></i>
                                </span>
					<span class="title">Pages</span>
					<span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="profile.html">Profile</a>
					</li>
					<li>
						<a href="invoice.html">Invoice</a>
					</li>
					<li>
						<a href="members.html">Members</a>
					</li>
					<li>
						<a href="pricing.html">Pricing</a>
					</li>
					<li>
						<a href="setting.html">Setting</a>
					</li>
					<li class="nav-item dropdown">
						<a href="javascript:void(0);">
							<span>Blog</span>
							<span class="arrow">
                                            <i class="arrow-icon"></i>
                                        </span>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a href="blog-grid.html">Blog Grid</a>
							</li>
							<li>
								<a href="blog-list.html">Blog List</a>
							</li>
							<li>
								<a href="blog-post.html">Blog Post</a>
							</li>
						</ul>
					</li>
				</ul>
			</li>
			<li class="nav-item dropdown">
				<a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-lock"></i>
                                </span>
					<span class="title">Authentication</span>
					<span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="login-1.html">Login 1</a>
					</li>
					<li>
						<a href="login-2.html">Login 2</a>
					</li>
					<li>
						<a href="login-3.html">Login 3</a>
					</li>
					<li>
						<a href="sign-up-1.html">Sign Up 1</a>
					</li>
					<li>
						<a href="sign-up-2.html">Sign Up 2</a>
					</li>
					<li>
						<a href="sign-up-3.html">Sign Up 3</a>
					</li>
					<li>
						<a href="error-1.html">Error 1</a>
					</li>
					<li>
						<a href="error-2.html">Error 2</a>
					</li>
				</ul>
			</li>
			-->
		</ul>
	</div>
</div>
<!-- Side Nav END -->

