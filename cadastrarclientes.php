<?php require_once 'cabecalho.php'; ?>

<nav>
    <ul>
        <li><a href="clientes.php">Clientes</a></li>
        <li><a href="livros.php">Livros</a></li>
        <li><a class="nav-cadastrar-ativo">Cadastrar clientes</a></li>
        <li><a href="sair.php" class="nav-sair">Sair</a></li>
    </ul>
</nav>

<h2>Novo cadastro de cliente</h2>

<form>
    <label for="nome">Nome completo</label>
    <input type="text" id="nome">
    <label for="cpf">CPF</label>
    <input type="text" id="cpf">
    <label for="email">Email</label>
    <input type="email" id="email">
    <label for="celular">Celular</label>
    <input type="text" id="celular">
    <label for="endereco">Endereço</label>
    <input type="text" id="endereco">
    <button type="reset" class="button-1">Limpar campos</button>
    <button type="submit" class="button-2">Salvar</button>

</form>

<?php require_once 'rodape.php'; ?>