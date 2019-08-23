<?php 
require URLINC.'nav_dash.php';
require URLINC.'check_session.php';
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-12 ">	
			<hr>		
			<h5 class=""><i class="fa fa-bars" aria-hidden="true"></i> Mis clientes</h5>
			<small><i class="far fa-edit"></i> Aquí podrá ver toda la información de todos sus clientes asignados</small>
			<hr>
		</div>
		<div class="col-12">		
			<table  class="datatable table table-sm table-striped table-bordered dt-responsive" width="100%" >
				<thead>
					<tr>
						<th>#</th>
						<th>Origen</th>
						<th>Fecha / Hora</th>						
						<th>Empresa</th>
						<th>Correo</th>
					
						<th>Sms</th>
						<th>Notas</th>
						<th>Ubigeo</th>
						<th>Mensaje</th>
						</tr>
				</thead>
			</table>
		</div>	
	</div>
</div>
