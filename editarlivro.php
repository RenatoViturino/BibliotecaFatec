<?php require_once 'cabecalho.php'; ?>
<?php

require_once 'conexao.php';

if(empty($_POST["editar"])) {
	$_POST["editar"] = null;
}

if($_POST["editar"]) {
	$consulta = $con->prepare("SELECT * FROM tbLivros WHERE isbnLivro = :isbnLivro");
	$consulta->bindParam(':isbnLivro', $_POST["editar"]);
	$consulta->execute();
	$resultado = $consulta->fetchAll();
	$_POST["nome"] = $resultado[0]['nomeLivro'];
	$_POST["isbn"] = $resultado[0]['isbnLivro'];
	$_POST["autor"] = $resultado[0]['autorLivro'];
	$_POST["editora"] = $resultado[0]['editoraLivro'];
	$_POST["edicao"]= $resultado[0]['edicaoLivro'];
}

if(
	!empty($_POST["nome"]) &&
	!empty($_POST["isbn"]) &&
	!empty($_POST["autor"]) &&
	!empty($_POST["editora"]) &&
	!empty($_POST["edicao"])
) {
	$edicao = true;
}
	else {
		$edicao = false;
		$_POST["nome"] = null;
		$_POST["isbn"] = null;
		$_POST["autor"] = null;
		$_POST["editora"] = null;
		$_POST["edicao"]= null;
	}

if($edicao) {
	
$editar = $con->prepare("UPDATE tbLivros SET isbnLivro = :isbnLivro, nomeLivro = :nomeLivro, autorLivro = :autorLivro, editoraLivro = :editoraLivro, edicaoLivro = :edicaoLivro 
WHERE isbnLivro = :isbnLivro");
    $editar->bindParam(':isbnLivro', $_POST["isbn"]);
    $editar->bindParam(':nomeLivro', $_POST["nome"]);
	$editar->bindParam(':autorLivro', $_POST["autor"]);
	$editar->bindParam(':editoraLivro', $_POST["editora"]);
	$editar->bindParam(':edicaoLivro', $_POST["edicao"]);
    $editar->execute();

	if(empty($_POST["bt-edicao"])) {
		$_POST["bt-edicao"] = null;
	}
	
	if($_POST['bt-edicao']) {
		header("Location: livros.php");
	}
	
}
	
?>

<nav>
    <ul>
        <li><a href="clientes.php">Clientes</a></li>
        <li><a href="livros.php">Livros</a></li>
        <li><a class="nav-cadastrar-ativo">Cadastrar livros</a></li>
        <li><a href="sair.php" class="nav-sair">Sair</a></li>
    </ul>
</nav>

<h2>Editar cadastro de livro</h2>

<form method="post" class="form">
    <label for="nome">Nome do livro</label>
    <input type="text" id="nome" name="nome" value="<?php echo $_POST["nome"]; ?>">
    <label for="autor">Autor</label>
    <input type="text" id="autor" name="autor" value="<?php echo $_POST["autor"]; ?>">
    <label for="editora">Editora</label>
    <input type="text" id="editora" name="editora" value="<?php echo $_POST["editora"]; ?>">
    <label for="edicao">Edição</label>
    <input type="text" id="edicao" name="edicao" value="<?php echo $_POST["edicao"]; ?>">
    <label for="isbn">ISBN</label>
    <input type="text" id="isbn" name="isbn" value="<?php echo $_POST["isbn"]; ?>">
    <button type="reset" class="button-1">Limpar campos</button>
    <button type="submit" class="button-2" name="bt-edicao" value="true">Salvar</button>
</form>

<?php require_once 'rodape.php'; ?>