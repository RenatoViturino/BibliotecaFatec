<?php require_once 'cabecalho.php'; ?>

<nav>
    <ul>
        <li><a href="clientes.php">Clientes</a></li>
        <li><a href="livros.php">Livros</a></li>
        <li><a class="nav-cadastrar-ativo">Cadastrar livros</a></li>
        <li><a href="sair.php" class="nav-sair">Sair</a></li>
    </ul>
</nav>

<h2>Novo cadastro de livro</h2>

<form action="salvarLivro.php" method="post">
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