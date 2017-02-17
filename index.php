<?php
	function __autoload($class_name){
		require_once 'classes/' . $class_name . '.php';
	}
?>

<!DOCTYPE HTML>
<html land="pt-BR">
<head>
  <meta charset="UTF-8">
   <title>Gerenciador de Tarefas</title>
   <link rel="stylesheet" href="css/bootstrap.css" />
</head>
<body>

	<div class="container">
		<header class="masthead">
			<h1 class="muted">Gerenciador de Tarefas</h1>
		</header>

		<?php $tarefa = new Tarefas(); ?>
		
		<table class="table table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Tiítulo:</th>
					<th>Descrição:</th>
				</tr>
			</thead>
			
			<tbody>
			<?php foreach($tarefa->findAll() as $key => $value): ?>

				<tr id="tr-<?=$value->id?>">
					<td><?php echo $value->id; ?></td>
					<td><?php echo utf8_encode($value->titulo); ?></td>
					<td><?php echo utf8_encode($value->descricao); ?></td>
					<td><a href="#" class="excluir" id="<?=$value->id?>">Excluir</a></td>
				</tr>
			
			<?php endforeach; ?>
			</tbody>

		</table>

	</div>

	<div class="container">
		<header class="masthead">
			<h1 class="muted">Nova Tarefa</h1>
		</header>
		
		<form method="post" action="">
			<div class="input-prepend">
				<span class="add-on"><i class=" icon-chevron-right"></i></span>
				<input type="text" name="titulo" id="titulo" placeholder="Título" />
			</div>
			<br />
			<div class="input-prepend">
				<span class="add-on"><i class="icon-comment"></i></span>
				<input type="text" name="descricao" id="descricao" placeholder="Descrição" width="2000px;"/>
			</div>
			<br />
			<input name="cadastrar" class="btn btn-primary" id="enviar" value="Cadastrar dados">					
		</form>
	</div>

<script src="js/jQuery.js"></script>
<script src="js/bootstrap.js"></script>
<script>
	$('.excluir').click(function(){
		id = $(this).attr('id');
		$.post( "excluir.php", { id: id } ).done(function( data ) {
			console.log(data);
  			if(data == 1)
  				$('#tr-'+id).remove();
  			else
  				alert('falha ao excluir');
  		});
	});

	$('#enviar').click(function(){
		titulo = $("#titulo").val();
		descricao = $("#descricao").val();
		$.post( "cadastrar.php", { titulo: titulo, descricao: descricao } ).done(function( data ) {
			console.log(data);
  			if(data == 1)
  				location.reload();
  			else
  				alert('falha ao adicinar');
  		});
	});

</script>
</body>
</html>