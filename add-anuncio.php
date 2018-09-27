<?php require 'pages/header.php'; ?>
<?php
	if(empty($_SESSION['cLogin'])){
		?>
		<script type="text/javascript">window.location.href="login.php";</script>
		<?php 
		exit;
	}
	require 'classes/clientes.class.php';
	$c = new Clientes();

	if(isset($_POST['titulo']) && !empty($_POST['titulo'])){
		$titulo = addslashes($_POST['titulo']);
		$categoria = addslashes($_POST['categoria']);
		$preco = addslashes($_POST['preco']);
		$descricao = addslashes($_POST['descricao']);
		$estado = addslashes($_POST['estado']);

		$a->addAnuncio($titulo, $categoria, $preco, $descricao, $estado);
		?>

		<div class="alert alert-success">
			Produto adicionado com sucesso!
		</div>
		<?php

	}
?>
<div class="container">
	<h1>Meus Anúncios <small>Adicionar anúncio</small></h1>

	<form method="POST" enctype="multipart/form-data">

		<div class="form-group">
			<label for="categoria" id="categoria">Categoria:</label>
			<select name="categoria" id="categoria" class="form-control">
				<?php 
				require 'classes/categorias.class.php';
				$h = new Categorias();
				$cats = $h->getLista();
				foreach ($cats as $cat):
				?>
				<option value="<?php echo $cat['id']; ?>"><?php echo utf8_encode($cat['nome']); ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<div class="form-group">
			<label for="titulo" id="titulo">Título:</label>
			<input type="text" name="titulo" id="titulo" class="form-control" />
		</div>

		<div class="form-group">
			<label for="preco" id="preco">Preço:</label>
			<input type="text" name="preco" id="preco" class="form-control" />
		</div>

		<div class="form-group">
			<label for="descricao" id="descricao">Descrição:</label>
			<input type="text" name="descricao" id="descricao" class="form-control" />
		</div>

		<div class="form-group">
			<label for="estado" id="estado">Estado de Conservação:</label>
			<select name="estado" id="estado" class="form-control">
				<option value="0">Novo</option>
				<option value="1">Em bom estado</option>
				<option value="2">Usado</option>
				<option value="3">Ruim</option>
			</select>
		</div>
		<input type="submit" value="Adicionar" class="btn btn-default">


	</form>

</div>


<?php require 'pages/footer.php'; ?>