<?php require_once 'cabecalho.php'; ?>

<div class="login">
<h2>Entre com a sua conta</h2>

    <form>
        <label for="email">Email</label>
            <input type="email" id="email">
        <label for="senha">Senha</label>
             <input type="password" id="senha">
        <button type="submit" class="button-1">Esqueci minha senha</button>
        <button type="submit" class="button-2">Entrar</button>
        
    </form>

        <h3>Ainda não tem uma conta?</h3>
    <div class="centralizar">
        <a href="cadastro.php" class="button-cad">Cadastra-se!</a>
    </div>
    
</div>

<?php require_once 'rodape.php'; ?>