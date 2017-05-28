<?php require_once 'cabecalho.php'; ?>
<?php

require_once 'conexao.php';

if(
	!empty($_POST["nome"]) &&
	!empty($_POST["isbn"]) &&
	!empty($_POST["autor"]) &&
	!empty($_POST["editora"]) &&
	!empty($_POST["edicao"])
) {
	$cadastrar = true;
}
	else {
		$cadastrar = false;
	}

if($cadastrar) {
	
$inserir = $con->prepare("INSERT INTO tbLivros (isbnLivro, nomeLivro, autorLivro, editoraLivro, edicaoLivro) 
VALUES (:isbnLivro, :nomeLivro, :autorLivro, :editoraLivro, :edicaoLivro)");
    $inserir->bindParam(':isbnLivro', $_POST["isbn"]);
    $inserir->bindParam(':nomeLivro', $_POST["nome"]);
	$inserir->bindParam(':autorLivro', $_POST["autor"]);
	$inserir->bindParam(':editoraLivro', $_POST["editora"]);
	$inserir->bindParam(':edicaoLivro', $_POST["edicao"]);
    $inserir->execute();
	
	header("Location: livros.php");
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

<h2>Novo cadastro de livro</h2>

<form method="post" class="form">
    <label for="nome">Nome do livro</label>
    <input type="text" id="nome" name="nome">
    <label for="autor">Autor</label>
    <input type="text" id="autor" name="autor">
    <label for="editora">Editora</label>
    <input type="text" id="editora" name="editora">
    <label for="edicao">Edição</label>
    <input type="text" id="edicao" name="edicao">
    <label for="isbn">ISBN</label>
    <input type="text" id="isbn" name="isbn">
    <button type="reset" class="button-1">Limpar campos</button>
    <button type="submit" class="button-2">Salvar</button>
</form>

<?php require_once 'rodape.php'; ?>