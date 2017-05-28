<?php require_once 'cabecalho.php'; ?>
<?php

require_once 'conexao.php';

if(empty($_POST["editar"])) {
	$_POST["editar"] = null;
}

if($_POST["editar"]) {
	$consulta = $con->prepare("SELECT * FROM tbClientes WHERE cpfCliente = :cpfCliente");
	$consulta->bindParam(':cpfCliente', $_POST["editar"]);
	$consulta->execute();
	$resultado = $consulta->fetchAll();
	$_POST["nome"] = $resultado[0]['nomeCliente'];
	$_POST["cpf"] = $resultado[0]['cpfCliente'];
	$_POST["email"] = $resultado[0]['emailCliente'];
	$_POST["celular"] = $resultado[0]['celularCliente'];
	$_POST["endereco"]= $resultado[0]['enderecoCliente'];
}

if(
	!empty($_POST["nome"]) &&
	!empty($_POST["cpf"]) &&
	!empty($_POST["email"]) &&
	!empty($_POST["celular"]) &&
	!empty($_POST["endereco"])
) {
	$edicao = true;
}
	else {
		$edicao = false;
		$_POST["nome"] = null;
		$_POST["cpf"] = null;
		$_POST["email"] = null;
		$_POST["celular"] = null;
		$_POST["endereco"]= null;
	}

if($edicao) {
	
$editar = $con->prepare("UPDATE tbClientes SET cpfCliente = :cpfCliente, nomeCliente = :nomeCliente, emailCliente = :emailCliente, celularCliente = :celularCliente, enderecoCliente = :enderecoCliente 
WHERE cpfCliente = :cpfCliente");
    $editar->bindParam(':cpfCliente', $_POST["cpf"]);
    $editar->bindParam(':nomeCliente', $_POST["nome"]);
	$editar->bindParam(':emailCliente', $_POST["email"]);
	$editar->bindParam(':celularCliente', $_POST["celular"]);
	$editar->bindParam(':enderecoCliente', $_POST["endereco"]);
    $editar->execute();
	
	if(empty($_POST["bt-edicao"])) {
		$_POST["bt-edicao"] = null;
	}
	
	if($_POST['bt-edicao']) {
		header("Location: clientes.php");
	}
}
	
?>

<nav>
    <ul>
        <li><a href="clientes.php">Clientes</a></li>
        <li><a href="livros.php">Livros</a></li>
        <li><a class="nav-cadastrar-ativo">Cadastrar clientes</a></li>
        <li><a href="sair.php" class="nav-sair">Sair</a></li>
    </ul>
</nav>

<h2>Editar cadastro de cliente</h2>

<form method="post" class="form">
    <label for="nome">Nome completo</label>
    <input type="text" id="nome" name="nome" value="<?php echo $_POST["nome"]; ?>">
    <label for="cpf">CPF</label>
    <input type="text" id="cpf" name="cpf" value="<?php echo $_POST["cpf"]; ?>">
    <label for="email">Email</label>
    <input type="email" id="email" name="email" value="<?php echo $_POST["email"]; ?>">
    <label for="celular">Celular</label>
    <input type="text" id="celular" name="celular" value="<?php echo $_POST["celular"]; ?>">
    <label for="endereco">Endereço</label>
    <input type="text" id="endereco" name="endereco" value="<?php echo $_POST["endereco"]; ?>">
    <button type="reset" class="button-1">Limpar campos</button>
    <button type="submit" class="button-2" name="bt-edicao" value="true">Salvar</button>

</form>

<?php require_once 'rodape.php'; ?>