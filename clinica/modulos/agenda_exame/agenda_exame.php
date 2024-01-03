<?php
require_once('bdd.php');


$sql = "SELECT id, exame, start, end, cliente FROM agenda_exame ";

$req = $bdd->prepare($sql);
$req->execute();

$agenda_exames = $req->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Calendário</title>

	
	<!-- FullCalendar -->
	<link href="modulos/agenda_exame/css/fullcalendar.css" rel="stylesheet">

    <style>
	    
		#calendar {
			max-width: 800px;
		}
		.col-centered{
			float: none;
			margin: 0 auto;
		}
    </style>
</head>

<body>

	<div class="row">
		<header class="page-header">
			<h2>Agenda</h2>
		</header>
		<div class="panel-heading">
	        <h3 class="panel-title">Agendar Exame</h3>
	    </div>
		<div class="panel-body">
	        <div class="row">
	            <div class="col-lg-12 text-center">
	                <div id="calendar" class="col-centered">
	                </div>
	            </div>	
	        </div>
        <!-- /.row -->
		
		<!-- Modal -->
		<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="modulos/agenda_exame/addEvent.php">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Agendar exame</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Tipo do exame</label>
					<div class="col-sm-10">
						<select required="" class="form-control" id="exame" name="exame">
							<option></option>
							<?php
								$select = $conexao->prepare("SELECT tipo FROM exame");
			                  	$select->execute();
			                  	while ($dados = $select->fetch(PDO::FETCH_OBJ)){
							?>
							<option> <?php echo $dados->tipo ?> </option>
							<?php } ?>
						</select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="cliente" class="col-sm-2 control-label">Cliente</label>
					<div class="col-sm-10">
						<select required="" class="form-control" id="cliente" name="cliente">
							<option></option>
							<?php
								$select = $conexao->prepare("SELECT nome FROM cliente");
			                  	$select->execute();
			                  	while ($dados = $select->fetch(PDO::FETCH_OBJ)){
							?>
							<option> <?php echo $dados->nome ?> </option>
							<?php } ?>
						</select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label" required="">Início</label>
					<div class="col-sm-10">
					  <input type="datetime-local" name="start" class="form-control" id="start" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label" required="">Fim</label>
					<div class="col-sm-10">
					  <input type="datetime-local" name="end" class="form-control" id="end" readonly>
					</div>
				  </div>
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				<button type="submit" class="btn btn-primary">Agendar</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
		
		
		
		<!-- Modal -->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="modulos/agenda_exame/editEventTitle.php">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Editar exame</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Tipo do exame</label>
					<div class="col-sm-10">
						<select required="" class="form-control" id="exame" name="exame">
							<option></option>
							<?php
								$select = $conexao->prepare("SELECT tipo FROM exame");
			                  	$select->execute();
			                  	while ($dados = $select->fetch(PDO::FETCH_OBJ)){
							?>
							<option> <?php echo $dados->tipo ?> </option>
							<?php } ?>
						</select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="cliente" class="col-sm-2 control-label">Cliente</label>
					<div class="col-sm-10">
						<select required="" class="form-control" id="cliente" name="cliente">
							<option></option>
							<?php
								$select = $conexao->prepare("SELECT nome FROM cliente");
			                  	$select->execute();
			                  	while ($dados = $select->fetch(PDO::FETCH_OBJ)){
							?>
							<option> <?php echo $dados->nome ?> </option>
							<?php } ?>
						</select>
					</div>
				  </div>
				  
				    <div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label class="text-danger"><input type="checkbox"  name="delete"> Deletar evento</label>
						  </div>
						</div>
					</div>
				  
				  <input type="hidden" name="id" class="form-control" id="id">
				
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				<button type="submit" class="btn btn-primary">Salvar</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>

		</div>
		
    </div>

    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="modulos/agenda_exame/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="modulos/agenda_exame/js/bootstrap.min.js"></script>
	
	<!-- FullCalendar -->
	<script src='modulos/agenda_exame/js/moment.min.js'></script>
	<script src='modulos/agenda_exame/js/fullcalendar.min.js'></script>
	<!-- Lang -->
	<script src='modulos/agenda_exame/lang/pt-br.js'></script>
	<script>

	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'exame',
				right: 'agendaWeek,agendaDay'
			},
			defaultDate: Date(), //Abre em cima dessa data
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			defaultView: 'agendaWeek',
			select: function(start, end) {
				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD[T]HH:mm'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD[T]HH:mm'));
				$('#ModalAdd').modal('show');
			},
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #exame').val(event.exame);
					$('#ModalEdit #cliente').val(event.cliente);
					$('#ModalEdit').modal('show');
				});
			},
			eventDrop: function(event, delta, revertFunc) { // si changement de position

				edit(event);

			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

				edit(event);

			},
			events: [
			<?php foreach($agenda_exames as $agenda_exame): 
			
				$start = explode(" ", $agenda_exame['start']);
				$end = explode(" ", $agenda_exame['end']);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $agenda_exame['start'];
				}
				if($end[1] == '00:00:00'){
					$end = $end[0];
				}else{
					$end = $agenda_exame['end'];
				}
			?>
				{
					id: '<?php echo $agenda_exame['id']; ?>',
					exame: '<?php echo $agenda_exame['exame']; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					cliente: '<?php echo $agenda_exame['cliente']; ?>',
				},
			<?php endforeach; ?>
			]
		});
		
		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}
			
			id =  event.id;
			
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			
			$.ajax({
			 url: 'editEventDate.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'OK'){
						//alert('Saved');
					}else{
						alert('Tente novamente.'); 
					}
				}
			});
		}
		
	});

</script>

</body>

</html>
