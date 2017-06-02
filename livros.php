<?php require_once 'cabecalho.php'; ?>

<nav>
    <ul>
        <li><a href="clientes.php">Clientes</a></li>
        <li><a class="nav-ativo">Livros</a></li>
        <li><a href="cadastrarlivros.php" class="nav-cadastrar">Cadastrar livros</a></li>
        <li><a href="sair.php" class="nav-sair">Sair</a></li>
    </ul>
</nav>

<div class="painel">

    <h2>Lista de livros</h2>
	
	<?php
	require_once 'conexao.php';
	
	$consulta = $con->query("SELECT isbnLivro, isbnLivro FROM tbLivros");
	$resultado = $consulta->fetchAll();
	if($resultado) {
		
		$apagar = (!empty($_POST['apagar'])) ? $_POST['apagar'] : null;
		
		
		if($apagar) {
			$deletar = $con->prepare("DELETE FROM tbLivros WHERE isbnLivro = :isbnLivro");
			$deletar->bindParam(':isbnLivro', $apagar);
			$deletar->execute();
		}
		$apagar = null;
		
		$consulta = $con->query("SELECT nomeLivro, isbnLivro FROM tbLivros");
		$resultado = $consulta->fetchAll();
		if(!$resultado) {
			echo '<h3>Nenhum livro cadastrado!</h3>';
		}
		
		foreach($resultado as $dado) {
			echo ('
				<div class="dados">' .
					$dado['nomeLivro'] .
				'</div>
				<div class="editar">
					<form method="post" action="editarlivro.php">
                    <button type="submit" name="editar" value="'. $dado['isbnLivro'] . '">Editar</button>
                </form>
				</div>' .
				'<div class="apagar">
					<form method="post">
                    <button type="submit" name="apagar" value="'. $dado['isbnLivro'] . '">Apagar</button>
                </form>
				</div>
				');
		}
		
	}
		else {
			echo '<h3>Nenhum livro cadastrado!</h3>';
		}
	
	
	?>
    
</div>

<?php require_once 'rodape.php'; ?>
