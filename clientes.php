<?php require_once 'cabecalho.php'; ?>

<nav>
    <ul>
        <li><a class="nav-ativo">Clientes</a></li>
        <li><a href="livros.php">Livros</a></li>
        <li><a href="cadastrarclientes.php" class="nav-cadastrar">Cadastrar clientes</a></li>
        <li><a href="sair.php" class="nav-sair">Sair</a></li>
    </ul>
</nav>

<div class="painel">

    <h2>Lista de clientes</h2>
	
	<?php
	require_once 'conexao.php';
	
	$consulta = $con->query("SELECT nomeCliente, cpfCliente FROM tbClientes");
	$resultado = $consulta->fetchAll();
	if($resultado) {
		
		$apagar = (!empty($_POST['apagar'])) ? $_POST['apagar'] : null;
		
		
		if($apagar) {
			$deletar = $con->prepare("DELETE FROM tbClientes WHERE cpfCliente = :cpfCliente");
			$deletar->bindParam(':cpfCliente', $apagar);
			$deletar->execute();
		}
		$apagar = null;
		
		$consulta = $con->query("SELECT nomeCliente, cpfCliente FROM tbClientes");
		$resultado = $consulta->fetchAll();
		if(!$resultado) {
			echo '<h3>Nenhum cliente cadastrado!</h3>';
		}
		
		foreach($resultado as $dado) {
			echo ('
				<div class="dados">' .
					$dado['nomeCliente'] .
				'</div>
				<div class="editar">
					<form method="post" action="editarcliente.php">
                    <button type="submit" name="editar" value="'. $dado['cpfCliente'] . '">Editar</button>
                </form>
				</div>' .
				'<div class="apagar">
					<form method="post">
                    <button type="submit" name="apagar" value="'. $dado['cpfCliente'] . '">Apagar</button>
                </form>
				</div>
				');
		}
		
	}
		else {
			echo '<h3>Nenhum cliente cadastrado!</h3>';
		}
	
	
	?>
    
</div>

<?php require_once 'rodape.php'; ?>
