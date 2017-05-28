<?php require_once 'cabecalho.php'; ?>
<?php

require_once 'conexao.php';

if(
	!empty($_POST["nome"]) &&
	!empty($_POST["cpf"]) &&
	!empty($_POST["email"]) &&
	!empty($_POST["celular"]) &&
	!empty($_POST["endereco"])
) {
	$cadastrar = true;
}
	else {
		$cadastrar = false;
	}

if($cadastrar) {
	
$inserir = $con->prepare("INSERT INTO tbClientes (cpfCliente, nomeCliente, emailCliente, celularCliente, enderecoCliente) 
VALUES (:cpfCliente, :nomeCliente, :emailCliente, :celularCliente, :enderecoCliente)");
    $inserir->bindParam(':cpfCliente', $_POST["cpf"]);
    $inserir->bindParam(':nomeCliente', $_POST["nome"]);
	$inserir->bindParam(':emailCliente', $_POST["email"]);
	$inserir->bindParam(':celularCliente', $_POST["celular"]);
	$inserir->bindParam(':enderecoCliente', $_POST["endereco"]);
    $inserir->execute();
	
	header("Location: clientes.php");
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

<h2>Novo cadastro de cliente</h2>

<form method="post" class="form">
    <label for="nome">Nome completo</label>
    <input type="text" id="nome" name="nome">
    <label for="cpf">CPF</label>
    <input type="text" id="cpf" name="cpf">
    <label for="email">Email</label>
    <input type="email" id="email" name="email">
    <label for="celular">Celular</label>
    <input type="text" id="celular" name="celular">
    <label for="endereco">Endereço</label>
    <input type="text" id="endereco" name="endereco">
    <button type="reset" class="button-1">Limpar campos</button>
    <button type="submit" class="button-2">Salvar</button>

</form>

<?php require_once 'rodape.php'; ?>