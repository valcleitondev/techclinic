<?php
require_once('bdd.php');


$sql = "SELECT id, title, start, end, color, cliente FROM events ";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

?>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
	<!-- FullCalendar -->
	<link href='css/fullcalendar.css' rel='stylesheet' />

    <style>
		#calendar {
			max-width: 800px;
		}
		.col-centered{
			float: none;
			margin: 0 auto;
		}
    </style>


    <div class="container">

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
			<form class="form-horizontal" method="POST" action="addEvent.php">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Agendar consulta</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Tipo da consulta</label>
					<div class="col-sm-10">
						<select required="" class="form-control" id="title" name="title">
							<option value="Nome consulta 1">Nome consulta 1</option>
							<option value="Nome consulta 2">Nome consulta 2</option>
						</select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="cliente" class="col-sm-2 control-label">Cliente</label>
					<div class="col-sm-10">
						<select required="" class="form-control" id="cliente" name="cliente">
							<option value="Nome cliente 1">Nome cliente 1</option>
							<option value="Nome cliente 2">Nome cliente 2</option>
						</select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Cor</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color" required="">
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Não Urgênte</option>
						  <option style="color:#008000;" value="#008000">&#9724; Pouco Urgênte</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Urgênte</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Muito Urgênte</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Emergência</option>
						  <option style="color:#000;" value="#000">&#9724; Morreu</option>
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
			<form class="form-horizontal" method="POST" action="editEventTitle.php">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Editar consulta</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Tipo da consulta</label>
					<div class="col-sm-10">
						<select required="" class="form-control" id="title" name="title">
							<option value="Nome consulta 1">Nome consulta 1</option>
							<option value="Nome consulta 2">Nome consulta 2</option>
						</select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="cliente" class="col-sm-2 control-label">Cliente</label>
					<div class="col-sm-10">
						<select required="" class="form-control" id="cliente" name="cliente">
							<option value="Nome cliente 1">Nome cliente 1</option>
							<option value="Nome cliente 2">Nome cliente 2</option>
						</select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Cor</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color" required="">
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Azul escuro</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquesa</option>
						  <option style="color:#008000;" value="#008000">&#9724; Verde</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Amarelo</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Laranja</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Vermelho</option>
						  <option style="color:#000;" value="#000">&#9724; Preto</option>
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
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<!-- FullCalendar -->
	<script src='js/moment.min.js'></script>
	<script src='js/fullcalendar.min.js'></script>
	
	<script>

	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
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
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #color').val(event.color);
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
			<?php foreach($events as $event): 
			
				$start = explode(" ", $event['start']);
				$end = explode(" ", $event['end']);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event['start'];
				}
				if($end[1] == '00:00:00'){
					$end = $end[0];
				}else{
					$end = $event['end'];
				}
			?>
				{
					id: '<?php echo $event['id']; ?>',
					title: '<?php echo $event['title']; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					color: '<?php echo $event['color']; ?>',
					cliente: '<?php echo $event['cliente']; ?>',
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
